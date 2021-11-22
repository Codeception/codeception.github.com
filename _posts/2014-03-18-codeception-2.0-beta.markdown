---
layout: post
title: "Codeception 2.0 beta"
date: 2014-03-18 01:03:50
---

It took about a month to get to the beta release. This release brings lots of changes even a few BC breaks and clearly shows what Codeception 2.0 is planning to be. Today we will announce more technical changes, and not conceptual ones. As it was stated previously: Codeception 2.0 will bring lots of small improvements, will be much easier to extend, and understand. Changes for beta release were not planned initially, but were added to help Codeception evolve during the 2.0 branch development. Let's list briefly all major changes and see how to deal with them. [Documentation for 2.0 branch](https://github.com/Codeception/Codeception/tree/master/docs) can be found on GitHub and will be published on RC release. 

## Changes

* Upgraded to PHPUnit 4.0
* Upgraded to facebook/webdriver 0.4
* **RunFailed** extension added. To rerun tests on fail include `Codeception\Platform\RunFailed` extension, and call `codecept run -g failed`.
* **Logger disabled** by default and moved to Extension. You will need to install Monolog by yourself, and enable `Codeception\Platform\Logger` as extension.
* Methods `_before`/`_after` of Cest can use `$I` object.
* Destination for xml/html/reports can be customized. For instance

{% highlight bash %}
codecept run --xml myreport.xml
codecept run --xml /home/davert/report.xml
codecept run -g database --xml database.xml
```
{% endhighlight %}

* `--coverage` + `--xml` or `--html` won't produce xml or html codecoverage output. Use new options `coverage-xml` and `coverage-html` instead. They were added so you could specify custom destination for codecoverage reports as well.
* you can get current environment in a test by accessing `$this->env` (even in Cept)
* shortcut functions added: `codecept_debug` to print custom output in debug mode, `codecept_root_dir`, `codecept_log_dir`, `codecept_data_dir` for retrieving Codeception paths. 
* extensions can change global config before processing.

## Breaking Changes

In Codeception 1.x bootstrap files were used differently for different types of tests. They were introduced to pass variables (and fixtures) into Cept scenarios. They were almost useless in Cests, and absolutely useless for Test files. They are not removed at all, but now they are loaded only once before the suite. If you were using bootstrap files for setting fixtures, you still can use them, but you will need to require them manually.

{% highlight php %}
<?php
require __DIR__ . '/_bootstrap.php'

$I = new WebGuy($scenario);
?>
{% endhighlight %}

The same way you can load bootstrap files into Cests. But we recommend to create `_fixtures.php` file, and use bootstrap file for suite initialization. 

## Dynamic Groups

One significant internal feature is dynamic groups. You can save test names into file and run them inside a group. That's how the [RunFailed](https://github.com/Codeception/Codeception/blob/master/src/Codeception/Platform/RunFailed.php) extension works: it saves names of failed tests into file `tests/_log/failed`, then execute `codecept run -g failed` to run these tests.

{% highlight yaml %}
groups:
  # add 2 tests to db group
  db: [tests/unit/PersistTest.php, tests/unit/DataTest.php]

  # add list of tests to slow group
  slow: tests/_log/slow
{% endhighlight %}

For example, you can create the list of the most slow tests, and run them inside their own group. Pretty interesting and powerful feature that also can be used to run tests in parallel.

## Parallel Test Execution

Not yet! Codeception does not support parallel test execution, nor will be provide it out of the box. That's because there is no solution that will fit for everyone. You may want to run parallel tests locally in threads via pthreads extension, or run them on different hosts via SSH, AMQP, etc. But we already have everything to implement parallel testing. 

Here is the algorithm:

* split all tests into groups (with dynamic groups)
* run each groups separately
* merge results

And we will write guides on implementing this algorithm, as well as we plan to release a sample tool that will run tests in parallel.

## Try it

As usual, we need your feedback to get 2.0 released as stable.

Download:

{% highlight bash %}
wget https://codeception.com/releases/2.0.0-beta/codecept.phar
{% endhighlight %}

Via Composer:

{% highlight bash %}
composer require --dev "codeception/codeception:2.0.0-beta" 
{% endhighlight %}

**P.S.** Our sponsors [**2Amigos** updated their site and logo](https://2amigos.us/). Check it out!