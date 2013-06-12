---
layout: post
title: "Getting on Testing Ship"
date: 2013-06-12 22:03:50
---

In this blogpost we will try to figure out how to get faster into the testing. What tests to write at first?
Let's say we already have a project and we didn't practice TDD/BDD developing it. Should we ignore testing at all? Definitely no. So where should we start then?

#### Meet the Pyramid

There is a very basic schema for proper the testing suite. It is called the **Pyramid of Testing**.

[!Testing Pyramid](https://dl.dropboxusercontent.com/u/930833/CodeceptionHotcodePresentation/pictures/pyramid.png)

This concept was originally proposed by [by Mike Cohn, his book "Succeeding with Agile"](http://www.amazon.com/gp/product/0321579364) and became the one of the fundamentals in testing. In this schema all tests are divided into 3 or 4 layers and states the dependencies for those layers. You won't build a pyramid having only top and bottom of it. That means that your acceptance tests depend on your integration (functional) tests, and they depend on unit tests. Also pyramid shows you the proportion for tests that should be written. You should have lots of unit tests, some functional, and few of acceptance. 

#### Skip the unit tests.

In web development with PHP we are not building the software from scratch. 
We use frameworks and content management systems and to create web sites and applications on top of them.

**For platforms like Drupal or Wordpress we can't unit test our application at all.**

And even modern PHP frameworks may not help you with unit testing. Tracking and mocking dependencies, especially in controllers can become a pain. If you feel that it takes for you too long for writing unit tests, skip them for now.

**There is nothing wrong to start testing with no unit test actually written.** As it was said, if you do WordPress development, inability to write unit tests, should not be excuse for not testing at all. If you develop with framework you can rely on its internals and its unit tests, thus you can start building a new level to your pyramid. With integration or functional tests.

#### Getting it tested with Codeception

*If you are new to Codeception, [check our guides](http://codeception.com/docs/02-GettingStarted).*

We recommend to start with covering your most crucial parts of your application functional tests, [if your framework supports them](http://codeception.com/docs/05-FunctionalTests#Frameworks). Be aware, that stability of framework modules in Codeception can vary. If Codeception does not have a module for your framework, you can stick to [PhpBrowser](http://codeception.com/docs/modules/PhpBrowser). Actually you should think of it as level of functional / integration testing. It does not work with GUI, it does not require a browser, thus it runs much faster then acceptance tests. So if you don't plan to use one of the frameworks module, place PhpBrowser to functional testing suite and use TestGuy to manipulate it.

When your most important functionality is covered with functional tests, you should cement the basement with unit tests and build a top with Selenium acceptance tests. 

At first try to keep tested the most important parts of your application. If you can do that with units, you are the hero! If not, try to do it on functional testing level, if still no, PhpBrowser is your choice. But please do not start testing with Selenium tests!

Then you should extend your testing suite to cover more and more parts. Please remember the pyramid, and use code coverage reports to track which code parts are still terra incognita.