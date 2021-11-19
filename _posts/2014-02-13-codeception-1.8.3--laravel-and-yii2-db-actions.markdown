---
layout: post
title: "Codeception 1.8.3: Laravel and Yii2 DB actions"
date: 2014-02-13 01:03:50
---

Here goes another minor release with some fixes and improvements. Codeception 1.8 now supports **Laravel 4.1** and **Yii2** and is tested for this frameworks on Travis. Also Laravel and Yii modules got some nice new actions for database interactions.

Laravel, Yii2, and Phalcon frameworks implement ActiveRecord pattern. That's why all database actions in this modules look and work in a very similar manner.

### Laravel 4.1

{% highlight php %}
<?php
$user_id = $I->haveRecord('users', array('name' => 'Davert'));
$I->seeRecord('users', array('name' => 'davert'));
$I->dontSeeRecord('users', array('name' => 'davert'));
$user = $I->grabRecord('users', array('name' => 'davert'));
?>
{% endhighlight %}

This methods will work for Laravel 4 as well, but Laravel 4.1 supports **nested transactions** and allows us to wrap functional test into one database transaction. This is really useful, as we can rollback any database changes we do in functional tests. Tests also run really fast, as nothing is written in database. A new `cleanup` config option was introduced to Laravel4 module, and by default it is turned on. 

Now it is really simple to use database in your functional tests. Don't hesitate and try `*Record` methods in action!

Also nice `seeSessionErrorMessage` was added by **elijan** to perform validation error assertions.

### Yii2

Yii2 is in very active development, and its official [basic application](https://github.com/yiisoft/yii2-app-basic) is tested with Codeception, and uses Specify and Verify libraries. Yii2 module is tested on Travis as in official Yii2 repo and in Codeception repo as well.

{% highlight php %}
<?php
$user_id = $I->haveRecord('app\model\users', array('name' => 'Davert'));
$I->seeRecord('app\model\users', array('name' => 'davert'));
$I->dontSeeRecord('app\model\users', array('name' => 'davert'));
$user = $I->grabRecord('app\model\users', array('name' => 'davert'));
?>
{% endhighlight %}

ActiveRecord methods work in very similar manner. We expect that Yii2 will have nested transactions support before the release.

Thanks to **Ragazzo** for Yii2 module contributions and bughunting.

## Bugfixes

* CodeCoverage was improved. Remote codecoverage with WebDriver or PhpBrowser opens page, sends authorization cookie before the test. 
* WebDriver cookies (and sessions) are destroyed after the test. If you have troubles when session is not restared in WebDriver - toggle `restart` option.

### Update

[redownload](https://codeception.com/thanks.html) your `codeception.phar` for update:

#### 1.8.3
{% highlight bash %}
php codecept.phar self-update
{% endhighlight %}

for composer version

{% highlight bash %}
$ php composer.phar update codeception/codeception
{% endhighlight %}

P.S. Yeah, yeah, Codeception 2.0 is on its way. 