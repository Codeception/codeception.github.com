---
layout: post
title: "New Fashioned Classics: BDD Specs in PHPUnit"
date: 2013-10-4 22:03:50
---

One of the most important requirements for tests is **maintainability**. 
The tests can live in a project for a months or even years. One day it may happen that some old tests start failing and the team got no idea about what the test does.

Does this test checks something important? Maybe specification has changed and the test should be rewritten?
The team who worked on tests that early days wrote them only to make them pass. Team is not sure what was the purpose of test.

In such situations it would have been nice if a developer who wrote the test at least has left some comments. But not. Usually no one documents tests. Test passes and developer is completely satisfied with that fact.

Proper test structure and readability is the only way to maintainable tests. **Tests must not turn to a legacy code.** Is there a way to write better tests?

The rule, dictated by BDD, is quite simple: write tests for specifications. Do not test just methods, test the behavior. As you know, there are plenty of BDD frameworks that replace classical unit testing with specification testing. You may have heard of [RSpec](http://rspec.info/) in Ruby, [Jasmine](http://pivotal.github.io/jasmine/), [Mocha](http://visionmedia.github.io/mocha/) [and others](http://jster.net/category/testing-frameworks#/bdd) in JavaScript.

If you ever did testing in JavaScript you know how popular mentioned BDD frameworks are. Why can't we have something similar in PHP? We got [PHPSpec](http://www.phpspec.net/) which is nice, but looks much different from mentioned frameworks. What if we want something more usual? Something like **Jasmine** in PHP?

Even if we had such BDD framework none will ever adopt it as we have PHPUnit for all kind of testing in PHP. We won't switch PHPUnit in favor of some geeky BDD tool. But actually to write BDD-styled tests, inspired by Jasmine we don't need to do dramatic changes.

We can use [Specify](https://github.com/Codeception/Specify), a simple trait inserted into your PHPUnit's TestCase that allows you to store several specifications in a test and write them in BDD way.

At first we will write down some specifications in a body of typical PHPUnit's test:

{% highlight php %}
<?php
// this is just a PHPUnit's testcase
class PostTest extends PHPUnit_Framework_TestCase {

	use Codeception\Specify;

	// just a regular test declaration
	public function testPublication()
	{
		$this->specify('post can be published by author');
		$this->specify('post should contain a title');
		$this->specify('post should contain a body');
		$this->specify('author of post should not be banned');		
	}
}
?>
{% endhighlight %}

Pretty sweet, we started with describing things before the test. But can't we do the same with comments?
`specify` method is much better then comments as it introduces code blocks into PHPUnit. 

To see it in action, let's write the tests.

{% highlight php %}
<?php
// this is just a PHPUnit's testcase
class PostTest extends PHPUnit_Framework_TestCase {

	use Codeception\Specify;

	// just a regular test declaration
	public function testPublication()
	{
		$this->post = new Post;
		$this->post->setAuthor(new User());

		$this->specify('post can be published by author', function() {
			$this->post->setTitle('Testing is Fun!');
			$this->post->setBody('Thats for sure');
			$this->assertTrue($this->post->publish());
		});

		$this->specify('post should contain a title', function() {
			$this->assertFalse($this->post->publish());
			$this->assertArrayHasKey('title', $this->post->errors());		
		});

		$this->specify('post should contain a body', function() {
			$this->assertFalse($this->post->publish());
			$this->assertArrayHasKey('body', $this->post->errors());		
		});

		$this->specify('author of post should not be banned', function() {			
			$this->post->getAuthor()->setIsBanned(true);

			$this->post->setTitle('Testing is Fun!');
			$this->post->setBody('Thats for sure');			

			$this->assertFalse($this->post->publish());
			$this->assertArrayHasKey('author', $this->post->errors());
		});		
	}
}
?>
{% endhighlight %}

This code blocks will be executed inside the same test. But it's important to notice that each code block is isolated, thus, when an assertion inside a block fails, the test won't stop the execution. That is how the `specify` is different from comments.

Now we've got a list of specification and code examples for each case. If one day our site will allow micro-blogging, we can easily find `post should contain a body` specification and remove it. That's pretty flexible, thus maintainable.

Please note, that all the specification are grouped by context. In plain PHPUnit you would create each code block as a separate method. This way it's pretty hard to all the tests related to one specific feature, in our case - publishing.

Ok, we got nice specifications. But can we also replace classical asserts with some more BDD stuff? Sure. We have another tiny package [Verify](https://github.com/Codeception/Verify) which is also inspired by Jasmine. `Assert` keyword is replaced either with `expect` (as Jasmine does) or `verify`. This asserts change the order of assetion to improve readability. 

Let's rewrite our test with **Verify** so you could feel the difference.

{% highlight php %}
<?php
// this is just a PHPUnit's testcase
class PostTest extends PHPUnit_Framework_TestCase {

	use Codeception\Specify;

	// just a regular test declaration
	public function testPublication()
	{
		$this->post = new Post;
		$this->post->setAuthor(new User());

		$this->specify('post can be published by author', function() {
			$this->post->setTitle('Testing is Fun!');
			$this->post->setBody('Thats for sure');
			expect_that($this->post->publish());
		});

		$this->specify('post should contain a title', function() {
			expect_not($this->post->publish());
			expect($this->post->errors())->hasKey('title');		
		});

		$this->specify('post should contain a body', function() {
			expect_not($this->post->publish());
			expect($this->post->errors())->hasKey('body');		
		});

		$this->specify('author of post should not be banned', function() {			
			$this->post->getAuthor()->setIsBanned(true);

			$this->post->setTitle('Testing is Fun!');
			$this->post->setBody('Thats for sure');			

			expect_not($this->post->publish());
			expect($this->post->errors())->hasKey('author');
		});		
	}
}
?>
{% endhighlight %}

Basically it's a deal of habit. The `expect(XX)->toBe(YY)` style is more natural for reading as you read from left to right. But If you got used to `assertXXX` syntax (where the code is read from right), you can skip **Verify** library.

---

With just a few tiny libraries we converted a classical flat PHPUnit test into separate code blocks driven by specification. Test looks very similar to what we saw in Jasmine, just as we intended.

And the piece of advice to your team: introduce a rule "no assertion without specification" to make tests readable and easy to maintain.

You can install Specify and Verify via Composer:

{% highlight bash %}
php composer.phar require "codeception/specify:*" --dev
php composer.phar require "codeception/verify:*" --dev
{% endhighlight %}

To introduce `specify` codeblocks, just add `use Codeception\Specify` into any TestCase file.
BDD styled assertions with `expect` keywords are installed automatically.

**Hint:** Isolated codeblocks are especially useful [for testing exceptions](https://github.com/Codeception/Specify#exceptions).