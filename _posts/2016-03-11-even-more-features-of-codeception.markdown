---
layout: post
title: "Even More Features of Codeception 2.2"
date: 2016-03-10 01:03:50
---

Today we continue to show you new features of Codeception 2.2, planned to release this March.
In previous post we've got you acquainted with [Test Dependencies, Params, and Conflicts](http://codeception.com/03-05-2016/codeception-2.2.-upcoming-features.html). This post will continue this overview, and we will start with some nice modules, which might be useful to you. 

As you know, in Codeception we try to help developers and testers share their experience by providing set of shared pieces, and not to reinvent the wheel. Modules play exactly that role: you just include modules to fit your project, and write your tests, concentrating on its business logic, and not on implementation. 90% test steps in functional and acceptance tests are covered with out modules. So what do we have prepared for 2.2?

### DataFactory

This module should solve problem of generating and populating data for tests. Right now we have [Db module](http://codeception.com/docs/modules/Db), [MongoDb](http://codeception.com/docs/modules/MongoDb) with really limited functionality, methods like `haveRecord`, `seeRecord` in various frameworks, and [Sequence module](http://codeception.com/docs/modules/Sequence) for generating unique keys for data. However, they didn't provide any way to generate data needed exactly for a particular test. 

DataFactory module should solve this with fixture generators, called factories. The original idea take from popular Ruby gem **FactoryGirl** and implemented in php in [FactoryMuffin](https://github.com/thephpleague/factory-muffin) library, which we use. Laravel 5 users are already aware of using factories. Now you can use them with all PHP frameworks with ActiveRecord pattern and in **Doctrine**.

This is how it works. You define rules to generate models:

```php
<?php
use League\FactoryMuffin\Faker\Facade as Faker;

$fm->define(User::class)->setDefinitions([
 'name'   => Faker::name(),
    // generate email
 'email'  => Faker::email(),
 'body'   => Faker::text(),

 // generate a profile and return its Id
 'profile_id' => 'factory|Profile'
 ]);
```

and DataFactory creates them using underlying ORM, inserts them to database once you call

```php
<?php
$I->have(User::class);
```
and deletes them after the test. As we said that will work for Doctrine as well, if you are familiar with Nelmio's Alice, you might find the same idea but with easier syntax to use.

### AngularJS

AngularJS is probably the most popular framework for building single page web applications. It provides its own tool for acceptance testing - [Protractor](https://angular.github.io/protractor/#/) but what if you already use Codeception and you are not so passionate to switch to NodeJS? Well if you actually do, please check out our side-project [CodeceptJS](http://codecept.io) which brings Codeception concepts to JavaScript world. However, in case of Angular testing there is less reasons to switch, as we brought you Protractor experience in new AngularJS module.

It simply wraps WebDriver module, and adds an asynchronous script between steps to ensure that all client-side operations finished before proceed. This way no new actions are taken before Angular finishes rendering. Also you've got new strict locator to use:

```php
<?php
$I->see('davert', ['model' => 'user']);
```

to match elements by their ng-model.

But enough with modules, we have something more than that!

### Examples

In PHPUnit you could have one test to be executed several times with different data, using the data provider mechanism. You can do the same in Codeception inside unit tests. But what about functional and acceptance testing? What if you need to run same scenario but passing different values into it? To be honest, the data provider didn't looked like an elegant way to define a test data. Data was stored in additional method, often few pages below the original test, so it was hard to see the picture in a whole. We introduce a concept of `Example`, similar to what you might have seen in BDD frameworks. Using the `@example` annotation you can define data in test annotation and receive from `Codeception\Example` instance, injected into test:

```php
<?php
  /**
   * @example(path=".", file="scenario.suite.yml")
   * @example(path=".", file="dummy.suite.yml")
   * @example(path=".", file="unit.suite.yml")
   */
  public function filesExistsAnnotation(FileTester $I, \Codeception\Example $example)
  {
      $I->amInPath($example['path']);
      $I->seeFileFound($example['file']);
  }
?>
```

For REST API testing this might look like:

```php
<?php
 /**
  * @example ['/api/', 200]
  * @example ['/api/protected', 401]
  * @example ['/api/not-found-url', 404]
  * @example ['/api/faulty', 500]
  */
  public function checkEndpoints(ApiTester $I, \Codeception\Example $example)
  {
    $I->sendGET($example[0]);
    $I->seeResponseCodeIs($example[1]);
  }
?>
```

Data in `@example` annotation can be defined using JSON objects, JSON-arrays, or Symfony-style annotation.
And yes, examples work only in Cests.

### Custom Commands

Long requested feature that finally was implemented by [Tobias Matthaiou](https://github.com/sd-tm) allows you ro register custom commands to Codeception runner. 

If you ever created Symfony Console commands you will be familiar in creating custom commands for Codeception. You migth probably use to have your own template generators, perform data migrations, etc. You can register one as simple as you do it for extension:

```yaml
extensions:
    commands: [MyApp\MyCustomCommand]
```

### Getting current browser and capabilities in tests 

The last one, simple yet useful thing that might improve your acceptance testing experience. If you want to have different behavior of tests for different browsers, you can get current browser name from a `$scenario->current` value:

```php
<?php
if ($scenario->current('browser') == 'phantomjs') {
  // emulate popups for PhantomJS
  $I->executeScript('window.alert = function(){return true;}'); 
}
?>
```

in a similar manner you have access to all browser capabilities:

```php
<?php
$capabilities = $scenario->current('capabilities');
if (isset($capabilities['platform'])) {
  if ($capabilities['platform'] == 'Windows') {
    // windows specific hooks
  }
}
?>
```

---

That's all for today, but not for Codeception 2.2
The most important and most impressive feature is waiting for you in next post. Subscribe to our [Twitter](http://twitter.com/codeception)  to not miss it. Stay tuned!