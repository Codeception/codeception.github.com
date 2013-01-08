---
title: Codeception released with CodeCoverage support
layout: post
date: 2013-01-08 01:03:50
---

We'd like to announce new Codeception 1.5 major release. This time our improvements are CodeCoverage and Remote CodeCoverage added. These features allows you to collect code coverage reports for all your tests: unit, functional, and acceptance and merge them together. So now you can review what parts of your applications are tested and which are not even for Selenium and PhpBrowser tests which are executed on a webserver.

[Read more](http://codeception.com/docs/11-CodeCoverage) in the new Guides chapter.

There is no magic in local codecoverage. **XDebug** and **PHP_CodeCoverage** libraries do their job. The tricky thing is remote codecoverage. We attach small script into application's front controller. When a special header is sent this script starts to collect coverage information. And in the end of tests, this data is merged, serialized and sent back to Codeception. So you can test and collect coverage report even on staging servers in real environment.

![code coverage](http://codeception.com/images/coverage.png)

Thanks to **[tiger-seo](https://github.com/tiger-seo)** for codecoverage feature. He did a great job developing a remote script `c3.php` which is a unique in it's way.

But back to Codeception. As you may've noticed our website is updated too. Documentation was improved, search was added, and nice [Quickstart](http://codeception.com/quickstart) page added too. So if you didn't try Codeception yet, it's very easy to start now. In only 6 steps.

### Modules

Two useful modules were introduced by [judgedim](https://github.com/judgedim). We have support of [MongoDb](http://codeception.com/docs/modules/MongoDb) and [Redis](http://codeception.com/docs/modules/Redis) now. They both can clean up your storages between tests and Mongo can perform checks in your collections. So If you are working with NoSQL databases, you should try them in your tests. If you use different NoSQL databases, please submit your patches, and they will be included in next release. 

### UX Improvements

Now you can execute a test by providing relative path to test, like.

{% highlight bash %}
php codecept.phar tests/acceptance/SignInCept.php
{% endhighlight %}

This small tweak imprioves user experience for *nix users as they can use autocompletion when running a test.

 Also you can run test from one specific directory, i.e. match a group of tests:

{% highlight bash %}
php codecept.phar tests/acceptance/admin
{% endhighlight %}

### Bugfixes

Composer package is works again. It's really hard to follow the stability in the world of constant changes, so we recommend use of `phar` for testing, just because it's prepackaged and always runs as expected. But if you use Composer it's easy to add Codeception to your vendors and receive all new updates with new release. Don't forget to mark `@stable` Codeception version.

### Install

As usual, Codeception 1.5.0 can be [downloaded from site](http://codeception.com/thanks.html),

installed via PEAR

{% highlight bash %}
$ pear install codeception/Codeception
{% endhighlight %}

or via Composer

{% highlight bash %}
$ php composer.phar update
{% endhighlight %}

### Thanks

As you may've noticed all that guys who took part in developing Codeception are now shown on every page of this site. Thn this way we say thank for all our contributors and all guys who support this project, for all companies that adopt Codeception in their workflow. 