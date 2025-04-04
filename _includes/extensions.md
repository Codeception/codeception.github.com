# Official Extensions

## DotReporter

[See Source](https://github.com/Codeception/Codeception/blob/main/ext/DotReporter.php)

DotReporter provides less verbose output for test execution.
Like PHPUnit printer it prints dots "." for successful tests and "F" for failures.

![](https://cloud.githubusercontent.com/assets/220264/26132800/4d23f336-3aab-11e7-81ba-2896a4c623d2.png)

```bash
 ..........
 ..........
 ..........
 ..........
 ..........
 ..........
 ..........
 ..........

Time: 2.07 seconds, Memory: 20.00MB

OK (80 tests, 124 assertions)
```


Enable this reporter with `--ext option`

```
codecept run --ext DotReporter
```

Failures and Errors are printed by a standard Codeception reporter.
Use this extension as an example for building custom reporters.



## Logger

[See Source](https://github.com/Codeception/Codeception/blob/main/ext/Logger.php)

Log suites/tests/steps using Monolog library.
Monolog should be installed additionally by Composer.

```
composer require monolog/monolog
```

Codeception's core/internal stuff is logged into `tests/_output/codeception.log`.
Test suites' steps are logged into `tests/_output/<test_full_name>-<rotation_date>.log`.

To enable this module add to your `codeception.yml`:

``` yaml
extensions:
    enabled: [Codeception\Extension\Logger]
```

#### Config

* `max_files` (default: 3) - how many log files to keep




## Recorder

[See Source](https://github.com/Codeception/Codeception/blob/main/ext/Recorder.php)

Saves a screenshot of each step in acceptance tests and shows them as a slideshow on one HTML page (here's an [example](https://codeception.com/images/recorder.gif)).
Works only for suites with WebDriver module enabled.

The screenshots are saved to `tests/_output/record_*` directories, open `index.html` to see them as a slideshow.

#### Installation

Add this to the list of enabled extensions in `codeception.yml` or `Acceptance.suite.yml`:

``` yaml
extensions:
    enabled:
        - Codeception\Extension\Recorder
```

#### Configuration

* `delete_successful` (default: true) - delete screenshots for successfully passed tests  (i.e. log only failed and errored tests).
* `module` (default: WebDriver) - which module for screenshots to use. Set `AngularJS` if you want to use it with AngularJS module. Generally, the module should implement `Codeception\Lib\Interfaces\ScreenshotSaver` interface.
* `ignore_steps` (default: []) - array of step names that should not be recorded (given the step passed), * wildcards supported. Meta steps can also be ignored.
* `success_color` (default: success) - bootstrap values to be used for color representation for passed tests
* `failure_color` (default: danger) - bootstrap values to be used for color representation for failed tests
* `error_color` (default: dark) - bootstrap values to be used for color representation for scenarios where there's an issue occurred while generating a recording
* `delete_orphaned` (default: false) - delete recording folders created via previous runs
* `include_microseconds` (default: false) - enable microsecond precision for recorded step time details

#### Examples:

``` yaml
extensions:
    enabled:
        - Codeception\Extension\Recorder:
            module: AngularJS # enable for Angular
            delete_successful: false # keep screenshots of successful tests
            ignore_steps: [have, grab*]
```
#### Skipping recording of steps with annotations

It is also possible to skip recording of steps for specified tests by using the `@skipRecording` annotation.

```php
/**
* @skipRecording login
* @skipRecording amOnUrl
*\/
public function testLogin(AcceptanceTester $I)
{
    $I->login();
    $I->amOnUrl('https://codeception.com');
}
```



## RunBefore

[See Source](https://github.com/Codeception/Codeception/blob/main/ext/RunBefore.php)

Extension for execution of some processes before running tests.

Processes can be independent and dependent.
Independent processes run independently of each other.
Dependent processes run sequentially one by one.

Can be configured in suite config:

```yaml
# acceptance.suite.yml
extensions:
    enabled:
        - Codeception\Extension\RunBefore:
            - independent_process_1
            -
                - dependent_process_1_1
                - dependent_process_1_2
            - independent_process_2
            -
                - dependent_process_2_1
                - dependent_process_2_2
```

HINT: you can use different configurations per environment.



## RunFailed

[See Source](https://github.com/Codeception/Codeception/blob/main/ext/RunFailed.php)

Saves failed tests into `tests/_output/failed` in order to rerun failed tests.

To rerun failed tests just run the `failed` group:

```
php codecept run -g failed
```

To change failed group name add:
```
--override "extensions: config: Codeception\Extension\RunFailed: fail-group: another_group1"
```
Remember: If you run tests and they generated custom-named fail group, to run this group, you should add override too

**This extension is enabled by default.**

``` yaml
extensions:
    enabled: [Codeception\Extension\RunFailed]
```

On each execution failed tests are logged and saved into `tests/_output/failed` file.



## RunProcess

[See Source](https://github.com/Codeception/Codeception/blob/main/ext/RunProcess.php)

Extension to start and stop processes per suite.
Can be used to start/stop selenium server, chromedriver, [MailCatcher](https://mailcatcher.me/), etc.
Each command is executed only once, at the beginning of the test suite. To execute a command before each test, see [Before/After Attributes](https://codeception.com/docs/AdvancedUsage#BeforeAfter-Attributes).

Can be enabled in suite config:

```yaml
# Acceptance.suite.yml
extensions:
    enabled:
        - Codeception\Extension\RunProcess:
            - chromedriver
```

Multiple parameters can be passed as array:

```yaml
# Acceptance.suite.yml
extensions:
    enabled:
        - Codeception\Extension\RunProcess:
            - php -S 127.0.0.1:8000 -t tests/data/app
            - java -jar ~/selenium-server.jar
```

In the end of a suite all launched processes will be stopped.

To wait for the process to be launched use `sleep` option. In this case you need configuration to be specified as object:

```yaml
extensions:
    enabled:
        - Codeception\Extension\RunProcess:
            0: java -jar ~/selenium-server.jar
            1: mailcatcher
            sleep: 5 # wait 5 seconds for processes to boot
```

HINT: You can use different configurations per environment.



## SimpleReporter

[See Source](https://github.com/Codeception/Codeception/blob/main/ext/SimpleReporter.php)

This extension demonstrates how you can implement console output of your own.
Recommended to be used for development purposes only.



