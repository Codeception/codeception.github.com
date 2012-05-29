---
layout: page
title: Codeception Installation
---

# Installation

## Requirements

* PHP >= 5.3
* PEAR (latest) or [Composer](http://getcomposer.org/download/)
* PHPUnit >= 3.6 (can be installed by Codeception)

### PEAR
Easiest way to start using Codeception is by installing it via PEAR.

{% highlight bash %}
$ pear channel-discover codeception.com/pear
{% endhighlight %}

{% highlight bash %}
$ pear install codeception/Codeception
{% endhighlight %}

If you got troubles running this command, please try full package name:

{% highlight bash %}
$ sudo pear install codeception.github.com/pear/Codeception
{% endhighlight %}

If this didn't help, try to update your PEAR.
Also, please, check you use the same PHP for CLI and Web.

### Composer

If you got troubles using PEAR, try out [Composer](http://getcomposer.org).

Download it in your project's dir:

{% highlight bash %}
curl -s http://getcomposer.org/installer | php
{% endhighlight %}

Create file __composer.json__:

{% highlight bash %}
{
    "require": {
        "codeception/codeception":  "*"
    }
}    
{% endhighlight %}

(you may specify explicit version of Codeception, instead of "*")

Run 

{% highlight bash %}
php composer.phar install
{% endhighlight %}

From now on Codeception (with installed PHPUnit) can be run as:

{% highlight bash %}
php vendor/bin/codecept
{% endhighlight %}

Please, keep in mind that you should always specify this command instead regular 'codecept' used later in documentation.

### Phar

Download [codecept.phar](https://github.com/Codeception/Codeception/raw/master/package/codecept.phar)

Copy it into your project.

From now on Codeception can be run as:

{% highlight bash %}
$ php codecept.phar
{% endhighlight %}

Please, keep in mind that you should always specify this command instead regular 'codecept' used later in documentation.

## Setup

Install required libraries PHPUnit and Mink, by running this command
Bypass this step if you installed Codeception via Composer.

{% highlight bash %}
$ codecept install
{% endhighlight %}

Go to project you want to test and bootstrap the test environment:

{% highlight bash %}
$ codecept bootstrap
{% endhighlight %}

Next, run the build command.

{% highlight bash %}
$ codecept build
{% endhighlight %}

At last, Codeception is ready to run the tests.

{% highlight bash %}
$ codecept run
{% endhighlight %}

Refer to Codeception Guide to write your first tests.