---
layout: post
title: "Codeception 2.1 RC"
date: 2015-06-19 01:03:50
---

Today we are announcing Codeception 2.1 RC release. We are almost ready to release a stable version, however we'd like to receive more feedback before the actual launch. We encourage you to install the latest 2.1 release and try it on your projects. Migrations should be painless if you follow the upgrade instructions. Here are the things you should keep in mind while upgrading:

* REST, SOAP and Doctrine2 modules rely on another module which should be explicitly set via `depends` config param. For instance, you should pass `Laravel5` module if you do API testing with `REST` module

```
modules:
    enabled: [REST, Laravel5]
    config:
        REST:
            depends: Laravel5
```

* Actor classes are moved to `_support` directory. Please **delete all previously generated actor classes** which reside in suites directories. New `AcceptanceTester`, `FunctionalTester`, `UnitTester` classes are expected to be extended with custom methods.
* Modules that share similar interfaces like `WebDriver`, `PhpBrowser`, and framework modules won't run together. You should avoid enabling more than one of those modules in suite config to avoid confusion. If you enable `Laravel5` and `WebDriver` and execute `$I->amOnPage('/')` you can't be sure how this command is exected - will it open a browser window using WebDriver protocol, or it will be handled by Laravel framework directly.
*  Cept files should avoid setting their metadata via `$scenario` methods. Instead of calling `$scenario->skip()`, `$scenario->group('firefox')`, etc, it is recommended to set scenario settings with annotations `// @skip`, `// @group firefox`. With this change you can now skip tests based on a condition: `if (substr(PHP_OS, 0, 3) == 'Win') $scenario->skip()`.
* Kohana, Symfony1, Doctrine1 modules were removed and they reside in separate repositories in [Codeception organization](https://github.com/Codeception) on GitHub. 

That should be enough to have everything upgraded. We already prepared [updated guides](https://github.com/Codeception/Codeception/tree/master/docs) (they didn't change from 2.1.0-beta). Please try new Codeception and tell us your opinion in comments or on [GitHub](https://github.com/Codeception/Codeception/issues).

Codeception 2.1 can be used with latest Guzzle 6 (as well as previous Guzzle releases). That's the most important change since the beta version. See [the changelog](https://github.com/Codeception/Codeception/blob/master/CHANGELOG.md) for more info. We are preparing site updates and demo apps to reflect new changes. Stay tuned!


[Download 2.1.0-rc phar](http://codeception.com/releases/2.1.0-rc1/codecept.phar)

via `composer.json`:

```
"codeception/codeception": "2.1.0-rc1"
```