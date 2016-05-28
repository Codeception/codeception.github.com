---
layout: page
title: Addons
---

# Addons


{% include extensions.md %}


## Applications 

#### [WebCeption](https://github.com/jayhealey/Webception)

Webception is a deployable web-application that allows you to run all your Codeception tests in the browser.

You can access multiple test suites and decide which tests to include in a run. It allows you start, stop and restart the process whilst watching the test results in the Console.

## Modules

#### [Amazon S3 Filesystem](https://github.com/polevaultweb/s3-filesystem)

An Amazon S3 Filesystem module.

#### [CakePHP](https://github.com/cakephp/codeception)

Official CakePHP 3 module for Codeception.

#### [CakeCeption](https://github.com/hkzpjt/cakeception)

Integrate Codeception to CakePHP v2.* projects

#### [Date/Time](https://github.com/nathanmac/datetime-codeception-module)

This module provides additional helpers for your test to help with date and time comparisons.

#### [Doctrine1](https://github.com/Codeception/Doctrine1Module)

Module for Doctrine 1.x ORM (deprecated in Codeception 2.1)

#### [IM](https://github.com/nathanmac/im-codeception-module)

This module allows the testing against external messaging services as well as triggering notifications via your tests, currently supports HipChat messaging service.

#### [MailCatcher](https://github.com/captbaritone/codeception-mailcatcher-module) 

This module will let you test emails that are sent during your Codeception acceptance tests. It depends upon you having MailCatcher installed on your development server.

#### [MailTrap](https://github.com/WhatDaFox/Codeception-Mailtrap)

Codeception module to test email using Mailtrap.io

#### [MailSMTP](https://github.com/AhmedSamy/codeception-smtp-mail) 

This module will let you test emails using simple SMTP connection, with any provider that supports IMAP

#### [Mockery](https://github.com/Codeception/MockeryModule)

Integrates Mockery into Codeception tests.

#### [Symfony1](https://github.com/Codeception/symfony1module)

Module for symfony 1.x framework (deprecated in Codeception 2.1)

#### [Remote File Attachment](https://github.com/phmLabs/codeception-module-attachfileremote)
This module helps to upload files when using webdriver via remote connection.

#### [VisualCeption](https://github.com/DigitalProducts/codeception-module-visualception)

Visual regression tests integrated in Codeception. This module can be used to compare the current representation of a website element with an expected. It was written on the shoulders of codeception and integrates in a very easy way.

#### [CSS Regression](https://github.com/sascha-egerer/css-regression)

CSS / Visual regression tests integrated in Codeception. This module can be used to compare the current representation of a website element with an expected based on a reference image. This module does not require any JavaScript injections in your website.

#### [WordPress Browser and Database](https://github.com/lucatume/wp-browser)

An extension of Codeception own PhpBrowser and Db modules to allow for easy and streamlined WordPress themes and plugins testing. 

## Extensions

Codeception extensions are developed by third-party contributors and can enhance test execution flow, by listening to internal events. [Read more about extensions](http://codeception.com/docs/08-Customization#Extension-classes).

Extensions should be installed via **Composer**.

#### [Allure Codeception Adapter](https://github.com/allure-framework/allure-codeception)

This is a Codeception adapter for [Allure Framework](https://github.com/allure-framework).

#### [PhpBuiltinServer](https://github.com/tiger-seo/PhpBuiltinServer)

Extension for starting and stopping built-in PHP server. Works on Windows, Mac, Linux.

#### [Phantoman](https://github.com/site5/phantoman)

Extension for automatically starting and stopping PhantomJS when running tests.

#### [MultiDb](https://github.com/redmatter/Codeception-MultiDb)

Extension that enables working with multiple dabatase backends and safe switching between them. It provides equivalant service as the Db module and more. Use v1.x for codeception v2.0 and v2.x for codeception v2.1.

#### [DrushDb](https://github.com/pfaocle/DrushDb)

DrushDb is a Codeception extension to populate and cleanup test **Drupal** sites during test runs using Drush aliases and the sql-sync command.

#### [Notifier](https://github.com/Codeception/Notifier)

Flexible notifications with [notificator](https://github.com/namshi/notificator) library. 

#### [RemoteDebug](https://github.com/tiger-seo/codeception-remotedebug)

Starts remote debug session during test execution.

#### [WPBrowser, WPDatabase, WPLoader](https://github.com/lucatume/wp-browser)

WordPress specific extensions of PHPBrowser and Db modules to allow for more streamlined testing of themes and plugins and a WordPress automated testing suite wrapper.

#### [Joomla-Browser](https://github.com/joomla-projects/joomla-browser)

An extended Webdriver Browser to navigate through Joomla sites with Codeception.

#### [TestStatistics](https://github.com/redCOMPONENT-COM/teststatistics#teststatistics)

TestStatistics is a Codeception Extension to measure the performance of your tests. The extension lists your slower steps, probably meaning that the used locator is not performant. Is a smart tool to improve the speed of your Acceptance tests, and serves as example to create your own reporting extensions.

#### [TeamCity](https://github.com/neronmoon/TeamcityCodeception)

Integration with TeamCity CI server by service-messages

#### [EventsScripting](https://github.com/oprudkyi/codeception-events-scripting)

Run shell scripts on events - before/after suites/environments/full test run  

---

## IDE Plugins

#### [PHPStorm Command Line Tool](https://github.com/tiger-seo/codeception-phpstorm-commandlinetool)

Codeception CLI tool description for PhpStorm.



<div class="alert alert-warning">To publish your own extension <a href="https://github.com/Codeception/codeception.github.com/edit/master/addons.markdown">edit this page</a> on GitHub and submit a Pull Request. Please make sure you have installation guide and green light from Travis CI.</div>

