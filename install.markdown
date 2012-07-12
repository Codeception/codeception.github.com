---
layout: page
title: Codeception Installation
---



# Installation

### Requirements

* PHP >= 5.3

## PHP Executable

[![Download](/images/download.png)](/thanks.html)

Start working by downloading one single file and running it with PHP

{% highlight bash %}
php codecept.phar
{% endhighlight %}

Initialize your testing environment with 

{% highlight bash %}
php codecept.phar bootstrap
{% endhighlight %}

Run test suite:

{% highlight bash %}
php codecept.phar run
{% endhighlight %}

## Alternatives

### PEAR
For development and writing tests use PEAR version.
Use latest PEAR and PHPUnit >= 3.6 (Codeception may install it for you).

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

If this didn't work either, please try to update your PEAR or **clear the PEAR cache**.
Also, please, check you use the same PHP for CLI and Web.

Install dependencies (PHPUnit, Mink and Symfony Components) via PEAR:

{% highlight bash %}
$ sudo codecept install
{% endhighlight %}

Initialize your testing environment with 

{% highlight bash %}
codecept bootstrap
{% endhighlight %}

Run test suite:

{% highlight bash %}
codecept run
{% endhighlight %}


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
        "codeception/codeception":  "1.*@dev"
    },
    "minimum-stability": "dev"
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

Initialize your testing environment with 

{% highlight bash %}
php vendor/bin/codecept bootstrap
{% endhighlight %}

Windows user now may use generated 'codecept.bat' file.

Run test suite:

{% highlight bash %}
php vendor/bin/codecept run
{% endhighlight %}

