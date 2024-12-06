---
layout: doc
title: Commands - Codeception - Documentation
---

# Console Commands

## Run

Executes tests.

Usage:

* `codecept run Acceptance`: run all acceptance tests
* `codecept run tests/Acceptance/MyCest.php`: run only MyCest
* `codecept run Acceptance MyCest`: same as above
* `codecept run Acceptance MyCest:myTestInIt`: run one test from a Cest
* `codecept run Acceptance MyCest:myTestInIt#1`: run one example or data provider item by number
* `codecept run Acceptance MyCest:myTestInIt#1-3`: run a range of examples or data provider items
* `codecept run Acceptance MyCest:myTestInIt@name.*`: run data provider items with matching names
* `codecept run Acceptance checkout.feature`: run feature-file
* `codecept run Acceptance -g slow`: run tests from *slow* group
* `codecept run Unit,Functional`: run only unit and functional suites

Verbosity modes:

* `codecept run -v`:
* `codecept run --steps`: print step-by-step execution
* `codecept run -vv`: print steps and debug information
* `codecept run --debug`: alias for `-vv`
* `codecept run -vvv`: print Codeception-internal debug information

Load config:

* `codecept run -c path/to/another/config`: from another dir
* `codecept run -c another_config.yml`: from another config file

Override config values:

* `codecept run -o "settings: shuffle: true"`: enable shuffle
* `codecept run -o "settings: lint: false"`: disable linting

Run with specific extension

* `codecept run --ext Recorder` run with Recorder extension enabled
* `codecept run --ext DotReporter` run with DotReporter printer
* `codecept run --ext "My\Custom\Extension"` run with an extension loaded by class name

Full reference:
{% highlight yaml %}
Arguments:
 suite                 suite to be tested
 test                  test to be run

Options:
 -o, --override=OVERRIDE Override config values (multiple values allowed)
 --config (-c)         Use custom path for config
 --report              Show output in compact style
 --html                Generate html with results (default: "report.html")
 --xml                 Generate JUnit XML Log (default: "report.xml")
 --phpunit-xml         Generate PhpUnit XML Log (default: "phpunit-report.xml")
 --no-redirect         Do not redirect to Composer-installed version in vendor/codeception
 --colors              Use colors in output
 --no-colors           Force no colors in output (useful to override config file)
 --silent              Only outputs suite names and final results. Almost the same as `--quiet`
 --steps               Show steps in output
 --debug (-d)          Alias for `-vv`
 --bootstrap           Execute bootstrap script before the test
 --coverage            Run with code coverage (default: "coverage.serialized")
 --coverage-html       Generate CodeCoverage HTML report in path (default: "coverage")
 --coverage-xml        Generate CodeCoverage XML report in file (default: "coverage.xml")
 --coverage-text       Generate CodeCoverage text report in file (default: "coverage.txt")
 --coverage-phpunit    Generate CodeCoverage PHPUnit report in file (default: "coverage-phpunit")
 --coverage-cobertura  Generate CodeCoverage Cobertura report in file (default: "coverage-cobertura")
 --no-exit             Don't finish with exit code
 --group (-g)          Groups of tests to be executed (multiple values allowed)
 --skip (-s)           Skip selected suites (multiple values allowed)
 --skip-group (-x)     Skip selected groups (multiple values allowed)
 --env                 Run tests in selected environments. (multiple values allowed, environments can be merged with ',')
 --fail-fast (-f)      Stop after nth failure (defaults to 1)
 --no-rebuild          Do not rebuild actor classes on start
 --help (-h)           Display this help message.
 --quiet (-q)          Do not output any message. Almost the same as `--silent`
 --verbose (-v|vv|vvv) Increase the verbosity of messages: `v` for normal output, `vv` for steps and debug, `vvv` for Codeception-internal debug
 --version (-V)        Display this application version.
 --ansi                Force ANSI output.
 --no-ansi             Disable ANSI output.
 --no-interaction (-n) Do not ask any interactive question.
 --seed                Use the given seed for shuffling tests

{% endhighlight %}




## Build

Generates Actor classes (initially Guy classes) from suite configs.
Starting from Codeception 2.0 actor classes are auto-generated. Use this command to generate them manually.

* `codecept build`
* `codecept build path/to/project`




## GherkinSteps

Prints all steps from all Gherkin contexts for a specific suite

{% highlight yaml %}
codecept gherkin:steps Acceptance

{% endhighlight %}




## Clean

Recursively cleans `output` directory and generated code.

* `codecept clean`




## GenerateGroup

Creates empty GroupObject - extension which handles all group events.

* `codecept g:group Admin`



## DryRun

Shows step by step execution process for scenario driven tests without actually running them.

* `codecept dry-run Acceptance`
* `codecept dry-run Acceptance MyCest`
* `codecept dry-run Acceptance checkout.feature`
* `codecept dry-run tests/Acceptance/MyCest.php`




## CompletionFallback



## GenerateTest

Generates skeleton for Unit Test that extends `Codeception\TestCase\Test`.

* `codecept g:test Unit User`
* `codecept g:test Unit "App\User"`



## GenerateCest

Generates Cest (scenario-driven object-oriented test) file:

* `codecept generate:cest suite Login`
* `codecept g:cest suite subdir/subdir/testnameCest.php`
* `codecept g:cest suite LoginCest -c path/to/project`
* `codecept g:cest "App\Login"`




## GenerateHelper

Creates empty Helper class.

* `codecept g:helper MyHelper`
* `codecept g:helper "My\Helper"`




## Console

Try to execute test commands in run-time. You may try commands before writing the test.

* `codecept console Acceptance` - starts acceptance suite environment. If you use WebDriver you can manipulate browser with Codeception commands.



## GeneratePageObject

Generates PageObject. Can be generated either globally, or just for one suite.
If PageObject is generated globally it will act as UIMap, without any logic in it.

* `codecept g:page Login`
* `codecept g:page Registration`
* `codecept g:page Acceptance Login`



## GenerateStepObject

Generates StepObject class. You will be asked for steps you want to implement.

* `codecept g:stepobject Acceptance AdminSteps`
* `codecept g:stepobject Acceptance UserSteps --silent` - skip action questions




## GherkinSnippets

Generates code snippets for matched feature files in a suite.
Code snippets are expected to be implemented in Actor or PageObjects

Usage:

* `codecept gherkin:snippets Acceptance` - snippets from all feature of acceptance tests
* `codecept gherkin:snippets Acceptance/feature/users` - snippets from `feature/users` dir of acceptance tests
* `codecept gherkin:snippets Acceptance user_account.feature` - snippets from a single feature file
* `codecept gherkin:snippets Acceptance/feature/users/user_accout.feature` - snippets from feature file in a dir



## SelfUpdate

Auto-updates phar archive from official site: 'https://codeception.com/codecept.phar' .

* `php codecept.phar self-update`

@author Franck Cassedanne <franck@cassedanne.com>



## GenerateEnvironment

Generates empty environment configuration file into envs dir:

 * `codecept g:env firefox`

Required to have `envs` path to be specified in `codeception.yml`



## Init



## GenerateFeature

Generates Feature file (in Gherkin):

* `codecept generate:feature suite Login`
* `codecept g:feature suite subdir/subdir/login.feature`
* `codecept g:feature suite login.feature -c path/to/project`





## Bootstrap

Creates default config, tests directory and sample suites for current project.
Use this command to start building a test suite.

By default it will create 3 suites **Acceptance**, **Functional**, and **Unit**.

* `codecept bootstrap` - creates `tests` dir and `codeception.yml` in current dir.
* `codecept bootstrap --empty` - creates `tests` dir without suites
* `codecept bootstrap --namespace Frontend` - creates tests, and use `Frontend` namespace for actor classes and helpers.
* `codecept bootstrap --actor Wizard` - sets actor as Wizard, to have `TestWizard` actor in tests.
* `codecept bootstrap path/to/the/project` - provide different path to a project, where tests should be placed




## GenerateSnapshot

Generates Snapshot.
Snapshot can be used to test dynamical data.
If suite name is provided, an actor class will be included into placeholder

* `codecept g:snapshot UserEmails`
* `codecept g:snapshot Products`
* `codecept g:snapshot Acceptance UserEmails`



## ConfigValidate

Validates and prints Codeception config.
Use it do debug Yaml configs

Check config:

* `codecept config`: check global config
* `codecept config Unit`: check suite config

Load config:

* `codecept config:validate -c path/to/another/config`: from another dir
* `codecept config:validate -c another_config.yml`: from another config file

Check overriding config values (like in `run` command)

* `codecept config:validate -o "settings: shuffle: true"`: enable shuffle
* `codecept config:validate -o "settings: lint: false"`: disable linting
* `codecept config:validate -o "reporters: report: \Custom\Reporter" --report`: use custom reporter




## GenerateSuite

Create new test suite. Requires suite name and actor name

* ``
* `codecept g:suite api` -> api + ApiTester
* `codecept g:suite integration Code` -> integration + CodeTester
* `codecept g:suite frontend Front` -> frontend + FrontTester




## GenerateScenarios

Generates user-friendly text scenarios from scenario-driven tests (Cest).

* `codecept g:scenarios Acceptance` - for all acceptance tests
* `codecept g:scenarios Acceptance --format html` - in html format
* `codecept g:scenarios Acceptance --path doc` - generate scenarios to `doc` dir



