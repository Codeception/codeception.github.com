---
layout: post
title: "Codeception 1.6.6: Sequences"
date: 2013-08-29 22:03:50
---

A minor release with one major announcement. In `1.6.6` most bugfixes were included from pull requests. Thanks for everyone who did the contributions.

## Sequence

Also a very tiny new module was included. It's [Sequence](/docs/modules/Sequence) which was created to generate unique data for your tests. Sequnces become pretty handy if you don't do database cleanup before each tests. They guarantee you can get unique names and values for each test.

{% highlight php %}
<?php
$I = new WebGuy\PostSteps($scenario);
$I->wantTo('create a post');
$I->createPost('Post'.sq(1), 'Lorem Ipsum');
$I->see('Post created sucessfully');
$I->see('Post'.sq(1), '#posts');
?>
{% endhighlight %}

No matter how much times you execute this test, each time you see a new post is created with different name.

## Bugfixes

* Remote codecoverage now works with Selenium2 module. **Please [update c3.php file](https://github.com/Codeception/c3/raw/master/c3.php) to use it**.
* IoC container access in **Laravel4** module by **@allmyitjason**.
* PostgreSQL driver fixes by **@mohangk** and **@korotovsky **.
* don't rollback for inactive transaction in Dbh module by **@sillylogger**
* fix to guy classes generation with namespaces by **@vinu**.
* SQLite improvements by **@piccagliani**

### Update

[redownload](https://codeception.com/thanks.html) your `codeception.phar` for update:

{% highlight bash %}
wget https://codeception.com/codecept.phar -O codecept.phar
{% endhighlight %}

for composer version

{% highlight bash %}
$ php composer.phar update
{% endhighlight %}

---

## Living on the Edge: WebDriver

In July a group of Facebook developers set the goal to write the complete new Selenium Webdriver bindings. 
They decided to do it finally the right way, with the same WebDriver interface it is used in other languages like Java and C#. Ironically, Selenium2 module of Codeception uses the old webdriver bindings from Facebook.They were very hard in use, and had lots of issues. Most common issues were solved in [Element34](https://github.com/Element-34/php-webdriver) fork, which was then forked by [Instaclick](https://github.com/instaclick/php-webdriver) to bring namespaces and PSR-0, which was then [used in Mink's Selenium2Driver](https://github.com/Behat/MinkSelenium2Driver), and Mink was used in Codeception. 

Pretty tricky, right?

Currently there are 3 WebDriver bindings in PHP. 

* [Selenium2TestCase of PHPUnit](https://phpunit.de/manual/current/en/selenium.html#selenium.selenium2testcase) which is the most old, the most complete and the most OOP webdriver implementation. But if you have worked with its api, you understand how robust it is to learn and use.
* [Element34 fork](https://github.com/Element-34/php-webdriver) based on initial facebook/webdriver bindings, but with hooks to solve common pitfalls.
* [Selenium2Driver](https://github.com/Behat/MinkSelenium2Driver) of Mink which incorporates Element34 bindings and _Syn.js_ library to perform most of interactions via JavaScript bypassing WebDriver API.

Ok. Now we have new [facebook webdriver bindings](https://github.com/facebook/php-webdriver). They are in active development and they lack proper documentation. But the good part of it, that even without documentation you will easily learn how to work with them. Any question on StackOverflow with examples in Java or C# will work in PHP just the same way. 

In Codeception `master` we created a new [**WebDriver**](https://github.com/Codeception/Codeception/blob/master/docs/modules/WebDriver.md) module which uses new webdriver bindings.
This module will be included into first 1.7 release, but it won't be recommended for regular use before the stable version of php-webdriver is released.

To try the new WebDriver you should switch to `dev-master` in `composer.json` or use the pre-prelease [phar package](https://github.com/Codeception/Codeception/blob/master/package/codecept.phar).

WebDriver module does not implement everyhting the Selenium2 module has. There is no right clicks, drag and drops, and more. But there are few handy improvements:

* `submitForm` action as in PhpBrowser.
* `waitForElement` action to wait for element to appear on page.
* `selectOption` and `checkOption` now both work with radio buttons.
* `seeElementInDOM` to check the invisible elements.
* `waitForElementChange` to wait that element changed
* [implicit waits](https://docs.seleniumhq.org/docs/04_webdriver_advanced.jsp#implicit-waits) with `wait` config prameter (default is 5 secs).
* `maximizeWindow` specially for **@aditya-** :). 

In all other ways its pretty compatible with Selenium2 module. Try it on your own risk or wait for stable versions.