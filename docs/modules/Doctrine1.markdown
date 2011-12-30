---
layout: page
title: Codeception - Documentation
---


Checks table doesn't contain row with specified values
Provide Doctrine model name and criteria that can be passed to addWhere DQL

Example:

{% highlight php %}

<?php
$I->dontSeeInTable('User', array('name' => 'Davert', 'email' => 'davert * mail.com'));


{% endhighlight %}

 * param $model
 * param array $values


Checks table contains row with specified values
Provide Doctrine model name can be passed to addWhere DQL

Example:

{% highlight php %}

<?php
$I->seeInTable('User', array('name' => 'Davert', 'email' => 'davert * mail.com'));


{% endhighlight %}

 * param $model
 * param array $values
