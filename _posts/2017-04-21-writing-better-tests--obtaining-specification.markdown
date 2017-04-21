---
layout: post
title: "Writing Better Tests: Obtaining Specification"
date: 2017-04-21 01:03:50
---

When you start implement testing in your development process you should always ask: which tests are important for this project. And there is no general answer to this question. "Test everything, everywhere" is not a good solution as well, by writing more and more lines of code you won't stable software. Tests should be driven by specification, and specification comes from your business. Depending on that you should choose which areas are more important to cover with tests and which are less.

[Part 1: Expectation vs Implementation](http://codeception.com/12-21-2016/writing-better-tests-expectation-vs-implementation.html)

It is always thought that you should have several acceptance tests, a dozen of functional, and a lot of unit or integration tests. However, If you develop a media portal it is more important to you, and for your business to have a good-looking UI. Same story if you develop new To-Do application focused on perfect UX. It is not much business logic for a To-Do app, but you need to ensure that everything user sees is slick. Even you have some internal bugs it is more important to you to assure that all buttons are visible, they can be easily clicked and so on.

Like in this app:

![](/images/wunderlist.png)

That's right for this type of applications you should revert your testing pyramid. You should have lots of acceptance tests and few unit/integration.

If UI/UX is a part of your business, concentrate on acceptance (browser) tests. But if you run banking application, ecommerce solution, ERP or CRM, UI is not that important. Those applications include complex domain logic and internal quality is much more important than visual part.

What if user by a bug creates 3 extra todos in To-Do app? Well, it doesn't look nice but not a big deal. But what if user by a bug withdraws from ATM 3 times more money they own? That's a real problem. In case, you **deal with money or real** things it is critically important to test all the business processes. Test all possible scenarios, all edge cases, make the domain to be 100% covered with tests.

![](/images/test-layers.png)

That brings us to key idea of this post. There are two kinds of IT products:

* software that automates business
* software that is a business by itself

And depending on the kind of software you work on you have different priorities.
This also answers a question: "do I need BDD for my project". In case, you are automating traditional business, you need to translate all business processes into a code, and you need ubiquitous languages for that. In case, you are building a new business, a startup, you probably don't need that layer of complexity as presumably founders already speak the IT language.

So learn what is important in your business. What brings you money. What are the risks. Cover that part at first and think from business side and not from technical. This is how a business would understand the real value of automated tests.

*Written by Michael Bodnarchuk*


<p style="background: rgba(255,255,0,0.3)">We provide <a href=" http://sdclabs.com/codeception?utm_source=codeception.com&utm_medium=post&utm_term=link&utm_campaign=reference">consulting services</a> on Codeception and automated testing in general.</p>