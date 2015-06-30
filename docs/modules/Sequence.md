---
layout: doc
title: Sequence Module - Codeception - Documentation
---



<div class="btn-group" role="group" style="float: right" aria-label="..."><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/2.1/src/Codeception/Module/Sequence.php">source</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/master/docs/modules/Sequence.md">master</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/2.1/docs/modules/Sequence.md"><strong>2.1</strong></a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/2.0/docs/modules/Sequence.md">2.0</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/1.8/docs/modules/Sequence.md">1.8</a></div>

# Sequence Module

**For additional reference, please review the [source](https://github.com/Codeception/Codeception/tree/2.1/src/Codeception/Module/Sequence.php)**


Sequence solves data cleanup issue in alternative way.
Instead cleaning up the database between tests,
you can use generated unique names, that should not conflict.
When you create article on a site, for instance, you can assign it a unique name and then check it.

This module has no actions, but introduces a function `sq` for generating unique sequences.

#### Usage

Function `sq` generates sequence, the only parameter it takes, is id.
You can get back to previously generated sequence using that id:

{% highlight php %}

<?php
'post'.sq(1); // post_521fbc63021eb
'post'.sq(2); // post_521fbc6302266
'post'.sq(1); // post_521fbc63021eb
?>

{% endhighlight %}

Example:

{% highlight php %}

<?php
$I->wantTo('create article');
$I->click('New Article');
$I->fillField('Title', 'Article'.sq('name'));
$I->fillField('Body', 'Demo article with Lorem Ipsum');
$I->click('save');
$I->see('Article'.sq('name') ,'#articles')
?>

{% endhighlight %}

Populating Database:

{% highlight php %}

<?php

for ($i = 0; $i<10; $i++) {
     $I->haveInDatabase('users', array('login' => 'user'.sq($i), 'email' => 'user'.sq($i).'@email.com');
}
?>

{% endhighlight %}



<p>&nbsp;</p><div class="alert alert-warning">Module reference is taken from the source code. <a href="https://github.com/Codeception/Codeception/tree/2.1/src/Codeception/Module/Sequence.php">Help us to improve documentation. Edit module reference</a></div>
