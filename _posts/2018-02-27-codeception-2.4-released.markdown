---
layout: post
title: "Codeception 2.4 released"
date: 2018-02-27 01:03:50
---

Hello everyone! We'd like to announce the immediate **availability of Codeception 2.4.0**.

This follows up the PHPUnit release and mostly contains **compatibility fixes for PHPUnit 7**. Internal usage of PHPUnit in Codeception was switched to new namespaced class names. This doesn't break any public APIs but can break some setups. That's why this is a minor release with a proper announcement. Please upgrade and unless you have some PHPUnit version conflict you should not experience any issues.

Codeception 2.4.0 is a stability release. We **dropped unmaintained PHP 5.4 and PHP 5.5**. But we keep compatibility with PHP 5.6 so if your company still uses PHP 5 (and we understand business reasons) you can install this update too. Codeception is still going to be maintained with PHP 5.6 compatibility in mind. We don't break API just for the sake of clean code. We try to make things reliable. 

In the same Codeception 2.3.9 is released, so if you want to get the latest changes and you still use old PHP, upgrade to this version.

In Codeception 2.4 you will also find new hooks for Cest files:

* `_passed` is called when a test inside Cest is successful
* `_failed` is called for unsuccessful tests
* `_after` is called at the end of a test for both cases.

Previously `_after` hook worked as `_passed` and that behavior was confusing. This was changed so it can be potentially a breaking change as well. 

[See changelog](https://codeception.com/changelog) for the complete list of fixes and improvements.

Thanks to all our contributors who made this release happen!

---

We also launched [Codeception Slack](https://join.slack.com/t/codeception/shared_invite/enQtMzE2MzgxNzM1OTUzLTcwMmMxZjMxYTdkMzljMzNjNmNiNWQ0NGNjNTY0MjJlNWNjOTI0ZWU0Mjg4YmE5NTI0MmMwNDZmNzRhOTZmNWE) to talk about testing and Codeception.

<p class="text-center">
<a href="https://join.slack.com/t/codeception/shared_invite/enQtMzE2MzgxNzM1OTUzLTcwMmMxZjMxYTdkMzljMzNjNmNiNWQ0NGNjNTY0MjJlNWNjOTI0ZWU0Mjg4YmE5NTI0MmMwNDZmNzRhOTZmNWE" class="btn-lg btn btn-info" role="button">Join Slack</a></p>


We'd also love to **see more contributors** there. We need more talented developers to help to bring new features and fix the issues. It's opensource, after all. We face constant challenges: new APIs, new libraries, new approaches, etc. And Codeception as a really big project would benefit from any help. We are open to accepting new maintainers, to discuss trends, to build a better product! As you know, we are merging 90% of submitted Pull Requests so if you are not contributing, please go ahead!

---

We try to keep Codeception going and bring more releases to you. If your company uses this framework and you'd like to give back please consider **sponsoring Codeception**. That's right. We are asking to invest into open source, to get the features you expect and to give back to open source.


<p class="text-center">
<a href="https://docs.google.com/forms/d/e/1FAIpQLSeVJWu2HJTjAE81SLiYJ1xqxAXeNNSCR_GO9R0_4CKka_nFvA/viewform?usp=send_form" class="btn btn-lg btn-warning" role="button">Sponsor Codeception</a></p>


Please show this form to your company bosses. If you want to have stable reliable product it's ok to pay for that. Be our first official sponsors!

Yes, we also provide [enterprise support](http://sdclabs.com/codeception?utm_source=codeception.com&utm_medium=top_menu&utm_term=link&utm_campaign=reference) and [trainings](http://sdclabs.com/trainings?utm_source=codeception.com&utm_medium=top_menu&utm_term=link&utm_campaign=reference). This is another way you can support the development. Thank you!

