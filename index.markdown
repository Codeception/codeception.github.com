---
layout: index
title: Codeception - BDD-style PHP testing.
---          

## Acceptance Test

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

## API Test

{% highlight php %}
<?php
$I = new ApiGuy($scenario);
$I->wantTo('create a new user by API');
$I->amHttpAuthenticated('davert','123456');
$I->haveHttpHeader('Content-Type','application/x-www-form-urlencoded');
$I->sendPOST('/users', array('name' => 'davert' ));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('result' => 'ok'));
?>
{% endhighlight }

## Unit Test

{% highlight php %}
<?php
class UserControllerCest {
    public $class = 'UserController';

    public function createAction(CodeGuy $I)
    {
        $I->haveFakeClass($userController = Stub::makeEmptyExcept('UserController'));
        $I->executeTestedMethodOn($userController, array('username' => 'MilesDavis', 'email' => 'miles@davis.com'))
        $I->seeResultEquals(true)
        $I->seeMethodInvoked($userController, 'renderHtml')
        $I->seeInDabatase('users', array('username' => 'MilesDavis'));
    }
}
?>
{% endhighlight %}