---
layout: page
title: Codeception for Symfony
hero: symfony_hero.html
---

## Install

Install latest stable Codeception via Composer:

```bash
composer require codeception/codeception --dev
```

## Setup

It is recommended to have unit and functional testing set up per each bundle and acceptance tests for set globally. Unit and Functional tests will check that each bundle work as expected while acceptance tests will check the UI and work of a system as a whole. 

### Project Setup

Codeception should be installed globally for a project. To start please run

```
php bin/codecept bootstrap --empty
```

which creates `codeception.yml` and `tests` directory. There are no test suites in `tests` directory. 

### Acceptance Testing

For UI testing you will have to create first suite for acceptance tests:

```
php bin/codecept g:suite acceptance
```

This will create `acceptance.suite.yml` and `acceptance` folder inside `tests`. Acceptance tests should be configured to work with Selenium WebDriver to test application inside a real browser. 

```yaml
class_name: AcceptanceTester
modules:
    enabled:
        - WebDriver:
            url: 'https://localhost/' # put your local url
            browser: firefox
        - \Helper\Acceptance            
```

Browser can be specified as `firefox`, `chrome`, `phantomjs`, or others. 

Acceptance tests should be described in Cest format. Run code generator 

```
php bin/codecept g:cest acceptance UserCest
```

to generate very first test `tests/acceptance/UserCest.php`. Each method of a class (except `_before` and `_after`) is a test. Tests use `$I` object (instance of `AcceptanceTester` class) to perform actions on a webpage. Methods of `AcceptanceTester` are proxified to corresponding modules, which in current case is `WebDriver`. 

To generate method stubs for `AcceptanceTester`.

```
php bin/codecept build
```

### BDD

If you prefer to describe application with feature files, Codeception can turn them to acceptance tests. It is recommended to store feature files in `features` directory (like it does Behat) but symlinking it to `tests/acceptance/features` so they can be treated as tests too. 

```
ln -s $PWD/features tests/acceptance
```

Codeception allows to combine tests written in different formats. If are about to wirite a regression test it probably should not be described as a product's feature. That's why feature-files is subset of all acceptance tests, and they are stored in subfolder of `tests/acceptance`. 

There is no standard Gherkin steps built in. By writing your feature files you can get code snippets which should be added to `AcceptanceTester` class. 

```
php bin/codecept gherkin:snippets
```

## Bundle Setup

Each bundle should have its own Codeception setup. To have test configuration for `AppBundle` you should run:

```
php bin/codecept bootstrap --empty src/AppBundle --namespace AppBundle
```

This will create `tests` dir inside `src/AppBundle`. 

### Unit Testing



### Functional Testing

There is no need to use `WebTestCase` 