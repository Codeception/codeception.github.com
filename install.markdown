---
layout: page
title: Codeception Installation
---

# Installation

Easiest way to start using Codeception is by installing it via PEAR.

### PEAR
Install latest PEAR package:

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

If you sucessfully installed Codeception, run this commands:

{% highlight bash %}
$ codecept install
{% endhighlight %}

this will install all dependency tools like PHPUnit and Mink

{% highlight bash %}
$ codecept bootstrap
{% endhighlight %}

this will create default directory structure and default test suites

{% highlight bash %}
$ codecept build
{% endhighlight %}

This will generate Guy-classes, in order to make autocomplete works.