---
layout: post
title: "Codeception 4.0 Released"
date: 2019-12-18 01:03:50
---

We are finally here!

Codeception 4.0 is released and this means a lot for us!

After long months on spitting core into modules, publishing new packages and sertting up build pipelines, we are proud to show you the result.

As you, know - Codeception 4 changes the way it is installed. From now on, Codeception package won't include any modules by default and you will need to install them manually. This can be a bit annoying at first but in the end this will allow you to upgrade each package individually and not relying on the core.

In Codeception 4 we also **added support for Symfony 5**, so if you plan to use the latest Symfony components - you really need to upgrade today.

## Upgrade to Codeception 4

To start upgrading to Codeception 4 bump a version in `composer.json` and run `composer update`.

```
"codeception/codeception": "^4.0"
```

To simplify upgrading process **we introduced an upgrade script** which will go through your config file and scan for all included modules. Corresponding packages will be added to composer.json, so you could install all Codeception modules you need. 

Run upgrade script on current project:

```
php vendor/bin/codecept init upgrade4
```

Script will upgrade your `composer.json` file and it is recommended to run `composer update` immediately, so new modules will be installed. 

> If you use several Codeception configs for multiple bundles you will need to execute upgrade script for each of them.

Congratulations! Upgrade is done. Now you will be able to use each module individually.

**Thanks to Gintautas Miselis @Naktibalda for splitting the core and working Symfony support**

## What's new in 4.0

Since 4.0 our [longread changelogs](https://codeception.com/changelog) are gone. So to track changes in modules you will need to to to corresponding repositories and read changelogs. For instance, here is [the changelog for Db module](https://github.com/Codeception/module-db/releases).

However, we will still publish changelogs for core changes here. And one of the most interesting feature coming to Codeception 4 is command stashing in interactive pause.

Codeception 3.0 introduced interactive pause for better writing and debugging tests. By adding `$I->pause()` to your tests you could try all Codeception commands while a test will be interruped. This helps for browser testing and framework testing, so you could try commands in action before leaving a test.

In Codeception 4.0 this instrument was improved so you could automatically stash all successful commands:

![](https://user-images.githubusercontent.com/846343/70369505-896e9000-18f5-11ea-8f31-76d6846a859c.png)

Use hot keys to save successful commands into a file. So you no longer need to keep in mind which commands you need to take into your test. Just copy all successful commands and paste them into a test. 

Stashing was brought to you by Poh Nean

---

Thanks you for using Codeception, and thank you for staying with us this years. 
It is December 2019, so it means that **Codeception turns 8**. Through these years we reached 15Mln installations on Packagist, we are used in some well known companies and we became a valuable part of PHP ecosystem.


We accept congratulations [in twiiter](https://twitter.com/codeception) or [on OpenCollective](https://opencollective.com/codeception). If your business gets some value from Codeception it is ok to pay its maintainers. Especially, today, when we have to maintain not one repository but 15 of them! So, if possible, talk to your boss and ask for sponsoring Codeception. This really values a lot to us, Codeception Team, and it will motivate us to work more on Codeception.

We say "thank you" to all our current and previous sponsors:

* Thanks to **[ThemeIsle](https://opencollective.com/themeisle)** for becoming our first regular financial contributor
* Thanks to Sami Greenbury, Lars Moelleken, Dan Untenzu for investing their own money into open-source
* Thanks to Rebilly and 2Amigos who fully supported the development since 2013 till 2016
* Thanks to Seravo for sponsoring Codeception 3.0 release.

That's all. Upgrade to Codeception 4 and improve your testing!
