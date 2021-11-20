---
layout: post
title: "Codeception 1.8.4 with minor fixes"
date: 2014-03-22 01:03:50
---

Bugfix release on stable 1.8 branch. While you are waiting for 2.0 RC and final version, you can update your current Codeception to get the newest patches and updates. Here they are:

* [WebDriver] Correctly return to main page when switchToIFrame() is called by ** n8whnp**.
* [WebDriver] fixed screenshot capture by **FnTm**.
* [Frameworks] More details in debug output by **Ragazzo**.
* Fixed problem with encoding in $I->wantTo() by **vgoodvin**.
* Add clone and unset capabilites to `Maybe` by **brutuscat**.
* [WebDriver] Fixes to submitForm when typing password by **pcairns**.
* [Phalcon1] haveRecord return id even when id is not public by **xavier-rodet**.
* Modules to be loaded from global context by **Ragazzo**. Now you can pass long name of module into module configuration:

{% highlight yaml %}
class_name: WebGuy
modules:
    enabled: [\My\Custom\Module, WebHelper]
{% endhighlight %}

Really helpful feature if you have multiple Codeception inits in one project and you want to have shared module.

All those features were included in 2.0-beta. Thanks to all contributors!

### Update

[redownload](https://codeception.com/thanks.html) your `codeception.phar` for update:

#### 1.8.4
{% highlight bash %}
php codecept.phar self-update
{% endhighlight %}

for composer version

{% highlight bash %}
$ php composer.phar update codeception/codeception
{% endhighlight %}