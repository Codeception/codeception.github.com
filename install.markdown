---
layout: page
title: Codeception Installation
---

# Installation

## Requirements

* PHP >= 5.3
* PEAR (latest)
* PHPUnit >= 3.6 (will be installed by Codeception)

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

### Phar

Download [codecept.phar](https://github.com/Codeception/Codeception/raw/master/package/codecept.phar)

Copy it into your project.
Run CLI utility:

{% highlight bash %}
$ php codecept.phar
{% endhighlight %}

## Setup

Install required libraries PHPUnit and Mink, by running this command

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