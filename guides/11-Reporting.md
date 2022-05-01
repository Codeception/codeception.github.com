## Reporting

Clear reports gives a picture of the current state of the system. Which tests are passed, which tests are failed, and if failed what was the reason. Reports may vary on the level of detail and by the technical information collected. Codeception provides as built-in reporters and customizable API to create your own reporter.      

## CLI

The standard reporter you already is CLI reporter. It is great for writing and debugging tests as well, as checking the results on CI. On failure, CLI reporter prints a list of all failed tests, if test includes some valuable data like last send requests for REST module, it will also be printed under 'artifacts' section of a test.  

![](/images/codecept-cli.png)

To launch CLI reporter in minimal mode, simply execute tests:

```
php vendor/bin/codecept run 
```

To see step-by-step execution in a runtime use `--steps` flag:

```
php vendor/bin/codecept run --steps
```

To get additional information which may be handful for debugging tests use `--debug` flag. 
This flag is your best friend for writing new tests. 

```
php vendor/bin/codecept run --debug
```

More CLI options are available:

* Artifacts report can be disabled with `--no-artifacts` option.
* To explicitly enable ANSI colors use `--colors`, and `--no-colors` to disable them.
* Use `--silent` to get the minimal possible output

Codeception will exit with exit code 1 if tests are failed. 
This is how CI can mark the job as failed. 

## HTML

More information can be presented via HTML report. 

![](/images/codeception-html.png)

Run tests with `--html` flag to create html report

```
php vendor/bin/codecept run --html
```

HTML report is valuable to present for non-tech colleagues. If you create HTML reports on CI you need to store a report as artifact to display it after. Codeception generates a static HTML file so no additional web server is needed to show it.

## Testomat.io

While HTML report can be pretty good for a single test run, more advanced reporting can be enabled by using Testomat.io. Testomat.io is a SaaS service which can store and present reports, and could be used by developers, QAs and managers. It is a complete test management system, which allows you track the history of tests, detect flaky tests, and work on planning new tests.

Testomat.io reports are easy to set up and without storing artifacts on CI system. 

![](images/testomatio-report.png)

> 😻 Testomat.io is free for small teams, so you can use its reporting features with Codeception.

Testomat.io imports all tests into UI, so your managers, business analysts, and manual QAs can see all your unit, funcitonal, and acceptance tests listed in one place:

![](images/testomatio-import.png)

To start, create a new project at Testomat.io and import all your Codeception tests into it. Install testomatio packages for reporting and importing Codeception tests:

```
composer require testomatio/list-tests --dev
composer require testomatio/reporter --dev
```

Obtain API key from a newly created Testomat.io project and import tests:

```
TESTOMATIO={apiKey} php vendor/bin/list-tests tests
```

After tests imported you can get a complete report while executing them:

```
TESTOMATIO={apiKey} php vendor/bin/codecept run --ext "Testomatio\Reporter\Codeception"
```

Data from test runs will be sent to Testomat.io server and you will see tests statuses are reported in realtime. 

Testomat.io not only provides reports for test executions, it also collects historical data for tests, allows attaching tests to Jira issues, and provides useful analytics, and allows planning new tests.

Check an [Example Project](https://github.com/testomatio/examples/tree/master/codeception) to try it. 

## Recorder

By default Codeception saves the screenshot for a failed test for acceptance tests and show it in HTML report. However, can't be possible to understand cause of failure just by one screenshot. This is where Recorder extension is handy, it saves a screenshot after each step and shows them in a slideshow. 

![](https://codeception.com/images/recorder.gif)

Selenium WebDriver doesn't have a simple way to record a video of a test execution, so slideshow is the simplest solution you can use to debug your tests.

To use Recorder enable it as an extension inside config file:

```yml
extensions:
    enabled:
        - Codeception\Extension\Recorder
```
More config options are available on [Extension page](https://codeception.com/extensions#Recorder).

## XML

JUnit XML is a reporting standard for testing frameworks. CI platforms like Jenkins can visualize JUnit reports.

```
php vendor/bin/codecept run --xml
```

## Allure

![](images/codecept-allure.png)

[Allure](https://docs.qameta.io/allure/) is a popular open-source reporting tool. It can be paired with Codeception to get a detailed run report. Use [Allure extension](https://github.com/allure-framework/allure-codeception) to generate report which can be passed to Allure to display it.

## Custom Reporter

Custom reporter can be built as an [Extension](https://codeception.com/docs/08-Customization#Extension). Extension can listen to all test events and log data from them.
Look into the basic reporting extensions like [DotReporter](https://codeception.com/extensions#DotReporter) or [Logger](https://codeception.com/extensions#Logger) to learn how to build your own. 



