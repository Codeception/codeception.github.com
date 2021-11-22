---
layout: post
title: Introduction to Codeception
date: 2012-01-20 20:03:50
---

We build web sites with PHP, we build web services and web applications. But is PHP good enough for testing them?

How often do you see PHP projects with no line of test written? From my experience, this situation happens quite often. We should state the unpleasant fact that tests are not so popular around the PHP world. Surely, the advanced developers with 5+ years of experience in PHP and other programming languages understand importance of testing and PHPUnit usage. But juniors and seniors are just skipping testing and, therefore, produce unstable web applications.

From my point of view, the key issue is not in developers themselves. They are pretty good and skilled. But it is PHP that lacks the tools for testing. If you write a site and you want to test its behavior, what is the natural way to do so? Selenium? PHPUnit + Selenium? This tools are powerful, but too complex. Using them is like using a sledgehammer to crack a nut. 

For the last two months I have been developing a simple, yet powerful alternative testing framework: Codeception. It focuses on making tests easy to read, easy to write and easy to debug. This code illustrates a common acceptance test in Codeception:

{% highlight php %}
<?php
$I = new WebGuy($scenario);
$I->wantTo('create new blog post');
$I->amOnPage('/blog/posts');
$I->click('Create new post');
$I->fillField('Title','Codeception, a new way of testing!');
$I->fillField('Text','Codeception is new PHP full-stack testing framework.');
$I->click('Send');
$I->see('Congratulations, your post is successfully created!');
?>
{% endhighlight %}

It's pretty clear, isn't it? But here goes another feature of Codeception: this code can be executed as a functional test in symfony, Symfony2, Zend Framework, with PHP web scrapper Goutte, or even with Selenium!

Codeception is all about behavior-driven testing. For each part of application you describe user actions and the results you are expecting them to see. Users interact with your web application through a web browser. They open the page, click on links, fill the forms, and in the end they see the site has generated a proper result in response. In Codeception you record user's steps and make testing engine reproduce them. You need a web server running to perform requests through a web browser.

Writing tests is just about choosing actions from a list and injecting proper parameters.
![IDE autocomplition demo](https://dl.dropbox.com/u/930833/codecept.png)

If you are ready to start writing first Codeception test, just follow the [installation steps](https://codeception.com/install).
After you install package and its dependencies, select a project you want to test (I suppose you have one) and run a bootstrap command in its root:

{% highlight bash %}
$ codecept bootstrap
{% endhighlight %}

 It creates a 'tests' directory with 3 default testing suites:

* acceptance
* functional
* unit

Let's start with the sample acceptance test. We shall save it into 'tests/acceptance/StartPageCept.php'.

{% highlight php %}
<?php
$I = new WebGuy($scenario);
$I->wantToTest('front page of my site');
$I->amOnPage('/');
$I->see('A sample text on my site');
?>
{% endhighlight %}

Replace 'A sample text on my site' with the text that actually is on your site.
To make it run we should start a local web server with the tested application. 
The URL of this application should be specified in suite configuration file: 'tests/acceptance.suite.yml'.

{% highlight bash %}
    config:
        PhpBrowser:
            url: 'here goes url'
{% endhighlight %}

Now a test can be executed with the command _run_:

{% highlight bash %}
$ codecept run acceptance
{% endhighlight %}

Then the result is shown:

{% highlight bash %}
Suite acceptance started
Trying to see front page of my site (StartPageCept) - Ok

Time: 1 second, Memory: 21.00Mb

OK (1 test, 1 assertions)
{% endhighlight %}

Now let's see how forms can be tested. Perhaps the most often used forms are login forms.

{% highlight php %}
<?php
$I = new WebGuy($scenario);
$I->wantTo('log in as regular user');
$I->amOnPage('/login');
$I->fillField('Username','davert');
$I->fillField('Password','qwerty');
$I->click('Login');
$I->see('Hello, davert');
?>
{% endhighlight %}

The 'fillField' and 'click' command take element name or CSS selector as paramater. Thus, if you don't use labels for fields, you can rewrite this scenario in the following way:

{% highlight php %}
<?php
$I = new WebGuy($scenario);
$I->wantTo('log in as regular user');
$I->amOnPage('/login');
$I->fillField('form#login input[name=login]','davert');
$I->fillField('form#login input[name=password]','qwerty');
$I->click('form#login input[type=submit]');
$I->see('Hello, davert');
?>
{% endhighlight %}

Or this can be shortened to a single command:

{% highlight php %}
<?php
$I = new WebGuy($scenario);
$I->wantTo('log in as regular user');
$I->amOnPage('/login');
$I->submitForm('form#login', array('login' => 'davert', 'password' => 'qwerty'));
$I->see('Hello, davert');
?>
{% endhighlight %}

As you can see, tests in Codeception look pretty simple and compact. Testing environment is prepared out of the box, no need for the bootstrap code to be written. 
You can compare Codeception to Behat, to PHP DSL, but Codeception can do much more than executing scenarios. As you've already seen, it's not limited to acceptance tests only.

Codeception is fully documented, look into the guides for full reference.
Codeception is in beta-version, but it will evolve. Use it. Test your applications. Make them stable.

Next time functional tests will be covered.
