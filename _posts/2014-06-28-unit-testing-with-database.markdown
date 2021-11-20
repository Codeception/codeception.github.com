---
layout: post
title: "Unit Testing With Database"
date: 2014-06-28 01:03:50
---

He-hey! You just opened this page to say that there is no such thing as unit testing with database. Unit tests are supposed to test isolated pieces, and sure unit tests should not touch the database. And we can agree with that. But it happened that "unit test" term is far more popular then "integration test". Unit test have one very strong requirement. Isolation. Complete isolation from other code units and services. In real world we can spoil our lives trying to achieve complete isolation. And even when with pain and sweat we finally got out models isolated from database, we receive a very strange class of tests. They do not provide a valuable feedback. Model test that does not connect to real database is useless, as it provide false positive results, and the code behind may crash connecting to real storage. So what do we want from unit test after all? To be written in complete isolation (what for?), or provide real feedback?

So let's not to concentrate on terms. Let's concentrate on testing.

## Testing Faster With Transactions

What drawbacks we receive if unit tests are connecting to database? Sure it will be dramatic slowdown. We will need to connect to database, insert data, and perform a cleanup afterwards. The most simple way of cleaning things up is to repopulate database completely. Yet, this is the slowest way. But there is a much better way of doing things. Especially for unit (and functional) tests. We can use **transactions**.

That's right. We can cover a test into transaction, and rollback it after the test is finished. This is the fastest and the most stable way of working with database in unit tests. The only issue with it is that not all databases support nested transactions. For instance, in MySQL you can't begin transaction and begin next transaction as there can be only one at one point. Yet, those nested transactions can be emulated. And here are good news: if you use one of popular PHP Frameworks: **Laravel**, **Yii2**, **Phalcon**, or **Doctrine ORM**, your framework already can do that! Thus, in unit test you can begin transaction in setup, and finish it in teardown of a test. Sure, you should use the framework's database layer for that.

In Codeception we already use this feature for speeding up functional tests. But it was not that obvious that you can use the same practice for unit tests. 

Let's connect our framework to the `unit.suite.yml`. In current example we will use Laravel, yet very similar steps can be done for Yii2, Phalcon, and Symfony+Doctrine.

{% highlight yaml %}
# Codeception Test Suite Configuration

# suite for unit (internal) tests.
class_name: UnitTester
modules:
    enabled: [Laravel4, UnitHelper, Asserts]
{% endhighlight %}

That's all. [This line](https://github.com/Codeception/Codeception/blob/2.0/src/Codeception/Module/Laravel4.php#L104) of Laravel module will start the transaction before each test in suite. 

## Using ActiveRecord Helpers

Laravel, Phalcon, and Yii are frameworks that use ActiveRecord pattern for working with database. Codeception Framework modules have built-in helpers, which share the [standard interface](https://github.com/Codeception/Codeception/blob/2.0/src/Codeception/Lib/Interfaces/ActiveRecord.php) to work with database records. 

Let's write a sample Laravel test which demonstrates usage of Codeception helpers. In this example we will test `activate` method of User model. It activates user when provided activation key matches predefined one.

{% highlight php %}
<?php
class UserTest extends \Codeception\TestCase\Test
{
    /**
     * @var UnitTester
     */
    protected $tester;

    protected $user_id;

    function _before()
    {
        // preparing a user, inserting user record to database
        $this->user_id = $this->tester->haveRecord('users', [
            'username' => 'John',
            'email' => 'john@snow.com',
            'activation_key' => '123456',
            'is_active' => 0

        ]);
    }

    function testUserCanBeActivatedWithValidKey()
    {
        // lookup for user with Eloquent API
        $user = User::find($this->user_id);
        // executing action
        $isActivated = $user->activate('123456'));
        // performing assertion
        $this->assertTrue($isActivated);
        // checking that data was actually saved into database
        $this->tester->seeRecord('users', [
            'id' => $this->user_id,
            'is_active' => 1
         ]);
    }

    function testUserNotActivatedWithInvalidKey()
    {
        $user = User::find($this->user_id);
        $this->assertFalse($user->activate('00000'));
        $this->tester->dontSeeRecord('users', [
            'id' => $this->user_id,
            'is_active' => 1
         ]);
    }
}
?>
{% endhighlight %}

As it was mentioned, similar test can be written for other mentioned frameworks. Depending on framework API ActiveRecord helper methods

* grabRecord
* seeRecord
* haveRecord
* doneSeeRecord

may take table name (Laravel) or model name (Phalcon, Yii2). 

## Who is that Tester?

`$this->tester` object used here is instance of [Actor class](https://codeception.com/docs/02-GettingStarted#Actors) and contain all methods of  modules and helpers used in unit suite. It would be a good idea to put any shared code into helpers, and reuse across test cases by accessing `$this->tester`. This object is injected into any testcase that extends `Codeception\TestCase\Test`. 

## Conclusion

Sure, we could implement similar test using just Eloquent API without using Codeception helpers. Still, they are quite useful. Especially assertion methods like `seeRecord` which queries database for a record with given attributes.  