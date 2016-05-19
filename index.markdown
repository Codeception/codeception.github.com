---
layout: index
title: Codeception - BDD-style PHP testing.
hero: hero.html
---          

### Acceptance Test

This test can be executed in a browser or in it's PHP emulator.

{% highlight php %}
<?php
$I = new WebGuy($scenario);
$I->wantTo('create wiki page');
$I->amOnPage('/');
$I->click('Pages');
$I->click('New');
$I->see('New Page');
$I->fillField('title', 'Hobbit');
$I->fillField('body', 'By J.R.R. Tolkien');
$I->click('Save');
$I->see('page created'); // notice generated
$I->see('Hobbit','h1'); // head of page of is our title
$I->seeInCurrentUrl('pages/hobbit'); // slug is generated
$I->seeInDatabase('pages', array('title' => 'Hobbit')); // data is stored in database
?>
{% endhighlight %}

### API Test

API can be tested by PHP browser emulator or using framework integrations.

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
{% endhighlight %}
