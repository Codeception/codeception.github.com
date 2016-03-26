---
layout: post
title: "Codeception 2.2 Beta"
date: 2016-03-26 01:03:50
---

Happy Easter, everyone! Ok, not actually everyone, but Happy Easter to those who celebrate it this weekend. 
If you do (or even not), you probably will have free time to play with something new. 
And yes, by *something* we mean a **beta version of Codeception 2.2**!

We already announced lots of changes in Codeception:

* [Test Dependencies, Params, and Conflicts](http://codeception.com/03-05-2016/codeception-2.2.-upcoming-features.html)
* [DataFactory, AngularJS, Examples, Custom Commands, ...](http://codeception.com/03-10-2016/even-more-features-of-codeception.html)

but we forgot the most important one. It is **Gherkin Support**, which allows you to combine business requirements with functional testing. Yes, `*.feature` files are now part of a family with Cest, Cept and Tests. Codeception is a tool for running all kind of tests and in this release we significantly improved test internal architecture and test formats.

But back to Gherkin. 

```gherkin
Feature: ToDo items
  In order to get my tasks done
  As a motivated person
  I need to be able to organize my todo list

  Scenario: show current todos
    Given there are todo items:
      | Task             | State   |
      | make Gherkin PR  | opened  |
      | update docs      | opened  |
      | create examples  | closed  |
    When I open my todos
    Then I should see 2 todo items
```

Complete Guide on BDD with Codeception is not ready yest, but you can start with generating first feature file:

```
codecept g:feature <suiteName> <featureName>
```

We recommend to have a special *features* folder in acceptance or functional suite, so it could be symlinked to the `features` dir in root of your project. This way non-technical users can esaily access feature files, without need to examine actual tests.

Next thing to do is to describe feature with scenarios. When you are done, prepare scenario steps for implementation be running

```
codecept gherkin:snippets <suiteName>
```

You will get a list of methods which should be included into your actor class (let's say AcceptanceTester). 
Then you should have it implemented. In theory, you can use any method of any class annotated with `@Given`, `@When`, `@Then` to be the step definition. So don't worry you will end up with everything to put in one context, you will have option to use multiple contexts depending on role, tags, etc. More about it in BDD guide coming in next weeks.

For those of you, who set your dependencies as "codeception/codecepton:*" and (with no settings of `"minimum-stability": "stable"` you will probably have some wonderful time once you get back from holidays. This release is minor, so it doesn't break everything, but we has breaking changes. We notified of breaking changes in earlier versions by "deprecation warnings", and we actually removed lots of deprecated stuff. The most important breaking change is proper implementation of [Conflicts API](http://codeception.com/03-05-2016/codeception-2.2.-upcoming-features.html#conflicts). Please make sure you are not using modules of the same kinds in your configs.

---

Codeception 2.2-beta is available for installation only via Composer:

```
composer require --dev "codeception/codeception:2.2.0-beta"
```

Next steps to do:

* [Read the changelog](https://github.com/Codeception/Codeception/blob/master/CHANGELOG.md)
* Refer to updated [module docs for this beta release](https://github.com/Codeception/Codeception/tree/master/docs/modules) in master branch.

Stable release will come in next week(s). The release date depends on reported issues and on progress of updating documentation.

Have nice weekends and testing time!
We, Codeception team, hope you will love our product.

P.S. Reported issues should include a version. Pull Requests should be sent to master branch.