---
layout: index
title: Codeception - BDD-style PHP testing.
---

Describe what you test and how you test it. Use PHP to write descriptions faster.
Run tests and see what actions were taken and what results were seen.              

### The Code

{% highlight php %}
<?php

$I = new TestGuy($scenario);
$I->wantTo('create wiki page');
$I->amOnPage('/');
$I->click('Pages');
$I->click('New');
$I->see('New Page');
$I->fillField('title', 'Hobbit');
$I->fillField('body', 'By Peter Jackson');
$I->click('Save');
$I->see('page created'); // notice generated
$I->see('Hobbit','h1'); // head of page of is our title
$I->seeInCurrentUrl('pages/hobbit'); // slug is generated
$I->seeInDatabase('pages', array('title' => 'Hobbit')); // data is stored in database
?>
{% endhighlight %}

Codeception power can be used for pragmatic testing of **Web Sites**, **REST** and **SOAP** APIs, Web Application based on popular **MVC Frameworks**.

Improve your unit tests with **better subbing, mocking and database access**. And well, you don't need to learn new unit-testing framework. Codeception is just a thick BDD wrapper on top of **PHPUnit**, so all your tests can be run by Codeception as well.

### Just the best thing to start!

**No experience in testing, right? That's ok!**
Codeception is designed to be as simple as possible. 
Even juniors can install it and write simple yet complete tests.

### Test Everything!

Write **acceptance, functional and unit tests**, pick from about 20 modules best tools for your current task.
Run all the tests with one script.

### Keep It Simple!

That's the first testament. And Codeception is trying to make tests easy to read, easy to write, easy to debug.
No other testing framework is that user-friendly. Use IDE autocomplition and writing tests becomes a point-and-click adventure!

