# Parallel Execution

When execution time of your tests is longer than a coffee break, it is a good reason to think about making your tests faster. If you have already tried to run them on SSD drive, and the execution time still upsets you, it might be a good idea to run your tests in parallel. However, PHP runs in a single-process and you can't parallelize tests natively similarly to how this works in Java or in NodeJS. In this guide we will overview the options you have to run your tests in parallel.

Parallel Test Execution consists of 3 steps:

* splitting tests
* running tests in parallel
* merging results

Depending on the project size and requirements you can choose the proper way to implement parallel testing.
In this guide we will overview possible options.

## Continuous Integration

If you use modern Continuous Integration setup you can split your tests by jobs and run them in parallel.
In this case the burden of parallelization lies on CI server.
This makes a lot of sense as a single machine has limited resources. So even if PHP could spawn multiple processes with tests at one point you would still need to split tests in CI jobs.
If you split tests into CI jobs, you are limited only to the number of agents (build servers) that the CI can provide. For cloud-based services like GitHub Actions, GitLab CI, CircleCI, etc, this number is unlimited.

![](images/codeception-pipeline.png)

On the first stage, tests should be split into groups. The group file should be committed into the repository or passed to next stage as an artifact.

On the second stage tests are executed. XML, HTML, and CodeCoverage reports must be stored as artifacts.

On the third stage the results from previous jobs must be collected or aggregated.

## Sharding

Minimal setup can be implemented by executing several independent CI jobs and running.
Sharding in Codeception allows to combine stages 1 and 2 so tests could be split by groups on the fly. 
In this case a pipeline could be simplified to one stage with several jobs.  

![](/images/codeception-sharding.png)

Each job should have Codeception running a subset of tests set by `--shard` option:

```
# first job
./venodor/bin/codecept run --shard 1/3

# second job
./venodor/bin/codecept run --shard 2/3

# third job
./venodor/bin/codecept run --shard 3/3
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

To get more control on how the jobs are split excuted and results aggregated you can use a task runner.  

Codeception provides a toolset for [Robo task runner](https://robo.li) called [robo-paracept](https://github.com/Codeception/robo-paracept) for splitting tests into groups and merging resulting JUnit XML reports.

To sum up, we need to install:

* [Robo](https://robo.li), a task runner.
* [robo-paracept](https://github.com/Codeception/robo-paracept) - Codeception tasks for parallel execution.

## Using Robo and Robo-paracept

Execute this command in an empty folder to install Robo and Robo-paracept :
{% highlight bash %}

$ composer require codeception/robo-paracept --dev

{% endhighlight %}

You need to install Codeception after, if codeception is already installed it will not work.
{% highlight bash %}

$ composer require codeception/codeception

{% endhighlight %}

### Setting up Robo

Initializes basic RoboFile in the root of your project

{% highlight bash %}

$ robo init

{% endhighlight %}

Open `RoboFile.php` to edit it

{% highlight php %}

<?php

class RoboFile extends \Robo\Tasks
{
    // define public methods as commands
}

{% endhighlight %}

Each public method in robofile can be executed as a command from console. Let's define commands for 3 steps and include autoload.

{% highlight php %}

<?php
require_once 'vendor/autoload.php';

class Robofile extends \Robo\Tasks
{
    use \Codeception\Task\MergeReports;
    use \Codeception\Task\SplitTestsByGroups;

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

{% endhighlight %}

If you run `robo`, you can see the respective commands:

{% highlight bash %}

$ robo
Robo version 0.6.0

Usage:
  command [options] [arguments]

Options:
  -h, --help            Display this help message
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi            Force ANSI output
      --no-ansi         Disable ANSI output
  -n, --no-interaction  Do not ask any interactive question
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Available commands:
  help                    Displays help for a command
  list                    Lists commands
 parallel
  parallel:merge-results
  parallel:run
  parallel:split-tests

{% endhighlight %}

#### Step 1: Split Tests

Codeception can organize tests into [groups](https://codeception.com/docs/07-AdvancedUsage#Groups). Starting from 2.0 it can load information about a group from a files. Sample text file with a list of file names can be treated as a dynamically configured group. Take a look into sample group file:

{% highlight bash %}

tests/functional/LoginCept.php
tests/functional/AdminCest.php:createUser
tests/functional/AdminCest.php:deleteUser

{% endhighlight %}

Tasks from `\Codeception\Task\SplitTestsByGroups` will generate non-intersecting group files.  You can either split your tests by files or by single tests:

{% highlight php %}

<?php
    function parallelSplitTests()
    {
        // Split your tests by files
        $this->taskSplitTestFilesByGroups(5)
            ->projectRoot('.')
            ->testsFrom('tests/acceptance')
            ->groupsTo('tests/_data/paracept_')
            ->run();

        /*
        // Split your tests by single tests (alternatively)
        $this->taskSplitTestsByGroups(5)
            ->projectRoot('.')
            ->testsFrom('tests/acceptance')
            ->groupsTo('tests/_data/paracept_')
            ->run();
        */
    }


{% endhighlight %}

Let's prepare group files:

{% highlight bash %}

$ robo parallel:split-tests

 [Codeception\Task\SplitTestFilesByGroupsTask] Processing 33 files
 [Codeception\Task\SplitTestFilesByGroupsTask] Writing tests/_data/paracept_1
 [Codeception\Task\SplitTestFilesByGroupsTask] Writing tests/_data/paracept_2
 [Codeception\Task\SplitTestFilesByGroupsTask] Writing tests/_data/paracept_3
 [Codeception\Task\SplitTestFilesByGroupsTask] Writing tests/_data/paracept_4
 [Codeception\Task\SplitTestFilesByGroupsTask] Writing tests/_data/paracept_5

{% endhighlight %}

Now we have group files. We should update `codeception.yml` to load generated group files. In our case we have groups: *paracept_1*, *paracept_2*, *paracept_3*, *paracept_4*, *paracept_5*.

{% highlight yaml %}

groups:
    paracept_*: tests/_data/paracept_*

{% endhighlight %}

Let's try to execute tests from the second group:

{% highlight bash %}

$ codecept run acceptance -g paracept_2

{% endhighlight %}

#### Step 2: Running Tests

Robo has `ParallelExec` task to spawn background processes.

##### Inside Container

If you are using [Docker](#docker)  containers you can launch multiple Codeception containers for different groups:

{% highlight php %}

public function parallelRun()
{
    $parallel = $this->taskParallelExec();
    for ($i = 1; $i <= 5; $i++) {
        $parallel->process(
            $this->taskExec('docker-compose run --rm codecept run')
                ->option('group', "paracept_$i") // run for groups paracept_*
                ->option('xml', "tests/_log/result_$i.xml") // provide xml report
        );
    }
    return $parallel->run();
}

{% endhighlight %}

##### Locally

If you want to run tests locally just use preinstalled `taskCodecept` task of Robo to define Codeception commands and put them inside `parallelExec`.

{% highlight php %}

<?php
public function parallelRun()
{
    $parallel = $this->taskParallelExec();
    for ($i = 1; $i <= 5; $i++) {
        $parallel->process(
            $this->taskCodecept() // use built-in Codecept task
            ->suite('acceptance') // run acceptance tests
            ->group("paracept_$i") // for all paracept_* groups
            ->xml("tests/_log/result_$i.xml") // save XML results
        );
    }
    return $parallel->run();
}

{% endhighlight %}

After the `parallelRun` method is defined you can execute tests with

{% highlight bash %}

$ robo parallel:run

{% endhighlight %}

#### Step 3: Merge Results

In case of `parallelExec` task we recommend to save results as JUnit XML, which can be merged and plugged into Continuous Integration server.

{% highlight php %}

<?php
    function parallelMergeResults()
    {
        $merge = $this->taskMergeXmlReports();
        for ($i=1; $i<=5; $i++) {
            $merge->from("tests/_output/result_paracept_$i.xml");
        }
        $merge->into("tests/_output/result_paracept.xml")->run();
    }


{% endhighlight %}
Now, we can execute :
{% highlight bash %}

$ robo parallel:merge-results

{% endhighlight %}
`result_paracept.xml` file will be generated. It can be processed and analyzed.

#### All Together

To create one command to rule them all we can define new public method `parallelAll` and execute all commands. We will save the result of `parallelRun` and use it for our final exit code:

{% highlight php %}

<?php
    function parallelAll()
    {
        $this->parallelSplitTests();
        $result = $this->parallelRun();
        $this->parallelMergeResults();
        return $result;
    }


{% endhighlight %}
