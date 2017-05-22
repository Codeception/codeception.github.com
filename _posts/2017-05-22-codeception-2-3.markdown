---
layout: post
title: "Codeception 2.3"
date: 2017-05-22 01:03:50
---

Today the Codeception 2.3 sees the world. This is a stable release with almost no breaking changes but with new features you will probably like.


![](/images/codeception2.3_banner.png)


At first, we need to say "thank you" to [Luis Montealegre](https://github.com/MontealegreLuis) for bringing **PHPUnit 6.0 support** to Codeception. This is done by using class aliases so this doesn't break old PHPUnit versions, so as usual, Codeception can be used with PHPUnit 4.8 and higher. However, If you run PHP7+ and you experience PHPUnit issues in this release we recommend you to set `phpunit/phpunit` package to `^5.7.0` in your composer.json.

Supporting 3 major versions of PHPUnit may have its issues, so in next release, which is going to be 3.0 we will probably drop support for old PHPUnits and PHP < 7.

Ok, let's talk about other changes in this release!


## Installation Templates

Codeception is a wide-range testing framework and sometimes it is hard to get it configured for a specific case. Nevertheless, you need only acceptance testing Codeception will still install all 3 test suites for you. In 2.3 we prepared installation templates: customized setup wizards that can configure tests for your needs.

To setup Codeception for acceptance testing with browser only you can run this command

```
codecept init acceptance
```

After answering a few questions, you will be able to execute first browser test

![](/images/codecept_acceptance.gif)

The setup wizard will prepare only `acceptance` test suite with tests located in `tests` directory. Suite configuration will be stored in `codeception.yml`. 

**For QA engineers `codecept init acceptance` is a new convenient way to start end-to-end testing in PHP**.

We also included API and Unit templates for faster setup of REST API or unit tests:

```
codecept init api
codecept init unit
```

But the best thing about installation templates that they can be created by anyone! They can be placed inside a separate package and loaded by `init` command. A template class should be placed into `Codeception\Template` namespace and then it can be autoloaded. Installation templates are pretty simple, learn how to build your own by taking a look at [Acceptance template as an example](https://github.com/Codeception/Codeception/blob/master/src/Codeception/Template/Acceptance.php#L67).

## Configuration Improvements

#### Suites Inside Main Config

Suites can be defined inside main config:

```yaml
actor_suffix: Tester
paths:
    tests: .
    log: _output
    data: _data
    support: _support
suites:
    unit:
        path: .
        actor: UnitTester
        modules:
            enabled:
                - Asserts
```

A good option if you have a single suite.

#### Suite Paths

The suite can have its custom path (specified by `path`). From config above expects unit tests to be placed into the root directory, where codeception.yml is located (`path: tests: .` and `path: ``)

![selection_201](https://cloud.githubusercontent.com/assets/220264/25978631/1cda7ba6-36cc-11e7-9db1-035b13cab3d4.png)

#### Suites With No Actor

Suite can be defined without an actor, which is useful for unit testing

```yaml
paths:
    tests: tests
    log: tests/_output
    data: tests/_data
    support: tests/_support
    envs: tests/_envs
suites:
    unit:
        path: .
        modules:
            enabled:
                - Asserts
```

In this case, UnitTester won't be created, as well as `_generated/UnitActions`. However, such suites won't be able to have Cest and Cept files generated.

#### Naming Changes

`class_name` suite in suite config replaced with `actor`:

```
class_name: UnitTester => actor: UnitTester
```

`actor` from global config is replaced with `actor_suffix` config option (which makes more sense).

All these changes are backward compatible, so old values in config will work.

## Extensions

Dynamical loading of extensions was already with `--override` option but was not very usable. Now extensions can be loaded with `--ext` option:

```bash
codecept run --ext Recorder
```

or by providing a full class name

```
codecept run --ext "Codeception\Extension\Recorder"
```

This can be used to enable a custom reporter. For this reason, the new [DotReporter](http://codeception.com/extensions#DotReporter) has been added:

```
codecept run --ext DotReporter
```

![selection_205](https://cloud.githubusercontent.com/assets/220264/26132800/4d23f336-3aab-11e7-81ba-2896a4c623d2.png)

## Db Populator

From the early days of Codeception we had the Db module which was trying to do its best to populate database and clean up it between tests. However, parsing all possible SQL dialects and running them through PHP was not very effective. What if you could use native Database tools to import data instead of doing it from PHP? Why not!

In Codeception 2.3 we recommend to specify a command to load a database in `populator` option of Db module:


```yaml
 modules:
    enabled:
       - Db:
          dsn: 'mysql:host=localhost;dbname=testdb'
          user: 'root'
          password: ''
          cleanup: true # run populator before each test
          populate: true # run populator before all test
          populator: 'mysql -u $user $dbname < tests/_data/dump.sql'
```

This approach is system-dependent, you can't use the same config on Windows and Nix systems, but is much faster. Thanks [Mauro Asprea @brutuscat](https://github.com/brutuscat) for this feature.

### Db module defaults

Important notice: we changed defaults for Db module, so **`cleanup` and `populate` options are disabled** by default. They were quite dangerous in use, so we decided that you need to set them explicitly in Db module config.

---

Codeception 2.2.12 has been released as well.
See complete [changelog](http://codeception.com/changelog) for all notable changes.

---

P.S. Codeception is seeking for Symfony module maintainer. If you use Codeception with Symfony and you'd like to improve it, please contact us at `team@codeception.com`. 
Maintainer responsibilities are: review issues, pull requests, update symfony demo app and so on. Take a part in project development and make open source brighter! 