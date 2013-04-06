---
layout: post
title: "The Platform (1.6.0): Interactive Console"
date: 2013-03-24 22:03:50
---

Today we start new **The Platform** iteration. After 1.6 Codeception would become much more friendly and flexible in testing. Yet, no of announced features are introduced today. It's really hard to keep promises especially if you come to idea of feature that would be really really helpful for acceptance testing.

## Meet Interactive Console

Within the interactive console you can try various commands without running a test.
It is quite useful when you deal with Selenium sessions for example. It always takes a long time to start and shutdown Selenium session. So it's unpleasent to see that your test fails and it should checked saved and executed once again and once again.

![Interactive console](http://img267.imageshack.us/img267/204/003nk.png)

Interactive console should simplify writing tests as you can play with different selectors and commands.
Also it may be useful when you want to try your new RESTful API. In console you can execute Codeception commands as you use in tests, but receive immediate result.

Try using the console:

{% highlight bash %}
php codecept.phar console suitename
{% endhighlight %}

Every command is exuecuted with `eval`. So check a your input to be valid PHP. And yes, you can skip `$I->` in the begining and `;` in the end. But all the brackets and quites are required.

## Low Level APIs

Sometimes it happens that Codeception limits you in your actions. Probably you could solve the issue within a Selenium, but Codeception Modules may not provide full access to it. Well, before this day.

Now you can access launching backends directly in tests:

{% highlight php %}
<?php
$I->amOnPage('/');
$I->executeInSelenium(function(\WebDriver\Session $webdriver) {
   $webdriver->element('id','link')->click('');
});
?>
{% endhighlight %}

For **Selenium**, **Selenium2** modules commands `executeInSelenium` were introduced. 
For **PhpBrowser** you can use `executeInGuzzle` which provides you access to Guzzle HTTP Client.

## Zend Framework 2 Initial Support

Thanks to [**bladeofsteel**](https://github.com/bladeofsteel) you can try to use Codeception with Zend Framework 2. Please try to use **ZF2** module on real Zend Framework 2 applications. ZF2 module is in *alpha* now, so your feedbacks, issues, and pull requests are highly appreciated. 

## Various additions

* `defer-flush` option to `Run` was added by **phpcodemonkey**. It helps to overcome output errors for session in functional tests.
* `amHttpAuthenticated` command added to all framework modules and PhpBrowser
* do not use steps option by default if it's not a one test executed by **tigerseo**
* fixes to AMQP module. Still it is in beta.
* you can use `Cest` files for writing functional and acceptance tests.
* CURL parameters can be set for PHPBrowser (SSL checks turned off by default).

Sorry if some bugs were not fixed. Any help and pull requests are highly appreciated. 

### Update

 [redownload](http://codeception.com/thanks.html) your `codeception.phar` for update:

{% highlight bash %}
wget http://codeception.com/codecept.phar -O codecept.phar
{% endhighlight %}

for composer version

{% highlight bash %}
$ php composer.phar update
{% endhighlight %}

Soon a new Guides will be added to documentation replacing the Scenario Unit Tests guides.
Follow the updates.