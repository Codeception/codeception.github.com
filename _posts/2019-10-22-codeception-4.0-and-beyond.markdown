---
layout: post
title: "Codeception 4.0 and beyond"
date: 2019-10-22 01:03:50
---


Today we would like to share our plans for the future of Codeception. 
We are going to release two major versions soon and we are ready to do so!
If you want to stay on board and get the latest updates, please read this post carefully. We will explain the reasoning behind the new release process and the upgrade path, which should be pretty simple to you!

As you know, we are very proud of our policy of keeping backward compatible releases. We know that tests should be stable and reliable at first. If a business is still powered by PHP 5.6, this is a business issue, and we can't force a company to upgrade all their servers and processes just to support some more testing. 

### Codeception 4.0 is coming, 5.0 is on the way. Be prepared!

However, keeping backward compatibility is harder and harder because of our dependencies - PHPUnit & Symfony. They all go forward, break API and require newer versions of PHP and to follow them we need to do the same. 

But can't leave you without upgrades even if you don't plan to switch to the latest Symfony or PHPUnit. That's why we announce **decoupling of Codeception**.

That's right! Since Codeception 4.0 **the core will be separated from Codeception modules and extensions**. This allows you to get the latest updates for the modules you use while keeping running Codeception on PHP 5.6+ with your set of dependencies.

![](/images/decoupled-modules.png)

*See all modules decoupled at [Codeception organization](https://github.com/codeception)*

After Symfony 5 is released we will release Codeception 5.0, with a direct dependency on Symfony 5 components. If you never plan to upgrade to Symfony 5 you can keep using Codeception 4, as (again) all modules are independent of the core. Codeception 5 (and upcoming versions) will support only the latest major versions of Symfony & PHPUnit.

Transforming into a new release takes time and requires hard work from the Codeception team. **Many thanks go to Gintautas Miselis @Naktibalda** for doing the hardest work on splitting modules into repositories. Maintaining many repositories instead of one also requires more involvement from us. It would be easier for us just to release major versions every year and ask you to upgrade. But we didn't do that. We care about you.

That's why we ask you to **sponsor development of Codeception**. Please talk to your boss, to your CTO, to your marketing team, to your CEO. Tell that reliable software comes with a cost and if tests save your life, it's a good time to give back! 

Now you donate in [a few clicks on OpenCollective](https://opencollective.com/codeception/)!

<p class="text-center">
<a href="https://opencollective.com/codeception/" class="btn btn-lg btn-success" role="button">Sponsor Codeception</a></p>

Sponsors receive priority support from our team, can ask for consulting, and add their logo on our website! Over 15K PHP developers visit our website monthly. If your brand needs to be recognizable in the PHP community - sponsoring Codeception is a very good opportunity for you!

---

From your side, we will prepare an upgrade script from version 3.x to 4.x. So once Codeception 4.0 is released you will be able to run a smooth upgrade. 

We won't accept patches to 3.1 branch, so please send your pull requests to the corresponding module repositories or to 4.0 branch of the core. 

A few notes on a new release process:

* Each module will be released independently. You won't need to wait for a month for a patch.
* Documentation for modules on codeception.com will be updated each month.
* Phar will contain only framework-agnostic modules (PhpBrowser, WebDriver, REST, Db) and will have a rolling weekly release.

Official 4.0 release announcement coming soon as we need to prepare our website site and update documentation. Stay tuned and consider donating Codeception. We require your support these days!

