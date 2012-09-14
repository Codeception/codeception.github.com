---
layout: page
title: Codeception Commands
---

# Commands

Depending on version run Codeception console uitility in following way:

* `php codecept.phar run` - for downloaded phar executable.
* `codecept run` - for PEAR installation
* `php vendor/bin/codecept` -  for composer installation.

The commands listed below use PEAR installation as an example.

### Run

Executes Tests. 

#### Usage

* `codecept run` - executes all tests in all suites
* `codecept run suitename` - executes all test from this suite
* `codecept run suitename testnameTest.php` - executes one test of this suite (provide local path for suite directory). 

#### Options

* `--debug` - additional debug output will be printed.
* `--steps` - all performed actions will be printed to console.
* `--colors` - turn on colors (if disabled)
* `--silent` - don't show the progress output.
* `--report` - format results in report mode.
* `--no-exit` - don't provide exit codes on finish. This option may be useful for using Codeception with some CI servers like Bamboo.
* `--html` - generate html file with results. It will be stored as 'report.html' in tests/_log.
* `--xml` - generate report in JUnit format for CI services. It will be stored as 'report.xml' in tests/_log.
* `--tap` - generate report in TAP format. It will be stored as 'report.tap.log' in tests/_log.
* `--json` - generate report in Json format. It will be stored as 'report.json' in tests/_log.

### Boostrap

Creates default config, tests directory and sample suites for current project.
Use this command to start building a test suite.

#### Usage

* `codecept bootstrap`

### Generate Suite

Generates a new empty suite. You may generate new suite for integration tests, for testing different part of appications, etc.

#### Usage

* `codecept genrate:suite suitename guyname` - provide name of suite and name a Guy who will be used in tests.

Don't create two guys with the same name!

### Generate Cept

Generates new empty test file for acceptance and functional tests. Scenario-based test is called Cept, though.

#### Usage

* `codcept generate:cept suitename testname` - generates testnameCept.php inside the suite.
* `codecept generate:cept suitename subdir/subdir/testnameCept.php` - generates file in subdir/subdir of suite dir.

### Generate Cest

Generates new empty test file for scenario-based unit tests. This file format is called Cest = Cept + Test.

#### Usage

* `codcept generate:cest suitename testname` - generates testnameCest.php inside the suite.
* `codecept generate:cest suitename subdir/subdir/testnameCest.php` - generates file in subdir/subdir of suite dir.

### Generate Test

Generates new empty test file for PHPUnit unit test.

#### Usage

* `codcept generate:cest suitename testname` - generates testnameTest.php inside the suite.
* `codecept generate:cest suitename subdir/subdir/testnameTest.php` - generates file in subdir/subdir of suite dir.

### Generate Scenarios

Generates text representation for all tests in suite. They are called scenarios and stored as a text files in the `log` dir.

#### Usage

* `codecept generate:scenarios suitename` - generates for this suite.

### Analyze

Searches for all actions used in tests but not defined yet in modules. Asks to generate stub methods in helpers for corresponding steps.

#### Usage

* `codecept analyze suitename` - analyzes actions for suite.

