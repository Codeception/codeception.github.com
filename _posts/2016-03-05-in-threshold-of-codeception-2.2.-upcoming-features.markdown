---
layout: post
title: "In The Threshold of Codeception 2.2. Upcoming Features"
date: 2016-03-05 01:03:50
---

Codeception 2.2 is going to land in nearest weeks. We planned to release it much earlier, but as we are not bound to specific date, we decided to work more on improvements and include the most tasty ones in next release. In this and following blogposts we will review the most significant of upcoming features. So take a look what we prepared for you.

We don't plan any major breaking changes in this release. However, we will remove deprecations, as you may know we display deprecation warnings in output, so this break should be at least predictable.

### PHPUnit5 support

Yes, Codeception is finally will unlock it's dependency on PHPUnit 4.8 so you could receive the latest stable versions of PHPUnit. As you may know PHPUnit 5.x has much better support of PHP7, so anyone who develop using the latest version of PHP should use it. But wait, it's not the feature of Codeception 2.2 itself! Codeception 2.1.7 will be released with PHPUnit 5.x support as well.

### Test Dependencies

Finally `@depends` annotation works as you might expected it to. The hardest thing about dependencies is that PHPUnit does nothing to organize dependent tests in a right order:

> PHPUnit supports the declaration of explicit dependencies between test methods. Such dependencies do not define the order in which the test methods are to be executed but they allow the returning of an instance of the test fixture by a producer and passing it to the dependent consumers.

So their usage in Codeception was useless, especially if you were executing tests in random order with `shuffle: true` configuration. Some test frameworks, like minitest from Ruby run tests in shuffle by default. On the contrary PHPUnit restricts that, test with `@depends` annotation must be be executed after the test it relies on. It actually requires you to declare dependent tests in the same file and use the exact order of test execution.

Codeception takes the exact `@depends` annotation, reorders tests so dependent tests always will executed after the tests they rely on. This will work for Cest and Test formats both. And you can actually declare dependencies for tests in other files. Be sure, they will be taken, executed in the right order, and if a test fails its dependencies will be skipped. This is likely improve acceptance testing. If login test doesn't pass, you shouldn't even try to launch all other tests with authorization required.

Here is the annotation format to use to declare dependencies. It should be {fullClassName}:{testName}

```
@depends UserCest:login
@depends App\Service\UserTest:create
```

Unlike PHPUnit, you can't pass data between dependent tests. Alternatively you can use Helpers or `Codeception\Util\Fixtures` class to store shared data.

### Params

This lines are written just in the same time as corresponding pull request is merged:

![](/images/params_screenshot.png)

Codeception 2.2 will allow you to use parameter in configuration files populated from environment variables, yaml configs or .env files. You can use parametrized vars in suite configs, by wrapping them in `%` placeholder, and adding one or several parameter providers using the `params` key in global config:

```yaml
params: [env] # get prameters from environment vars
```

You can use Symfony-style `.yml` files, Laravel-style `.env`, or `.ini` files to receive params.

This feature would be useful if you want to share database configuration with application and tests. This will especially be useful if you use some sort of credentials passed via environment vars. For instance, if you use cloud testing services, you can set login and password with params and get the real values from environment:

```yaml
    modules:
       enabled:
          - WebDriver:
             url: http://mysite.com
             host: %SAUCE_USER%:%SAUCE_KEY%@ondemand.saucelabs.com'
             port: 80
             browser: chrome
             capabilities:
                 platform: 'Windows 10'
```

### Conflicts

This is possibly a breaking feature which was announced in Codeception 2.1 but never worked the way it supposed to be. So let's talk about it once again. A friendly reminder, if you use config like this:

```yaml
modules:
    enabled: [PhpBrowser, Laravel5, WebDriver]
```

you will have problems in Codeception 2.2, if you didn't have them earlier. Basically the issue here, that those modules provide pretty the same API but different backends for test executions. So it's hard to tell from config, will this tests be executed as Laravel functional tests, as acceptance tests in real browser, or HTML-scrapper called PhpBrowser. We have lots of issues, when developers misuse those modules, trying to include everything in one config, and we can't help them besides the good advice to choose one module of one kind.

To avoid this confusion we introduced Conflicts API. Module can declare conflict for modules of the same API, and `ConfigurationException` will be thrown if you try to use them in group.

But what if you *really* need to use Laravel5 module along with, let's say, WebDriver? Don't worry, partially loaded modules won't get into conflict. The most common use case is using Laravel ORM methods to create-delete data for acceptance test. In this case you don't need to load all actions of Laravel5 module but only those related to ORM: 

```yaml
modules:
    enabled:
        - WebDriver:
            url: http://localhost
            browser: firefox
        - Laravel5:
            part: orm
```

this way you receive `haveRecord`, `seeRecord`, `grabRecord`, `have`, `haveMultiple` methods running though Eloquent but `amOnPage`, `see`, etc will be executed through WebDriver.

If you were mixing WebDriver with PhpBrowser in order to use REST API inside acceptance tests, you can still have it. Don't enable PhpBrowser but set it as dependent module for REST:

```yaml
modules:
    enabled:
        - WebDriver
            url: http://localhost/
            browser: firefox
        - REST
            url: http://localhost/api
            depends: PhpBrowser
```

### ...and much more to come

Sure, that was not everything what is coming in 2.2! Stay tuned for new cool announcements, which will be posted soon. We will describe new modules, new test formats, and new features! Stay tuned.