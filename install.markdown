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