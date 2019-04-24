---
layout: post
title: "Codeception 3.0"
date: 2019-04-24 01:03:50
---

It's finally time to bring a new major version of Codeception to live! 
Through years of evolution and constant improvements we learned a lot and today we think we are bringing to you the best Codeception version so far. We still belove that simplicity of testing is important, that test code should be easy to read, write, and debug. And if you are reading this post you probably already discovered that.

Maintaining such project that tries to embrace all kind of frameworks and CMSes, from Symfony to WordPress, from Laravel to Magento, is challenging, but what we see that people from those communities send us patches regularly. Probably, our philosophy - separate tests from the framework, share similar solutions via modules, shows the way. And our awesome community continue to improve this project. Hey, just look into our changelog. Even patch releases contain HUGE list of improvements!

Ok, so what about Codeception 3.0? 

### Breaking Changes

#### PHPUnit 8 Support

In 3.0 release we didn't break a lot of stuff. We tried, but probably we just leave that for next major release. 
So we do not bump supported PHP version. We are still **PHP 5.6+ compatible**, just because testing should be available for everyone. We still support all major frameworks and we keep PHPUnit 6, and PHPUnit 7 compatibility.

However, keeping all that parts together is hard. So we assume, in 3.0 you can get **possible breaking change, as we bring PHPUnit 8 support**. For everything else, the upgrade should be smooth for you. If you face issues upgrading, go and change phpunit version to 6 or 7 in your composer.json:

```
"phpunit/phpunit": "^7.0"
```

We say thank you to our core contributor **@Naktibalda** to bring PHPUnit 8 support without breaking compatibilitiy.
That was huge job, and if you look into our `codeception/phpunit-wrapper` project you will understand why.

#### Modules Removed

We also decided to drop some of old modules, which we hope no one uses. Here they are

* AngularJS - it worked only for Angular 1
* ZF1 - framework outdated
* Yii1 - framework outdated
* Silex - framework outdated
* Facebook - module not maintained
* XMLRPC - module not maintained

If you need them, just copy their code from the 2.5 branch and create a custom helper. However, we won't support them any longer. 

#### Changed Defaults

If you use multi-session testing and `$I->haveFriend` commands, you will see your tests fail. `Friend` methods no longer included into `Codeception\Actor` class, so you should add them manually. In your `AcceptanceTester` class (or other class which uses multi session testing) include `Codeception\Lib\Actor\Shared` trait:

```php
<?php
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;
    use \Codeception\Lib\Actor\Shared\Friend;
}    
```

We also disabled conditional assertions for new setups (as people regularly misuse them), so if you want to use `canSee` methods you will need to enable them. We will take a look on that in next sections of this post.

### Features

M-m-m... Now the most tasty thing. Yes, we wouldn't do the major release without new features. Thanks to sponsorship from **Seravo** we could finish some features we had in our roadmap.

#### Improved Interactive Shell

This feature was backported from our friendly project [CodeceptJS](https://codecept.io). 
It brings a new full featured REPL interface into a test, so you could pause test execution and fire different commands into console. 

This feature **absolutely changes the way you write your functional and acceptance tests**. Instead of blindly trying different commands and restart tests all the time, you could write:

```php
$I->amOnPage('/');
$I->pause();
```

And start typing commands one by one, writing a test step by step. You copy successful commands into your tests, and in the end you get a fully working test. **If you use WebDriver, you could write a complete acceptance test using one browser session**.

Unlike, previous interactive shell implementation, this one based on `hoa/console`, so you can use Left, Right keys to edit your input. Better to show it.

![](https://user-images.githubusercontent.com/220264/54929617-875ad180-4f1e-11e9-8fea-fc1b02423050.gif)

Learn more about using interactive shell in our [updated Getting Started guide](https://codeception.com/docs/02-GettingStarted#Interactive-Pause)

#### Try & Retry

Those features were introduced to make browser testing less painful. In the world full of JavaScript and Single Page Applications, you can no longer rely on single `click`, or `fillField` commands. Sometimes you need to retry action few times to make perform it. 

Now you can do that via `retry*` actions which can help to stabilize flaky steps in your tests:

```php
<?php
// use
$I->retryClick('Create');

// instead of just
$I->click('Create');
```

This feature was also ported from CodeceptJS but implemented a bit differently. [Learn how to use it](https://codeception.com/docs/03-AcceptanceTests#Retry) in updated Acceptance Testing guide.

What if your site behaves differently in different environments? Like showing the "Cookie" badge depending on region?
And you need to accept cookies notifications if the badge is shown? You can do it via `tryTo*` actions:

```php
<?php
if ($I->tryToSeeElement('.alert.cookie')) {
  $I->click('Accept', '.cookie');
}
```

Thanks to Iain Poulson from Delicious Brains for [showing this use case](https://deliciousbrains.com/automated-testing-woocommerce/)

[Learn how to use it](https://codeception.com/docs/03-AcceptanceTests#AB-Testing) in updated Acceptance Testing guide.

Try and Retry were implemented as [Step Decorators](https://codeception.com/docs/08-Customization#Step-Decorators). As you know, actor classes contain code generated parts, and step decorators allow to generate additional actions by wrapping methods of modules. Conditional Assertions (`canSee*` methods) were refactored as step decorators too. So you need to enable them explicitly on new setups. 

#### Artifacts in Output

Failed tests now contain list of all available artifcats. 
For REST API test each test will contain a body of last response to simplify debugging on CI servers.

![](https://user-images.githubusercontent.com/220264/56475577-bec38c00-6492-11e9-998f-8bbf5f823f17.png)

### Install or Upgrade

Codeception 3.0 is as easy to upgrade as bumping version to `^3.0` in `composer.json`:

```
"codeception/codeception": "^3.0"
```

Also please read the [changelog](https://codeception.com/changelog) for more details.

### Final Notes

Thanks for everyone who have been with us all this years and who helps making Codeception better every day. Again, thanks to **Naktibalda** for taking care of maintaining minor releases and building compatibility bridge.  

Thanks to **Otto Kekäläinen from [Seravo](https://seravo.com)** for generous donation. 

And a few words from Michael Bodnarchuk, who started Codeception 8 years ago:

> As a person who is interested in quality and testing I was interested in answering the question: what needs to be tested at first place. And the best answer I found so far is to get that information from the user feedback. Sometimes, a bug can be found only by a regular user, without causing a stack trace. And what I'd love to see, that users of web site or web application could submit such bugreports instantly. That's why I built **[Bugira Bugtracker](https://www.bugira.com), my new SaaS product to get bugreports from your users**. If you like my projects like Codeception or CodeceptJS, please [try Bugira](https://bugira.com) as well. It will help you to establish better communication with you users and build a better products!






