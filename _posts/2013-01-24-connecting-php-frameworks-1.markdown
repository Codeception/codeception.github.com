---
title: Connecting PHP Frameworks. Part 1
layout: post
date: 2013-01-24 01:03:50
---

As you know, Codeception has various modules for functional testing of PHP applications. Really, you could use Selenium, but as an advice, please leave Selenium for QAs. 

As a developer you need to get more technical details for each test. If test fails you need to see the actual stack trace. As a developer you need to have all test running much faster. You can't wait for an hour before pushing your commit.

If you ever had tried Codeception with Symfony2 you should know how fast are functional tests. You should know how helpful is printed information from profiler: queries used, user authentication status, etc.

In case you want to try functional tests with your own framework you should develop module for it. Basically it's not that hard as you think it is. But some frameworks suit better for integrations and some need additional hooks. In this post I will concentrate on integrating one of the modern PHP frameworks that use **HttpKernel** Symfony Component. 

There are **Laravel 4** and **Drupal 8** that adopted HttpKernel interface. And more frameworks to come...

So in case you want to integrate Laravel or Drupal, or you know that your framework uses HttpKernel, you should follow this guide.

If you are not aware of what HttpKernel class is, please follow **Fabien Potencier**'s' series of posts [Create your own framework... on top of the Symfony2 Components](http://fabien.potencier.org/article/50/create-your-own-framework-on-top-of-the-symfony2-components-part-1)

### Contributor's Notice

First of all, how do we treat the user contributions? In Codeception we have liberal politics for accepting pull requests. The only thing, we can't test your implementation, as we just don't have experience in this frameworks. So when you commit module please test your module, and prepare to be it's maintainer. So you will need to write proper documentation and provide support it. Answer to questions on GitHub, in Twitter, etc. Yep, this is opensource.

But we will help you with that. The more developers will use your framework the more contributions your module will receive. So try to encourage framework community to test your module, use it and improve.

When your module is complete it will be packaged with Codeception and it's reference will be published on this site. This is done to make Codeception with all it's modules work out of the box from one phar archive. 

### Technical Implementation

So you decided to create a module for Codeception that provides integration with **HttpKernel**. Hope you do! 

Check how it is done for [Symfony2](https://github.com/Codeception/Codeception/blob/master/src/Codeception/Module/Symfony2.php)

1. We load and initialize HttpKernel class in `_initialize` method.
2. Before each test we create a **HttpKernel\Client** class for this kernel in `_before` method
3. We shut down client after each test in `_after` method.

Let's narrow it to example. 

{% highlight php %}
<?php
namespace Codeception\Module;
use Symfony\Component\HttpKernel\Client;

class MyFrameworkModule extends \Codeception\Util\Framework {

	public function _initialize()
	{
		// $app implements HttpKernelInterface
		$app = require_once \Codeception\Configuration::projectDir().'/app.php';
		$app->setEnvironment('test');
		$this->kernel = $app;
	}

	public function _before(\Codeception\TestCase $test)
	{
        $this->client = new Client($this->kernel);
        $this->client->followRedirects(true);
	}

	public function _after(\Codeception\TestCase $test)
	{
        $this->kernel->shutdown();		
	}
}
?>
{% endhighlight %}

And basically that's all you need for integration. The Client class has everything to simulate requests and parse responses. Every module that extends `Codeception\Util\Framework` class will have actions: `click`, `see`, `fillField`, defined and documented in `Codeception\Util\FrameworkInterface`. This actions will work in just the same manner as for other frameworks. And it's really cool, that testing client is not aware of framework it is testing. All methods and their behavior are just the same. So tests for Symfony2, Zend, or your newly integrated frameworks will look just the same.

Still you may want to add something special for your framework. Maybe some additional initialization steps, or new actions. Let's say a framework you integrate have methods to authenticate a user by name. Why not to use this ability and to make a short cut for logging in?

{% highlight php %}
<?php
namespace Codeception\Module;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpKernel\Client;

class MyFrameworkModule extends \Codeception\Util\Framework {

	public function _initialize()
	{
		// $app implements HttpKernelInterface
		$app = require_once Codeception\Configuration::projectDir().'/app.php';
		$app->setEnvironment('test');
		$this->kernel = $app;
	}

	public function amLoggedAs($username)
	{
		$this->kernel->getService('session')->authenticate($user);

		$role = $this->kernel->getService('session')->getRole();
		$permission = $$this->kernel->getService('session')->getPermissions();

		// let's display additional information
		$this->debugSection('Role', $role);
		$this->debugSection('Permissions', json_encode($permission));
	}
}
?>
{% endhighlight %}

So now we can write a test like this:

{% highlight php %}
<?php
$I = new TestGuy($scenario);
$I->amLoggedAs('davert');
$I->amOnPage('/user/profile');
$I->see('Davert');
?>
{% endhighlight %}

As you see, framework integration allows us to access it's internals. Services, classes, configurations, etc. Please add methods that you think may be useful for other developers that will write functional tests.
Also you can display some technical details with `debug` and `debugSection` methods.

Let other modules get access to framework internals too. In our case we can define `kernel` as public property and make it accessible from user helper classes.

{% highlight php %}
<?php
class MyFrameworkModule extends \Codeception\Util\Framework {
	public $kernel;
}	
?>
{% endhighlight %}

In helper:

{% highlight php %}
<?php 
class TestHelper extends Codeception\Module {

	public function doSomeTrickyStuff()
	{
		$kernel = $this->getModule('MyFrameworkModule')->kernel;
		$kernel->doTrickyStuff();
	}
}
?>
{% endhighlight %}

In case you want to provide flexibility you can add configurable parameters to your module.
Let's update our example to use additional parameters.

{% highlight php %}
<?php
class MyFrameworkModule extends \Codeception\Util\Framework {
	
	// paramter with default var
	protected $config = array('file_name' => 'app.php');

	// a parameter that we can't guess	
	protected $requiredFields = array('app_name');

	public function _initialize()
	{
		// $app implements HttpKernelInterface
		$app = require_once Codeception\Configuration::projectDir().$this->config['file_name'];
		$app->setEnvironment('test');
		$app->init($this->config['app_name']);
		$this->kernel = $app;
	}
}	
?>
{% endhighlight %}

Module won't start if `app_name` parameter is not set. But `file_name` parameter is optional and can be redefined. 

In the end here how should look `functional.suite.yml` that includes your newly developed module:

{% highlight yaml %}
class_name: TestGuy
modules:
	enabled: [MyFrameworkModule, TestHelper]
	config:
		MyFrameworkModule:
			app_name: blog
{% endhighlight %}

Keep in mind that main principles of all Codeception modules are simple and smart. 
This means, if you can guess some parameters - do not require them to be explicitly set. 

## Conclusion

It's pretty simple to integrate any framework if it's modern and built with Symfony Components. 
If you have various projects using this framework and you want to get it tested well, try to develop integration. It's not that hard: only 3 methods to implement. Share your work with others, and let it be added to main package.

We appreciate all contributions and all frameworks. Let's unite the PHP world!