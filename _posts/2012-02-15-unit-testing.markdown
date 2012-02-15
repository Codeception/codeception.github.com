---
layout: post
title: BDD Approach to Unit Testing with Codeception.
date: 2012-02-15 22:03:50
---


Codeception is new BDD-style testing framework for PHP. It makes testing easier than it was before. Yep, really. If you are not a fan of testing, that might as well be because you haven't used the proper tools. We've already showed you how simple it is to automate testing for any web application by writing [acceptance tests](http://codeception.com/01-20-2012/starting-acceptance.html). Today we will dig deeper into the code and show you how it can be tested.

With BDD approach in Codeception, any test, even the unit test, is written as a scenario. By this scenario you declare what you are doing and what results you expect to see. In traditional xUnit scheme your test is just a piece of code that uses the method being tested. This piece of code becomes a mess when you test complex units depending on other classes or when you need to check data in a database, etc. Codeception always keeps your unit tests simple and readable.

I always start with a model example in the MVC pattern. I am not using any of existing PHP ORMs in the sample code, and this will make the code look a little bit weird. I'm doing this just to demonstrate testing process.

Here we've got a sample model class.

{% highlight php %}
<?php
class User extends AbstractModel {
	
	public function create()
	{
		if (!$this->isNew) throw new ModelException("User already created");		
		if (!$this->role) $this->role = 'member';

		if (!$this->validate()) throw new ValidationException("Validation failed");

		$this->save();
	}
}
?>
{% endhighlight %}

Quite a complex method of ORM class, but its usage is really simple:

{% highlight php %}
<?php
$user = new User;
$user->setName('davert');
$user->create();
?>
{% endhighlight %}

How is this method tested with Codeception? First of all, we won't be testing any inherited methods like _validate_ or _save_. They belong to AbstractModel class and are to be tested there. The 'create' method is to be tested in full isolation. For this we will not use the actual User class, but its Stub, i.e. a class with some methods replaced by their dummies.

{% highlight php %}
<?php

use Codeception\Util\Stub;

class UserCest {

	public $class = 'User';
	
	public function create(CodeGuy $I)
	{		
		$I->wantTo('create new user by name');
		$I->haveStub($user = Stub::makeEmptyExcept('User', 'create'));

		$user->setName('davert');

		$I->executeTestedMethodOn($user);

		$I->expect('user is validated and saved')		
			->seeMethodInvoked($user, 'validate')
			->seeMethodInvoked($user, 'save');
	}
}
?>
{% endhighlight %}

Here we have tested that the 'validate' and 'save' methods were actually invoked. We assume that 'validate' and 'save' are themselves tested; thus, they will work as expected. And if the test fails, we know the source of problem is the 'create' method itself. 

However, the test doesn't cover exceptions that may be thrown. Thus let's improve it by making the validate method simulate exceptions.

{% highlight php %}
<?php
use Codeception\Util\Stub;

class UserCest {

	public $class = 'User';
	
	public function create(CodeGuy $I)
	{		
		$I->wantTo('create new user by name');
		$I->haveStub($user = Stub::makeEmptyExcept('User', 'create'));
		$I->haveStub($invalid_user = Stub::makeEmptyExcept('User', 'create', array(
			'validate' => function () { throw new Exception("invalid"); }
		)));		

		$user->setName('davert');

		$I->executeTestedMethodOn($user);

		$I->expect('user is validated and saved')		
			->seeMethodInvoked($user, 'validate')
			->seeMethodInvoked($user, 'save');
		
		$I->expect('exception is thrown for invalid user')
			->executeTestedMethodOn($invalid_user)
			->seeExceptionThrown('ValidationException','invalid');				
			
		$I->expect('exception is thrown while trying to create not new user')
			->changeProperty($user,'isNew', false)
			->executeTestedMethodOn($user)						
			->seeExceptionThrown('ModelException', "User already created");
	}
}
?>
{% endhighlight %}

The only thing we haven't cover in the test is user's default role assertion. In case we store all column values as public variables, we can use the 'seePropertyEquals' method. 

{% highlight php %}
<?php

use Codeception\Util\Stub;

class UserCest {

	public $class = 'User';
	
	public function create(CodeGuy $I)
	{		
		$I->wantTo('create new user by name');
		$I->haveStub($user = Stub::makeEmptyExcept('User', 'create'));
		$I->haveStub($invalid_user = Stub::makeEmptyExcept('User', 'create', array(
			'validate' => function () { throw new Exception("invalid"); }
		)));		

		$user->setName('davert');

		$I->executeTestedMethodOn($user);

		$I->expect('user is validated and saved')	
			->seePropertyEquals($user, 'role', 'member')
			->seeMethodInvoked($user, 'validate')
			->seeMethodInvoked($user, 'save');
	
		$I->expect('exception is thrown for invalid user')
			->executeTestedMethodOn($invalid_user)
			->seeExceptionThrown('ValidationException','invalid');				
			
		$I->expect('exception is thrown while trying to create not new user')
			->changeProperty($user,'isNew', false)
			->executeTestedMethodOn($user)						
			->seeExceptionThrown('ModelException', "User already created");
	}
}
?>
{% endhighlight %}

By this test we have 100% covered the 'create' method with test and isolated its environment. As a bonus, we can improve our documentation by the text of this scenario. If we use [DocBlox, we can set up Codeception plugin](http://codeception.com/02-14-2012/generators-release-1-0-3.html) and generate documentation for User class 'create' method.

{% highlight html %}
With this method I can create new users by name.

Declared Variables:
* $user1 (User)
* $user2 (User)

If I execute $user1->create()

I expect user is validated and saved
I will see property equals $user1, 'role', 'member'
I will see method invoked $user1, 'validate'
I will see method invoked $user1, 'save'

I expect exception is thrown for invalid user
If I execute $user2->create()
I will see exception thrown 'ValidationException', 'invalid'

I expect exception is thrown while trying to create not new user
I change property $user1, 'isNew', false
If I execute $user1->create()
I will see exeception thrown 'ModelException', 'User already created'

{% endhighlight %}

We can say that the 'create' method is fully described by this text.

## Conclusion

What we've got by writing the test for the _create_ method of user class? We've made sure that by using this method the user is always validated and saved when created. We've also made sure the default role is 'member'. Well, that's all. But that's all that 'create' function is doing. 

For further reading on Codeception unit tests see our [documentation](http://codeception.com/docs/07-UnitTestsPractice). 

In the next post we will simplify the model test by breaking some isolation rules. Subscribe to our [RSS](http://codeception.com/rss.xml) channel to stay in touch.