---
layout: post
title: "Codeception 2.0 alpha"
date: 2014-02-18 01:03:50
---

Finally we are ready to show you Codeception 2.0. We tried not to break everything (as it was supposed for major version change), but keep things work as they are, but maybe in a different way. Let's review the most important changes:

## Codeception: Not Just For Guys

Codeception is awesome testing tool, but before 2.0 there were only Guys in it. That is not fair! We wanted to make Codeception a tool for everyone: for guys, girls, developers, test engineers, ninjas and even wookiees... *(nope, wookiees should wait for 3.0)*. 

That's why you can now choose the desired actor from a list during the `bootstrap` process.

```
Before proceed you can choose default actor:

$I = new {{ACTOR}}
  Select an actor. Default: Guy  
  [0] Guy
  [1] Girl
  [2] Person
  [3] Engineer
  [4] Ninja
  [5] Dev

```

so you all your test actors (that's how we call guy classes now) will be in form like `TestGirl`, `WebNinja`, `CodeDev`, etc. Pretty flexible. That should fit everyone.

## Codeception: Not Alone

The second BUG of Codeception was that the complete loneliness of guys (or should we say actors now). You know, it is so sad to see that there is only `$I` in the test, forever alone, like on a desert island, or in space... But in 2.0 you can invite some friends into your tests. Let's say...

{% highlight php %}
<?php
$I = new WebGuy($scenario);
$nick = $I->haveFriend('nick');
?>
{% endhighlight %}

So we can write **multi-session tests** that can be executed in two browser windows. 
You may try to run this test on `github.com` to see how it works:

{% highlight php %}
<?php
$I = new WebGuy($scenario);
$I->wantTo('surf Github with Nick');
$I->amOnPage('/');
$I->submitForm('#top_search_form', array('q' => 'php-webdriver'));
$nick = $I->haveFriend('nick');
$nick->does(function(WebGuy $I) {
    $I->amOnPage('/Codeception/Codeception');
    $I->click('Issues');
    $I->canSeeInTitle('Issues');
});
$I->click('li.public:nth-child(1) > h3:nth-child(3) > a:nth-child(1) > em:nth-child(2)');
$I->seeInTitle("php-webdriver");
$nick->does(function(WebGuy $I) {
    $I->click('Milestones');
    $I->canSeeInTitle('Milestones');
});
$I->seeCurrentUrlEquals('/facebook/php-webdriver');
$I->click('Issues');
$I->canSeeInTitle('Issues');
?>
{% endhighlight %}

As you see, everything in in `does` closure is executed in separate session. This way you can test user-to-user interactions on your site. For example Alice writes a private message to Bob and Bob responds back. Similarly you can have multiple REST sessions in a test. 

Such scenario cases can be implemented. That's what are friends for. 

## Notable Changes

As it was announced earlier, the main goals for Codeception 2.0 was internal refactoring.

* **Mink (and its drivers) was removed completely**. Instead you can use WebDriver module to do Selenium testing, and PhpBrowser (which uses Goutte) for browser-emulation. PhpBrowser module is now more compatible with frameworks modules, they use the same methods and acts in the same manner. If you were using `Selenium` or `Selenium2` module you should switch to **WebDriver**, for PHPBrowser everything should *(crossing fingers)* work smoothly.
* **2-phases test execution with tricky magic including usage of `Maybe` class was removed**. Tests are now executed one time, like any regular PHP file. So you can use any PHP code in your tests, and appearance of Maybe object would not confuse you anymore.

{% highlight php %}
<?php
$card = $I->grabTextFrom('#credit_card')
var_dump($card); // was showing `Maybe` instead of real value
?>
{% endhighlight %}

* Codeception 2.0 require PHP 5.4 and higher. Time changes, PHP 5.3 is getting harder and harder to support, thus we decided to move to 5.4 and keep our code base up to date. And yes, we wanted to use short array syntax. We are tired to keeping write all those nasty `array()` stuff.
* Actor classes (initial **Guy classes) are now **rebuilt automatically**. Thus, you want get exception when change suite configuration, or add methods to helper. Rebuilds are not required anymore.  
* Added **Assert*** module that can be used to write common asserts in your tests. You can now use `seeEquals`, `seeContains` and other actions inside your Cepts or Cests.
* Experimental: added **Silex** module. We need your Feedback on unsing it.

## Minor Internal Changes

Refactoring, Refactoring, Refactoring. We use PSR-2 now. We rewrote CodeCoverage. We have better directory structure... More new files. What else? Oh, lets admit, probably those are not changes you would notice. But internals are now more clen and easy to understand *(Except the parts which heavily rely on PHPUnit internals)*.

## Upgrading

We'd like to ask you to try Codeception 2.0 on your projects. Before the release is ready we need to collect feedback and fix all encjountered issues. You know where [GitHub issues](https://github.com/Codeception/Codeception/issues?state=open) are. 

Download:

{% highlight bash %}
wget http://codeception.com/releases/2.0.0-alpha/codecept.phar
{% endhighlight %}

Via Composer:

{% highlight bash %}
composer require --dev "codeception/codeception:2.0.0-alpha" 
{% endhighlight %}

## Some Upgrading Notes

* Run `build` command
* Replace Selenium2 to WebDriver module
* Check you don't use `PHPBrowser->session` property anywhere (it was Mink part)
* CodeCoverage with c3 will require [new version of c3](https://github.com/Codeception/c3/tree/2.0).

## What's next?

We need your feedback, and meanwhile we will work on updating documentation parts. 1.8.x will be maintained, but new features will be added to 2.x branch. 