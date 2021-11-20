---
layout: post
title: "Codeception 1.8.5"
date: 2014-04-05 01:03:50
---

New improvements and bugfixes came during the last month into the 1.8 branch. We summarized them all and prepared a new release.

## Ecosystem

But before we proceed you should check out the new [Addons](https://codeception.com/addons) section on this site. We had only extensions listed there, but now you can find new modules and even applications there. And let's name at least two projects you should definitely be aware of:

* [WebCeption](https://github.com/jayhealey/Webception) - web interface for Codeception.
* [VisualCeption](https://github.com/DigitalProducts/codeception-module-visualception) - module for visual regression tests.

Thank you for all extensions and modules developers. If you developed a module, helper, or extension, share your work with others by adding your project to addons page (click `Edit` link in the bottom).  

## Bugfixes

* [WebDriver] facebook/webdriver version was set strictly to 0.3. And this won't be changed in future for 1.8 branch. We accidentaly commited `~0.3` into the 1.8.4 which made composer to install 0.4 version of facebook/webdriver. There was API break in 0.4, so WebDriver module didn't work properly.
* [Phalcon] Phalcon 1.3 compatibility added [#944](https://github.com/Codeception/Codeception/issues/944)
* [Laravel] Service providers are now correcly loaded by **ShawnMcCool**.
* [Laravel] `findRecord` fixed by **andkom**.
* [ZF2] Fixed handling of query parameters by **piccagliani**.
* [Frameworks] Fixed problem with submitting form with input[type=image] by **piccagliani**.

## Features

* [Webdriver][Frameworks] input field can now be located by its name.
* [Webdriver][Frameworks] element can be clicked by name too.

### Update

[redownload](https://codeception.com/thanks.html) your `codeception.phar` for update:

#### 1.8.5
{% highlight bash %}
php codecept.phar self-update
{% endhighlight %}

for composer version

{% highlight bash %}
$ php composer.phar update codeception/codeception
{% endhighlight %}
