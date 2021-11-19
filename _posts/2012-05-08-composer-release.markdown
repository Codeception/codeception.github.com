---
layout: post
title: Codeception 1.0.8 Released.
date: 2012-05-08 01:03:50
---

From this release you can install Codeception via [Composer](https://getcomposer.org/). If you have fucked up with PEAR it's a good idea to try out brand new Composer.
It allows you to install Codeception with all it's dependencies, even PHPUnit, without any usage of PEAR. 

If you already use Composer add this lines int your composer.json to and update packages.

{% highlight bash %}
    "require": {
        "Codeception/Codeception": "*"
    },
    "repositories": {
        "behat/mink-deps": {
            "type": "composer",
            "url":  "behat.org"
        }
    }
{% endhighlight %}

From now on you can run Codeception with

{% highlight bash %}
php vendor/bin/codecept
{% endhighlight %}

If you are new to composer but you are troubled with PEAR, the [installation guide](https://codeception.com/install) is updated for you.

Except this significant (but simple change) this release is all about bugfixing. 

With the help of GitHub users [ilex](https://github.com/ilex) and [nike-17](https://github.com/nike-17) Kohana module was improved. 
Do you want to have a module for other frameworks? Maybe Yii, Fuel, CodeIgniter or Zend Framework 2? It's really simple. You just need to write a proper _connector_ and you can go with performing functional tests inside your application. Check the [Functional Testing]https://codeception.com/docs/05-FunctionalTests) section of documentation.

And some good news about documentation! [Jon Phipps](https://github.com/jonphipps) has done a great job on editing the docs. Soon it will be published here. I know my English is not perfect. So I really appreciate any help in editing and reviewing documentation or blog posts.

Thanks to [Sergii Grebeniuk](https://github.com/delmot) for a small patch on autoloading.

There was not too much unique features in this release. Maybe you have some ideas on what should be improved?