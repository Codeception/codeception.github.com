---
layout: post
title: "Codeception 1.8: Phalcon, Environments, DataProviders"
date: 2013-11-15 22:03:50
---

This release brings lots of changes. Finally we got working DataProviders (the issue was opened for about a year), and `@depends` tag. But the details below. Let's start with the most important new features:

## Phalcon Framework Support


<img src="https://lh3.googleusercontent.com/-wjtJgs6HLwc/AAAAAAAAAAI/AAAAAAAAAD4/IvimRkefmI4/s120-c/photo.jpg" alt="Phalcon" style="float: right">


[Phalcon](http://phalconphp.com/) is the fastest PHP framework in the world. And that's not just a marketing slogan. Phalcon was developed as C extension, so it is already precompiled and loads into memory only once. Phalcon is modern framework with DI container, ORM (inspired by Doctrine), and templating engine (inspired by Twig). It is one of the most innovative projects in PHP world, so you should at least check it out. 

If you already work with Phalcon, here is a good news for you. Codeception got [Phalcon1](http://codeception.com/docs/modules/Phalcon1) module, that allows you to write functional tests with minimum setup. Besides standard framework interface this module provides actions for session and database access. It also wraps all tests into nested transactions, and rollbacks them in the end. Thus, all your database tests run superfast.

Is there any Phalcon project tested with Codeception? Yes, it is the official [Phalcon's forum](https://github.com/phalcon/forum).

This module was developed by **cujo** and improved by **davert**. We hope you like it.

## Environments

This is something you might not expect in the form it was produced, but, probably, that was long awaited.
This is to run tests multiple times over different environments. The most common issue is running acceptance tests over different browsers: firefox, phantomjs, chrome. Now you can create 3 different configurations and you can get tests will be repeated 3 times: in firefox, in phantomjs, and in chrome. The second usecase is run tests over different databases. 

Feature is pretty straightforward in use. You define the name of environment below the `env` key, and then you redefine any of configuration values you need.

{% highlight yaml %}
``` yaml
class_name: WebGuy
modules:
    enabled:
        - WebDriver
        - WebHelper
    config:
        WebDriver:
            url: 'http://127.0.0.1:8000/'
            browser: 'firefox'

env:
    phantom:
         modules:
            config:
                WebDriver:
                    browser: 'phantomjs'

{% endhighlight %}

[Advanced Usage](http://codeception.com/docs/07-AdvancedUsage) chapter was updated.


## DataProviders

You can use PHPUnit dataproviders in `Codeception\TestCase\Test` files. Yep. Finally.

Probably DataProviders are not really readable, as you need always to refer into data sets, which may be defined in the different part of a testcase. You can consider using [examples of Codeception\Specify](https://github.com/Codeception/Specify#examples) library, as for alternative for dataproviders.

Is there a way you can use data providers in scenario driven test? Not exactly, but you can emulate them with loops and conditional asserts:

{% highlight php %}
<?php
foreach ($posts as $post) {
	$I->canSee($post->title,'.post h2');
}
?>
{% endhighlight %}

## Depends

Declare depending tests in Cest and Test files. Works just as the original `@depends` of PHPUnit.
In Cests you can combine this with `@before` annotation. More information in [Advanced Usage](http://codeception.com/docs/07-AdvancedUsage).

## Debug

Debug output was refactored, and moved out to `Codeception\Util\Debug` class. This class can be used globally, i.e in tests, helpers, - wherever you want. To print debug information you should call:

{% highlight php %}
<?php
use Codeception\Util\Debug;
Debug::debug("This is working");
?>
{% endhighlight %}

This change dramatically improves debug output. You can also pause execution with `pause` static method of this class. Useful for debugging and tests development, implemented in `WebDriver` module as `pauseExecution` action.

## Bugfixes and Minor Changes

* WebDriver module got `pauseExecution` method which pauses running test in debug mode.
* Generated PageObject file `URL` const was changed to static variable.
* `waitForElementChange()` callback return value was not being used by **wheelsandcogs** | also in 1.7
* bugfix for making screenshots with WebDriver by **Michael Wang**. | also in 1.7
* Doctrine2: handle NULL value in seeInRepository param array by **imanzuk** | also in 1.7
* REST: fix adding parameters to url to non-GET HTTP methods 
* REST: Added `sendOPTIONS()` and `sendHEAD()` requests for CORS testing
* Symfony2: fixed usage of profiler
* Strict declaratin error fixes for framework constraints | also in 1.6, 1.7

## Update

If you prefer stability over features you can stay on 1.7 or 1.6 releases. We've got them updated too.

[redownload](http://codeception.com/thanks.html) your `codeception.phar` for update:

#### 1.8.0
{% highlight bash %}
wget http://codeception.com/codecept.phar -O codecept.phar
{% endhighlight %}

#### 1.7.3

{% highlight bash %}
wget http://codeception.com/releases/1.7.3/codecept.phar -O codecept.phar
{% endhighlight %}

#### 1.6.12

{% highlight bash %}
wget http://codeception.com/releases/1.6.12/codecept.phar -O codecept.phar
{% endhighlight %}

for composer version

{% highlight bash %}
$ php composer.phar update
{% endhighlight %}

## What to expect from 2.0

It is almost 2 years of Codeception, and we are planning to release 2.0 version as a next major to celebrate that. It is a major change, thus we can add few BC breaks. We are planning to:

* move to PHP 5.4. Not really necessary, yet it is getting hard to support 5.3.
* remove Mink entirely in favor of WebDriver for browser-testing and Goutte for headless testing.
* remove 2-times test execution (finally!).
* ??? (proposed by you)

