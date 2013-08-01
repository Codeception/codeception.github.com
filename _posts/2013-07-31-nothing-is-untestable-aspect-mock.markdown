---
layout: post
title: "Nothing is Untestable: AspectMock in Action"
date: 2013-07-31 22:03:50
---

> “Nothing is True, Everything is Permitted” 

*William S. Burroughs*

We already announced [AspectMock](https://github.com/Codeception/AspectMock), the mocking framework that may dramatically change the way you do testing in PHP. [In this video this Jeffrey Way](http://jeffrey-way.com/blog/2013/07/24/aspectmock-is-pretty-neat/) shows how AspectMock is different from others. In this post we will demonstrate its powers too, and we will try to break some stereotypes about PHP testing.

To get the code tested, you should always keep in mind how you would write a test for it. 
We know unit testing requires some good practices to follow and bad practices to avoid.

For example, you should not use singletones. They are bad. Why? Singletones can't be tested.

But what if we could test singletones:

{% highlight php %}
<?php
function testSingleton()
{
	$class = MySingleton::getInstance();
	$this->assertInstanceOf('MySingleton', $class);
	test::double('MySingleton', ['getInstance' => new DOMDocument]);
	$this->assertInstanceOf('DOMDocument', $class);
}
?>
{% endhighlight %}

And with AspectMock we really do it - the test is passing.
Then should we still consider a singleton to be a bad practice?

## Beyond Good and Evil

Classes and methods in PHP are declared statically and can't be changed in runtime.
This can be treated as language limitation. 
Dependency Injection pattern can treated as a workaround for this limitation and widely used for testing.
AspectMock breakes the limitation. The same can probably be achived with Runkit extension. But AspectMock doesn't require you to install additional extenions, and uses only PHP methods to do its job.

"Testability" should not be used as argument deciding what design pattern is right to use and what is not.
When you develop with PHP you should always rely on common sense only. Production code should be efficient, fast, readable, and maintanable. The test should not affect the way the production code is written.

### Real World Experience With Yii2

Let's get hands on AspectMock. We will use a demo appication from the upcoming [Yii2 framework](https://github.com/yiisoft/yii2).
Despite having dependency injection container, Yii2 does not use it for models. It relies on static calls to global `Yii` class.

Take a look into `LoginForm` model of `advanced` application from the Yii2 repo.

Here is the source code:

{% highlight php %}
<?php
namespace common\models;

use Yii;
use yii\base\Model;

class LoginForm extends Model
{
	public $username;
	public $password;
	public $rememberMe = true;

	public function rules()
	{
		return array(
			// username and password are both required
			array('username, password', 'required'),
			// password is validated by validatePassword()
			array('password', 'validatePassword'),
			// rememberMe must be a boolean value
			array('rememberMe', 'boolean'),
		);
	}

	public function validatePassword()
	{
		$user = User::findByUsername($this->username);
		if (!$user || !$user->validatePassword($this->password)) {
			$this->addError('password', 'Incorrect username or password.');
		}
	}

	public function login()
	{
		if ($this->validate()) {
			$user = User::findByUsername($this->username);
			Yii::$app->user->login($user, $this->rememberMe ? 3600*24*30 : 0);
			return true;
		} else {
			return false;
		}
	}
}
?>
{% endhighlight %}

As you see, it can't be tested in classical unit testing. The only option we have here is to write an integration test for this class. 
But with AspectMock we can easily get this class tested with 100% code coverage.

Let's test successful and unseccessful login scenarios in `LoginForm`.

LoginForm relies on User class. That's why to write a test, we will mock some of its methods.
We will create a mock with `test::double` call. In a second argument we are passing the methods that are goint to be replaced and the values they should return.

{% highlight php %}
<?php
    public function setUp()
    {
        test::double('common\models\User', [
            'findByUsername' => new User,
            'getId' => 1,
        ]);

    }
?>    
{% endhighlight %}

With this `User::findByUsername()` will always return an empty `User` instance.
And user id will always be 1. For user to log in we need that `$user->validatePassword()` returned true.
We will mock that call in a test.

{% highlight php %}
<?php
public function testCanLoginWhenValid()
{
    $user = test::double('common\models\User', ['validatePassword' => true]);

    $model = new LoginForm();
    $model->username = 'davert';
    $model->password = '123456';

    $this->assertTrue($model->login());
    $user->verifyInvoked('findByUsername',['davert']);
    $user->verifyInvoked('validatePassword',['123456']);
}
?>    
{% endhighlight %}

Additionally we did a check that `validatePassword` method was called, and user was found by `findByUsername` call.
In production environment, this methods would use the database. 

The same way we can check that user can't log in with invalid pasword:

{% highlight php %}
<?php
public function testCantLoginWhenInvalid()
{
	$user = test::double('common\models\User', ['validatePassword' => false]);

	$model = new LoginForm();
	$model->username = 'davert';
	$model->password = '123456';

	$this->assertFalse($model->login());
	$user->verifyInvoked('findByUsername',['davert']);
	$user->verifyInvoked('validatePassword',['123456']);
}
?>    
{% endhighlight %}

And in the end we will also check that user can't be logged in without a password.

{% highlight php %}
<?php
public function testCantLoginWithoutPassword()
{
    test::double('common\models\User', ['validatePassword' => true]);
    $model = new LoginForm();
    $model->username = 'davert';
    $this->assertFalse($model->login());
    $model->password = '123456';
    $this->assertTrue($model->login());
}    
?>
{% endhighlight %}

If we execute this tests with Codeception we will see all them pass sucessfully:

![passed](/images/aspect_mock_ok.png)

If you want to see this with your own eyes, [clone this application from Github](https://github.com/DavertMik/Yii2-AspectMock) and run Codeception tests:

{% highlight bash %}
php vendor/bin/codecept run
{% endhighlight %}

Pay attention to `tests/_bootstrap.php` file where AspectMock Kernel is initialized. Yii autoloader was loaded through AspectKernel as well.
That is important to point AspectMock to a custom autoloader if you do not rely on Composer's autoloader entirely.

## How it Works

There are no magical meadows and mighty unicorns in a hat. Still AspectMock uses something really powerful to break the rules.
You may have heard of [Aspect Oriented Programming](https://en.wikipedia.org/wiki/Aspect-oriented_programming). [Go AOP framework](https://github.com/lisachenko/go-aop-php), developed by **@lisachenko** does awesome job to bring the AOP to PHP world. It intercepts all method calls and allows to put your own advices for them. The AspectMock is just an advice on top of Go Aop.

Go Aop scnans all libraries and enhances `include` and `require` statements with PHP filters. 
Go adds a parent proxy class to any loaded PHP class on the fly. So If we get back to Yii2 example, `User::findByUsername` call will invoke that method on a proxy class.

## Conclusions

**AspectMock still considered to be an experimental project.**
But it has a wide potential. It is very simple and easy to use. It has very tiny api easy to remember and understand. 
That's why tests developed with AspectMock are very clean and readable.

**AspectMock is not a testing tool for the bad code.** The good code is efficient code. WordPress is much popular then any PHP framework, because of its efficiency. Magento does not have unit tests (only integration), but is the most popular ecommerce platform. We can't say how many there are unit tests in Facebook, but we can bet, it started without unit tests. Code should do its job. Code should be readale and maintanable. Overusing dependency injection does not make the code more efficient in any sense. By the way, [in Ruby dependency injection is not widely used](http://david.heinemeierhansson.com/2012/dependency-injection-is-not-a-virtue.html), but as you may know ruby developers are very passionate about testing.

**AspectMock is not a tool for newbies** who just didn't manage to learn the good practices.
It is advanced tool, that require you to set dependencies explicitly in a test. That may require deep knowledge on internals of framework you use.

You can try it on your own project. If you have code parts that can't be unit tested in classical manner, then AspectMock can do a job for you.