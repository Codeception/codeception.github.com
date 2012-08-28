---
layout: post
title: Codeception with AMQP and Memcached
date: 2012-08-28 01:03:50
---

Good news, everyone! Codeception 1.1.2 released. And it's hard to list everything that were improved and fixed, but i will try.
With the help of our active contributor **[tiger.seo](https://github.com/tiger-seo)** Codeception got an [AMQP](http://codeception.com/docs/modules/AMQP) module wich allows to manipulate queue engines, like **RabbitMQ**. You can use this module if you need to clear queues between tests. Also, new [Memcache](http://codeception.com/docs/modules/Memcache) module was introduced. You can perform simple checks and use data from your Memcache storage in tests. Guys, it's very simple to contribute to Codeception. All new modules are welcome, they can grow from your local helpers and become part of this library. Just fork Codeception, add a module and send me a pull request!

### UX Improvements

You should regenerate your guy-classes after this update with the `build` command. Rebuilt Guy-classes will contain full documentation for each method and link to the source code of underlying method. Also, with the help of *tiger.seo* Codeception got better **PHPStorm** integration. Codeception when run in PHPStorm console outputs stack traces that is recognized by PHPStorm. So you can click on any file name and move to it in IDE.

### Save Scenarios as HTML

You know that there is `--html` option which saves results of running tests in HTML. But now you can save the test scenarios in HTML without running them. That's quite useful if you want to save test scenarios into your company's wiki. The HTML format can inserted into Confluence, for example. And now testers, managers, and developers will have the test scenarios up to date. Yep, thanks again to *tiger.seo*.

## PEAR Updates

PEAR package was completely redesigned. Codeception is not using PEAR as a dependency manager anymore, Composer is ok. But PEAR is quite useful if you want a system-wide install, and simple call to Codeception with `codecept` command. PEAR package now contains all dependent modules and doesn't require PHPUnit or Mink installed anymore. That will prevent possible conflicts and reduce level of PEAR-related wtfs.

## Bugs Fixed

* comments is shown again in console and in html output.
* bug with exception in [printFail](https://github.com/Codeception/Codeception/issues/48) method.
* [js files](https://github.com/Codeception/Codeception/pull/45) were not added to phar archive. Thanks to [f0rm4t](https://github.com/f0rm4t).
* [fix tests](https://github.com/Codeception/Codeception/pull/46) filename to be presented with relative path. By tiger.seo.
* unable to send more than 1 parameters using [SOAP.sendSoapRequest](https://github.com/Codeception/Codeception/pull/54) by [lostintime](https://github.com/lostintime)
* [DB module is not cleaned](https://github.com/Codeception/Codeception/pull/43) after the last test. By tiger.seo.

Codeception 1.1.2 can be [downloaded from site](http://codeception.com/thanks.html),

via PEAR

{% highlight bash %}
$ pear install codeception/Codeception
{% endhighlight %}

or via Composer

{% highlight bash %}
$ php composer.phar update
{% endhighlight %}