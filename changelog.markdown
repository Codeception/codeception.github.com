---
layout: page
title: Codeception Changelog
---

<div class="alert alert-warning">Download specific version at <a href="/builds">builds page</a></div>

# Changelog

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
