---
layout: page
title: Codeception Changelog
---

<div class="alert alert-warning">Download specific version at <a href="/builds">builds page</a></div>

# Changelog

#### 2.0.9

* **Fixed Symfony 2.6 compatibility in Yaml::parse by <strong><a href="https://github.com/antonioribeiro">@antonioribeiro</a></strong>**
* Specific tests can be executed without adding .php extension by <strong><a href="https://github.com/antonioribeiro">@antonioribeiro</a></strong> See <a href="https://github.com/Codeception/Codeception/issues/1531">#1531</a> *2014-12-20*

Now you can run specific test using shorter format:

```
codecept run unit tests/unit/Codeception/TestLoaderTest
codecept run unit Codeception
codecept run unit Codeception:testAddCept

codecept run unit /var/www/myapp.dev/vendor/codeception/codeception/tests/unit/Codeception
codecept run unit /var/www/myapp.dev/vendor/codeception/codeception/tests/unit/Codeception:testAddCept

codecept run unit Codeception/TestLoaderTest.php
codecept run unit Codeception/TestLoaderTest
codecept run unit Codeception/TestLoaderTest.php:testAddCept
codecept run unit Codeception/TestLoaderTest:testAddCept

codecept run unit /var/www/myapp.dev/vendor/codeception/codeception/tests/unit/Codeception/TestLoaderTest.php
codecept run unit /var/www/myapp.dev/vendor/codeception/codeception/tests/unit/Codeception/TestLoaderTest.php:testAddCept
codecept run unit /var/www/myapp.dev/vendor/codeception/codeception/tests/unit/Codeception/TestLoaderTest
codecept run unit /var/www/myapp.dev/vendor/codeception/codeception/tests/unit/Codeception/TestLoaderTest:testAddCept

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

`seeResponseJsonMatchesJsonPath` validates response JSON against <strong>[JsonPath]</strong>(http://goessner.net/articles/JsonPath/).
Usage of JsonPath requires library "flow/jsonpath" to be installed.

`seeResponseJsonMatchesXpath` validates response JSON against XPath.
It converts JSON structure into valid XPath document and executes XPath for it.

`grabDataFromResponseByJsonPath` method was added as well to grab data JSONPath.

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
