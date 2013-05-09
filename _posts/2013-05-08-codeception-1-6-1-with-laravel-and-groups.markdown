---
layout: post
title: "Codeception 1.6.1: Laravel and Groups"
date: 2013-05-08 22:03:50
---

That was about a month of hard work on Codeception 1.6.1. Probably the hardest part was to provide more open architecture for testing framework. Right now it's hard to customize anything in Codeception. We are going to fix that soon with new event system. We are going to release Extension (for hooking all the events) and Group classes (for events related to groups) in next release. 

### Hey, did you mention groups?

Yep, you are right! From now on you can use group tests and execute them separately. 
You have a few ways to add test to a group. If it is a Cept scenario all of this methods will work.

{% highlight php %}
<?php
$scenario->group('admin');
$scenario->group(array('admin','critical'));
$scenario->groups(array('admin','critical'));

$I = new WebGuy($scenario);
// ...
?>
{% endhighlight %}

For Cest and Test files you can use `@group` annotiation similarly as in PHPUnit:

{% highlight php %}
<?php
 /**
  * @group model
  */ 
  public function testAdminIsCreated()
  {
    // test goes here
  }

?>
{% endhighlight %}

To execute tests of one group use:

```
php codecept.phar run -g admin
php codecept.phar run --group admin
```

To execute tests of several groups just pass multiple group options to runner.

## Functional Tests in Classes

As you know, we deprecated Cest format for unit testing and we propose you to use it for functional and acceptance tests. It should work well for you now. Soon we will publish a tutorial and guide for how to to this.
Basically you can generate a Cest file:

```
php codecept.phar generate:cest acceptance MyCest
```

And write tests inside a newly created MyCest class.

{% highlight php %}
<?php
class MyCest 
{
  public function loginPage(\WebGuy $I)
  {
    $I->amOnPage('/login');
    $I->see('Login', 'h1');
    $this->checkCopyrightIncluded($I);
  }

  public function registrationPage(\WebGuy $I)
  {
    $I->amOnPage('/register');
    $I->see('Register', 'h1');
    $this->checkCopyrightIncluded($I);
  }  

  protected function checkCopyrightIncluded($I)
  {
    $I->see('(c) 2013', '#footer');
  }
}
?>
{% endhighlight %}

All public methods of Cest classes become tests. You can use private and prected methods and properties to share data and functionality over the tests. Also you can use setup/teardown preperations in `_before` and `_after` methods. If you want to make a bunch of simple tests and you don't want to create a file for each - Cest is your choice. More docs on it coming.

## Good news to Laravel fans

Yes, yes. Finally we've got a module for [Laravel4](http://codeception.com/docs/modules/Laravel4) framework functional testing. We couldn't test it well, as there are not to much Laravel4 apps available on GitHub. But we run some basic tests on a CRUD app, and it worked nicely. Thanks to HttpFoundation component inside Laravel4 framework. 

Larvael module is zero configuration. You should just bootstrap a project in your Laravel app directory and include `Laravel4` module into your functional test suite. 

Take a look into [sample Laravel project](https://github.com/Codeception/sample-l4-app) prepared my **Jeffrey Way** and **Michael Bodnarchuk** with sample test included.

## Various changes and fixes.

* added `seeOptionIsSelected` methods for all modules that share FrameworkInterface.
* added `resizeWindow` method to Selenium2 module (thanks to Jaik Dean)
* Codeception is PHP 5.5 compatible. We learned that by launching tests on Travis (thanks to Tiger-Seo)
* fix for screenshots snapshot filenames in Cest files
* fix to `getStatusCode` method in frameworks tests

### Update

[redownload](http://codeception.com/thanks.html) your `codeception.phar` for update:

{% highlight bash %}
wget http://codeception.com/codecept.phar -O codecept.phar
{% endhighlight %}

for composer version

{% highlight bash %}
$ php composer.phar update
{% endhighlight %}