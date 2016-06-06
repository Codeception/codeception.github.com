---
layout: post
title: "Codeception 2.2 is here"
date: 2016-06-03 01:03:50
---

Today we are glad to announce that Codeception 2.2 is finally released. The first beta came in March and after there were 2 RC versions. We assume that everyone could already try the new branch and check its new sweet features like [**Gherkin support**, **Examples** and others](http://codeception.com/changelog). We hope that you will like new version as it brings true multi format support to your testing experience! What other tool can execute Gherkin features and PHPUnit tests? We already support 4 testing formats for code and scenario testing and it is quite easy to introduce more.

Despite its growth and feature richness Codeception is still the most simple tool for test automation. We updated documentation to keep up to date with latest changes and improved the learning experiences. Also we prepared some Case Study pages which will help you to setup Codeception for your application. Now it is easier to start with [Laravel](http://codeception.com/for/laravel) and [Symfony](http://codeception.com/for/symfony) apps.

If you have questions about Codeception you can ask them on our **community forum** which is [PhpTestClub](http://phptest.club). We plan to build a sustainable community, so If you use Codeception for a long please share your experience there, help others to get into the world of PHP testing.

## How To Upgrade

We encourage you to UPGRADE to 2.2. Please take a look into changes marked as *breaking*. 

* The most important change is introduction of **module conflicts**. If modules share the same interface they probably should not be used together except the cases when the modules are loaded partially. This way you can't use `Laravel5` module with `WebDriver` but you can use `Laravel5` with `part: ORM` so only ORM actions to be loaded. This change is important in order to avoid confusion in your functional or acceptance tests. If you use 2 similar modules you can't be sure which one is executed when you call `$I->amOnPage`. [Learn more](http://codeception.com/03-05-2016/codeception-2.2.-upcoming-features.html#conflicts) from previous blogpost.
* Please also note that **Dbh and Laravel4 module were removed** from core package and moved into separate packages. 
* `Codeception\TestCase` was replaced with `Codeception\TestInterface` to it is a good idea to replace its usages in your Helper files.
* Cept and Cest formats are no longer extend `PHPUnit_Framework_TestCase`, so they don't have `expectException`, `getMock`, etc.

Please [read changelog](http://codeception.com/changelog) to learn more.

But wait, you may ask, why there are breaking changes in minor release? Does Codeception follow semver? 
Not right now but future releases will do. **Next major version is going to be Codeception 3.0** which sure will introduce breaking changes for good reason. Also we plan to decouple most of modules from core package to make faster release cycles for them. Codeception 2.2 is also marked as *minor* that its still support PHP 5.4. However, we encourage you to upgrade for future versions.

## New Features Described

* [BDD and Gherkin](http://codeception.com/docs/07-BDD)
* [Examples](http://codeception.com/docs/07-AdvancedUsage#Examples)
* [Params](http://codeception.com/docs/06-ModulesAndHelpers#Dynamic-Configuration-With-Params)
* [Module Conflicts](http://codeception.com/docs/06-ModulesAndHelpers#Module-Conflicts)
* [DataFactory](http://codeception.com/docs/09-Data#DataFactory)
* [AngularJS](http://codeception.com/docs/03-AcceptanceTests#AngularJS-Testing)
* [Custom Commands](http://codeception.com/docs/08-Customization#Custom-Commands)
* New [Redis](http://codeception.com/docs/modules/Redis) module
* [COMPLETE CHANGELOG](http://codeception.com/changelog)


---

If you are using 2.1 and you won’t plan to upgrade in nearest future, you can still use releases from 2.2 branch. Minor fixes and improvements will still be accepted there. Also the site will contain documentation for 2.2 and 2.2 versions.

Try Codeception 2.2 today by installing it via Composer:

```
composer require "codeception/codeception: ~2.2" --dev
```

