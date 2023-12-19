---
layout: doc
title: Debugging - Codeception Docs
---



# Debugging

Writing a test is always the process of learning the code and the application.
It is ok, if a test can't be written from scratch or you don't understand the effects of the code. 
By looking into the following debugging practices you will learn how to get all required information inside a test to finish it.

## Re-Running Failed Tests

Codeception saves the list of failed tests. To re-run failed test run tests from `failed` group:

```php
php vendor/bin/codecept run -g failed
```

If no tests have failed this group will be empty.

## Output

Codeception provides `codecept_debug` function to print a debug output when running test. 
Think of it as `var_dump` but for testing:

```php
codecept_debug($user);
```

Unlinke var_dump, the output will be printed to screen only if tests are executed with `--debug` flag.

```
php vendor/bin/codecept run --debug
```

So it is safe to keep `codecept_debug` inside a test, it won't affect the code running on Continuous Integration server.

`codecept_debug` can be used in any place of your tests, but it is prohibited to use it in application code. 
This function is loaded only by Codeception, so the application may be broken trying to call this line.

Inside a [Helper](/docs/06-ModulesAndHelpers#Helpers) you can use analogs of this function to provide a debug output for a complex action. 


```php
// print variable from helper
$this->debug($response);

// print variable with a short comment
$this->debugSection('Response', $response);
```

Codeception Modules use debug output to give more information to user about the data used by a test. For instance, in debug mode you can see request and responses body when testing REST API.


## Pause

When running acceptance or functional test it might be needed to pause execution at one point to figure out what to do next. For instance, when interacting with a page in a web browser, you might need the execution to be paused to interact with elements on a page, discover proper locators, and next steps for the scenario. That's why Codeception has an interactive pause mode (powered by [PsySH](https://psysh.org)) which can be started by `codecept_pause` function or `$I->pause()`.

Writing a new acceptance from scratch can be more convenient if you hold a browser window open. It is recommended to start writing a new acceptance test with these two commands:

```php
$I->amOnPage('/');
$I->pause();
```

Interactive pause is launched only when `--debug ` option is enabled:

```
php vendor/bin/codecept run --debug
```

To launch interactive pause in a context when the `$I` object is not available, use `codecept_pause` function instead. To inspect local variables pass them into interactive shell using an array:

```php
$I->pause(['user' => $user])
// or
codecept_pause(['user' => $user]);
```


<div class="alert alert-warning"><a href="https://github.com/Codeception/codeception.github.com/edit/master/docs/Debugging.md"><strong>Improve</strong> this guide</a></div>
