---
layout: page
title: Codeception Changelog
---

<div class="alert alert-warning">Download specific version at <a href="/builds">builds page</a></div>

# Changelog

#### 2.0.3

* <strong>Symfony2</strong> Symfony3 directory structure implemented by <strong><a href="https://github.com/a6software">@a6software</a></strong> *2014-07-21*
* Console: printing returned values *2014-07-21*
* FIX: TAP and JSON logging should not be started when no option --json or --tap provided *2014-07-21*
* <strong>Doctrine2</strong> FIXED: persisting transaction between Symfony requests *2014-07-19*
* <strong>Symfony2</strong> created Symfony2 connector with persistent services *2014-07-19*
* <strong>Doctrine2</strong> implemented haveInRepository method (previously empty) *2014-07-17*
* When Cest fails <strong><a href="https://github.com/after">@after</a></strong> method wont be executed *2014-07-17*
* <strong>Laravel4</strong> App is rebooted before each test. Fixes <a href="https://github.com/Codeception/Codeception/issues/1205">#1205</a> *2014-07-15*
* FIX: `codeception/specify` is now available in phar *2014-07-14*
* FIX: Interactive console works again *2014-07-09*
* `_bootstrap.php` is now loaded before `beforeSuite` module hooks.
* FIX: Suite `_bootstrap.php` was loaded after test run by <strong><a href="https://github.com/samdark">@samdark</a></strong> *2014-07-11*

#### 2.0.2

* <strong>PhpBrowser</strong><strong>Frameworks</strong> correctly send values when there are several submit buttons in a form by <strong><a href="https://github.com/TrustNik">@TrustNik</a></strong> *2014-07-08*
* <strong>REST</strong> fixed connection with framework modules *2014-07-06*
* <strong>PhpBrowser</strong><strong>Frameworks</strong> `checkOption` now works for checkboxes with array[] name by <strong><a href="https://github.com/TrustNik">@TrustNik</a></strong>
* <strong>PhpBrowser</strong><strong>Frameworks</strong> FIX: `seeOptionIsSelected` and `dontSeeOptionIsSelected` now works with radiobuttons by <strong><a href="https://github.com/TrustNik">@TrustNik</a></strong> *2014-07-05*
* <strong>FTP</strong> MODULE ADDED by <strong><a href="https://github.com/nathanmac">@nathanmac</a></strong> *2014-07-05*
* <strong>WebDriver</strong> Enabled remote upload of local files to remote selenium server by <strong><a href="https://github.com/motin">@motin</a></strong> *2014-07-05*
* <strong>Yii2</strong><strong>Yii1</strong> disabled logging for better functional test performance

#### 2.0.1

* <strong>Phalcon1</strong> Fixed connector
* <strong>WebDriver</strong> added seeInPageSource and dontSeeInPageSource methods
* <strong>WebDriver</strong> see method now checks only for visible BODY element by <strong><a href="https://github.com/artyfarty">@artyfarty</a></strong>
* <strong>REST</strong> added Bearer authentication by <strong><a href="https://github.com/dizews">@dizews</a></strong>
* removed auto added submit buttons in forms previously used as hook for DomCrawler
* BUGFIX: PHP 5.4.x compatibility fixed. Sample error output: 'Method WelcomeCept.php does not exist' <a href="https://github.com/Codeception/Codeception/issues/1084">#1084</a> <a href="https://github.com/Codeception/Codeception/issues/1069">#1069</a> <a href="https://github.com/Codeception/Codeception/issues/1109">#1109</a>
* Second parameter of Cest method is treated as scenario variable on parse. Fix <a href="https://github.com/Codeception/Codeception/issues/1058">#1058</a>
* prints raw stack trace including codeception classes in -vvv mode
* screenshots on fail are saved to properly named files <a href="https://github.com/Codeception/Codeception/issues/1075">#1075</a>
* <strong>Symfony2</strong> added debug config option to switch debug mode by <strong><a href="https://github.com/pmcjury">@pmcjury</a></strong>

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

* <strong>WebDriver</strong> makeScreenshot does not use filename of a test
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
