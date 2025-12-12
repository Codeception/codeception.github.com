---
layout: doc
title: Parallel Execution - Codeception Docs
---

<div class="alert alert-success">💡 <b>You are reading docs for latest Codeception 5</b>. <a href="/docs/4.x/ParallelExecution">Read for 4.x</a></div>

# Parallel Execution

When execution time of your tests is longer than a coffee break, it is a good reason to think about making your tests faster. If you have already tried to run them on SSD drive, and the execution time still upsets you, it might be a good idea to run your tests in parallel. However, PHP runs in a single-process and you can't parallelize tests natively similarly to how this works in Java or in NodeJS. 

Depending on the project size and requirements you can choose how the best to implement parallel testing for your case.
In this guide we will overview possible options.

## Sharding

Minimal setup can be implemented by executing several independent CI jobs and running.
Sharding in Codeception allows to combine stages 1 and 2 so tests could be split by groups on the fly. 
In this case a pipeline could be simplified to one stage with several jobs.  

![](/images/codeception-sharding.png)

Each job should have Codeception running a subset of tests set by `--shard` option:

First job

```
php vendor/bin/codecept run --shard 1/3
```

Second job

```
php vendor/bin/codecept run --shard 2/3
```

Third job

```
php vendor/bin/codecept run --shard 3/3
```

For each job you specify on how many groups tests should be split and the group that should be executed on this agent.
I.e. `--shard` option takes 2 params: `--shard {currentGroup}/{numberOfGroups}`. So to split tests on 5 machines you need to create 5 jobs with Codeception running these shards: 1/5, 2/5, 3/5, 4/5, 5/5.

Splitting test by shards is done automatically with zero-config. However, in this case you receive as many reports as jobs you have. To aggregate jobs store HTML, XML, and CodeCoverage results as artifacts and add an extra job in the end to merge them. Merging can be done with Robo-paracept toolset described below. 


To get an aggregated report without an extra stage and without managing artifacts use [Testomat.io](https://testomat.io). This is a SaaS platform that can receive test results from different parallel run and show them in the one interface.

![](images/testomatio-report.png)

By running tests with Testomat.io reporter attached results will be sent to a centralized server. By default each execution will create its own report. To store results from different shards in one report set the Run title for them. You can use a common environment variable, like number of a build, to create the unique title which will be the same for all jobs. If build id is stored as $BUILDID variable, execution script for shard #3 can be following: 

```
TESTOMATIO={apiKey} TESTOMATIO_TITLE="Build $BUILDID" ./vendor/bin/codecept run --shard 3/4
```

## Building Pipeline

While sharding provides a simplified setup for testing the complete pipeline schema may look like this. 

![](images/codeception-pipeline.png)

* On the first stage, tests should be split into groups. The group file should be committed into the repository or passed to next stage as an artifact.
* On the second stage tests are executed. XML, HTML, and CodeCoverage reports must be stored as artifacts.
* On the third stage the results from previous jobs must be collected or aggregated.


To get more control on how the jobs are split excuted and results aggregated you can use a task runner.  

Codeception provides a toolset for [Robo task runner](https://robo.li) called [robo-paracept](https://github.com/Codeception/robo-paracept) for splitting tests into groups and merging resulting JUnit XML reports.

To sum up, we need to install:

* [Robo](https://robo.li), a task runner.
* [robo-paracept](https://github.com/Codeception/robo-paracept) - Codeception tasks for parallel execution.

## Using Robo and Robo-paracept

Execute this command in an empty folder to install Robo and Robo-paracept :

```php
composer require codeception/robo-paracept --dev
```

### Setting up Robo

Initializes basic RoboFile in the root of your project


```bash
php vendor/bin/robo init
```

Open `RoboFile.php` to edit it

```php
<?php

class RoboFile extends \Robo\Tasks
{
    // define public methods as commands
}
```

Each public method in robofile can be executed as a command from console. Let's define commands for 3 stages and include autoload.

```php
<?php
require_once 'vendor/autoload.php';

class Robofile extends \Robo\Tasks
{
    use Codeception\Task\Merger\ReportMerger;
    use Codeception\Task\Splitter\TestsSplitterTrait;

    public function parallelSplitTests()
    {

    }

    public function parallelRun()
    {

    }

    public function parallelMergeResults()
    {

    }
}
```

When running `robo` you should see all 3 that these methods availble as CLI commands:

```
parallel:split-tests
parallel:run
parallel:merge-results
```

#### Step 1: Split Tests

Codeception can organize tests into [groups](https://codeception.com/docs/AdvancedUsage#Groups). Starting from 2.0 it can load information about a group from a files. Sample text file with a list of file names can be treated as a dynamically configured group. Take a look into sample group file:


```bash
tests/Functional/LoginCept.php
tests/Functional/AdminCest.php:createUser
tests/Functional/AdminCest.php:deleteUser
```

Tasks from `\Codeception\Task\SplitTestsByGroups` will generate non-intersecting group files.  You can either split your tests by files or by single tests:

```php
public function parallelSplitTests()
{
    // Split your tests by files
    $this->taskSplitTestFilesByGroups(5)
        ->projectRoot('.')
        ->testsFrom('tests/Acceptance')
        ->groupsTo('tests/Support/Data/paracept_')
        ->run();

    /*
    // Split your tests by single tests (alternatively)
    $this->taskSplitTestsByGroups(5)
        ->projectRoot('.')
        ->testsFrom('tests/Acceptance')
        ->groupsTo('tests/Support/Data/paracept_')
        ->run();
    */
}
```

But what if one group of your tests runs for 5 mins and other for 20mins. In this case, you can balance execution time by using [SplitTestsByTime](https://github.com/Codeception/robo-paracept#splittestsbytime) task. It will generate balanced groups taking the execution speed into account. 
 
> More splitting strategies are implemented within [Robo-paracept](https://github.com/Codeception/robo-paracept#tasks) package.

Let's prepare group files:

```bash
php vendor/bin/robo parallel:split-tests
```

The output should be similar to this:

```
 [Codeception\Task\SplitTestFilesByGroupsTask] Processing 33 files
 [Codeception\Task\SplitTestFilesByGroupsTask] Writing tests/Support/Data/paracept_1
 [Codeception\Task\SplitTestFilesByGroupsTask] Writing tests/Support/Data/paracept_2
 [Codeception\Task\SplitTestFilesByGroupsTask] Writing tests/Support/Data/paracept_3
 [Codeception\Task\SplitTestFilesByGroupsTask] Writing tests/Support/Data/paracept_4
 [Codeception\Task\SplitTestFilesByGroupsTask] Writing tests/Support/Data/paracept_5

```

Now we have group files. We should update `codeception.yml` to load generated group files. In our case we have groups: *paracept_1*, *paracept_2*, *paracept_3*, *paracept_4*, *paracept_5*.

```yaml
groups:
    paracept_*: tests/Support/Data/paracept_*
```

Let's try to execute tests from the second group:


```bash
php vendor/bin/codecept run Acceptance -g paracept_2
```

#### Step 2: Running Tests

At this point you should decide if tests are executed on the same job or use multiple jobs for them. We recommend using multiple jobs, as in this case the burden of parallelization goes to CI server. This makes a lot of sense as a single machine has limited resources. If you split tests into CI jobs, you are limited only to the number of agents (build servers) that the CI can provide. For cloud-based services like GitHub Actions, GitLab CI, CircleCI, etc, this number is unlimited.

> Please refer to documentation of your CI platform to learn how to set up multiple jobs runnninng in parallel. Then proceed to merging of results. 

In some situations you may want to keep tests running on the same machine and scale it up with more resourses. This makes sense if you have heavy application setup for each test run and setting it up for each machine can waste a lot of resources.   


To execute tests in multiple processes Robo has `ParallelExec` task to spawn background processes.

```php
public function parallelRun()
{
    $parallel = $this->taskParallelExec();
    for ($i = 1; $i <= 5; $i++) {
        $parallel->process(
            $this->taskCodecept() // use built-in Codecept task
            ->suite('Acceptance') // run acceptance tests
            ->group("paracept_$i") // for all paracept_* groups
            ->xml("tests/_log/result_$i.xml") // save XML results
        );
    }
    return $parallel->run();
}
```

After the `parallelRun` method is defined you can execute tests with


```bash
php vendor/bin/robo parallel:run
```

#### Step 3: Merge Results

In case of `parallelExec` task we recommend to save results as JUnit XML, which can be merged and plugged into Continuous Integration server.

```php
public function parallelMergeResults()
{
    $merge = $this->taskMergeXmlReports();
    for ($i=1; $i<=5; $i++) {
        $merge->from("tests/_output/result_paracept_$i.xml");
    }
    $merge->into("tests/_output/result_paracept.xml")->run();
}
```
Now, we can execute :

```bash
php vendor/bin/robo parallel:merge-results
```

`result_paracept.xml` file will be generated. It can be processed and analyzed.

If you prefer HTML reports, they can be generated in the same way:

```php
public function parallelMergeResults()
{
    $merge = $this->taskMergeHtmlReports();
    for ($i=1; $i<=5; $i++) {
        $merge->from("tests/_output/result_$i.html");
    }
    $merge->into("tests/_output/result.html")->run();
}
```


<div class="alert alert-warning"><a href="https://github.com/Codeception/codeception.github.com/edit/master/docs/ParallelExecution.md"><strong>Improve</strong> this guide</a></div>
