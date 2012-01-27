---
layout: post
title: Behavior Driven Testing with Zend Framework
date: 2012-01-27 22:03:50
---

Codeception is testing framework in which all tests are written in a single descriptive manner. 
It's aim is to make tests easy to read, easy to write and easy to debug. Every single test you write can be run either in Selenium, in PHP Browser emulator, or as a functional test for **Zend Framework**. Today we will look how Codeception can be used for testing your Zend application.

Most of CRUD applications use forms for creating or editing content. It's hard to test every form on site after each release manually. But we will automate this process. For testing Zend applications you probably used it's [Zend_Test_PHPUnit](http://framework.zend.com/manual/1.11/en/zend.test.phpunit.html) class, which is build on top of PHPUnit's TestCase. Codeception is built on top of PHPUnit too. And takes similar approaches from **Zend_Test_PHPUnit_ControllerTestCase**. But commands available in tests being made intuitively simple and much more human friendly then they are in Zend_Test_PHPUnit.

We take a code from Zend_Test_PHPUnit tutorial:

{% highlight php %}
<?php
// Zend_Test_PHPUnit
$this->request->setMethod('POST')->setPost(array(
'username' => 'foobar',
'password' => 'foobar'
));
$this->dispatch('/user/login');
$this->assertRedirectTo('/user/view');
$this->resetRequest()->resetResponse();

$this->request->setMethod('GET')->setPost(array());
$this->dispatch('/user/view');
$this->assertQueryContentContains('h2', 'User: foobar');
?>
{% endhighlight %}

and reproducing it for Codeception: 

{% highlight php %}
<?php
// Codeception
$I->amOnPage('/user');
$I->submitForm('form#loginForm', array('username' => 'foobar', 'password' => 'foobar'));
$I->seeInCurrentUrl('/user/view');
$I->see('User: foobar', 'h2');
?> 
{% endhighlight %}

It's only 4 lines long, but it does the same as the test above. It tests logging in on site, nothing more, nothing less. We can expect user is logged in if he was moved from '/user' page, to '/user/view' and username is in Heading2 element of that page. 

Codeception won't perform asserts for application internals as module/controller/action, as this is not natural to bound functionality into one place. A small refactoring will completely break a test, even if application is running perfectly. For the same reasons Codeception doesn't provide analog for _assertQueryCount_ or _assertQuery_, because they test a markup probably unseen to user. If a element on page has changed a test will fail, still application can work perfectly. We are testing only elements user can interact with and user can see. This makes tests more stable and drives us to less false negative results.

All the *assertXXXX* commands is replaced with natural 'see' commands.

* **see** - checks if text or element with text is on page
* **seeInCurrentUrl** - checks if a url contains specified value
* **seeLink** - checks link exist on page
* **seeInField**
* **seeCheckboxIsChecked**
* etc...

This commands can accept either CSS locators or element names. 

With Codeception you can write tests that will be executed inside a Zend Framework, but will simulate user actions with less technical code. 
As every test should be readable and thus simple definitions in terms "I do that", "I see this" are better to understand. Especially, if a test is read by new developer. 

Today we are going to write tests for open source blog application [Lilypad-Zend-Framework-Blog](https://github.com/frogprincess/Lilypad-Zend-Framework-Blog). We assume you already have Zend Framework intalled.

It can be taken from GitHub:

{% highlight bash %}
git clone git://github.com/Codeception/ZFBlog.git
{% endhighlight %}

Set up database and configure _application/configs/application.ini_ to access it. Default settings are:

{% highlight bash %}
resources.db.adapter = "PDO_MYSQL"
resources.db.params.host = "localhost"
resources.db.params.username = "root"
resources.db.params.password = ""
resources.db.params.dbname = "zfblog"
{% endhighlight %}

Database should be populated with _zend_blog.sql_ dump from the project root.

To start covering it with tests [Codeception should be installed](http://codeception.com/install). 

Run bootstrap command from root of ZFBlog:

{% highlight bash %}
$ codecept bootstrap
$ codecept build
{% endhighlight %}

This will create a default test suites. Now some steps for configuration should be done.

For interacting with Zend Framework a [ZF1](http://codeception.com/docs/modules/ZF1) module is used.
It should be enabled in functional tests configuration: _tests/functional.suite.yml_.
For database repopulation after each step add [Db](http://codeception.com/docs/modules/Db) module too.

{% highlight yaml %}
class_name: TestGuy
modules:
	enabled: [ZF1, Db, TestHelper]
{% endhighlight %}

We use default settings for ZF1 module to connect to ZFBlog application. We use _'testing'_ environment and _'application.ini'_ stored in it's standard place: 'application/configs/application.ini'. But Db module requires additional configuration. We need schema and default data was recreated for each test run. We have database dump, a file named _zend_blog.sql_ in root of project. We should point Codeception to use it for database repopulation. Now update a _codeption.yml_ config in project's root and set proper db credentials. 

{% highlight bash %}
paths:
    tests: tests
    log: tests/_log
    data: tests/_data
    helpers: tests/_helpers
settings:
    bootstrap: _bootstrap.php
    suite_class: \PHPUnit_Framework_TestSuite
    colors: true
     memory_limit: 1024M
    log: true
modules:
    config:
        Db:
            dsn: 'mysql:host=localhost;dbname=zfblog'
            user: 'root'
            password: ''
            dump: zend_blog.sql
{% endhighlight %}

We configured Db credentials and database dump being used. Now let's write some tests. In _tests/functional_ let's create file _CreateBlogCept.php_:

{% highlight php %}
<?php
$I = new TestGuy($scenario);
$I->wantTo('create new blog post');
$I->amOnPage('/admin');
$I->see('Blog Editing');
$I->click('Add new blog');
$I->see('Add new blog');
?>

{% endhighlight %}

Now a test can be run with command.

{% highlight bash %}
$ codecept run functional
{% endhighlight %}

And here is the expected result. 

{% highlight bash %}
Codeception PHP Testing Framework v1.0.1
Powered by PHPUnit 3.6.4 by Sebastian Bergmann.

Suite functional started
Trying to  create new blog post (CreateBlogCept.php) - Ok


Time: 2 seconds, Memory: 21.00Mb

OK (1 test, 2 assertions)
{% endhighlight %}

To get detailed information of what steps were taken in test, run this command with --steps option. And this is what will be printed:

{% highlight bash %}
Trying to  create new blog post (CreateBlogCept.php)
Scenario:
* I am on page "/admin"
* I see "Blog Editing"
* I click "Add new blog"
* I see "Add new blog"
  OK
{% endhighlight %}

Also, all executed tests, steps performed and a results of execution, will be written to 'tests/_log' directory.

Try to create your own test for editing post. I hope you will like new way of testing Zend Application. Use Codeception to make your applications stable and predictable. 

Support for Zend2 is coming soon.