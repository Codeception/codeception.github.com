---
layout: post
title: "Codeception Updates"
date: 2014-10-12 01:03:50
---

Codeception is improving from day to day with the help of our contributors. Recently we had new 2.0.6 release with lots of bugfixes and new features. Unfortunately some not obvious regressions were introduced, and we had to release 2.0.7 as fast as we could. 

In order to maintain a predictable release cycle we plan to release a new **bugfix version each month** and deliver a **new major version each 6 months**. We tend to follow this plan for future, yet we are not ready to follow it strictly.

Today we have a few more announcements to sum up all recent work on Codeception and its support projects.

## CodeCoverage

Latest updates to [c3](https://github.com/Codeception/c3) brought full compatibility with Codeception 2.0. Also c3 can be installed and updated via Composer. 

{% highlight json %}
"require-dev": {
    "codeception/c3": "2.*"
},
"scripts": {
    "post-install-cmd": [
        "Codeception\\c3\\Installer::copyC3ToRoot"
    ],
    "post-update-cmd": [
        "Codeception\\c3\\Installer::copyC3ToRoot"
    ]
}
{% endhighlight %}

This allows to follow updates of code coverage collector (c3) easily. Also please note, that c3 issues were moved to main Codeception repo. 

## AspectMock

[AspectMock](https://github.com/Codeception/AspectMock) was recently updated to version 0.5.0. Latest update is powered by [Go Aop framework](https://github.com/lisachenko/go-aop-php) version 0.5. In new AspectMock fixed passing parameters by reference, and added ability to mock PHP functions. 

AspectMock allows to replace PHP function in desired namespace with user-defined closure or a return single return value. For instance, you can stub file operations by mocking `file_get_contents` or `file_put_contents`. You can also mock time functions, in order to make tests stable to time changes.

{% highlight php %}
<?php
namespace App\Cache;

$func = test::func('App\Cache', 'file_put_contents');
$cache = new FileCache;
$cache->store('hello'); // calls file_put_contents
$func->verifyInvoked(); // verifies file_put_content was called
test::cleanup(); // restore original function
?>
{% endhighlight %}

Same can be done for time functions:

{% highlight php %}
<?php
namespace demo;
test::func('demo', 'time', 'now');
$this->assertEquals('now', time());
?>
{% endhighlight %}

You can install latest AspectMock via Composer:

{% highlight bash %}
composer require "codeception/aspect-mock:~0.5"
{% endhighlight %}

## Codeception 2.1 

Next major release of Codeception will include new features, breaking changes, with ability to keep backwards compatibility. Here are the most interesting features you should wait for:

* All support classes like actors, steps, pages, etc, will be moved to `tests/_support` directory.
* Support classes [will use PSR-4 standard](https://github.com/Codeception/Codeception/pull/1228).
* Dependency Injection. All support and test classes can be included one into another: Pages can be injected into Helpers, Helpers can be injected into Cest classes, etc. 
* Module Conflicts. Lots of issues are happening when users try ot include modules with same apis into one suite. Like `PhpBrowser` + `Laravel4` + `WebDriver`. Those module is possible to be used together, but possibly that was not really intended to be used this way. Call to `$I->amOnPage` may be executed by any provided modules depending on the order of their declaration. This leads to unpredictable errors, and is the source of confusion. In 2.1 Codeception will allow to define module conflicts, and throw exceptions if modules are not expected to be used together. 
* [...and more](https://github.com/Codeception/Codeception/issues?q=is%3Aopen+is%3Aissue+milestone%3A2.1)

## Global Installation

One of recently discussed topics for Codeception, was [global installation of Codeception](https://github.com/Codeception/Codeception/issues/1238). From now on you can install Codeception globally using Composer:

{% highlight bash %}
composer global require 'codeception/codeception=2.0.*'
{% endhighlight %}

This will be recommended installation method since Codeception 2.1.

## RoboCI

This project that desires its own post in this blog. It is open-source reproduction of Travis CI using [Docker](http://docker.io) and Travis Cookbooks. [RoboCI](https://github.com/Codegyre/RoboCI) can be use to execute Travis CI tests locally or on remote server. It does not require VirtualBox nor Vagrant installed. It was executed with Codeception internal tests, with Selenium + Firefox, MySQL, PostgreSQL, MongoDb, and other services. [You can read more about RoboCI](http://phptest.club/t/roboci-run-travisci-builds-locally/170) and try it in your projects. In future we plan to provide consulting services on using RoboCI with Codeception or any other PHP testing framework. Stay in touch for updates!