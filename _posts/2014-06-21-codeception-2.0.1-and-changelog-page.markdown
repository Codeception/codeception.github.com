---
layout: post
title: "Codeception 2.0.1 and Changelog page"
date: 2014-06-21 01:03:50
---

First bugfix release from the 2.0 version. This release introduces very important fix for running Codeception with PHP 5.4.x. Due to bug in PHP you would see strange errors while [trying to execute Cept files](https://github.com/Codeception/Codeception/issues/1084). We can't say which exect PHP 5.4 versions were affected, but if you had issues running Codeception 2.0 earlier, please upgrade.

The next notable change is `see` method of WebDriver module. Now it checks for a visible text on a page. If you need to check if text is present inside HTML source of a page you can use newly added `seeInPageSource` method for that. Thanks **artyfarty** for this bugfix.

### Update

[redownload](http://codeception.com/thanks.html) your `codeception.phar` for update:

{% highlight bash %}
php codecept.phar self-update
{% endhighlight %}

for composer version

{% highlight bash %}
$ php composer.phar update codeception/codeception
{% endhighlight %}


# Changelog Page

From now on there will be no blogposts for minor releases. There is new [changelog](/changelog) page which displays changes in latest releases. You should refer to it in order to follow the updates. Important changes, features, bugfixes will be mentioned there.

