---
layout: page
title: Codeception Documentation
---

# Documentation

This Documentation represents the last stable release of Codeception. 
Docs for older versions are listed below:

* [What's new in Codeception 1.1 and HOW TO UPGRADE](http://codeception.com/08-07-2012/major-codeception-update.html)
* [Codeception 1.0.14](https://github.com/Codeception/Codeception/tree/1.0.14/docs)

### Guides

Guides will walk you though the basic concepts of testing to the full understanding knowlegde of Codeception.
Everything you want to know about Codeception can be found in Guides.

* [Introduction](/docs/01-Introduction) - all about testing: acceptance, unit, and functional tests explained.
* [Getting Started](/docs/02-GettingStarted) - setting up and writing a first test with Codeception
* [Modules](/docs/03-Modules) - understanding modules and helpers
* [Acceptance Tests](/docs/04-AcceptanceTests) - writing Selenium and PhpBrowser accetance tests.
* [Functional Tests](/docs/05-FunctionalTests) - writing functional tests for popular PHP frameworks.
* [Unit Tests (Test)](/docs/06-UnitTests-TEST) - writing PHPUnit tests using Codeception helpers.
* [Unit Tests in Scenarios](/docs/07-UnitTestsScenarios) - unit testing in scenarios proof of concept.
* [Unit Tests Practice](/docs/08-UnitTests-CEST) - writing scenario-driven unit tests 
* [Data](/docs/09-Data) - repopulation of database, cleaning up data, using fixtures, etc.
* [Web Services](/docs/10-WebServices) - testing REST and SOAP WSDL webservices.

### Reference

References explains API of verious parts of Codeception. Look for them if you forgot something.

* [Commands](/docs/reference/commands) - explains usage of Codecption console utility.
* [Configuration](/docs/reference/configuration) - explains basics of suites and modules configuration.
* [Locator](/09-24-2012/locator.html) - locator class which simplifies building of complex XPath or CSS locators.
* [Xml Builder](/docs/reference/xmlbuilder) - building XMLs pragmatically.
* [Stubs](/docs/reference/stubs) - cool stub builder explained.

### Modules

Modules are used to test various parts of your application. There are plenty of those and many should arrive in a future. 
Choose the best module for your needs and see it's reference.

#### Testing Web Applications with Javascript

* [Selenium](/docs/modules/Selenium) - use *Selenium* server to run tests in browser.
* [Selenium2](/docs/modules/Selenium2)  - use *Selenium2* server to run tests in browser.
* [ZombieJS](/docs/modules/ZombieJS) - use *Zombie.js* backend to run tests without browser.

#### Testing Web Applications without Javascript

* [PhpBrowser](/docs/modules/PhpBrowser) - emulates browser usage by fetching and parsing html pages.

#### Testing Inside PHP Frameworks

* [Symfony2](/docs/modules/Symfony2) - wraper for [Symfony2](http://symfony.com) functional tests.
* [Zend Framework](/docs/modules/Zend) - wraper for [ZF](http://framework.zend.com) functional test.
* [symfony](/docs/modules/Symfony) - wraper for [symfony 1.x](http://symfony-project.org) functional test
* [Kohana](/docs/modules/Kohana) 
* [Social Engine](/docs/module/SocialEngine) - ZF module adopted for SE

Quick guide for [Zend Framework integration](http://codeception.com/01-27-2012/bdd-with-zend-framework.html).

#### Unit Testing

Basically you could use PHPUnit tests for unit testing. But Codeception scenario-driven unit tests are much powerful )

* [Unit](/docs/modules/Unit) - everything for unit testing.

#### API Testing

* [REST](/docs/modules/REST) - testing REST Web services (can be tested inside framework).
* [SOAP](/docs/modules/SOAP) - testing SOAP WSDL web-services (can be tested inside framework).

#### Storage Testing

* [Db](/docs/modules/Db) - use to test changes in database
* [Doctrine2](/docs/modules/Doctrine2) - test database managed by [Doctrine2](http://www.doctrine-project.org/) ORM.
* [Doctrine](docs/modules/Doctrine) - test database managed by [Doctrine](http://www.doctrine-project.org/) 1.x ORM.
* [Memcache](docs/modules/Memcache) - Memcache test via one of PECL extensions.
* [AMQP](docs/modules/AMQP) -  interacts with message broker software implementing Advanced Message Queuing Protocol, like **RabbitMQ**.

## Russian Docs

All russian posts was published on habrahabr website. It's more like announcements, then documentation, but anyway it's pretty useful to start with.

[Codeception Articles at Habrahabr](http://habrahabr.ru/tag/codeception)

Следите за новыми постами на Хабре!