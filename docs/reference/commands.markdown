---
layout: page
title: Codeception Commands
---

# Commands

Depending on version run Codeception console uitility in following way:

* `php codecept.phar run` - for downloaded phar executable.
* `vendor/bin/codecept` -  for composer installation.
* `./codecept` - for cloned from GitHub.

The commands listed below use PHAR installation as an example.

### Run

Executes Tests. 

#### Usage

* `php codecept.phar run` - executes all tests in all suites
* `php codecept.phar run tests/suitename/testnameCept.php` - executes test by it's path.
* `php codecept.phar run tests/suitename/foldername` - executes tests from folder.
* `php codecept.phar run suitename` - executes all test from this suite
* `php codecept.phar run suitename testnameTest.php` - executes one test of this suite (provide local path for 
suite directory). 
* `php codecept.phar run -g admin` - executes tests by group.

#### Options

* `--debug` or `-d` - additional debug output will be printed.
* `--steps` - all performed actions will be printed to console.
* `--config` or `-c` - specify different path to config or project folder.
* `--colors` - turn on colors (if disabled)
* `--silent` - don't show the progress output.
* `--report` - format results in report mode.
* `--group` or `-g` - execute tests of a group (several options can be passed).
* `--no-exit` - don't provide exit codes on finish. This option may be useful for using Codeception with some CI servers like Bamboo.
* `--defer-flush` - don't flush output during ru
* `--html` - generate html file with results. It will be stored as 'report.html' in tests/_log.
* `--xml` - generate report in JUnit format for CI services. It will be stored as 'report.xml' in tests/_log.
* `--tap` - generate report in TAP format. It will be stored as 'report.tap.log' in tests/_log.
* `--json` - generate report in Json format. It will be stored as 'report.json' in tests/_log.
* `--coverage` - generate code coverage report (requires proper configuration). 

### Boostrap

Creates default config, tests directory and sample suites for current project.
Use this command to start building a test suite.

#### Usage

* `php codecept.phar bootstrap`

### Generate Suite

Generates a new empty suite. You may generate new suite for integration tests, for testing different part of appications, etc.

#### Usage

* `php codecept.phar generate:suite suitename guyname` - provide name of suite and name a Guy who will be used in tests.

Don't create two guys with the same name!

### Generate Cept

Generates new empty test file for acceptance and functional tests. Scenario-based test is called Cept, though.

#### Usage

* `php codecept.phar generate:cept suitename testname` - generates testnameCept.php inside the suite.
* `php codecept.phar generate:cept suitename subdir/subdir/testnameCept.php` - generates file in subdir/subdir of suite dir.

### Generate Cest

Generates new empty test file for scenario-based unit tests. This file format is called Cest = Cept + Test.

#### Usage

* `php codecept.phar generate:cest suitename testname` - generates testnameCest.php inside the suite.
* `php codecept.phar generate:cest suitename "\Namespace\Subnamespace\testnameCest.php"` - generates file in `Namespace/Subnamepace` of suite dir (according to PSR-0). Generated file will have a namespace defined.

### Generate Test

Generates new empty test file for Codeception powered unit test.

#### Usage

* `php codecept.phar generate:test suitename testname` - generates testnameTest.php inside the suite.
* `php codecept.phar generate:test suitename "\Namespace\Subnamespace\testnameTest.php"` - generates file in `Namespace/Subnamepace` of suite dir (according to PSR-0). Generated file will have a namespace defined.

### Generate Classical PHPUnit Test

Generates new empty test file for Codeception powered unit test.

#### Usage

* `php codecept.phar generate:phpunit suitename testname` - generates testnameTest.php inside the suite.
* `php codecept.phar generate:phpunit suitename "\Namespace\Subnamespace\testnameTest.php"` - generates file in `Namespace/Subnamepace` of suite dir (according to PSR-0). Generated file will have a namespace defined.


### Generate Scenarios

Generates text representation for all tests in suite. They are called scenarios and stored as a text files in the `log` dir.

#### Usage

* `php codecept.phar generate:scenarios suitename` - generates for this suite.

### Analyze

Searches for all actions used in tests but not defined yet in modules. Asks to generate stub methods in helpers for corresponding steps.

#### Usage

* `php codecept.phar analyze suitename` - analyzes actions for suite.

