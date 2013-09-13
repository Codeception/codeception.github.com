---
layout: post
title: "Understanding AspectMock"
date: 2013-09-13 22:03:50
---

As you may know, [AspectMock]() is non-ordinary mocking framework that can override any method of any class in your application. This is practically useful If you want to unit test code, which was not aimed to be testable from start. Also AspectMock gives you power to write efficient code at first, and not affect production code with testing design.

## Test Design

Even AspectMock proposes a flexibility in testing, it doesn't drive you into bad application design.
If you use classes globally (without injecting them) or you use static properties, methods, or singletones, it's all right while they are defined as your internal API. Such API methods should be well documented, especially for cases, where they should be used, and where not.

If we use ActiveRecord pattern, we can assume that all models are inherited from `ActiveRecord` class.
The only point in which our models is accessing database is `save` method of that class.
Thus, we need only to block its call, If we don't want the database to be hit.

{% highlight php %}
<?php
test::double('ActiveRecord', ['save' => false]);
$user = new User(['name' => 'davert']);
$user->save(); // false
?>
{% endhighlight %}

Sure, integration testing using database gives us more reliable results. And no one ignores that fact. But unit tests allows to cover more cases, without implementing and loading fixtures. They are much faster too.

## Features and Drawbacks

AspectMock may sounds cool for you, but you feel that there should be pitfalls. 
Let's be honest, and list all of them here. 

* The most common issue is to get AspectMock installed. We won't list different configuration options here, they are well documented in Github readme. But the idea is pretty simple: you should include directories with files expected to be mocked. If you don't rely completely on autoloader from composer, you should include your autoloaders too.
* AspectMock will slow down execution in about 20%. That's because all methods of all classes are intercepted.

You may be curious **If AspectMock affect the stack traces?** The answer is **no**. AspectMock (starting from 0.4) does not change the line order in mocked classes, thus you get truth worthy information in stack trace. Sure, AspectMock changes those files, a bit, but more about that in next section.

**Can I debug my tests when using AspectMock?** And here are the good news: **Sure, you can!** In Debug mode you will see your classes, with no mock including in them.

To summarize: AspectMock has no side effects on unit testing process. Its magic is properly hidden to not affect the development.

## Dark Magic Inside

Before implementing AspectMock into your project you might want to know, how it works in details.
AspectMock is powered by [Go Aop Framework](http://go.aopphp.com/). 

Go AOP Framework uses [**php stream wrappers with filter**](http://php.net/manual/en/wrappers.php.php) to parse PHP files before requiring them. That may even happen in runtime.
Thus, by analyzing file, we can find all its methods, and inject mocking code into it. To do so, all `requires`should include a filter. This will look like: 

{% highlight php %}
<?php
require 'myfile.php';
?>
{% endhighlight %}
will be replaced with
{% highlight php %}
<?php
require 'php://read=go.source.transforming.loader/resource=myfile.php';
?>
{% endhighlight %}

That will make PHP file to be parsed before loading, and changed on the fly.
Go AOP is pretty smart to cache already parsed files. 

Now time comes for AspectMock. For every method of every class, AspectMock inserts one line into very beginning of method definition. This sample class

{% highlight php %}
<?php
class User {
	
	function setName($name)
	{
		$this->name = $name;
	}	

}
?>
{% endhighlight %}

will be replaced with:

{% highlight php %}
<?php
class User {
	
	function setName($name)
	{ if (($__am_res = __amock_before($this, __CLASS__, __FUNCTION__, array($name), false)) !== __AM_CONTINUE__) return $__am_res; 
		$this->name = $name;
	}	

}
?>
{% endhighlight %}

As you see only one line is added. If a stub was registered for this method, its result will be returned, and method itself won't be invoked. 

If you will enter into class in debug mode, you won't see the line injected by AspectMock. But you will notice its there, even not show, in step by step debug.

And that's probably all the dark magic you should be aware of. Probably it's not too tricky and you will get along with it.

## Conclusion

Unit tests are important part of testing pyramid. They are fast and they are flexible. You should not ignore them just because it may be hard for you to implement them. Its not that hard anymore. With AspectMock you can get a good code coverage with less efforts for any kind of modern php application.