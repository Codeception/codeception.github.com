---
layout: post
title: Scenario Unit Tests Deprecation Announcement
date: 2012-03-18 22:03:50
---

We decided to get rid of the scenario unit tests. The main reason is: the concept was interesting, but current realization is a bit outdated. 
It would take to much time to maintain and support them. Hopefully, not to much developers used them anyway ) They are cool if you are dealing with mocks in your tests, but they don't bring any value if you write a plain unit test. We've seen too much improperly written unit tests in Cest format so we'd actually recommend you to switch to classical unittests with codeGuy helpers.

So now recommended are Codeception driven unit tests, in PHPUnit like format:

{% highlight php %}
<?php
class UserTest extends \Codeception\TestCase\Test {

  function _before()
  {
    $this->user = new User();
  }


  function testUserIsSaved()
  {
    $this->user->name = 'miles';
    $this->user->save();
    $this->codeGuy->seeInDatabase('users', array('name' => 'miles'));
  }  
}
?>
{% endhighlight %}

If you still interested in scenario driven tests, leave your feedback or even propose your concept. [Here is one of them]( https://gist.github.com/DavertMik/5042537)
The real idea behind scenario driven unit tests to have code well described in a human language. This is especially useful when dealing with mocks and stubs. In this case we can implement some 'magic' methods that allows us to simplify manipulation with code and write only definitions. What methods do we need, what methods do we test, what we expect to see. No unnescessary technlical details. Only logic and dependencies.

The Cest format itself is not going to be deprecated. It would be proposed to use in functional or acceptance tests as an alternative. If you like to write tests in a class (rather then plain PHP file), please use Cest format. More announcement comes on this soon. Expect a new vewsion.

Scenario driven tests <strong>will be removed in 1.7 version</strong> of Codeception.
So migrate them to regular unit tests. 
