---
layout: doc
title: Sequence - Codeception - Documentation
---



<div class="btn-group" role="group" style="float: right" aria-label="..."><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/2.4/src/Codeception/Module/Sequence.php">source</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/master/docs/modules/Sequence.md">master</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/2.3/docs/modules/Sequence.md">2.3</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/2.2/docs/modules/Sequence.md">2.2</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/2.1/docs/modules/Sequence.md">2.1</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/2.0/docs/modules/Sequence.md">2.0</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/1.8/docs/modules/Sequence.md">1.8</a></div>

# Sequence


Sequence solves data cleanup issue in alternative way.
Instead cleaning up the database between tests,
you can use generated unique names, that should not conflict.
When you create article on a site, for instance, you can assign it a unique name and then check it.

This module has no actions, but introduces a function `sq` for generating unique sequences within test and
`sqs` for generating unique sequences across suite.

#### Usage

Function `sq` generates sequence, the only parameter it takes, is id.
You can get back to previously generated sequence using that id:

{% highlight php %}

<?php
sq('post1'); // post1_521fbc63021eb
sq('post2'); // post2_521fbc6302266
sq('post1'); // post1_521fbc63021eb

{% endhighlight %}

Example:

{% highlight php %}

<?php
$I->wantTo('create article');
$I->click('New Article');
$I->fillField('Title', sq('Article'));
$I->fillField('Body', 'Demo article with Lorem Ipsum');
$I->click('save');
$I->see(sq('Article') ,'#articles')

{% endhighlight %}

Populating Database:

{% highlight php %}

<?php

for ($i = 0; $i<10; $i++) {
     $I->haveInDatabase('users', array('login' => sq("user$i"), 'email' => sq("user$i").'@email.com');
}
?>

{% endhighlight %}

Cest Suite tests:

{% highlight php %}

<?php
class UserTest
{
    public function createUser(AcceptanceTester $I)
    {
        $I->createUser(sqs('user') . '@mailserver.com', sqs('login'), sqs('pwd'));
    }

    public function checkEmail(AcceptanceTester $I)
    {
        $I->seeInEmailTo(sqs('user') . '@mailserver.com', sqs('login'));
    }

    public function removeUser(AcceptanceTester $I)
    {
        $I->removeUser(sqs('user') . '@mailserver.com');
    }
}
?>

{% endhighlight %}

#### Config

By default produces unique string with param as a prefix:

{% highlight yaml %}
sq('user') => 'user_876asd8as87a'

{% endhighlight %}

This behavior can be configured using `prefix` config param.

Old style sequences:

{% highlight yaml %}

Sequence:
    prefix: '_'

{% endhighlight %}

Using id param inside prefix:

{% highlight yaml %}

Sequence:
    prefix: '{id}.'

{% endhighlight %}

### Actions

<p>&nbsp;</p><div class="alert alert-warning">Module reference is taken from the source code. <a href="https://github.com/Codeception/Codeception/tree/2.4/src/Codeception/Module/Sequence.php">Help us to improve documentation. Edit module reference</a></div>
