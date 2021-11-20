---
layout: post
title: "Drive your Browser Tests with Codeception"
date: 2017-07-11 01:03:50
---

In last few weeks Codeception received updates aimed to empower acceptance testing. 
We try to make PHP a better place for browser tests. As you know, QA engineers often prefer other languages like Java or Python for test automation. But PHP is not that bad by itself, it is simpler, it is faster in most cases, it has great IDEs. And for sure, we have Codeception. With it you can write the most complex acceptance tests in a simple scenario-driven manner.

So what was added in the last release? 

## RunProcess

[RunProcess extension](https://codeception.com/extensions#RunProcess) was introduced.
Use it to easily start/stop Selenium Server, ChromeDriver, or other required services for a test suite. 

Enable it in suite config or in environment:

```yaml
# acceptance.suite.yml
extensions:
    enabled:
        - Codeception\Extension\RunProcess:
            - php -S 127.0.0.1:8000
            - java -jar selenium-server.jar

# or inside environment config
# in this case, run tests as
#
# codecept run --env selenium
env:
  selenium:
    extensions:
        enabled:
            - Codeception\Extension\RunProcess:
                - php -S 127.0.0.1:8000
                - java -jar selenium-server.jar           
```

Depending on the environment (dev host, CI server) you can easily switch setups if you use environment configs.

## SmartWaits

This is the new unique feature of Codeception which incorporates [implicit waits](https://www.seleniumhq.org/docs/04_webdriver_advanced.jsp#implicit-waits). By itself, the implicit wait was available in Codeception with `wait: ` option in WebDriver config. However, it was not usable, because by design it slowed down test execution. In this release, we introduce the **SmartWait concept**. Implicit waits are used only when they are really needed and disabled for all other cases. This makes tests extremely stable and fast. 

Thus, a test won't fail if expected element didn't yet appear on a page but waits for it a few seconds more. Just set `wait: 5` to WebDriver config to try it and [read the documentation](https://codeception.com/docs/03-AcceptanceTests#SmartWait).

## Customization

Codeception took to much of browser control. Let give it back to you.
With `start: false` option you can disable autostart browser before a test, and create a browser session manually. Codeception doesn't provide actions to start browser session inside a test (because it is supposed you already have one in a test), but you can write a custom method in a helper:

```php
<?php
// support/Helper/Acceptance.php:
// 
public function startBrowser()
{
    $this->getModule('WebDriver')->_initializeSession();
}

public function changeBrowser($browserName)
{
    $this->getModule('WebDriver')->_restart(['browser' => $browser]);
}

public function closeBrowser()
{
    $this->getModule('WebDriver')->_closeSession();
}
```

Then these methods can be used inside a test. 

```php
<?php
// I prepare something for a test
$I->startBrowser();
// I do something inside a browser
$I->closeBrowser();
```

If you use [BrowserStack](https://www.browserstack.com/) you can use this features to set a test name dynamically to [capabilities](https://www.browserstack.com/automate/capabilities). Here is how can you do it in Acceptance Helper:

```php
<?php
// inside Helper\Acceptance
// 
public function _before(TestInterface $test)
{
    $webDriver = $this->getModule('WebDriver');
    $name = $test->getMetadata()->getName();
    $webDriver->_capabilities(function($currentCapabilities) use ($name) {
        $currentCapabilities['name'] = $name;
        return new DesiredCapabilities($currentCapabilities);
    });    
    $webDriver->_initializeSession();
}
```
Please don't forget to set `start: false` in config option, so browser wouldn't be started twice!

## @prepare

What if you need to change the configuration for a specific test? 
Let's say you want to run all tests in Firefox but this specific one in Chrome? Or something like that. 

We added new annotation `@prepare` which can be used in Cest and Test formats. It will execute a method which can change the configuration before the module is called.

```php
<?php
/**
 * @prepare switchToFirefox
 */
public function testSomethingInFirefox(AcceptanceTester $I)
{
    $I->amOnPage('/');
    $I->click('Detect Browser');
    $I->see('Firefox');
}

protected function switchToFirefox(\Codeception\Module\WebDriver $webDriver)
{
    $webDriver->_reconfigure(['browser' => 'firefox']);
}
```

This `@prepare` can be used not only for browser tests but everywhere. Use it wisely!

---

Is that all? Almost.

We also updated WebDriver docs to include more options for [Local Testing](https://codeception.com/docs/modules/WebDriver#Local-Testing), like ChromeDriver. We also published a [reference on running Chrome in Headless mode](https://phptest.club/t/how-to-run-headless-chrome-in-codeception/1544).

Update to the latest `2.3.4` version to try all the new features.

We worked hard to bring all this stuff to you. Now is your turn: please help to spread the word and encourage more of your colleagues to use PHP and Codeception for web testing. Setting up Codeception for web tests nowadays is as simple as running:

```
codecept init acceptance
```

Happy testing!