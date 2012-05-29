---
layout: post
title: New Codeception: Zombies and More.
date: 2012-05-29 01:03:50
---

This evening I released Codeception 1.0.9. The most important thing you may notice is documentation. It's just better. It was improved by [Jon Phipps](https://github.com/jonphipps). Better phrasing goes to better understanding, right? But let's move on to see the actual new features.

### Zombies are coming!

Two new modules were intoduced by Alexander Bogdanov @synchrone. It's new [Selenium2](http://codeception.com/docs/modules/Selenium2) module and [ZombieJS](http://codeception.com/docs/modules/ZombieJS). 

Ok, you may know about Selenium. But what is the purpose of Zombie?

Tools like __ZombieJS__, (PhantomJS, and more) are built in order to run tests without a browser. And so they are called headless. They don't require a browser window to start, they don't show any interactions on screen.

Why do we need browser for testing web applications? Only browser-based javascript engines can run all the client side code. ZombieJS is one of them, taken from browser and produced as a standalone tool. It's built with Node.js and requires Node.js, NPM, a C++ compiler and Python to install. Check out it's [official site](http://zombie.labnotes.org/) for more information. 

Thanks to [Mink](http://mink.behat.org) from now on you can write ZombieJS tests inside Codeception just like tests for other cases. 

### Don't run too fast!

Selenium and Selenium2 modules was updated with the new ```delay``` option. If Selenium performs actions faster the user, and javascript just can't catch it it, you can slow down the execution by setting the ```delay``` param. It's set in milliseconds and will perform pauses after each step in scenarios.

### Composer Tricks

Seems like the PHP WebScrapper [Goutte](https://github.com/fabpot/Goutte) (which is used by PHPBroser module) has a new backend now. It has moved from Zend Framework 2 libraries to new lightweight HTTP client [Guzzle](http://guzzlephp.org/). So, no more Zend dependencies and long stack trackes. This change doesn't affect PEAR users, cause this change arrive in PEAR packages yet.


Thanks again to all contributors and reporters.

Please update Codeception version via PEAR:

{% highlight bash %}
$ pear install codeception/Codeception
{% endhighlight %}

or via Composer

{% highlight bash %}
$ php composer.phar update
{% endhighlight %}
