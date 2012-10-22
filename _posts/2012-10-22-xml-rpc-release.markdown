---
layout: post
title: Error Reporting and XmlRPC
date: 2012-10-22 01:03:50
---

It looks like a good time for the new release! Do you agree?

And yes, there are enough changes to announce Codeception 1.1.5. In this release we concentrated mostly on fixing bugs and improving error reporting.
But the most important change, that from now Codeception uses **PHPUnit 3.7**. This PHPUnit version doesn't have that much BC breaks as previous one, so we hope you will not notice this change. 

Some tasty features were added too. But let's start with error reporting. 

* In stack trace PHP files of yours will be highlighted (if you use colors, of cource)
* No more `ERROR` with no descriptions, every error have stack trace and description
* Errors are displayed better, stack traces avaible only with `--debug` options

### XML-RPC Module
**[Tiger SEO](https://github.com/tiger-seo)** added just another useful module for testing XML-RPC web services. 
It requires 'php_xmlrpc' extension and `PhpBrowser` module to run. With this module you can perform XMLRPC calls and check the responses.
You can review the code at [GitHub](https://github.com/Codeception/Codeception/blob/master/src/Codeception/Module/XMLRPC.php) or [read the docs](http://codeception.com/docs/modules/XMLRPC). 

### Minor Features and Bugfixes

* Composer package fixed
* `grabServiceFromContainer` method added to Symfony2 module
* REST [fixes](https://github.com/Codeception/Codeception/pull/75) and [improvements](https://github.com/Codeception/Codeception/pull/71) by **tiger-seo**
* Fix for using `seeInDatabase` command with PostgreSQL 
* `build` command is not generating methods with the same names anymore
* no need to run `build` command just after `bootstrap`

### BC breaks to aware of

There could be some BC breaks, you should know about.
Before 1.1.5 you could start writing tests without defining a page. Codeception opened the root url "/" by default. So all actions were performed on home page. But opening the page before each test is not the best idea, especially if we test REST/SOAP web service. We just spend time for useless action. So whenever you write acceptance test, please start it with `amOnPage` action. This change didn't affect the functional tests (for now). 

{% highlight php %}
<?php 
$I = new WebGuy($scenario);
$I->amOnPage('/'); // required!
?>
{% endhighlight %}

Also, we did some changes for 2-steps tests loading, intrudoced in 1.1. At the first stage we read the test contents, in the next we execute it. From now on this stages are isolated, variables from preload will not pass to run. This will require loading of bootstrap file two times. Be prepared for that and optimize your bootstrap file.


As usual, Codeception 1.1.5 can be [downloaded from site](http://codeception.com/thanks.html),

installed via PEAR

{% highlight bash %}
$ pear install codeception/Codeception
{% endhighlight %}

or via Composer

{% highlight bash %}
$ php composer.phar update
{% endhighlight %}