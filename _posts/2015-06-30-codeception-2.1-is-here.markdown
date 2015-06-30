---
layout: post
title: "Codeception 2.1 Is Here"
date: 2015-06-30 01:03:50
---

We are finally ready to show you the Codeception 2.1. Since RC we stabilized its codebase, and we encourage you to start all your new projects with Codeception 2.1. As well as migrate old ones. 

If you didn't track for the changes in master we will list all the new features here:

* We added [Recorder](https://github.com/Codeception/Codeception/tree/master/ext#codeceptionextensionrecorder) extension, which is probably the most fancy feature you may try. Using it you can record test execution history by saving a screenshot of each step. This is handy for running tests on CI, debugging tests executed via *PhantomJS* or showing nice reports to your boss.

 ![recorder](http://codeception.com/images/recorder.gif)

* **Updated to Guzzle 6**. Codeception can now work both with Guzzle v5 and Guzzle v6. PhpBrowser chooses right connector depending on Guzzle version installed.
* **PSR-4**: all support classes moved to `tests/_support` by default. Actors, Helpers, PageObjects, StepObjects, GroupObjects to follow PSR-4 naming style. New `AcceptanceTester`, `FunctionalTester`, `UnitTester` classes are expected to be extended with custom methods. For instance, you can define some common behaviors there. For instance, it is a good idea to place `login` method into  the actor class:

{% highlight php %}
<?php
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    public function login()
    {
       $this->amOnPage('/login');
       $this->fillField('name', 'jon');
       $this->fillField('password', '123345');
       $this->click('Login');
    }
}
?>
{% endhighlight %}

* **Dependency Injection**: support classes can be injected into tests. Support classes can be injected into each other too.

{% highlight php %}
<?php
class UserCest 
{
  // inject page objects into Cests
  function updatePassword(\Page\User $page, AcceptanceTester $I)
  {
      $page->openProfile();
      $page->editProfile();
      $I->fillField($page->oldPasswordField, '123456');
      $I->fillField($page->newPasswordField, '654321');
      $I->fillField($page->passwordFieldRepeat, '654321');
      $I->click($page->saveBtn);
      $I->see('Password has been updated');
  }

  // inject step object into Cest
  function adminUpdatePassword(\Step\Admin $I)
  {
      $I->enterAdminArea();
      $I->changePassword('654321');
      $I->see('Password has been updated');
  }
}
?>
{% endhighlight %}

* **Module config simplified**: Modules can be configured in `enabled` section of suite config. Take a look of this sample declaration of Api suite, there is no `config` section inside modules.

```
modules:
    enabled:
        - WebDriver:
            url: http://codeception.com
            browser: firefox
        - \Helper\Acceptance
```
* **Dependencies**: module can explicitly define dependencies and expect their injection. REST, SOAP and Doctrine2 modules rely on another module which should be explicitly set via `depends` config param. 

```
class_name: ApiTester
modules:
    enabled:
        - REST:
            url: https://api.github.com/
            depends: PhpBrowser           
        - \Helper\Api
```
As you can see, you don't need to specify `PhpBrowser` in  `enabled` section, you can set it only via `depends`.

* **Conflicts**: module can define conflicts with each other. Modules that share similar interfaces like `WebDriver`, `PhpBrowser`, and framework modules won't run together. You should avoid enabling more than one of those modules in suite config to avoid confusion. If you enable `Laravel5` and `WebDriver` and execute `$I->amOnPage('/')` you can't be sure how this command is exected - will it open a browser window using WebDriver protocol, or it will be handled by Laravel framework directly.

* **Current** modules, environment, and test name can be received in scenario.

{% highlight php %}
<?php
$scenario->current('name'); // returns current test name
$scenario->current('modules'); // returns current modules
$scenario->current('env'); // returns environment

// can be used like this
if ($scenario->current('env') == 'firefox') {
  // do something for firefox only
}
// naming screenshot
$I->makeScreenshot($scenario->current('name').'_screenshot.png');
?>
{% endhighlight %}


* **Environment Matrix**: You can run tests combining several environments by separating their names by comma:

```
codecept run --env dev,phantom --env dev,chrome --env dev,firefox
```

Environments can now be stored in separate configuration files in `tests/_envs` dir created with `generate:environment` command:

```
tests/_envs
|── chrome.yml
|── phantom.yml
|── firefox.yml
|── dev.yml
```

*  Cept files should avoid setting their metadata via `$scenario` methods. Instead of calling `$scenario->skip()`, `$scenario->group('firefox')`, etc, it is recommended to set scenario settings with annotations `// @skip`, `// @group firefox`. However, you can use `$scenario->skip` whenever you need to do it on some condition, like 

{% highlight php %}
<?php
if (substr(PHP_OS, 0, 3) == 'Win') $scenario->skip()
?>
{% endhighlight %}

* Improved HTML reports
![html report](/images/html-report.png)


* **Modules can be partially loaded**. If you need only some actions to be included into tester objects. For instance, you want to have REST API tests with Laravel5 module. In this case you probably don't want methods from Laravel module like `amOnPage` or `see` to be included into the `ApiTester` as they interact with HTML pages, which we are not supposed to use. But you still need Laravel ORM methods like `seeRecord` to verify that changes were saved to database. In this case you can enable only ORM methods of Laravel5 module.

```
modules:
    enabled: 
        - Laravel5:
            part: ORM
        - REST:
            part: Json
            depends: Laravel5
```

As for REST module you can load methods only for API format you are using. You can choose either XML or Json, so only methods for Json or XML will be loaded.

* Whenever you have steps grouped inside actor class, pageobject, or stepobject, you can the step executed with its substeps in console or HTML report. 
![html report](/images/substeps.png)

And lots of other notable improvements which you can see in [changelog](https://github.com/Codeception/Codeception/blob/master/CHANGELOG.md). 

Starting from Codeception 2.1 we **recommend using Cest** as a default format for all scenario-driven acceptance and functional, or api tests. Guides were rewritten to reflect new improved approaches to testing that you should practice by using Codeception. 

## Upgrading

* It is pretty easy to upgrade from 2.0. The only thing you should start with is to rebuild your actor classes by running `codecept build` command. The old actor classes (`*Tester` or `*Guy`) in suite directories should be deleted manually.
* REST, SOAP, Doctrine2 module will need to be configured to use a dependent module as it was shown above. You will get a detailed exception with configuration example once you execute tests with those modules.
* Helpers, PageObjects, StepObjects are expected to follow PSR-4 standard and use namespaces. It is recommended to rename classes to replace suffixes with namespaces, like `UserPage` => `Page\User`. However, those changes are **not required**, so you can keep your support objects without changes.

---

If you are using 2.0 and you won't plan to upgrade in nearest future, you can still use releases from 2.0 branch. Minor fixes and improvements will still be accepted there. Also the site will contain documentation for 2.0 and 2.1 versions.

Try Codeception 2.1 today by installing it via Composer:

```
composer require "codeception/codeception:*" --dev
```

or by downloading it as [Phar archive](http://codeception.com/codecept.phar)

And provide a feedback!