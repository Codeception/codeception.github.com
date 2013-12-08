---
layout: post
title: "Codeception 1.8.1: Minor updates"
date: 2013-12-07 22:03:50
---

Codeception 1.8.1 is out. Bugfixes and small useful features in it. The most interesting improvement was done by **frqnck**. Phar version now has `self-update` command which acts the same way as it is in composer. From now on you can easily upgrade `codeception.phar` file.

Small yet important change in WebDriver module. **Default `wait` parameter is set to 0**. This was done because Selenium [implicit waits](http://www.seleniumhq.org/docs/04_webdriver_advanced.jsp#implicit-waits) didn't work as expected - this parameter slowed down test execution. Browser waited for element even if it was already on a page. Please notice this on upgrading.


### Changes

* upgraded to php-webdriver 0.3
* added general `sendAjaxRequest()` method to all framework/phpbrowser modules to send ajax requests of any types by **gchaincl**.
* fixed [URI construction in Yii1](Wrong URI construction in Yii1 module) module by **kop**(also in 1.7)
* `Fixed Yii2 statusCode` by **cebe**
* fixed: `Placeholder\Registry::unsetRegistry()` should only be used with < 2.2.0 by **Bittarman**
* `waitForElementChange()` was fixed in WebDriver module
* fixed `seeLink` and `dontSeeLink` methods in framework modules by **enumag**.
* added `seeHttpHeaderOnce` to REST module for checking if headers appear only once.
* setUpBeforeClass/tearDownAfterClass method will work as they are expected in PHPUnit
* `Debug::debug` can output any variable in console.
* fixed: "WebDriver `makeScreenshot` doesn't create directories" by **joksnet**
* fixed `grabValueFrom` method in framework modules (also in 1.7)
* fixed: "Disable remote coverage not work" by **tiger-seo** (also in 1.6, 1.7)
* `self-update` command added to phar by **frqnck**

*Dependencies were updated, thus Symfony components were updated to 2.4. No changes to composer.json was made, so this release is compatible with Symfony 2.3 as well.*

#### 1.8.1
{% highlight bash %}
wget http://codeception.com/codecept.phar -O codecept.phar
{% endhighlight %}

#### 1.7.4

{% highlight bash %}
wget http://codeception.com/releases/1.7.4/codecept.phar -O codecept.phar
{% endhighlight %}
