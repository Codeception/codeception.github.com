---
layout: post
title: "Codeception 1.6.5: Debug and Bugfixes"
date: 2013-08-09 22:03:50
---

This is a minor release, mostly done to fix some bugs, you have encountered.
Please, submit your Pull Requests for the bugs critical of yours. Most of pull requests are accepted, but if you will start a proposal, we can recommend you the best way to implement the fix.

## Selenium2 Compatiblity

Selenium2 server v.2.34 was released recently and to use it you need to update Codeception.
If you use phar version, you should replace your old `codecept.phar` with new one.

## Debug Levels

At least one useful feature we prepared for you. Debug output in `PhpBrowser` and `REST` modules was extended with additional information that will be printed in `debug` mode:

![debug](/images/debug.png)

Tests would be much easier to debug when you see reponse headers, status codes and client cookies.
Don't forget to add `--debug` to run your PhpBrowser acceptance tests, option to see that.

## Title Actions

Two basic yet useful actions were added to all web interaction modules.

{% highlight php %}
<?php
$I->seeInTitle('My Blog | My Post #1');
$I->dontSeeInTitle('Her Blog');
?>
{% endhighlight %}

Should be useful, right?

## Single Test

Finally you can now execute a single test from `Cest` or `Test` testcases.

{% highlight bash %}
php codecept.phar run tests/unit/UserModelTest.php:testSave
{% endhighlight %}

In this case we will execute only `testSave` test out of `UserModelTest` TestCase.
The same works for Cests. You may write only the beginning of test name, to execute it.

## Bugfixes

* fix to correct displaying of non-latin characters in html-report by **shofel**
* `--xml` output for Codeception\TestCase\Test fixed
* fixed `unserialize` error during code coverage. Anyway, if you ever seen this, you didn't setup coverage correctly.
* Interactive console `console` command does not boot with error stacktrace.
* Clearing only tables and not views in Db->cleanup()
* PDO `$dbh` is now passed to Db module corretcly #414

## Release Plan

Also we are planning to get more stable releases, and follow the Semantic Versioning. 
This means that current stable branch is 1.6. If you submit patches and bugfixes, you should propose them into `1.6` branch. Experimental features should go to master. 


| release |  branch  |  status  |
| ------- | -------- | -------- |
| **Stable** | **1.6** | [![Build Status](https://secure.travis-ci.org/Codeception/Codeception.png?branch=1.6)](https://travis-ci.org/Codeception/Codeception) [![Latest Stable](https://poser.pugx.org/Codeception/Codeception/version.png)](https://packagist.org/packages/Codeception/Codeception)
| **Development** | **master** | [![Build Status](https://secure.travis-ci.org/Codeception/Codeception.png?branch=master)](https://travis-ci.org/Codeception/Codeception) [![Dependencies Status](https://d2xishtp1ojlk0.cloudfront.net/d/2880469)](https://depending.in/Codeception/Codeception)


### Update

[redownload](https://codeception.com/thanks.html) your `codeception.phar` for update:

{% highlight bash %}
wget https://codeception.com/codecept.phar -O codecept.phar
{% endhighlight %}

for composer version

{% highlight bash %}
$ php composer.phar update
{% endhighlight %}

