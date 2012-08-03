---
layout: page
title: Codeception Documentation
---

# Documentation

This Documentation represents the last stable release of Codeception. 
Docs for older versions are listed below:

* [Codeception 1.0.14](https://github.com/Codeception/Codeception/tree/1.0.14/docs)

### Guides

Guides will walk you though the basic concepts of testing to the full understanding knowlegde of Codeception.
Everything you want to know about Codeception can be found in Guides.

* [Introduction](/docs/01-Introduction) - all about testing: acceptance, unit, and functional tests explained.
* [Getting Started](/docs/02-GettingStarted) - setting up and writing a first test with Codeception
* [Modules](/docs/03-Modules) - understanding modules and helpers
* [Acceptance Tests](/docs/04-AcceptanceTests) - writing Selenium and PhpBrowser accetance tests.
* [Functional Tests](/docs/05-FunctionalTests) - writing functional tests for popular PHP frameworks.
* [Unit Tests in Scenarios](/docs/06-UnitTestsScenarios) - unit testing in scenarios proof of concept.
* [Unit Tests Practice](/docs/07-UnitTestsPractice) - practical approach to unit testing in scenario manner.
* [Data](/docs/08-Data) - repopulation of database, cleaning up data, using fixtures, etc.

### Reference

References explains API of verious parts of Codeception. Look for them if you forgot something.

* [Commands](/docs/reference/commands) - explains usage of Codecption console utility.
* [Configuration](/docs/reference/configuration) - explains basics of suites and modules configuration.
* PhpDocummentor2 Integration
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
* [symfony](/docs/modules/symfony) - wraper for [symfony 1.x](http://symfony-project.org) functional test
* [Kohana](/docs/modules/Kohana) 
* [Social Engine](/docs/module/SocialEngine) - ZF module adopted for SE

#### Unit Testing

Basically you could use PHPUnit tests for unit testing. But Codeception scenario-driven unit tests are much powerful )

* [Unit](/docs/modules/unit) - everything for unit testing.

#### API Testing

* [REST](/docs/modules/REST) - testing REST Web services (can be tested inside framework)
* [SOAP](/docs/modules/SOAP) - testing SOAP WSDL web-services (can be tested inside framework)

#### Database Testing

* [Db](/docs/modules/Db) - use to test changes in database
* [Doctrine2](/docs/modules/doctrine2) - test database managed by [Doctrine2](http://www.doctrine-project.org/) ORM
* [Doctrine](docs/modules/doctrine) - test database managed by [Doctrine](http://www.doctrine-project.org/) 1.x ORM

