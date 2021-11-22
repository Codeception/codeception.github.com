---
layout: post
title: "1.7: Bugfix release"
date: 2013-10-17 22:03:50
---

The release of 1.7 added new WebDriver module as well as rewritten Output component. Some if changes where major and was not tested for all crucial cases. If you feel comfortable with 1.6 you can stay on 1.6 branch.
But If you want to get more features with some instabilities - connect to 1.7

## Bugfixes in 1.7.1

* error and failures are now displayed correctly with improved stack traces.
* fix for module before/after hooks in Codeception\TestCase\Test.
* select option in WebDriver throws readable message
* wait in WebDriver throws exception when receives 1000 seconds.

## Bugfixes in 1.6.10 (also in 1.7)

* Fix the problem when the method getPort() return 443 80 or null by **thbourlove**.
* Notifies about CURL not installed.

### Update

[redownload](https://codeception.com/thanks.html) your `codeception.phar` for update:

#### 1.7.1
{% highlight bash %}
wget https://codeception.com/codecept.phar -O codecept.phar
{% endhighlight %}

#### 1.6.10

{% highlight bash %}
wget https://codeception.com/releases/1.6.10/codecept.phar -O codecept.phar
{% endhighlight %}

for composer version

{% highlight bash %}
$ php composer.phar update
{% endhighlight %}