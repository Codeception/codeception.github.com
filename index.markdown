---
layout: index
title: Codeception - BDD-style PHP testing.
---

Describe what you test and how you test it. Use PHP to write descriptions faster.
Run tests and see what actions were taken and what results were seen.              


### Sample acceptance test

{% highlight php %}
<?php

$I = new TestGuy($scenario);
$I->wantTo('create wiki page');
$I->amOnPage('/');
$I->click('Pages');
$I->click('New');
$I->see('New Page');
$I->submitForm('form#new', array('title' => 'Hobbit', 'body' => 'From Peter Jackson'));
$I->see('page created'); // notice generated
$I->see('Hobbit','h1'); // head of page of is our title
$I->seeInCurrentUrl('pages/hobbit'); // slug is generated
$I->seeInDatabase('pages', array('title' => 'Hobbit')); // data is stored in database
?>
{% endhighlight %}

Similar approach is used for unit testing. Unique helpers improve writing unit tests by providing simple helpers for stubbing, mocking, testing database, etc.

### Sample unit test

{% highlight php %}
<?php
class UserControllerCest {
    public $class = 'UserController';

    public function createAction(CodeGuy $I)
    {
        $I->haveFakeClass($userController = Stub::make('UserController'));
        $I->executeTestedMethodOn($userController, array('username' => 'MilesDavis', 'email' => 'miles@davis.com'))
            ->seeResultEquals(true)
            ->seeMethodInvoked($userController, 'renderHtml')
            ->seeInDabatase('users', array('username' => 'MilesDavis'));
    }
}
?>
{% endhighlight %}

If you don't really like writing unit tests in DSL, Codeception can run PHPUnit tests natively.

