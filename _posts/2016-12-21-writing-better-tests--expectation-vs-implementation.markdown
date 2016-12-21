---
layout: post
title: "Writing Better Tests: Expectation vs Implementation"
date: 2016-12-21 01:03:50
---

![](/images/car_test.jpg)

What makes a meaningful test? This question should always be asked. No matter we write your tests first or tests after, they may stay in a project for years and it is pretty important them to test the things that really matters. Badly written tests can slow us down by constantly failing on each implementation change, and such tests can be written no matter you follow TDD or not. The idea of a test is to ensure that software works and not to freeze it at specific point.

Such situation happens when a test is bound to implementation details. We are choosing to rely on parts which we may consider to be stable but they are not. Whenever we come to unit testing and we are writing a mock we should understand that we change the reality, and how that artificial reality will survive the test of time. Consider using such test written in XIX century as an example: 

```gherkin
Given I am drunk 
And I am in a pub
And I want to get home
When I order a cab
Then I expect to see 2 horses and carriage
And they bring me home
```

By ordering a cab nowadays you probably won't expect to see 2 horses but you probably will get home even faster. In XXI century we still have pubs and we still need cabs to get home, that's something stable in our world. The point is: you should not be worried of HOW you will be brought home: by horses, by car, by flying dragons or by teleport. That's implementation details.

But how to understand what is stable and what is not? We need to use interfaces. Not that one which is written as `interface` keyword in PHP but a general term: User Interface, API. And that's what makes unit testing and browser testing similar: **we always need to rely on public interfaces for a test**. If break this rule and we start to test private methods or raw values in database we are producing a synthetic tests which will lead us the very tricky path. 

An opposite to follow public APIs is to depend on implementation. 

But back to software development. Here is an example of [magento generators](https://github.com/jamescowie/magento2-generators/blob/develop/spec/Generators/Type/ModuleSpec.php) written in PhpSpec. Not saying it is bad or not, but we use it to illustrate the point.

```php
<?php
class ModuleSpec extends ObjectBehavior
{
  function let(\Symfony\Component\Filesystem\Filesystem $filesystem)
  {
      $this->beConstructedWith($filesystem);
  }

  function it_should_create_a_folder_given_a_valid_path($filesystem)
  {
      $path = 'app/code/test/test';
      $filesystem->exists($path)->willReturn(false);
      $filesystem->mkdir($path, 0700)->willReturn(true);
      $this->make($path)->shouldReturn(true);
  }
}
```

The test is very descriptive: there is a class that depends on `Filesystem` and can be used to create a given folder. However, one line is questionable:

```php
$filesystem->mkdir($path, 0700)->willReturn(true);
```

This is the mock that expects `mkdir` to be called with a specific parameters and to return an expected result. 
But is that stable to changes? What if at some point `mkdir` gets deprecated in favor of `mkdirPlus`, what if a method signature changes? 

Well, in this current case we can be sure that this method won't be changed. The reason is simple: it's Symfony, it's LTS, and its API is stable. However can you say that for internal classes of your application? That they are 100% documented and won't change its behavior in future. 

When we change the implementation of `Module->make()` it still fits expected specification ('it should create a folder given a valid path'), but the test fails. This happens because the test pretend to know too much. In similar manner a strict master doesn't just ask apprentice to do the job. He thinks he knows better how to do it and provides him with a detailed instructions. He doesn't care of the outcome but apprentice should understand the basics: disobedience will be prosecuted.

But what if the actual result is not important to us? What if we want to ensure that tested method took the right path. That what happens in a test above: the implementation is verified. Indeed, If you are master (senior developer) and you have an apprentice (junior), this works pretty well: you ask them to implement the method just the way you see it. 

This makes a difference between **testing behavior or testing result**. Probably in most cases you want to test the real outcome, a result, but in some important areas you may need to test the behavior as well.

To test a result **we should rely on public interfaces only. We can validate class only by calling public method of this class and its collaborators**
In this case we need to call `$filesystem->exists('app/code/test/test')`, and make a class with in-memory filesystem. We can even make this class without using any mocking framework, just with [anonymous classes](http://php.net/manual/en/language.oop5.anonymous.php).

By making a test bound to implementation we are copying parts of that implementation into a test. This breaks the *DRY* principle. At some point test and code can be unsynchronized and this leads to fragility. If you change class, the test using a mock of that class may still pass, but actual code using it will fail, and this false positiveness is dangerous.


Overusing mocks also makes tests longer. Lines of test code you write doesn't always convert to software quality. Actually, from the software developer experience the true is quite the contrary: the more code you write the more bugs you may introduce. And your tests are just the same as production code: they will evolve with your software and they needs to be maintained.

So the actionable advice here is to think **what is important to you: a behavior or a result** (no matter how it is achieved). Try to **discover what is stable and what is not, rely on stable parts, and use public interfaces**. Thanks for reading. 