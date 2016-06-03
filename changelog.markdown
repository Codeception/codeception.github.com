---
layout: page
title: Codeception Changelog
---

<div class="alert alert-warning">Download specific version at <a href="/builds">builds page</a></div>

# Changelog

#### 2.2.0

* **Gherkin format support**. <strong>[Announcement]</strong>(https://github.com/Codeception/Codeception/pull/2750#issue-129899745)
* **Core Test Format Refactorings** Codeception becomes true multiformat testing platform. Format requires a <strong>[Loader]</strong>(https://github.com/Codeception/Codeception/blob/master/src/Codeception/Test/Loader/LoaderInterface.php) and class extending <strong>[Test]</strong>(https://github.com/Codeception/Codeception/blob/master/src/Codeception/Test/Test.php) class, implementing <strong>[TestInterface]</strong>(https://github.com/Codeception/Codeception/blob/master/src/Codeception/TestInterface.php).
    * *Breaking* `Codeception\TestCase` replaced with `Codeception\TestInterface` in code and in module signatures.
    * *Breaking* Cept/Cest classes are no longer extending `PHPUnit_Framework_TestCase`, so they don't have `expectException`, `getMock`, etc.
    * Reduced stack trace for scenario-driven test formats. Codeception tests implement `PHPUnit_Framework_Test` instead of extending heavy `PHPUnit_Framework_TestCase` class.
* *Breaking* **Conflicts API implemented** Frameworks + PhpBrowser + WebDriver can't be used together unless only non-conflicting part is used. <strong>[Announcement]</strong>(http://codeception.com/03-05-2016/codeception-2.2.-upcoming-features.html#conflicts)
* **Examples** as an alternative to Data Providers. <strong>[Announcement]</strong>(http://codeception.com/03-10-2016/even-more-features-of-codeception.html#examples)
* **Params** loading from yml, env files or environment. <strong>[Announcement]</strong>(http://codeception.com/03-05-2016/codeception-2.2.-upcoming-features.html#params)
* **Test dependencies** with `<strong><a href="https://github.com/depends">@depends</a></strong>` annotation. <strong>[Announcement]</strong>(http://codeception.com/03-05-2016/codeception-2.2.-upcoming-features.html#test-dependencies)
* **Custom Commands** inject your own commands as as simple as extension. <strong>[Announcement]</strong>(http://codeception.com/03-10-2016/even-more-features-of-codeception.html#custom-commands)
* `codecept dry-run` command added to show scenario steps without executing them.
* *Breaking* <strong>[Dbh]</strong> module removed
* *Breaking* <strong>[Laravel4]</strong> module removed
* *Breaking* <strong>[Symfony]</strong> public property `container` removed
* *Breaking* <strong>[Asserts]</strong> removed deprecated `assertLessThen` and `assertGreaterThen`
* *Breaking* mocks created with `Codeception\Util\Stub` are not verified in Cests. See <a href="https://github.com/Codeception/Codeception/issues/3005">#3005</a>
* *Breaking* <strong>[REST]</strong> `grabAttributeFrom` renamed to `grabAttributeFromXmlElement` to avoid conflicts
* <strong>[WebDriver]</strong> allows getting current browser and capabilities in test. <strong>[Announcement]</strong>(http://codeception.com/03-10-2016/even-more-features-of-codeception.html#Getting-current-browser-and-capabilities-in-tests)
* <strong>[AngularJS]</strong> module added. Extends WebDriver module for AngularJS testing. <strong>[Announcement]</strong>(http://codeception.com/03-10-2016/even-more-features-of-codeception.html#angularjs)
* <strong>[DataFactory]</strong> module added. Performs data generation using FactoryMuffin library <strong>[Announcement]</strong>(http://codeception.com/03-10-2016/even-more-features-of-codeception.html#datafactory)
* <strong>[Redis]</strong> Module rewritten using Predis library as driver by <strong><a href="https://github.com/marcverney">@marcverney</a></strong>
* <strong>[Symfony]</strong> module Symfony2 renamed to Symfony
* <strong>[Phalcon]</strong> Merged `Phalcon1` and `Phalcon2` modules into one `Phalcon` due the fact that Phalcon Framework v1.3.x no longer supported at all
* <strong>[Asserts]</strong> More `assert*` methods from PHPUnit added
* <strong>[Asserts]</strong> Added `expectException` method
* <strong>[WebDriver]</strong><strong>[Frameworks]</strong><strong>[PhpBrowser]</strong> `selectOption` can receive option as strict locator to exactly match option by text or by value. Use `['value' => 'myvalue']` or `['text' => 'optiontext']` to select a proper option. By <strong><a href="https://github.com/gdscei">@gdscei</a></strong> and <strong><a href="https://github.com/davertmik">@davertmik</a></strong> See <a href="https://github.com/Codeception/Codeception/issues/3003">#3003</a>
* Added config option to disable modules using `modules: disabled:`.
* <strong>[Sequence]</strong> Changed the prefix value. Generated sequences to include id inside a prefix: `sq('user1') => 'user1_876asd8as87a'. Added `prefix` config option.
* Deprecation errors won't fail tests but will be printed.
* Official [Docker image](https://hub.docker.com/r/codeception/codeception/) introduced by <strong><a href="https://github.com/schmunk42">@schmunk42</a></strong>

#### 2.1.10

* <strong>[Db]</strong> Added missing support for LIKE condition to SqlSrv driver

#### 2.1.9

* PHPUnit 5.4 compatibility for creating mocks using `Codeception\Util\Stub` by <strong><a href="https://github.com/davertmik">@davertmik</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/3093">#3093</a> and <a href="https://github.com/Codeception/Codeception/issues/3080">#3080</a>
* Updated dependencies to support Symfony 3.1
* <strong>[Laravel5]</strong> Fixed issue where non-existing services were called in _before and _after methods. See <a href="https://github.com/Codeception/Codeception/issues/3028">#3028</a>.
* Fix self-update command to update only to stable versions by <strong><a href="https://github.com/MAXakaWIZARD">@MAXakaWIZARD</a></strong>
* Added `settings: backup_global` to config, to disable backup_global option of PHPUnit by <strong><a href="https://github.com/mkeasling">@mkeasling</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/3045">#3045</a>. Fixes <a href="https://github.com/Codeception/Codeception/issues/3044">#3044</a>
* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> `see` matches UTF-8 text case-insensitively by <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>. Fixes <a href="https://github.com/Codeception/Codeception/issues/3114">#3114</a>
* Fixed page object generation with namespaces by <strong><a href="https://github.com/eugene">@eugene</a></strong>-manuilov and <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/3126">#3126</a> Fixes <a href="https://github.com/Codeception/Codeception/issues/3012">#3012</a>
* `--steps` will not disable code coverage. By <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>. Fixes <a href="https://github.com/Codeception/Codeception/issues/2620">#2620</a>
* Suppress console coverage report with `--quiet` by <strong><a href="https://github.com/EspadaV8">@EspadaV8</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/2370">#2370</a>
* Improved multibyte output in console by <strong><a href="https://github.com/kt81">@kt81</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/3130">#3130</a>
* <strong>[Lumen]</strong> Fixed: `initializeLumen()` method has been called twice on start by <strong><a href="https://github.com/kt81">@kt81</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/3124">#3124</a> <a href="https://github.com/Codeception/Codeception/issues/2607">#2607</a>
* <strong>[Db]</strong> Allow INT Parameter SQL Binding by <strong><a href="https://github.com/davidcochrum">@davidcochrum</a></strong> . Fixes <a href="https://github.com/Codeception/Codeception/issues/3118">#3118</a>
* <strong>[Db]</strong> Support LIKE conditions in assertions.
* <strong>[Db]</strong> Improved regex for parsing comments by <strong><a href="https://github.com/dima">@dima</a></strong>-stefantsov. See <a href="https://github.com/Codeception/Codeception/issues/3138">#3138</a>
* <strong>[Dbh]</strong> Fix `seeInDatabase` and `dontSeeInDatabase` with empty criteria. Closes <a href="https://github.com/Codeception/Codeception/issues/3116">#3116</a>
* <strong>[Symfony]</strong> Improve fail messages on seeInCurrentRoute and seeCurrentRouteIs
* <strong>[Symfony]</strong> Improve route comparison on seeInCurrentRoute and seeCurrentRouteIs
* <strong>[WebDriver]</strong> multi session testing with friends improved by <strong><a href="https://github.com/eXorus">@eXorus</a></strong>. Webdriver sessions are finished correctly; `leave()` method added to Friend class. See <a href="https://github.com/Codeception/Codeception/issues/3068">#3068</a>
* <strong>[PhpBrowser]</strong> added `handler` and `middleware` config options to customize Guzzle handlers and middleware
* Added full support of phpunit-bridge features.
* <strong>[Laravel]</strong> Fixed issue where non-existing services were called in _before and _after methods. See <a href="https://github.com/Codeception/Codeception/issues/3028">#3028</a>.
* <strong>[WebDriver]</strong> fixed using `saveSessionSnapshot` with codecoverage. Closes <a href="https://github.com/Codeception/Codeception/issues/2923">#2923</a>
* <strong>[ZF2]</strong> create new instance of Application for each request

#### 2.1.8

* `Util\Locator` added methods to create locators to match element at their position: `elementAt`, `firstElement`, `lastElement`
* <strong>[Symfony]</strong> Refactor to unify service retrieval, avoid memleaks and reduce memory footprint. Closes <a href="https://github.com/Codeception/Codeception/issues/2938">#2938</a> and <a href="https://github.com/Codeception/Codeception/issues/2954">#2954</a>.
* <strong>[Symfony]</strong> New optoin `rebootable_client` that reboots client's kernel before each request.
* <strong>[WebDriver]</strong> fixed `seeInField` for textarea with whitespaces before and after string. Closes <a href="https://github.com/Codeception/Codeception/issues/2921">#2921</a>
* <strong>[Symfony]</strong> Deprecated `grabServiceFromContainer` use `grabService` instead. For consistency with other frameworks.
* <strong>[Asserts]</strong> More `assert*` methods from PHPUnit added
* <strong>[Asserts]</strong> Added `expectException` method
* `codecept self-update` works with proxy by <strong><a href="https://github.com/gr1ev0us">@gr1ev0us</a></strong>
* [Phalcon1 add params support for method amOnRoute by <strong><a href="https://github.com/MelnykDmitro">@MelnykDmitro</a></strong>

#### 2.1.7

* **PHPUnit 5.x support**
* Global Bootstrap, Suite Bootstrap, Module Initialization happens before test loading. Fixes issues of autoloading TestCase classes introduced in 2.1.5, see <a href="https://github.com/Codeception/Codeception/issues/2872">#2872</a>
* Added option to skip PHP files validation in `codeception.yml` - `settings: lint: false`
* <strong>[Facebook]</strong> Updated to  facebook/php-sdk-v4 version 5 by <strong><a href="https://github.com/orhan">@orhan</a></strong>-swe and <strong><a href="https://github.com/tigerseo">@tigerseo</a></strong> <a href="https://github.com/Codeception/Codeception/issues/2828">#2828</a> <a href="https://github.com/Codeception/Codeception/issues/2415">#2415</a>
* <strong>[WebDriver]</strong> Added `scrollTo` action by <strong><a href="https://github.com/javigomez">@javigomez</a></strong> and <strong><a href="https://github.com/davertmik">@davertmik</a></strong> <a href="https://github.com/Codeception/Codeception/issues/2844">#2844</a>
* Fix encoding problems in PHP prior to 5.6 by <strong><a href="https://github.com/pejaycz">@pejaycz</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/2831">#2831</a>
* <strong>[Queue]</strong> Fixed `clearQueue` for AmazonSQS by <strong><a href="https://github.com/mikitu">@mikitu</a></strong> <a href="https://github.com/Codeception/Codeception/issues/2805">#2805</a>
* <strong>[Db]</strong> Fixed loading files in Sqlite <strong><a href="https://github.com/mcustiel">@mcustiel</a></strong> See <a href="https://github.com/Codeception/Codeception/issues/2812">#2812</a>
* <strong>[PhpBrowser]</strong> `amHttpAuthenticated` allows null, null as parameters to unset authentication. <a href="https://github.com/Codeception/Codeception/issues/2896">#2896</a>
* `Util\Locator` added `contains` method to easily locate any element containing a text.
* <strong>[Laravel5]</strong> Added `guard` parameters to `seeAuthentication` and `dontSeeAuthentication` methods. By <strong><a href="https://github.com/janhenkgerritsen">@janhenkgerritsen</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/2876">#2876</a>
* <strong>[Laravel5]</strong> Added functionality to disable/enable Laravel's exception handling. By <strong><a href="https://github.com/janhenkgerritsen">@janhenkgerritsen</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/2763">#2763</a>
* <strong>[Laravel5]</strong> Authentication now persists between requests when calling `amLoggedAs` with an instance of `Authenticable`. See <a href="https://github.com/Codeception/Codeception/issues/2795">#2795</a>
* <strong>[REST]</strong> Fixed dontSeeXmlResponseMatchesXpath method <a href="https://github.com/Codeception/Codeception/issues/2825">#2825</a> by <strong><a href="https://github.com/mangust404">@mangust404</a></strong>
* <strong>[ZF2]</strong> Fixed POST parameters <a href="https://github.com/Codeception/Codeception/issues/2814">#2814</a> by <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>
* <strong>[ZF1]</strong> Call Zend_Registry::_unsetInstance in _after <a href="https://github.com/Codeception/Codeception/issues/2863">#2863</a> by <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>

#### 2.1.6

* Starting from 2.1.6 you can **download PHP 5.4 compatible phar build** at http://codeception.com/php54/codecept.phar by <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>. See [installation guide](http://codeception.com/install).
* <strong>[WebDriver]</strong> Fixed uploading files with **PhantomJS** <a href="https://github.com/Codeception/Codeception/issues/1823">#1823</a> by <strong><a href="https://github.com/DavertMik">@DavertMik</a></strong> and <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>. Please specify your browser name as `phantom` in WebDriver config in order to use PhantomJS-specific hooks.
* Fixed parsing PHP files with spaces in name on PHP<7 by <strong><a href="https://github.com/acuthbert">@acuthbert</a></strong>. Fixes <a href="https://github.com/Codeception/Codeception/issues/2647">#2647</a>
* <strong>[WebDriver]</strong> Fixed proxy error when using with Chrome <a href="https://github.com/Codeception/Codeception/issues/2651">#2651</a> by <strong><a href="https://github.com/vaikla">@vaikla</a></strong>
* <strong>[Laravel5]</strong> Allow Laravel5 application URL to be set through config. By <strong><a href="https://github.com/gmhenderson">@gmhenderson</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/2676">#2676</a>
* <strong>[Laravel5]</strong> Mocked events should also return an array. Fix by <strong><a href="https://github.com/devinfd">@devinfd</a></strong>
* Fixed using codecoverage with environments <a href="https://github.com/Codeception/Codeception/issues/2634">#2634</a>
* Various HHVM improvements by <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>, for instance, Asserts module issues has been fixed.
* <strong>[REST]</strong> Fixes <a href="https://github.com/Codeception/Codeception/issues/2775">#2775</a> `seeResponseJsonMatchesXpath` when JSON contains ampersand. By <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>.
* <strong>[Filesystem]</strong> Added `seeNumberNewLines` method to check the number of new lines in opened file. By <strong><a href="https://github.com/sergeyklay">@sergeyklay</a></strong>
* <strong>[Symfony2]</strong> Added `seeCurrentRouteMatches` action by <strong><a href="https://github.com/laszlo">@laszlo</a></strong>-karpati See <a href="https://github.com/Codeception/Codeception/issues/2665">#2665</a>
* <strong>[Sequence]</strong> Added `sqs` function to generate unique sequences per suite. <a href="https://github.com/Codeception/Codeception/issues/2766">#2766</a> by <strong><a href="https://github.com/johnatannvmd">@johnatannvmd</a></strong>
* <strong>[FTP]</strong> Fixed various bugs by <strong><a href="https://github.com/k">@k</a></strong>-serenade. See <a href="https://github.com/Codeception/Codeception/issues/2755">#2755</a>
* <strong>[Frameworks]</strong><strong>[PhpBrowser]</strong> Fixed <a href="https://github.com/Codeception/Codeception/issues/2733">#2733</a>: `seeOptionIsSelected` sees first option as selected if none is selected by <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>
* <strong>[Symfony2]</strong> Removed 'localhost' from getInternalDomains by <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>. Fixed <a href="https://github.com/Codeception/Codeception/issues/2717">#2717</a>
* Bugfix for using groups by directory on Windows by <strong><a href="https://github.com/tortuetorche">@tortuetorche</a></strong> See <a href="https://github.com/Codeception/Codeception/issues/2550">#2550</a> and <a href="https://github.com/Codeception/Codeception/issues/2551">#2551</a>
* <strong>[REST]</strong> Fixed failed message for `seeHttpHeader` and `dontSeeHttpHeader` from null to expected value <a href="https://github.com/Codeception/Codeception/issues/2697">#2697</a> by <strong><a href="https://github.com/zondor">@zondor</a></strong>
* <strong>[REST]</strong> Added methods to control redirect: `stopFollowingRedirects` and `startFollowingRedirects` by <strong><a href="https://github.com/brutuscat">@brutuscat</a></strong>
* [Recorder Extension] Added `animate_slides` config to disable left-right sliding animation between screenshots by <strong><a href="https://github.com/vml">@vml</a></strong>-rmott

#### 2.1.5

* **PHP7 support**
* **Symfony3 support**
* <strong>[ZendExpressive]</strong> **module added** by <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>
* <strong>[Frameworks]</strong> **Internal Domains**: Framework modules now throw an `ExternalUrlException` when a test tries to open a URL that is not handled by the framework, i.e. an external URL. See <a href="https://github.com/Codeception/Codeception/issues/2396">#2396</a>
* Syntax check for tests. If PHP7 is used, `ParseException` handles syntax error, otherwise linting happens with `php -l`. <strong><a href="https://github.com/davertmik">@davertmik</a></strong>
* Fixed Cest generation to not include "use" statements if no namespaces set
* <strong>[REST]</strong> Modified JsonArray::sequentialArrayIntersect to return complete matches only by <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>. Fixes <a href="https://github.com/Codeception/Codeception/issues/2635">#2635</a>
* <strong>[REST]</strong> Fixes validation of several types with filters. See <a href="https://github.com/Codeception/Codeception/issues/2581">#2581</a> By <strong><a href="https://github.com/davertmik">@davertmik</a></strong>
* <strong>[REST]</strong> JsonType improved URL filter to use `filter_var($value, FILTER_VALIDATE_URL)`
* <strong>[REST]</strong> JsonType to support collections: all items in an array will be validates against JsonType. By <strong><a href="https://github.com/davertmik">@davertmik</a></strong>
* <strong>[REST]</strong> Various fixes to JsonType: <a href="https://github.com/Codeception/Codeception/issues/2555">#2555</a> <a href="https://github.com/Codeception/Codeception/issues/2548">#2548</a> <a href="https://github.com/Codeception/Codeception/issues/2542">#2542</a>
* <strong>[REST]</strong> Hides binary request data in debug by <strong><a href="https://github.com/codemedic">@codemedic</a></strong>. Fixed <a href="https://github.com/Codeception/Codeception/issues/1884">#1884</a>, See <a href="https://github.com/Codeception/Codeception/issues/2552">#2552</a> 
* <strong>[WebDriver]</strong> Allow `appendField` to work with content editable div by <strong><a href="https://github.com/nsanden">@nsanden</a></strong> <a href="https://github.com/Codeception/Codeception/issues/2588">#2588</a>
* <strong>[WebDriver]</strong> Allows adding ssl proxy settings by <strong><a href="https://github.com/mjntan35">@mjntan35</a></strong>.
* <strong>[Symfony2]</strong> Config option `cache_router` added (disabled by default) by <strong><a href="https://github.com/raistlin">@raistlin</a></strong>.
* <strong>[Doctrine]</strong> Fixed <a href="https://github.com/Codeception/Codeception/issues/2060">#2060</a>: Too many connections error by <strong><a href="https://github.com/dranzd">@dranzd</a></strong>
* <strong>[Symfony2]</strong> `services` part added to allow access Symfony DIC while wokring with WebDriver or PhpBrowser by <strong><a href="https://github.com/laszlo">@laszlo</a></strong>-karpati See <a href="https://github.com/Codeception/Codeception/issues/2629">#2629</a>
* <strong>[WebDriver]</strong><strong>[PhpBrowser]</strong> Unified setCookie "expires" param name by <strong><a href="https://github.com/davertmik">@davertmik</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/2582">#2582</a>
* <strong>[Memcache]</strong> add adaptive close call on `_after` by <strong><a href="https://github.com/pfz">@pfz</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/2572">#2572</a> 
* <strong>[Symfony2]</strong> Move kernel booting and container set up into _initialize() method by <strong><a href="https://github.com/Franua">@Franua</a></strong>  <a href="https://github.com/Codeception/Codeception/issues/2491">#2491</a> 
* <strong>[WebDriver]</strong> Fixed `seeInField` for textareas by <strong><a href="https://github.com/nsanden">@nsanden</a></strong> 
* <strong>[Yii2]</strong><strong>[REST]</strong> Fixed using Yii2 as dependency for REST by <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/2562">#2562</a>
* <strong>[Laravel5]</strong> Removed `enableMiddleware` and `enableEvents` methods. See <a href="https://github.com/Codeception/Codeception/issues/2602">#2602</a>. By <strong><a href="https://github.com/janhenkgerritsen">@janhenkgerritsen</a></strong>
* <strong>[Laravel]</strong> Refactored modules. See <a href="https://github.com/Codeception/Codeception/issues/2602">#2602</a>. By <strong><a href="https://github.com/janhenkgerritsen">@janhenkgerritsen</a></strong>
* <strong>[Laravel5]</strong> Fix bug for `seeCurrentRouteIs` when routes don't match. See <a href="https://github.com/Codeception/Codeception/issues/2593">#2593</a>. By <strong><a href="https://github.com/maddhatter">@maddhatter</a></strong>
* <strong>[PhpBrowser]</strong> Set curl options for Guzzle6 correctly. See <a href="https://github.com/Codeception/Codeception/issues/2533">#2533</a>. By <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>
* Fixed usage of GroupObject by unit tests. GroupObjects can skip tests by <strong><a href="https://github.com/davetmik">@davetmik</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/2617">#2617</a>

#### 2.1.4

* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> Added `_getResponseContent` hidden method. By <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>
* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> Added `moveBack` method. By <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>
* <strong>[WebDriver]</strong><strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> Added `seeInSource`, `dontSeeInSource` methods to check raw HTML instead of stripped text in `see`/`dontSee`. By <strong><a href="https://github.com/zbateson">@zbateson</a></strong> in <a href="https://github.com/Codeception/Codeception/issues/2465">#2465</a>
* <strong>[WebDriver]</strong> print Selenium WebDriver logs on failure or manually with `debugWebDriverLogs` in debug mode. Config option `debug_log_entries` added. See <a href="https://github.com/Codeception/Codeception/issues/2471">#2471</a> By <strong><a href="https://github.com/MasonM">@MasonM</a></strong> and <strong><a href="https://github.com/DavertMik">@DavertMik</a></strong>.
* <strong>[ZF2]</strong> grabs service from container without reinitializing it. Fixes <a href="https://github.com/Codeception/Codeception/issues/2519">#2519</a> where Doctrine2 gets different instances of the entity manager everytime grabServiceFromContainer is called. By <strong><a href="https://github.com/dranzd">@dranzd</a></strong>
* <strong>[REST]</strong> fixed usage of JsonArray and `json_last_error_msg` function on PHP 5.4. See <a href="https://github.com/Codeception/Codeception/issues/2535">#2535</a>. By <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>
* <strong>[REST]</strong> `seeResponseIsJsonType` can now validate emails with `string:email` definition. By <strong><a href="https://github.com/DavertMik">@DavertMik</a></strong>
* <strong>[REST]</strong> `seeResponseIsJsonType`: `string|null` as well as `null|string` can be used to match null type. <a href="https://github.com/Codeception/Codeception/issues/2522">#2522</a> <a href="https://github.com/Codeception/Codeception/issues/2500">#2500</a> By <strong><a href="https://github.com/vslovik">@vslovik</a></strong>
* <strong>[REST]</strong> REST methods can be used to inspect result of the last request made by PhpBrowser or framework module. see <a href="https://github.com/Codeception/Codeception/issues/2507">#2507</a>. By <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>
* <strong>[Silex]</strong> Doctrine provider added. Doctrine2 module can be connected to Silex app with `depends: Silex` in config. By <strong><a href="https://github.com/arduanov">@arduanov</a></strong> <a href="https://github.com/Codeception/Codeception/issues/2503">#2503</a>
* <strong>[Laravel5]</strong> Removed `expectEvents` and added `seeEventTriggered` and `dontSeeEventTriggered`. By <strong><a href="https://github.com/janhenkgerritsen">@janhenkgerritsen</a></strong>
* <strong>[Laravel5]</strong> Fixed fatal error in `seeCurrentRouteIs` and `seeCurrentActionIs` methods. See <a href="https://github.com/Codeception/Codeception/issues/2517">#2517</a>. By <strong><a href="https://github.com/janhenkgerritsen">@janhenkgerritsen</a></strong>
* <strong>[Laravel5]</strong> Improved the error messages for several methods. See <a href="https://github.com/Codeception/Codeception/issues/2476">#2476</a>. By <strong><a href="https://github.com/janhenkgerritsen">@janhenkgerritsen</a></strong>
* <strong>[Laravel5]</strong> Improved form error methods. See <a href="https://github.com/Codeception/Codeception/issues/2432">#2432</a>. By <strong><a href="https://github.com/janhenkgerritsen">@janhenkgerritsen</a></strong>
* <strong>[Laravel5]</strong> Added wrapper methods for Laravel 5 model factories. See <a href="https://github.com/Codeception/Codeception/issues/2442">#2442</a>. By <strong><a href="https://github.com/janhenkgerritsen">@janhenkgerritsen</a></strong>
* <strong>[Phalcon]</strong> Added `amOnRoute` and `seeCurrentRouteIs` methods by <strong><a href="https://github.com/sergeyklay">@sergeyklay</a></strong>
* <strong>[Phalcon]</strong> Added `seeSessionHasValues` by <strong><a href="https://github.com/sergeyklay">@sergeyklay</a></strong>
* <strong>[Phalcon]</strong> Added `getApplication()` method by <strong><a href="https://github.com/sergeyklay">@sergeyklay</a></strong>
* <strong>[Symfony2]</strong> Sets `xdebug.max_nesting_level` to 200 only if it is lower. Fixes error hiding <a href="https://github.com/Codeception/Codeception/issues/2462">#2462</a> by <strong><a href="https://github.com/mhightower">@mhightower</a></strong>
* <strong>[Db]</strong> Save the search path when importing Postgres dumps <a href="https://github.com/Codeception/Codeception/issues/2441">#2441</a> by <strong><a href="https://github.com/EspadaV8">@EspadaV8</a></strong>
* <strong>[Yii2]</strong> Fixed problems with transaction rollbacks when using the `cleanup` flag. See <a href="https://github.com/Codeception/Codeception/issues/2488">#2488</a>. By <strong><a href="https://github.com/ivokund">@ivokund</a></strong>
* <strong>[Yii2]</strong> Clean up previously uploaded files between tests by <strong><a href="https://github.com/tibee">@tibee</a></strong>
* Actor classes generation improved by <strong><a href="https://github.com/codemedic">@codemedic</a></strong> <a href="https://github.com/Codeception/Codeception/issues/2453">#2453</a>
* Added support for nested helper by <strong><a href="https://github.com/luka">@luka</a></strong>-zitnik <a href="https://github.com/Codeception/Codeception/issues/2494">#2494</a>
* Make `generate:suite` respect bootstrap setting in <a href="https://github.com/Codeception/Codeception/issues/2512">#2512</a>. By <strong><a href="https://github.com/dmitrivereshchagin">@dmitrivereshchagin</a></strong>

#### 2.1.3

* <strong>[REST]</strong> **Added matching data types** by with new methods `seeResponseMatchesJsonType` and `dontSeeResponseMatchesJsonType`. See <a href="https://github.com/Codeception/Codeception/issues/2391">#2391</a>
* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> added `_request` and `_loadPage` hidden API methods for performing arbitrary requests.
* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> Fixed `seeInField`, `dontSeeInField` for disabled fields <a href="https://github.com/Codeception/Codeception/issues/2378">#2378</a>. See <a href="https://github.com/Codeception/Codeception/issues/2414">#2414</a>.
* Environment files can now be located in subfolders of `tests/_env` by <strong><a href="https://github.com/Zifius">@Zifius</a></strong>
* <strong>[Symfony2]</strong> Fixed issue when accessing profiler when no request has been performed <a href="https://github.com/Codeception/Codeception/issues/652">#652</a>.
* <strong>[Symfony2]</strong> Added `amOnRoute` and `seeCurrentRouteIs` methods  by <strong><a href="https://github.com/raistlin">@raistlin</a></strong>
* <strong>[ZF2]</strong> Added `amOnRoute` and `seeCurrentRouteIs` methods module, by <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>
* Fixed issue with trailing slashes in `seeCurrentUrlEquals` and `dontSeeCurrentUrlEquals` methods <a href="https://github.com/Codeception/Codeception/issues/2324">#2324</a>. By <strong><a href="https://github.com/janhenkgerritsen">@janhenkgerritsen</a></strong>
* Warning is displayed once using unconfigured environment.
* Fixed loading environment configurations for Cept files by <strong><a href="https://github.com/splinter89">@splinter89</a></strong>
* Fixed bootstrap with namespaces to inject namespaced actor classes properly.
* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> added hidden `_request()` method to send requests to backend from Helper classes.
* <strong>[Laravel5]</strong> Added `disableEvents()`, `enableEvents()` and `expectEvents()` methods. By <strong><a href="https://github.com/janhenkgerritsen">@janhenkgerritsen</a></strong>
* <strong>[Laravel5]</strong> Added `dontSeeFormErrors()` method. By <strong><a href="https://github.com/janhenkgerritsen">@janhenkgerritsen</a></strong>
* <strong>[Db]</strong> Deleted Oracle driver (it existed by mistake, the real driver is Oci). By <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>
* <strong>[Db]</strong> Implemented getPrimaryKey method for Sqlite, Mysql, Postgresql, Oracle and MsSql. By <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>
* <strong>[Db]</strong> Implemented support for composite primary keys and tables without primary keys. By <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>
* Fixed the scalarizeArray to be aware of NULL fields <a href="https://github.com/Codeception/Codeception/issues/2264">#2264</a>. By <strong><a href="https://github.com/fbidu">@fbidu</a></strong>
* <strong>[Soap]</strong> Fixed SOAP module <a href="https://github.com/Codeception/Codeception/issues/2296">#2296</a>. By <strong><a href="https://github.com/relaxart">@relaxart</a></strong>
* Fixed a bug where blank lines in a groups file would run every test in the project <a href="https://github.com/Codeception/Codeception/issues/2297">#2297</a>. By <strong><a href="https://github.com/imjoehaines">@imjoehaines</a></strong>
* <strong>[WebDriver]</strong> seeNumberOfElements should only count visible elements <a href="https://github.com/Codeception/Codeception/issues/2303">#2303</a>. By <strong><a href="https://github.com/sascha">@sascha</a></strong>-egerer
* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> Verbose output for all HTTP requests. By <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>
* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> Throw `Codeception\Exception\ExternalUrlException` when framework module tries to open an external URL <a href="https://github.com/Codeception/Codeception/issues/2328">#2328</a>. By <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>
* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> Added `switchToIframe` method. By <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>
* <strong>[Dbh]</strong> module deprecated

#### 2.1.2

* **Updated to PHPUnit 4.8**
* Enhancement: **Wildcard includes enabled when testing [multiple applications](http://codeception.com/docs/08-Customization#One-Runner-for-Multiple-Applications)**. See <a href="https://github.com/Codeception/Codeception/issues/2016">#2016</a> By <strong><a href="https://github.com/nzod">@nzod</a></strong>
* <strong>[Symfony2]</strong> fixed Doctrine2 integration: Doctrine transactions will start before each test and rollback afterwards. *2015-08-08*
* <strong>[Doctrine2]</strong> establishing connection and starting transaction is moved to `_before`. *2015-08-08*
* <strong>[PhpBrowser]</strong> Removed disabled and file fields from form values. By <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong> *2015-08-08*
* <strong>[ZF2]</strong> Added grabServiceFromContainer function. By InVeX  *2015-08-08*
* <strong>[PhpBrowser]</strong><strong>[Guzzle6]</strong> Disabled strict mode of CookieJar <a href="https://github.com/Codeception/Codeception/issues/2234">#2234</a> By <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong> *2015-08-04*
* <strong>[Laravel5]</strong> Added `disableMiddleware()` and `enableMiddleware()` methods. By <strong><a href="https://github.com/janhenkgerritsen">@janhenkgerritsen</a></strong> *2015-08-07*
* Enhancement: If a specific *ActorActions trait does not exist in `tests/_support/_generated` directory, it will be created automatically before run.
* Enhancement: do not execute all included suites if you run one specific suite *2015-08-08*
* `Extension\Recorder` navigate over slides with left and right arrow keys, do not create screenshots for comment steps.
* `Extension\Recorder` generates index html for all saved records.
* `Extension\Recorder` fixed for creating directories twice. Fixed <a href="https://github.com/Codeception/Codeception/issues/2216">#2216</a>
* `Extension\Logger` fixed <a href="https://github.com/Codeception/Codeception/issues/2216">#2216</a>
* Fixed injection of Helpers into Cest and Test files. See <a href="https://github.com/Codeception/Codeception/issues/2222">#2222</a>
* `Stub::makeEmpty` on interfaces works again by <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>
* Command `generate:scenarios` fixed for Cest files by <strong><a href="https://github.com/mkudenko">@mkudenko</a></strong> See <a href="https://github.com/Codeception/Codeception/issues/1962">#1962</a>
* <strong>[Db]</strong> Quoted table name in Db::select, removed identical methods from child classes by <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/2231">#2231</a>
* <strong>[WebDriver]</strong> added support for running tests on a remote server behind a proxy with `http_proxy` and `http_proxy_port` config options by <strong><a href="https://github.com/jdq22">@jdq22</a></strong> *2015-07-29*
* <strong>[Laravel]</strong> Fixed issue with error handling for `haveRecord()` method in Laravel modules <a href="https://github.com/Codeception/Codeception/issues/2217">#2217</a> by <strong><a href="https://github.com/janhenkgerritsen">@janhenkgerritsen</a></strong> *2015-07-28*
* Fixed displayed XML/HTML report path <a href="https://github.com/Codeception/Codeception/issues/2187">#2187</a> by <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong> *2015-07-27*
* <strong>[WebDriver]</strong> Fixed `waitForElementChange` fatal error by <strong><a href="https://github.com/stipsan">@stipsan</a></strong>
* <strong>[Db]</strong> Enhanced dollar quoting ($$) processing in PostgreSQL driver by <strong><a href="https://github.com/YasserHassan">@YasserHassan</a></strong> *2015-07-20*
* <strong>[REST]</strong> Created tests for file-upload with REST module. By <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong> *2015-08-08*
* <strong>[Lumen]</strong> Fixed issue where wrong request object was passed to the Lumen application by <strong><a href="https://github.com/janhenkgerritsen">@janhenkgerritsen</a></strong> *2015-07-18*

#### 2.1.1

* <strong>[WebDriver]</strong> **Upgraded to facebook/webdriver 1.0** *2015-07-11*
  WebDriver classes were moved to `Facebook\WebDriver` namespace. Please take that into account when using WebDriver API directly.
  Till 2.2 Codeception will keep non-namespaced aliases of WebDriver classes.
* Module Reference now contains documentation for hidden API methods which should be used in Helper classes
* Skipped and Incomplete tests won't fire `test.before` and `test.after` events. For instance, WebDriver browser won't be started and Db cleanups won't be executed on incomplete or skipped tests.
* Annotations `skip` and `incomplete` enabled in Cest files <a href="https://github.com/Codeception/Codeception/issues/2131">#2131</a>
* <strong>[WebDriver]</strong><strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> `_findElements($locator)` method added to use in Helper classes *2015-07-11*
  Now you can use `$this->getModule('WebDriver')->findElements('.user');` in Helpers to match all elements with `user` class using WebDriver module
* <strong>[PhpBrowser]</strong> Fixed `amOnUrl` method to open absolute URLs.
* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> Fix for `fillField` using values that contain ampersands by <strong><a href="https://github.com/GawainLynch">@GawainLynch</a></strong> and <strong><a href="https://github.com/zbateson">@zbateson</a></strong> Issue <a href="https://github.com/Codeception/Codeception/issues/2132">#2132</a>
* <strong>[WebDriver]</strong><strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> Fixed missing HTTPS when trying to access protected pages <a href="https://github.com/Codeception/Codeception/issues/2141">#2141</a>

#### 2.1.0

* <strong>[Recorder]</strong>(https://github.com/Codeception/Codeception/tree/master/ext#codeceptionextensionrecorder) extension added. Shows acceptance test progress with a recorded slideshow.
* **Updated to Guzzle 6**. Codeception can now work both with Guzzle v5 and Guzzle v6. PhpBrowser chooses right connector depending on Guzzle version installed. By <strong><a href="https://github.com/davertmik">@davertmik</a></strong> and <strong><a href="https://github.com/enumag">@enumag</a></strong>
* Annotations in Cept files.
  Instead of calling `$scenario->skip()`, `$scenario->group('firefox')`, etc, it is recommended to set scenario metadata with annotations `// <strong><a href="https://github.com/skip">@skip</a></strong>`, `// <strong><a href="https://github.com/group">@group</a></strong> firefox`.
  Annotations can be parsed from line or block comments. `$scenario->skip()` and `$scenario->incomplete()` are still valid and can be executed inside conditional statements:
  ```
  if (!extension_loaded('xdebug')) $scenario->skip('Xdebug required')
  ```
* **PSR-4**: all support classes moved to `tests/_support` by default. Actors, Helpers, PageObjects, StepObjects, GroupObjects to follow PSR-4 naming style. Autoloader implemented by <strong><a href="https://github.com/splinter89">@splinter89</a></strong>.
* **Dependency Injection**: support classes can be injected into tests. Support classes can be injected into each other too. This happens by implementing method `_inject` and explicitly specifying class names as parameters. Implemented by <strong><a href="https://github.com/splinter89">@splinter89</a></strong>.
* **Actor classes can be extended**, their generated parts were moved to special traits in `_generated` namespace. Each *Tester class can be updated with custom methods.
* **Module config simplified**: Modules can be configured in `enabled` section of suite config.
* **Conflicts**: module can define conflicts with each other by implementing `_conflicts` method
* **Dependencies**: module can explicitly define dependencies and expect their injection by implementing `_inject` and `_depends` methods and relying on dependency injection container.
* **Current** modules, environment, and test name can be received in scenario. Example: `$scenario->current('env')` returns current environment name. Fixes <a href="https://github.com/Codeception/Codeception/issues/1251">#1251</a>
* **Environment Matrix**: environments can be merged. Environment configs can be created in `tests/_envs`, environment generator added. Implemented by By <strong><a href="https://github.com/sjableka">@sjableka</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/1747">#1747</a>
* **Custom Printers**: XML, JSON, TAP, Report printers can be redefined in configuration. See <a href="https://github.com/Codeception/Codeception/issues/1425">#1425</a>
* <strong>[Db]</strong> Added `reconnect` option for long running tests, which will connect to database before the test and disconnect after. By <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>
* Module parts. Actions of modules can be loaded partially in order to disable actions which are not used in current tests. For instance, disable web actions of framework modules in unit testsing.
* **Kohana**, **Symfony1**, **Doctrine1** modules considered deprecated and moved to standalone packages.
* `shuffle` added to settings. Randomizes order of running tests. See <a href="https://github.com/Codeception/Codeception/issues/1504">#1504</a>
* Console output improved: scenario stack traces contain files and lines of fail.
* <strong>[Doctrine2]</strong><strong>[Symfony2]</strong> `symfony_em_service` config option moved from Doctrine2 to Symfony2 module and renamed to `em_service` *2015-06-03*
* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> Fixed cloning form nodes `Codeception\Lib\InnerBrowser::getFormFromCrawler(): ID XXX already defined` *2015-05-13*
* <strong>[WebDriver]</strong> session snapshot implemented, allows to store cookies and load them, i.e., to keep user session between testss.
* <strong>[WebDriver]</strong><strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> Malformed XPath locators wil throw an exception <a href="https://github.com/Codeception/Codeception/issues/1441">#1441</a>
* `MODULE_INIT` event is fired before initializing modules <a href="https://github.com/Codeception/Codeception/issues/1370">#1370</a>
* Graceful tests termination using `pcntl_signal`. See <a href="https://github.com/Codeception/Codeception/issues/1286">#1286</a>
* Group classes renamed to GroupObjects; Base GroupObject class renamed to `Codeception\GroupObject`
* Official extensions moved to `ext` dir; Base Extension class renamed to `Codeception\Extension`
* Duplicate environment options won't cause Codeception to run environment tests twice
* <strong>[Phalcon1]</strong> `haveServiceInDi` method implemented by <strong><a href="https://github.com/sergeyklay">@sergeyklay</a></strong>
* <strong>[Db]</strong> `seeNumRecords` method added by <strong><a href="https://github.com/sergeyklay">@sergeyklay</a></strong>

#### 2.0.15

* <strong>[Phalcon1]</strong> Fixed getting has more than one field by <strong><a href="https://github.com/sergeyklay">@sergeyklay</a></strong> <a href="https://github.com/Codeception/Codeception/issues/2010">#2010</a>.
* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> Compute relative URIs against the effective request URI when there is a redirect. <a href="https://github.com/Codeception/Codeception/issues/2058">#2058</a> <a href="https://github.com/Codeception/Codeception/issues/2057">#2057</a>
* <strong>[PhpBrowser]</strong> Fixed Guzzle Connector headers by <strong><a href="https://github.com/valeriyaslovikovskaya">@valeriyaslovikovskaya</a></strong> <a href="https://github.com/Codeception/Codeception/issues/2028">#2028</a>
* <strong>[Symfony2]</strong> kernel is created for every test by <strong><a href="https://github.com/quaninte">@quaninte</a></strong> <a href="https://github.com/Codeception/Codeception/issues/2020">#2020</a>
* <strong>[WebDriver]</strong> Added WebDriver init settings `connection_timeout` and `request_timeout` by <strong><a href="https://github.com/n8whnp">@n8whnp</a></strong> <a href="https://github.com/Codeception/Codeception/issues/2065">#2065</a>
* <strong>[MongoDb]</strong> added ability to change the database by <strong><a href="https://github.com/clarkeash">@clarkeash</a></strong> <a href="https://github.com/Codeception/Codeception/issues/2015">#2015</a>
* <strong>[Doctrine2]</strong> Fixed issues after first request is made <a href="https://github.com/Codeception/Codeception/issues/2025">#2025</a> <strong><a href="https://github.com/AlexStansfield">@AlexStansfield</a></strong>
* <strong>[REST]</strong> Improved JsonArray to compare repeated values correctly by <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong> <a href="https://github.com/Codeception/Codeception/issues/2070">#2070</a>
* <strong>[MongoDb]</strong> Remove not necessary config fields `user` and `password` by <strong><a href="https://github.com/nicklasos">@nicklasos</a></strong>
* `Stub::construct` can be used to set private/protected properties by <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong> <a href="https://github.com/Codeception/Codeception/issues/2082">#2082</a>
* Fixed <strong><a href="https://github.com/before">@before</a></strong> and <strong><a href="https://github.com/after">@after</a></strong> hooks in Cest. _before method was executed on each call of method specified in <strong><a href="https://github.com/before">@before</a></strong> annotation *2015-06-15*
* <strong>[Laravel5]</strong> Fix for domains in `route()` helper. See <a href="https://github.com/Codeception/Codeception/issues/2000">#2000</a>. *2015-06-04*
* <strong>[REST]</strong> Fixed sending `JsonSerializable` object on POST by <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong> and <strong><a href="https://github.com/andersonamuller">@andersonamuller</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/1988">#1988</a> <a href="https://github.com/Codeception/Codeception/issues/1994">#1994</a>
* <strong>[MongoDb]</strong> escaped filename shell argument for loading MongoDB by <strong><a href="https://github.com/christoph">@christoph</a></strong>-hautzinger. <a href="https://github.com/Codeception/Codeception/issues/1998">#1998</a> *2015-06-03*
* <strong>[Lumen]</strong> **Module added** by <strong><a href="https://github.com/janhenkgerritsen">@janhenkgerritsen</a></strong>

#### 2.0.14

* Improved output *2015-05-22*
  * data providers print simplified
  * output respects console size with `tput` and tries to fit area
  * non-interactive environments for `tput` are ignored
* <strong>[Frameworks]</strong><strong>[PhpBrowser]</strong><strong>[Symfony2]</strong> Fields are passed as PHP-array on form submission the same way as `Symfony\Component\DomCrawler\Form->getPhpValues()` does. Fixes fails of Symfony form tests  *2015-05-22*
* <strong>[Laravel4]</strong> Fixed bug with filters. See <a href="https://github.com/Codeception/Codeception/issues/1810">#1810</a>. *2015-05-21*
* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> Fixed working associative array form fields (like `FooBar<strong>[bar]</strong>`). Fixes regression <a href="https://github.com/Codeception/Codeception/issues/1923">#1923</a> by <strong><a href="https://github.com/davertmik">@davertmik</a></strong> and <strong><a href="https://github.com/zbateson">@zbateson</a></strong>.
* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> Fixed cloning form nodes Codeception\Lib\InnerBrowser::getFormFromCrawler(): ID XXX already defined *2015-05-13*
* <strong>[Laravel4]</strong> <strong>[Laravel5]</strong> Improved error message for `amOnRoute` and `amOnAction` methods if route or action does not exist *2015-05-04*
* <strong>[Laravel4]</strong> Fixed issue with session configuration *2015-05-01*
* <strong>[Laravel4]</strong> Partial rewrite of module *2015-05-01*
  * Added `getApplication()` method
  * Added `seeFormHasErrors()`, `seeFormErrorMessages(array $bindings)` and `seeFormErrorMessage($key, $errorMessage)` methods
  * Deprecated `seeSessionHasErrors()` and `seeSessionErrorMessage(array $bindings)` methods.
* fixed stderr output messages in PHPStorm console *2015-04-26*
* Allow following symlinks when searching for tests by <strong><a href="https://github.com/nechutny">@nechutny</a></strong>
* Fixed `g:scenarios --single-file` missing linebreaks between scenarios by <strong><a href="https://github.com/Zifius">@Zifius</a></strong> Parially fixes <a href="https://github.com/Codeception/Codeception/issues/1866">#1866</a>
* <strong>[Frameworks]</strong><strong>[PhpBrowser]</strong> Fixed errors like `<strong>[ErrorException]</strong> Array to string conversion` when using strict locators. Fix by <strong><a href="https://github.com/neochief">@neochief</a></strong> <a href="https://github.com/Codeception/Codeception/issues/1881">#1881</a>
* <strong>[Frameworks]</strong><strong>[PhpBrowser]</strong> Fix for URLs with query parameters not properly constructed for GET form submissions by <strong><a href="https://github.com/zbateson">@zbateson</a></strong> Fixes <a href="https://github.com/Codeception/Codeception/issues/1891">#1891</a>
* <strong>[Facebook]</strong> Updated Facebook SDK to 4.0 by <strong><a href="https://github.com/enginvardar">@enginvardar</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/1896">#1896</a>.
* <strong>[DB]</strong> Quote table name in `Db::getPrimaryKeyColumn` and `Db::deleteQueryMethods` by <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/1912">#1912</a>
* <strong>[Silex]</strong> Can be used for API functional testing. Improvement by <strong><a href="https://github.com/arduanov">@arduanov</a></strong> See <a href="https://github.com/Codeception/Codeception/issues/1945">#1945</a>
* <strong>[Doctrine2]</strong> Added new config option `symfony_em_service` to specify service name for Doctrine entity manager in Symfony DIC by <strong><a href="https://github.com/danieltuwien">@danieltuwien</a></strong> <a href="https://github.com/Codeception/Codeception/issues/1915">#1915</a>
* <strong>[Db]</strong> Reversed order of removing records with foreign keys created by `haveInDatabase`. Fixes <a href="https://github.com/Codeception/Codeception/issues/1942">#1942</a> by <strong><a href="https://github.com/satahippy">@satahippy</a></strong>
* <strong>[Db]</strong> Quote names in PostgreSQL queries. Fix <a href="https://github.com/Codeception/Codeception/issues/1916">#1916</a> by <strong><a href="https://github.com/satahippy">@satahippy</a></strong>
* <strong>[ZF1]</strong> Various improvements by <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong> See <a href="https://github.com/Codeception/Codeception/issues/1924">#1924</a>
* <strong>[ZF2]</strong><strong>[ZF2]</strong> Improved passing request headers by <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>
* <strong>[Phalcon1]</strong> Improved dependency injector container check by <strong><a href="https://github.com/sergeyklay">@sergeyklay</a></strong> <a href="https://github.com/Codeception/Codeception/issues/1967">#1967</a>
* <strong>[Yii2]</strong> Enabled logging by <strong><a href="https://github.com/TriAnMan">@TriAnMan</a></strong> <a href="https://github.com/Codeception/Codeception/issues/1539">#1539</a>
* Attribute `feature` added to xml reports in `Codeception\TestCase\Test` test report by <strong><a href="https://github.com/tankist">@tankist</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/1964">#1964</a>
* Fixed <a href="https://github.com/Codeception/Codeception/issues/1779">#1779</a> by <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong>
* ...special thanks to <strong><a href="https://github.com/Naktibalda">@Naktibalda</a></strong> for creating demo <strong>[ZF1]</strong>(https://github.com/Naktibalda/codeception-zf1-tests) and <strong>[ZF2]</strong>(https://github.com/Naktibalda/codeception-zf2-tests) applications with api tests examples.

#### 2.0.13

* Updated to PHPUnit 4.6
* <strong>[Db]</strong> fixed regression introduced in 2.0.11. `haveInDatabase` works in PostgreSQL on tables with 'id' as primary key. Fix by <strong><a href="https://github.com/akireikin">@akireikin</a></strong> <a href="https://github.com/Codeception/Codeception/issues/1846">#1846</a> <a href="https://github.com/Codeception/Codeception/issues/1761">#1761</a>
* added `--no-rebuild` option to disable automatic actor classes rebuilds *2015-04-24*
* suppressed warnings on failed actor classes auto-rebuilds
* enable group listener for grouping with annotation by <strong><a href="https://github.com/litpuvn">@litpuvn</a></strong> Fixes <a href="https://github.com/Codeception/Codeception/issues/1830">#1830</a>
* unix terminals output improved by calculating screen size. Done by <strong><a href="https://github.com/DexterHD">@DexterHD</a></strong> See <a href="https://github.com/Codeception/Codeception/issues/1858">#1858</a>
* <strong>[Yii2]</strong> Remove line to activate request parsers by <strong><a href="https://github.com/m8rge">@m8rge</a></strong> <a href="https://github.com/Codeception/Codeception/issues/1843">#1843</a>
* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> Various `fillField`/`submitForm` improvements by <strong><a href="https://github.com/zbateson">@zbateson</a></strong> See <a href="https://github.com/Codeception/Codeception/issues/1840">#1840</a>. Fixes <a href="https://github.com/Codeception/Codeception/issues/1828">#1828</a>, <a href="https://github.com/Codeception/Codeception/issues/1689">#1689</a>
* Allow following symlinks when searching for tests by <strong><a href="https://github.com/nechutny">@nechutny</a></strong> <a href="https://github.com/Codeception/Codeception/issues/1862">#1862</a>

#### 2.0.12

* <strong>[Laravel5]</strong> Fix for undefined method `Symfony\Component\HttpFoundation\Request::route()` by <strong><a href="https://github.com/janhenkgerritsen">@janhenkgerritsen</a></strong>
* <strong>[Yii2]</strong> Fix https support and verbose output added by <strong><a href="https://github.com/TriAnMan">@TriAnMan</a></strong> See <a href="https://github.com/Codeception/Codeception/issues/1770">#1770</a>
* <strong>[Yii2]</strong> `haveRecord` to insert insert unsafe attributes by <strong><a href="https://github.com/nkovacs">@nkovacs</a></strong>. Fixes <a href="https://github.com/Codeception/Codeception/issues/1775">#1775</a>
* <strong>[Asserts]</strong> `assertSame` and `assertNotSame` added by <strong><a href="https://github.com/hidechae">@hidechae</a></strong> *2015-04-03*
* <strong>[Laravel5]</strong> Add `packages` option for application packages by <strong><a href="https://github.com/jonathantorres">@jonathantorres</a></strong>  <a href="https://github.com/Codeception/Codeception/issues/1782">#1782</a>
* <strong>[PhpBrowser]</strong><strong>[WebDriver]</strong><strong>[Frameworks]</strong> `seeInFormFields` method added for checking multiple form field values. See <a href="https://github.com/Codeception/Codeception/issues/1795">#1795</a> *2015-04-03*
* <strong>[ZF2]</strong> Fixed setting Content-Type header by <strong><a href="https://github.com/Gorp">@Gorp</a></strong> See <a href="https://github.com/Codeception/Codeception/issues/1796">#1796</a> *2015-04-03*
* <strong>[Yii2]</strong> Pass body request into yii2 request, allowing to send Xml payload by <strong><a href="https://github.com/m8rge">@m8rge</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/1806">#1806</a>
* Fixed conditional assertions firing TEST_AFTER event by <strong><a href="https://github.com/zbateson">@zbateson</a></strong>. Issues <a href="https://github.com/Codeception/Codeception/issues/1647">#1647</a> <a href="https://github.com/Codeception/Codeception/issues/1354">#1354</a> and <a href="https://github.com/Codeception/Codeception/issues/1111">#1111</a> *2015-04-03*
* Fixing mocking Laravel models by removing `__mocked` property in classes created with Stub by <strong><a href="https://github.com/EVODelavega">@EVODelavega</a></strong> See <a href="https://github.com/Codeception/Codeception/issues/1785">#1785</a> *2015-04-03*
* <strong>[WebDriver]</strong> `submitForm` allows array parameter values by <strong><a href="https://github.com/zbateson">@zbateson</a></strong> *2015-04-03*
* <strong>[SOAP]</strong> Added `framework_collect_buffer` option to disable buffering output by <strong><a href="https://github.com/Noles">@Noles</a></strong> *2015-04-03*
* <strong>[Laravel4]</strong> added  to run artisan commands by <strong><a href="https://github.com/bgetsug">@bgetsug</a></strong> *2015-04-03*
* <strong>[AMQP]</strong> add a routing key to a push to exchange by <strong><a href="https://github.com/jistok">@jistok</a></strong> *2015-04-03*
* Interactive console updated to work with namespaces by <strong><a href="https://github.com/jistok">@jistok</a></strong> *2015-04-03*
* <strong>[PhpBrowser]</strong> added deleteHeader method by <strong><a href="https://github.com/zbateson">@zbateson</a></strong> *2015-04-03*
* Disabling loading of bootstrap files by setting `bootstrap: false` in globall settings or inside suite config. Fixes <a href="https://github.com/Codeception/Codeception/issues/1813">#1813</a> *2015-04-03*


#### 2.0.11

* Updated to PHPUnit 4.5 *2015-02-23*
* <strong>[Laravel5]</strong> module added by <strong><a href="https://github.com/janhenkgerritsen">@janhenkgerritsen</a></strong> *2015-02-23*
* Fixed problem with extensions being always loaded with default options by <strong><a href="https://github.com/sjableka">@sjableka</a></strong>. Fixes <a href="https://github.com/Codeception/Codeception/issues/1716">#1716</a> *2015-02-23*
* <strong>[Db]</strong> Cleanup now works for tables with primary is not named 'id'. Fix by <strong><a href="https://github.com/KennethVeipert">@KennethVeipert</a></strong> See <a href="https://github.com/Codeception/Codeception/issues/1727">#1727</a> *2015-02-23*
* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> `submitForm` improvements by <strong><a href="https://github.com/zbateson">@zbateson</a></strong>: *2015-02-23*

Removed submitForm's reliance on using parse_str and parse_url to
generate params (which caused unexpected side-effects like failing
for values with ampersands).

Modified the css selector for input elements so disabled input
elements don't get sent default values.

Modifications to ensure multiple values get sent correctly.

* <strong>[Laravel4]</strong> middleware is loaded on requests. Fixed <a href="https://github.com/Codeception/Codeception/issues/1680">#1680</a> by <strong><a href="https://github.com/jotweh">@jotweh</a></strong> *2015-02-23*
* <strong>[Dbh]</strong> Begin transaction only unless transaction is already in progress by <strong><a href="https://github.com/thecatontheflat">@thecatontheflat</a></strong> *2015-02-23*
* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> Fix quiet crash when crawler is null by <strong><a href="https://github.com/aivus">@aivus</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/1714">#1714</a> *2015-02-23*
* <strong>[Yii2]</strong> Fixed usage of PUT method by <strong><a href="https://github.com/miroslav">@miroslav</a></strong>-chandler *2015-02-23*


#### 2.1.0

* <strong>[WebDriver]</strong> Saving and restoring session snapshots implemented *2015-03-16*


#### 2.0.10

* **Console Improvement**: better formatting of test progress. Improved displaying of debug messages and PHP Fatal Errors.
  Codeception now uses features of interactive shell to print testing progress.
  In case of non-interactive shell (when running from CI like Jenkins) this feature is gracefully degraded to standard mode.
  You can turn off interactive printing manually by providing `--no-interaction` option or simply `-n`
* `ExceptionWrapper` messages unpacked into normal and verbose exceptions.
* HTML reports now allow to filter tests by status. Thanks to <strong><a href="https://github.com/raistlin">@raistlin</a></strong>
* Added '_failed' hook for Cest tests. Fixes <a href="https://github.com/Codeception/Codeception/issues/1660">#1660</a> *2015-02-02*
* <strong>[REST]</strong> fixed setting Host header. Issue <a href="https://github.com/Codeception/Codeception/issues/1650">#1650</a> *2015-02-02*
* <strong>[Laravel4]</strong> Disconnecting from database after each test to prevent Too many connections exception <a href="https://github.com/Codeception/Codeception/issues/1665">#1665</a> by <strong><a href="https://github.com/mnabialek">@mnabialek</a></strong> *2015-02-02*
* <strong>[Symfony2]</strong> Fixed kernel reuse in <a href="https://github.com/Codeception/Codeception/issues/1656">#1656</a> by <strong><a href="https://github.com/hacfi">@hacfi</a></strong> *2015-02-01*
* <strong>[REST]</strong> request params are now correctly saved to `$this->params` property. Fixes <a href="https://github.com/Codeception/Codeception/issues/1682">#1682</a> by <strong><a href="https://github.com/gmhenderson">@gmhenderson</a></strong> *2015-02-01*
* Interactive shell updated: deprecated Symfony helpers replaced, printed output cleaned *2015-01-28*
* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> Fixed `matchOption` to return the option value in case there is no value attribute by <strong><a href="https://github.com/synchrone">@synchrone</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/1663">#1663</a> *2015-01-26*
* Fixed remote context options on CodeCoverage by <strong><a href="https://github.com/synchrone">@synchrone</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/1664">#1664</a> *2015-01-26*
* <strong>[MongoDb]</strong> `seeNumElementsInCollection` method added by <strong><a href="https://github.com/sahanh">@sahanh</a></strong>
* <strong>[MongoDb]</strong> Added new methods: `grabCollectionCount`, `seeElementIsArray`, `seeElementIsObject` by <strong><a href="https://github.com/antoniofrignani">@antoniofrignani</a></strong>
* <strong>[WebDriver]</strong> Allow `selectOption()` to select options not inside forms by <strong><a href="https://github.com/n8whnp">@n8whnp</a></strong> See <a href="https://github.com/Codeception/Codeception/issues/1638">#1638</a>
* <strong>[FTP]</strong> Added support for sftp connections with an RSA SSH key by <strong><a href="https://github.com/mattvot">@mattvot</a></strong>.
* <strong>[PhpBrowser]</strong><strong>[WebDriver]</strong> allows to handle domain and path for cookies *2015-01-24*
* <strong>[CLI]</strong> Allow CLI module to handle nonzero response codes without failing by <strong><a href="https://github.com/DevShep">@DevShep</a></strong>
* <strong>[Yii2]</strong> Fix the bug with `session_id()`. See <a href="https://github.com/Codeception/Codeception/issues/1606">#1606</a> by <strong><a href="https://github.com/TriAnMan">@TriAnMan</a></strong>
* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> Fix double slashes in certain forms submitted by `submitForm` by <strong><a href="https://github.com/Revisor">@Revisor</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/1625">#1625</a>
* <strong>[Facebook]</strong> `grabFacebookTestUserId` method added by <strong><a href="https://github.com/ipalaus">@ipalaus</a></strong>
* Always eval error level settings passed from config file.


#### 2.0.9

* **Fixed Symfony 2.6 compatibility in Yaml::parse by <strong><a href="https://github.com/antonioribeiro">@antonioribeiro</a></strong>**
* Specific tests can be executed without adding .php extension by <strong><a href="https://github.com/antonioribeiro">@antonioribeiro</a></strong> See <a href="https://github.com/Codeception/Codeception/issues/1531">#1531</a> *2014-12-20*

Now you can run specific test using shorter format:

```
codecept run unit tests/unit/Codeception/TestLoaderTest
codecept run unit Codeception
codecept run unit Codeception:testAddCept

codecept run unit Codeception/TestLoaderTest.php
codecept run unit Codeception/TestLoaderTest
codecept run unit Codeception/TestLoaderTest.php:testAddCept
codecept run unit Codeception/TestLoaderTest:testAddCept

codecept run unit tests/unit/Codeception
codecept run unit tests/unit/Codeception:testAddCept
codecept run unit tests/unit/Codeception/TestLoaderTest.php
codecept run unit tests/unit/Codeception/TestLoaderTest.php:testAddCept
codecept run unit tests/unit/Codeception/TestLoaderTest
codecept run unit tests/unit/Codeception/TestLoaderTest:testAddCept
```

* <strong>[Db]</strong> Remove table constraints prior to drop table in clean up for SqlSrv by <strong><a href="https://github.com/jonsa">@jonsa</a></strong> *2014-12-20*
* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> Fixed: submitForm with form using site-root relative paths may fail depending on configuration <a href="https://github.com/Codeception/Codeception/issues/1510">#1510</a> by <strong><a href="https://github.com/zbateson">@zbateson</a></strong> *2014-12-20*
* <strong>[WebDriver]</strong><strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> `seeInField` method to work for radio, checkbox and select fields. Thanks to <strong><a href="https://github.com/zbateson">@zbateson</a></strong> *2014-12-20*
* Fixed usage of `--no-colors` flag by <strong><a href="https://github.com/zbateson">@zbateson</a></strong>. Issue <a href="https://github.com/Codeception/Codeception/issues/1562">#1562</a> *2014-12-20*
* <strong>[REST]</strong> sendXXX methods now encode objects implementing JsonSerializable interfaces. *2014-12-19*
* <strong>[REST]</strong> added methods to validate JSON structure *2014-12-19*

<strong>[seeResponseJsonMatchesJsonPath]</strong>(http://codeception.com/docs/modules/REST#seeResponseJsonMatchesJsonPath) validates response JSON against <strong>[JsonPath]</strong>(http://goessner.net/articles/JsonPath/).
Usage of JsonPath requires library `flow/jsonpath` to be installed.

<strong>[seeResponseJsonMatchesXpath]</strong>(http://codeception.com/docs/modules/REST#seeResponseJsonMatchesXpath) validates response JSON against XPath.
It converts JSON structure into valid XML document and executes XPath for it.

<strong>[grabDataFromResponseByJsonPath]</strong>(http://codeception.com/docs/modules/REST#grabDataFromResponseByJsonPath) method was added as well to grab data JSONPath.

* <strong>[REST]</strong> `grabDataFromJsonResponse` deprecated in favor of `grabDataFromResponseByJsonPath` *2014-12-19*
* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> fixed `Unreachable field` error while filling [] fields in input and textarea fields. Issues <a href="https://github.com/Codeception/Codeception/issues/1585">#1585</a> <a href="https://github.com/Codeception/Codeception/issues/1602">#1602</a> *2014-12-18*


#### 2.0.8

* Dependencies updated: facebook/php-webdriver 0.5.x and guzzle 5 *2014-11-17*
* <strong>[WebDriver]</strong> Fixed selectOption and (dont)seeOptionIsSelected for multiple radio button groups by <strong><a href="https://github.com/MasonM">@MasonM</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/1467">#1467</a> *2014-11-18*
* <strong>[WebDriver]</strong><strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> Clicked submit button can be specified as 3rd parameter in `submitForm` method by <strong><a href="https://github.com/zbateson">@zbateson</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/1518">#1518</a>
* <strong>[ZF1]</strong> Format ZF response to Symfony\Component\BrowserKit\Response by <strong><a href="https://github.com/MOuli90">@MOuli90</a></strong>. Fixes <a href="https://github.com/Codeception/Codeception/issues/1476">#1476</a>
* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> fixed `grabValueFrom` method by <strong><a href="https://github.com/zbateson">@zbateson</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/1512">#1512</a>
* <strong>[Db]</strong> Fixed Postgresql error with schemas by <strong><a href="https://github.com/rafreis">@rafreis</a></strong>. Fixes <a href="https://github.com/Codeception/Codeception/issues/970">#970</a>
* <strong>[PhpBrowser]</strong> Fix for meta refresh tags with interval by <strong><a href="https://github.com/zbateson">@zbateson</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/1515">#1515</a>
* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> Fixed: `grabTextFrom` doesn't work with regex by <strong><a href="https://github.com/zbateson">@zbateson</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/1519">#1519</a>
* Cest tests support multiple `<strong><a href="https://github.com/before">@before</a></strong>` and `<strong><a href="https://github.com/after">@after</a></strong>` annotations. Thanks to <strong><a href="https://github.com/draculus">@draculus</a></strong> and <strong><a href="https://github.com/zbateson">@zbateson</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/1517">#1517</a>
* <strong>[FTP]</strong> Stops test execution on failed connection by <strong><a href="https://github.com/yegortokmakov">@yegortokmakov</a></strong>
* <strong>[AMQP]</strong> Fix for purging queues on initialization stage. Check for open channel is not needed and it prevents from cleaning queue by <strong><a href="https://github.com/yegortokmakov">@yegortokmakov</a></strong>
* CodeCoverage remote context configuration added by <strong><a href="https://github.com/synchrone">@synchrone</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/1524">#1524</a> [Documentation updated](http://codeception.com/docs/11-Codecoverage#Remote-Context-Options)
* Implemented better descriptions for error exception. Fix <a href="https://github.com/Codeception/Codeception/issues/1503">#1503</a>
* Added `c3_url` option to code coverage settings. `c3_url` allows to explicitly set url for index file with c3 included. See <a href="https://github.com/Codeception/Codeception/issues/1024">#1024</a>
* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> Fixed selecting checkbock in a group of checkboxes <a href="https://github.com/Codeception/Codeception/issues/1535">#1535</a>
* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> submitForm sends default values for radio buttons and checkboxes by <strong><a href="https://github.com/zbateson">@zbateson</a></strong>. Fixes <a href="https://github.com/Codeception/Codeception/issues/1507">#1507</a> *2014-11-3*
* <strong>[ZF2]</strong> Close any open ZF2 sessions by <strong><a href="https://github.com/FnTm">@FnTm</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/1486">#1486</a> *2014-10-24*


#### 2.0.7

* <strong>[Db]</strong> Made the postgresql loader load $$ syntax correctly by <strong><a href="https://github.com/rtuin">@rtuin</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/1450">#1450</a> *2014-10-12*
* <strong>[Yii1]</strong> fixed syntax typo in Yii1 Connector by <strong><a href="https://github.com/xt99">@xt99</a></strong> *2014-10-12*
* <strong>[PhpBrowser]</strong><strong>[WebDriver]</strong> amOnUrl method added for opening absolute urls. This behavior taken from amOnPage method, initially introduced in 2.0.6 *2014-10-12*
* Fixed usage of whitespaces in wantTo. See <a href="https://github.com/Codeception/Codeception/issues/1456">#1456</a> *2014-10-12*
* <strong>[WebDriver]</strong><strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> fillField is matching element by name, then by CSS. Fixes <a href="https://github.com/Codeception/Codeception/issues/1454">#1454</a> *2014-10-12*


#### 2.0.6

* Fixed list of executed suites while running included suites by <strong><a href="https://github.com/gureedo">@gureedo</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/1427">#1427</a> *2014-10-08*
* <strong>[Frameworks]</strong> support files and request names containing square brackets, dots, spaces. See <a href="https://github.com/Codeception/Codeception/issues/1438">#1438</a>. Thanks to <strong><a href="https://github.com/kkopachev">@kkopachev</a></strong> *2014-10-08*
* <strong>[PhpBrowser]</strong> array of files for Guzzle to support format: file<strong>[foo]</strong><strong>[bar]</strong>. Fixes <a href="https://github.com/Codeception/Codeception/issues/342">#342</a> by <strong><a href="https://github.com/kkopachev">@kkopachev</a></strong> *2014-10-07*
* Added strict mode for XML generation. *2014-10-06*

In this mode only standard JUnit attributes are added to XML reports, so special attributes like `feature` won't be included. This improvement fixes usage XML reports with Jenkins <a href="https://github.com/Codeception/Codeception/issues/1408">#1408</a>
  To enable strict xml generation add to `codeception.yml`:

```
settings:
    strict_xml: true
```

* Fixed retrieval of codecoverage reports on remote server <a href="https://github.com/Codeception/Codeception/issues/1379">#1379</a> *2014-10-06*
* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> Malformed XPath won't throw fatal error, but makes tests fail. Fixes <a href="https://github.com/Codeception/Codeception/issues/1409">#1409</a> *2014-10-06*
* Build command generates actors for included suites. See <a href="https://github.com/Codeception/Codeception/issues/1267">#1267</a> *2014-10-03*
* CodeCoverage throws error on unsuccessful requests (status code is not 200) to remote server. Fixes <a href="https://github.com/Codeception/Codeception/issues/346">#346</a> *2014-10-03*
* CodeCoverage can be disabled per suite. Fix <a href="https://github.com/Codeception/Codeception/issues/1249">#1249</a> *2014-10-02*
* Fix: --colors and --no-colors options can override settings from config *2014-10-02*
* <strong>[WebDriver]</strong> `waitForElement*` methods accept strict locators and WebDriverBy as parameters. See <a href="https://github.com/Codeception/Codeception/issues/1396">#1396</a> *2014-09-29*
* <strong>[PhpBrowser]</strong> `executeInGuzzle` uses baseUrl set from config. Fixes <a href="https://github.com/Codeception/Codeception/issues/1416">#1416</a> *2014-09-29*
* <strong>[Laravel4]</strong> fire booted callbacks between requests without kernel reboot. Fixes <a href="https://github.com/Codeception/Codeception/issues/1389">#1389</a>, See <a href="https://github.com/Codeception/Codeception/issues/1415">#1415</a> *2014-09-29*
* <strong>[WebDriver]</strong><strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> `submitForm` accepts forms with document-relative paths. Fixes <a href="https://github.com/Codeception/Codeception/issues/1274">#1274</a> *2014-09-28*
* <strong>[WebDriver]</strong><strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> Fixed <a href="https://github.com/Codeception/Codeception/issues/1381">#1381</a>: `fillField` fails for a form without a submit button by <strong><a href="https://github.com/zbateson">@zbateson</a></strong> *2014-09-28*
* <strong>[PhpBrowser]</strong><strong>[WebDriver]</strong> `amOnPage` now accepts absolute urls *2014-09-27*
* <strong>[Db]</strong> ignore errors from lastInsertId by <strong><a href="https://github.com/tomykaira">@tomykaira</a></strong> *2014-09-27*
* <strong>[WebDriver]</strong> saves HTML snapshot on fail *2014-09-27*
* <strong>[WebDriver]</strong> fixed <a href="https://github.com/Codeception/Codeception/issues/1392">#1392</a>: findField should select by id, css, then fall back on xpath *2014-09-27*
* <strong>[WebDriver]</strong> Don't check for xpath if css selector is set, by <strong><a href="https://github.com/Danielss89">@Danielss89</a></strong> <a href="https://github.com/Codeception/Codeception/issues/1367">#1367</a> *2014-09-27*
* Specify actor class for friends by <strong><a href="https://github.com/tomykaira">@tomykaira</a></strong>. See <a href="https://github.com/Codeception/Codeception/issues/1394">#1394</a> *2014-09-27*


#### 2.0.5

* <strong>[Queue]</strong> module added with AWS, Iron.io, and Beanstalkd support. Thanks to <strong><a href="https://github.com/nathanmac">@nathanmac</a></strong> *2014-08-21*
* <strong>[WebDriver]</strong> fixed attachFile error message when file does not exists <a href="https://github.com/Codeception/Codeception/issues/1333">#1333</a> by <strong><a href="https://github.com/TroyRudolph">@TroyRudolph</a></strong> *2014-08-21*
* <strong>[Asserts]</strong> Added assertLessThan and assertLessThanOrEqual by <strong><a href="https://github.com/Great">@Great</a></strong>-Antique *2014-08-21*
* <strong>[ZF2]</strong> fixed <a href="https://github.com/Codeception/Codeception/issues/1283">#1283</a> by <strong><a href="https://github.com/dkiselew">@dkiselew</a></strong> *2014-08-21*
* Added functionality to Stub to allow ConsecutiveCallStub. See <a href="https://github.com/Codeception/Codeception/issues/1300">#1300</a> by <strong><a href="https://github.com/nathanmac">@nathanmac</a></strong> *2014-08-21*
* Cest generator inserts  object into _before and _after methods by <strong><a href="https://github.com/TroyRudolph">@TroyRudolph</a></strong> *2014-08-21*
* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> Fixed <a href="https://github.com/Codeception/Codeception/issues/1304">#1304</a> - ->selectOption() fails if two submit buttons present by <strong><a href="https://github.com/fdjohnston">@fdjohnston</a></strong> *2014-08-21*
* <strong>[WebDriver]</strong><strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> seeNumberOfElements method added by <strong><a href="https://github.com/dynasource">@dynasource</a></strong> *2014-08-21*
* recursive runner for included suites by <strong><a href="https://github.com/dynasource">@dynasource</a></strong> *2014-08-21*
* Disabled skipped/incomplete tests logging in jUnit logger for smooth Bamboo integration by <strong><a href="https://github.com/ayastreb">@ayastreb</a></strong> *2014-08-21*


#### 2.0.4

* <strong>[Laravel4]</strong> More functional, cli, and api tests added to demo application <https://github.com/Codeception/sample-l4-app> *2014-08-05*
* Fix: GroupManager uses DIRECTORY_SEPARATOR for loaded tests *2014-08-05*
* <strong>[Laravel4]</strong> Uses `app.url` config value for creating requests. Fixes <a href="https://github.com/Codeception/Codeception/issues/1095">#1095</a> *2014-08-04*
* <strong>[Laravel4]</strong> `seeAuthenticated` / `dontSeeAuthenticated` assertions added to check that current user is authenticated *2014-08-04*
* <strong>[Laravel4]</strong> `logout` action added *2014-08-04*
* <strong>[Laravel4]</strong> `amLoggedAs` can login user by credentials *2014-08-04*
* <strong>[Laravel4]</strong> Added `amOnRoute`, `amOnAction`, `seeCurrentRouteIs`, `seeCurrentActionIs` actions *2014-08-04*
* <strong>[Laravel4]</strong> Added `haveEnabledFilters` and `haveDisabledFilters` actions to toggle filters in runtime *2014-08-04*
* <strong>[Laravel4]</strong> Added `filters` option to enable filters on testing *2014-08-04*
* <strong>[REST]</strong> seeResponseContainsJson should not take arrays order into account. See <a href="https://github.com/Codeception/Codeception/issues/1268">#1268</a> *2014-08-04*
* <strong>[REST]</strong> grabDataFromJsonResponse accepts empty path to return entire json response *2014-08-04*
* <strong>[REST]</strong> print_r replaced with var_export for better output on json comparison <a href="https://github.com/Codeception/Codeception/issues/1210">#1210</a> *2014-08-02*
* <strong>[REST]</strong> Reset request variables in the before hook by <strong><a href="https://github.com/brutuscat">@brutuscat</a></strong> <a href="https://github.com/Codeception/Codeception/issues/1232">#1232</a> *2014-08-01*
* <strong>[Db]</strong> Oci driver for oracle database by <strong><a href="https://github.com/Sikolasol">@Sikolasol</a></strong> <a href="https://github.com/Codeception/Codeception/issues/1234">#1234</a> <a href="https://github.com/Codeception/Codeception/issues/1243">#1243</a> *2014-08-01*
* <strong>[Laravel4]</strong> Unit testing and test environment are now configurable <a href="https://github.com/Codeception/Codeception/issues/1255">#1255</a> by <strong><a href="https://github.com/ipalaus">@ipalaus</a></strong> *2014-08-01*
* <strong>[Laravel4]</strong> Fixed Cest testing when using Laravel's Auth <a href="https://github.com/Codeception/Codeception/issues/1258">#1258</a> by <strong><a href="https://github.com/ipalaus">@ipalaus</a></strong> *2014-08-01*
* FIX <a href="https://github.com/Codeception/Codeception/issues/948">#948</a> code coverage HTML: uncovered files missing by <strong><a href="https://github.com/RLasinski">@RLasinski</a></strong> *2014-07-26*
* <strong>[Laravel4]</strong> project root relative config parameter added by <strong><a href="https://github.com/kernio">@kernio</a></strong> *2014-07-26*

#### 2.0.3

* <strong>[Symfony2]</strong> Symfony3 directory structure implemented by <strong><a href="https://github.com/a6software">@a6software</a></strong> *2014-07-21*
* Console: printing returned values *2014-07-21*
* FIX: TAP and JSON logging should not be started when no option --json or --tap provided *2014-07-21*
* <strong>[Doctrine2]</strong> FIXED: persisting transaction between Symfony requests *2014-07-19*
* <strong>[Symfony2]</strong> created Symfony2 connector with persistent services *2014-07-19*
* <strong>[Doctrine2]</strong> implemented haveInRepository method (previously empty) *2014-07-17*
* When Cest fails <strong><a href="https://github.com/after">@after</a></strong> method wont be executed *2014-07-17*
* <strong>[Laravel4]</strong> App is rebooted before each test. Fixes <a href="https://github.com/Codeception/Codeception/issues/1205">#1205</a> *2014-07-15*
* FIX: `codeception/specify` is now available in phar *2014-07-14*
* FIX: Interactive console works again *2014-07-09*
* `_bootstrap.php` is now loaded before `beforeSuite` module hooks.
* FIX: Suite `_bootstrap.php` was loaded after test run by <strong><a href="https://github.com/samdark">@samdark</a></strong> *2014-07-11*

#### 2.0.2

* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> correctly send values when there are several submit buttons in a form by <strong><a href="https://github.com/TrustNik">@TrustNik</a></strong> *2014-07-08*
* <strong>[REST]</strong> fixed connection with framework modules *2014-07-06*
* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> `checkOption` now works for checkboxes with array[] name by <strong><a href="https://github.com/TrustNik">@TrustNik</a></strong>
* <strong>[PhpBrowser]</strong><strong>[Frameworks]</strong> FIX: `seeOptionIsSelected` and `dontSeeOptionIsSelected` now works with radiobuttons by <strong><a href="https://github.com/TrustNik">@TrustNik</a></strong> *2014-07-05*
* <strong>[FTP]</strong> MODULE ADDED by <strong><a href="https://github.com/nathanmac">@nathanmac</a></strong> *2014-07-05*
* <strong>[WebDriver]</strong> Enabled remote upload of local files to remote selenium server by <strong><a href="https://github.com/motin">@motin</a></strong> *2014-07-05*
* <strong>[Yii2]</strong><strong>[Yii1]</strong> disabled logging for better functional test performance

#### 2.0.1

* <strong>[Phalcon1]</strong> Fixed connector
* <strong>[WebDriver]</strong> added seeInPageSource and dontSeeInPageSource methods
* <strong>[WebDriver]</strong> see method now checks only for visible BODY element by <strong><a href="https://github.com/artyfarty">@artyfarty</a></strong>
* <strong>[REST]</strong> added Bearer authentication by <strong><a href="https://github.com/dizews">@dizews</a></strong>
* removed auto added submit buttons in forms previously used as hook for DomCrawler
* BUGFIX: PHP 5.4.x compatibility fixed. Sample error output: 'Method WelcomeCept.php does not exist' <a href="https://github.com/Codeception/Codeception/issues/1084">#1084</a> <a href="https://github.com/Codeception/Codeception/issues/1069">#1069</a> <a href="https://github.com/Codeception/Codeception/issues/1109">#1109</a>
* Second parameter of Cest method is treated as scenario variable on parse. Fix <a href="https://github.com/Codeception/Codeception/issues/1058">#1058</a>
* prints raw stack trace including codeception classes in -vvv mode
* screenshots on fail are saved to properly named files <a href="https://github.com/Codeception/Codeception/issues/1075">#1075</a>
* <strong>[Symfony2]</strong> added debug config option to switch debug mode by <strong><a href="https://github.com/pmcjury">@pmcjury</a></strong>

#### 2.0.0

* renamed `_logs` dir to `_output` by default
* renamed `_helpers` dir to `_support` by default
* Guy renamed to Tester
* Bootstrap command got 3 installation modes: default, compat, setup
* added --coverage-text option


#### 2.0.0-RC2

* removed fabpot/goutte, added Guzzle4 connector
* group configuration can accept groups by patterns


#### 2.0.0-RC

* <strong>[WebDriver]</strong> makeScreenshot does not use filename of a test
* added `grabAttributeFrom`
* seeElement to accept attributes in second parameter: seeElement('input',['name'=>'login'])


#### 2.0.0-beta

* executeInGuzzle is back in PhpBrowser
* environment can be accessed via ->env in test
* before/after methods of Cest can take  object
* moved logger to extension
* bootstrap files are loaded before suite only
* extension can reconfigure global config
* removed RefactorAddNamespace and Analyze commands
* added options to set output files for xml, html reports, and coverage
* added extension to rerun failed tests
* webdriver upgraded to 0.4
* upgraded to PHPUnit 4

