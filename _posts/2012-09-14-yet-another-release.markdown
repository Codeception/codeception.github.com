---
layout: post
title: Selenium2, Memcached, Locator improvements.
date: 2012-08-28 01:03:50
---

Codeception 1.1.3 and then 1.1.4 was released during last month. In this post I will summarize the changes happened in this minor updates. The 1.1.3 version fixed one bug pointed by __Nastya Ahramenko__. Yep, only one bug. But it was pretty cool for me to mention it and make a release for it.

Nastya wrote:

If the web-page contains two similar links, then the second link is not opened.
For example:

1. Page contains two links: "Test Link" is first link, "Test" is second link
2. Create test with the following steps 

{% highlight php %}
<?php
$I->click('Test Link');
$I->click('Test');
{% endhighlight %}

Both steps open the first link.

Actually we can discuss if it's a bug or a feature. But, it's more bug then a feature. This occur due to XPath locators in _Mink_ and _BrowserKit_ libraries. Codeception is a wrapper for Mink and BrowserKit, so there is no reason why it can't be done right. So, Codeception is solving this bug by seraching the strictly matched object at first, and then is trying to find it by more complex XPath locator. I.e., at first it will try to locate `<a href="#">Test</a>` and if it's not found will match the `<a href="#">Test Link</a>`.

That's all about 1.1.3

### And now what about 1.1.4? 

There are pretty much fixes from other contributors. Thanks for anyone sending me pull requests and patches. Here are the changes done by this awesome guys!

* [ZombieJS fix](https://github.com/Codeception/Codeception/pull/69) for newer Mink version compatibility by **synchrone**.
* [Codeception\Module\Unit.seeExceptionThrown doesn't fail](https://github.com/Codeception/Codeception/pull/66) when no exception is thrown by **lostintime**.
* [Symfony2.1 compatibility fix and reinvention of package building](https://github.com/Codeception/Codeception/pull/61) by **ZloeSabo**.
* Various autoload fixes by **flaviozantut** and **lostintime**.
* [No setProperty method in CodeGuy](https://github.com/Codeception/Codeception/issues/59) by **ZloeSabo**.
* Also, useful XPath matching methods added to SOAP
* Memcache module supports now either *Memcache* or *Memcached* lib.

### Selenium2 module improvements

* Dealing with [confirm and alert popups](https://github.com/Codeception/Codeception/pull/60) by **f0rm4t**.
* [Methods SwitchToWindow and SwitchToIFrame added to Selenium2 module](https://github.com/Codeception/Codeception/pull/64) by **f0rm4t**.

## Define Actions Beforehand

From now on it's much easier to define actions in helpers. You can write a method that is not defined yet, and then run new `analyze` command to append new commands to helper classes. It's quite useful when tester writes a test and needs some new actions to define. When you run `php codecept.phar analyze suitename` you will be notified on all methods which do not exist in modules, and you will be asked to create them in helpers. Just try!

## New Locator class

XPath locators are very powerful but are pretty hard to write and maintain. We decided to provide some useful functions to help writing locators better. Try new `Codeception\Util\Locator` for that. It will be described in next blogpost. Stay in touch.

As usual, Codeception 1.1.4 can be [downloaded from site](http://codeception.com/thanks.html),

installed via PEAR

{% highlight bash %}
$ pear install codeception/Codeception
{% endhighlight %}

or via Composer

{% highlight bash %}
$ php composer.phar update
{% endhighlight %}