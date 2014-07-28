---
layout: page
title: Addons
---

# Addons

## Applications 

#### [WebCeption](https://github.com/jayhealey/Webception)

Webception is a deployable web-application that allows you to run all your Codeception tests in the browser.

You can access multiple test suites and decide which tests to include in a run. It allows you start, stop and restart the process whilst watching the test results in the Console.

## Modules

#### [MailCatcher](https://github.com/captbaritone/codeception-mailcatcher-module) 

This module will let you test emails that are sent during your Codeception acceptance tests. It depends upon you having MailCatcher installed on your development server.

#### [Mockery](https://github.com/Codeception/MockeryModule)

Integrates Mockery into Codeception tests.

#### [Remote File Attachment](https://github.com/phmLabs/codeception-module-attachfileremote)
This module helps to upload files when using webdriver via remote connection.

#### [VisualCeption](https://github.com/DigitalProducts/codeception-module-visualception)

Visual regression tests integrated in Codeception. This module can be used to compare the current representation of a website element with an expeted. It was written on the shoulders of codeception and integrates in a very easy way.

## Extensions

Codeception extensions are developed by third-party contributors and can enhance test execution flow, by listening to internal events. [Read more about extensions](http://codeception.com/docs/08-Customization#Extension-classes).


### Official Extensions

Official Extensions are installed with Codeception but you should enable them manually. Also they are a good point to learn about developing your own extensions.

#### [Codeception\Platform\Logger](https://github.com/Codeception/Codeception/blob/2.0/src/Codeception/Platform/Logger.php)

Logs suites/tests/steps using Monolog library *(formerly enabled by default)*.

Enable it in `codeception.yml`:

{% highlight yaml %}
extensions:
    enabled: [Codeception\Platform\Logger]
{% endhighlight %}

#### [Codeception\Platform\RunFailed](https://github.com/Codeception/Codeception/blob/2.0/src/Codeception/Platform/RunFailed.php)

Saves failed tests into tests/_output/failed in order to rerun failed tests.

Enable it in `codeception.yml`:

{% highlight yaml %}
extensions:
    enabled: [Codeception\Platform\RunFailed]
{% endhighlight %}

Then you can run failed tests by running `failed` group:

```
codecept run -g failed
```

#### [Codeception\Platform\SimpleOutput](https://github.com/Codeception/Codeception/blob/2.0/src/Codeception/Platform/SimpleOutput.php)

Changes output style. If you need to implement your own output format you should use this extension as a starting point.

### 3rd Party Extensions

Extensions should be installed via **Composer**.

#### [PhpBuiltinServer](https://github.com/tiger-seo/PhpBuiltinServer)

Extension for starting and stopping built-in PHP server. Works on Windows, Mac, Linux.

#### [DrushDb](https://github.com/pfaocle/DrushDb)

DrushDb is a Codeception extension to populate and cleanup test **Drupal** sites during test runs using Drush aliases and the sql-sync command.

#### [Notifier](https://github.com/Codeception/Notifier)

Flexible notifications with [notificator](https://github.com/namshi/notificator) library. 

#### [RemoteDebug](https://github.com/tiger-seo/codeception-remotedebug)

Starts remote debug session during test execution.

#### [WP Browser and WPDb](https://github.com/lucatume/wp-browser)

WP Browser is an extension of PHPBrowser implementing WordPress specific methods to write ```cest``` and ```cept``` format tests for WordPress websites with an higher level of abstraction; WPDb (WordPress Database) is an extension of Codeception Db module implementing methods specific to a WordPress database. For more information about the ongoing development process see [theAverageDev.com](http://theaveragedev.com), Composer package is [on Packagist](https://packagist.org/packages/lucatume/wp-browser).

---

## IDE Plugins

#### [PHPStorm Command Line Tool](https://github.com/tiger-seo/codeception-phpstorm-commandlinetool)

Codeception CLI tool description for PhpStorm.



<div class="alert alert-warning">To publish your own extension <a href="https://github.com/Codeception/codeception.github.com/edit/master/addons.markdown">edit this page</a> on GitHub and submit a Pull Request. Please make sure you have installation guide and green light from Travis CI.</div>

