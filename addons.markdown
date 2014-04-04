---
layout: page
title: Addons
---

# Addons

## Applications 

#### [WebCeption](https://github.com/jayhealey/Webception)

![WebCeption](https://camo.githubusercontent.com/e39e74ae363de8c250837ed04c54f71935f96194/687474703a2f2f692e696d6775722e636f6d2f6e53734d4649532e676966)

Webception is a deployable web-application that allows you to run all your Codeception tests in the browser.

You can access multiple test suites and decide which tests to include in a run. It allows you start, stop and restart the process whilst watching the test results in the Console.

## Modules

#### [MailCatcher](https://github.com/captbaritone/codeception-mailcatcher-module) 

This module will let you test emails that are sent during your Codeception acceptance tests. It depends upon you having MailCatcher installed on your development server. I have it installed as part of my development virtual machine.

#### [Mockery](https://github.com/Codeception/MockeryModule)

Integrates Mockery into Codeception tests.

#### [Remote File Attachment](https://github.com/phmLabs/codeception-module-attachfileremote)
This module helps to upload files when using webdriver via remote connection.

#### [VisualCeption](https://github.com/DigitalProducts/codeception-module-visualception)

Visual regression tests integrated in Codeception. This module can be used to compare the current representation of a website element with an expeted. It was written on the shoulders of codeception and integrates in a very easy way.

## Extensions

Codeception extensions are developed by third-party contributors and can enhance test execution flow, by listening to internal events. [Read more about extensions](http://codeception.com/docs/08-Customization#Extension-classes).

Extensions should be installed via **Composer**.

#### [PhpBuiltinServer](https://github.com/tiger-seo/PhpBuiltinServer)

Extension for starting and stopping built-in PHP server. Works on Windows, Mac, Linux.

#### [DrushDb](https://github.com/pfaocle/DrushDb)

DrushDb is a Codeception extension to populate and cleanup test **Drupal** sites during test runs using Drush aliases and the sql-sync command.

#### [Notifier](https://github.com/Codeception/Notifier)

Flexible notifications with [notificator](https://github.com/namshi/notificator) library. 

#### [RemoteDebug](https://github.com/tiger-seo/codeception-remotedebug)

Starts remote debug session during test execution.

---

## IDE Plugins

#### [PHPStorm Command Line Tool](https://github.com/tiger-seo/codeception-phpstorm-commandlinetool)

Codeception CLI tool description for PhpStorm.



<div class="alert alert-warning">To publish your own extension <a href="https://github.com/Codeception/codeception.github.com/edit/master/extensions.markdown">edit this page</a> on GitHub and submit a Pull Request. Please make sure you have installation guide and green light from Travis CI.</div>

