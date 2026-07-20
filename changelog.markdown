---
layout: page
title: Codeception Changelog
---

<div class="alert alert-warning">Download specific version at <a href="/builds">builds page</a></div>

# Changelog



### module-mezzio 4.1.0: 4.1.0

Released by [![](https://avatars.githubusercontent.com/u/152236?v=4&s=16){:height="16" width="16"} Slamdunk](https://github.com/Slamdunk) on 2026/04/08 14:18:15 / [Repository](https://github.com/Codeception/module-mezzio)   / [Releases](https://github.com/Codeception/module-mezzio/releases)



## What's Changed
* Migrate from container-interop to psr/container by **[luiscunhaafricainternetgroup](https://github.com/luiscunhaafricainternetgroup)** in https://github.com/Codeception/module-mezzio/pull/21


**Full Changelog**: https://github.com/Codeception/module-mezzio/compare/4.0.2...4.1.0


### module-redis 3.2.3: 3.2.3

Released by [![](https://avatars.githubusercontent.com/u/20659830?v=4&s=16){:height="16" width="16"} W0rma](https://github.com/W0rma) on 2026/02/18 06:48:20 / [Repository](https://github.com/Codeception/module-redis)   / [Releases](https://github.com/Codeception/module-redis/releases)



## What's Changed
* Add support for sebastian/comparator v8 in https://github.com/Codeception/module-redis/pull/25


**Full Changelog**: https://github.com/Codeception/module-redis/compare/3.2.2...3.2.3


### module-webdriver 4.0.5: 4.0.5

Released by [![](https://avatars.githubusercontent.com/u/20659830?v=4&s=16){:height="16" width="16"} W0rma](https://github.com/W0rma) on 2026/02/18 06:32:29 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)



## What's Changed
* Add support for PHPUnit 13 https://github.com/Codeception/module-webdriver/pull/145


**Full Changelog**: https://github.com/Codeception/module-webdriver/compare/4.0.4...4.0.5


### Codeception 5.3.5: 5.3.5

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2026/02/18 06:22:46 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



## What's Changed
* PHP 8.5: Avoid accessing deprecated $http_response_header by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/Codeception/pull/6924
* Add support for PHPUnit 13 by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/Codeception/pull/6925


**Full Changelog**: https://github.com/Codeception/Codeception/compare/5.3.4...5.3.5


### lib-web 2.1.0: 2.1.0

Released by [![](https://avatars.githubusercontent.com/in/15368?v=4&s=16){:height="16" width="16"} github-actions[bot]](https://github.com/apps/github-actions) on 2026/02/06 15:23:02 / [Repository](https://github.com/Codeception/lib-web)   / [Releases](https://github.com/Codeception/lib-web/releases)



# [2.1.0](https://github.com/Codeception/lib-web/compare/2.0.1...2.1.0) (2026-02-06)


### Features

* add support for phpunit 13 ([[#23](https://github.com/Codeception/lib-web/issues/23)](https://github.com/Codeception/lib-web/issues/23)) ([a030a3a](https://github.com/Codeception/lib-web/commit/a030a3a22fc8e856b5957086794ed5403c7992d9))






### module-phpbrowser 4.0.0: 4.0.0

Released by [![](https://avatars.githubusercontent.com/in/15368?v=4&s=16){:height="16" width="16"} github-actions[bot]](https://github.com/apps/github-actions) on 2026/01/23 13:25:25 / [Repository](https://github.com/Codeception/module-phpbrowser)   / [Releases](https://github.com/Codeception/module-phpbrowser/releases)



# [4.0.0](https://github.com/Codeception/module-phpbrowser/compare/3.0.2...4.0.0) (2026-01-23)


### Features

* allow symfony 8 ([0c65e95](https://github.com/Codeception/module-phpbrowser/commit/0c65e956c1b355d0edb5b4c279265255ac4ac3f6))


### BREAKING CHANGES

* The native object return type was added to the doRequest() method of the Guzzle connector.
That might break code extending from this class.






### Codeception 5.3.4: 5.3.4

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2026/01/14 12:07:18 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



## What's Changed
* Use attributes syntax in gherkin:snippets by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/Codeception/pull/6917
* PHP 8.5: Fix usage of deprecated $http_response_header by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/Codeception/pull/6919
* Do not expect the register_argc_argv ini setting in cli for php >= 8.5 by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/Codeception/pull/6921


**Full Changelog**: https://github.com/Codeception/Codeception/compare/5.3.3...5.3.4


### module-mongodb 3.1.0: 3.1.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2026/01/09 15:54:01 / [Repository](https://github.com/Codeception/module-mongodb)   / [Releases](https://github.com/Codeception/module-mongodb/releases)



## What's Changed
* Fix CI, update PHP support and MongoDB driver by **[pbromb](https://github.com/pbromb)** in https://github.com/Codeception/module-mongodb/pull/18
* Drop support for PHP 8.0 + 8.1 by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/module-mongodb/pull/19

## New Contributors
* **[pbromb](https://github.com/pbromb)** made their first contribution in https://github.com/Codeception/module-mongodb/pull/18
* **[W0rma](https://github.com/W0rma)** made their first contribution in https://github.com/Codeception/module-mongodb/pull/19

**Full Changelog**: https://github.com/Codeception/module-mongodb/compare/3.0.0...3.1.0


### module-asserts 3.3.0: 3.3.0

Released by [![](https://avatars.githubusercontent.com/u/20659830?v=4&s=16){:height="16" width="16"} W0rma](https://github.com/W0rma) on 2025/12/24 12:38:38 / [Repository](https://github.com/Codeception/module-asserts)   / [Releases](https://github.com/Codeception/module-asserts/releases)



## What's Changed
* Test against PHP 8.5 in https://github.com/Codeception/module-asserts/pull/34
* feat: add replacements for deprecated `assertContainsOnly()` and `assertNotContainsOnly()` + drop support for `lib-asserts` < 3.1 in https://github.com/Codeception/module-asserts/pull/35
  * `assertContainsNotOnlyArray()`
  * `assertContainsNotOnlyBool()`
  * `assertContainsNotOnlyCallable()`
  * `assertContainsNotOnlyFloat()`
  * `assertContainsNotOnlyInstancesOf()`
  * `assertContainsNotOnlyInt()`
  * `assertContainsNotOnlyIterable()`
  * `assertContainsNotOnlyNumeric()`
  * `assertContainsNotOnlyObject()`
  * `assertContainsNotOnlyResource()`
  * `assertContainsNotOnlyClosedResource()`
  * `assertContainsNotOnlyScalar()`
  * `assertContainsNotOnlyString()`
  * `assertContainsOnlyArray()`
  * `assertContainsOnlyBool()`
  * `assertContainsOnlyCallable()`
  * `assertContainsOnlyFloat()`
  * `assertContainsOnlyInt()`
  * `assertContainsOnlyIterable()`
  * `assertContainsOnlyNumeric()`
  * `assertContainsOnlyObject()`
  * `assertContainsOnlyResource()`
  * `assertContainsOnlyClosedResource()`
  * `assertContainsOnlyScalar()`
  * `assertContainsOnlyString()`


**Full Changelog**: https://github.com/Codeception/module-asserts/compare/3.2.1...3.3.0


### Codeception 5.3.3: 5.3.3

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2025/12/17 15:19:44 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



## What's Changed
* Fix empty data provider case by **[joester89](https://github.com/joester89)** in https://github.com/Codeception/Codeception/pull/6866
* Fix Composer `branch-alias` for feature releases 5.3.x by **[llaville](https://github.com/llaville)** in https://github.com/Codeception/Codeception/pull/6879
* Add guard before deleting directory by **[fabacino](https://github.com/fabacino)** in https://github.com/Codeception/Codeception/pull/6877
* Remove Reflection*::setAccessible() usage by **[Disservin](https://github.com/Disservin)** in https://github.com/Codeception/Codeception/pull/6869
* Update RunProcess.php: Removing MailCatcher by **[ThomasLandauer](https://github.com/ThomasLandauer)** in https://github.com/Codeception/Codeception/pull/6815
* update readme links by **[Arhell](https://github.com/Arhell)** in https://github.com/Codeception/Codeception/pull/6882
* chore: allow installation of lib-asserts v3 by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/Codeception/pull/6887
* Replace backtick with shell_exec to prevent php8.5 deprecation by **[craig-mcmahon](https://github.com/craig-mcmahon)** in https://github.com/Codeception/Codeception/pull/6892
* Readme updated: Contribution link fixed by **[Sunsetboy](https://github.com/Sunsetboy)** in https://github.com/Codeception/Codeception/pull/6895
* Update Cest.php: Minor rewording by **[ThomasLandauer](https://github.com/ThomasLandauer)** in https://github.com/Codeception/Codeception/pull/6897
* Update composer.json: Updating description by **[ThomasLandauer](https://github.com/ThomasLandauer)** in https://github.com/Codeception/Codeception/pull/6896
* Fix test for lib-asserts v3 by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/Codeception/pull/6899
* Avoid declaring nullable parameter implicitly in BuildCest by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/Codeception/pull/6900
* Add support for never return type in DryRun by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/Codeception/pull/6901
* Fix ci when using behat/gherkin v4.15 by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/Codeception/pull/6902
* Test against PHP 8.5 by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/Codeception/pull/6903
* CI: fix module-phpbrowser test in experimental build by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/Codeception/pull/6904
* Bump actions/checkout from 3 to 6 by **[dependabot](https://github.com/dependabot)**[bot] in https://github.com/Codeception/Codeception/pull/6893
* Remove obsolete version check in tests by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/Codeception/pull/6907
* Add support for iterable return type in DryRun by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/Codeception/pull/6906
* Add support for symfony 8 by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/Codeception/pull/6898
* Use upper-cased suite names by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/Codeception/pull/6909
* Update readme.md: Cleaning up Installation by **[ThomasLandauer](https://github.com/ThomasLandauer)** in https://github.com/Codeception/Codeception/pull/6911
* Update Run.php: Adding `codecept run -g failed` by **[ThomasLandauer](https://github.com/ThomasLandauer)** in https://github.com/Codeception/Codeception/pull/6910

## New Contributors
* **[joester89](https://github.com/joester89)** made their first contribution in https://github.com/Codeception/Codeception/pull/6866
* **[llaville](https://github.com/llaville)** made their first contribution in https://github.com/Codeception/Codeception/pull/6879
* **[Disservin](https://github.com/Disservin)** made their first contribution in https://github.com/Codeception/Codeception/pull/6869
* **[Sunsetboy](https://github.com/Sunsetboy)** made their first contribution in https://github.com/Codeception/Codeception/pull/6895
* **[dependabot](https://github.com/dependabot)**[bot] made their first contribution in https://github.com/Codeception/Codeception/pull/6893

**Full Changelog**: https://github.com/Codeception/Codeception/compare/5.3.2...5.3.3


### module-redis 3.2.2: 3.2.2

Released by [![](https://avatars.githubusercontent.com/u/20659830?v=4&s=16){:height="16" width="16"} W0rma](https://github.com/W0rma) on 2025/12/16 07:40:07 / [Repository](https://github.com/Codeception/module-redis)   / [Releases](https://github.com/Codeception/module-redis/releases)



## What's Changed
* Test against PHP 8.5 in https://github.com/Codeception/module-redis/pull/24
* Allow PRedis version 3 by **[ChrisTitos](https://github.com/ChrisTitos)** in https://github.com/Codeception/module-redis/pull/23

## New Contributors
* **[ChrisTitos](https://github.com/ChrisTitos)** made their first contribution in https://github.com/Codeception/module-redis/pull/23

**Full Changelog**: https://github.com/Codeception/module-redis/compare/3.2.1...3.2.2


### module-webdriver 4.0.4: 4.0.4

Released by [![](https://avatars.githubusercontent.com/u/20659830?v=4&s=16){:height="16" width="16"} W0rma](https://github.com/W0rma) on 2025/12/08 13:15:00 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)



## What's Changed
* `pressKey`: Fixing typehint by **[ThomasLandauer](https://github.com/ThomasLandauer)** in https://github.com/Codeception/module-webdriver/pull/141
* Bump CI dependencies in https://github.com/Codeception/module-webdriver/pull/143
* Allow installation of codeception/lib-web v2 in https://github.com/Codeception/module-webdriver/pull/144


**Full Changelog**: https://github.com/Codeception/module-webdriver/compare/4.0.3...4.0.4


### module-filesystem 3.0.2: 3.0.2

Released by [![](https://avatars.githubusercontent.com/u/20659830?v=4&s=16){:height="16" width="16"} W0rma](https://github.com/W0rma) on 2025/12/07 05:15:24 / [Repository](https://github.com/Codeception/module-filesystem)   / [Releases](https://github.com/Codeception/module-filesystem/releases)



## What's Changed
* Test against PHP 8.2 - 8.5 + drop PHP < 8.2 in https://github.com/Codeception/module-filesystem/pull/23
* Support symfony/finder v8 in https://github.com/Codeception/module-filesystem/pull/24

**Full Changelog**: https://github.com/Codeception/module-filesystem/compare/3.0.1...3.0.2


### lib-web 2.0.1: 2.0.1

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2025/11/27 21:15:41 / [Repository](https://github.com/Codeception/lib-web)   / [Releases](https://github.com/Codeception/lib-web/releases)



## What's Changed
* Test against PHP 8.5 by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/lib-web/pull/19
* Allow Symfony 8 by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/lib-web/pull/20
* Update Web.php: Added hints that `seeCurrentUrlEquals` etc. are only … by **[ThomasLandauer](https://github.com/ThomasLandauer)** in https://github.com/Codeception/lib-web/pull/18


**Full Changelog**: https://github.com/Codeception/lib-web/compare/2.0.0...2.0.1


### module-doctrine 3.3.0: 3.3.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2025/11/13 08:09:32 / [Repository](https://github.com/Codeception/module-doctrine)   / [Releases](https://github.com/Codeception/module-doctrine/releases)



## What's Changed
* Update Doctrine.php: Typo by **[ThomasLandauer](https://github.com/ThomasLandauer)** in https://github.com/Codeception/module-doctrine/pull/43
* Remove Reflection*::setAccessible() calls by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/module-doctrine/pull/44
* Enable native lazy objects if possible to fix the CI when using symfony 8 by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/module-doctrine/pull/45
* Fix deprecation warnings in doctrine/collections:2.4 by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/module-doctrine/pull/46
* Drop PHP 8.1 + test against PHP 8.5 by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/module-doctrine/pull/48
* Fix test with object id by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/module-doctrine/pull/47


**Full Changelog**: https://github.com/Codeception/module-doctrine/compare/3.2.0...3.3.0


### module-asserts 3.2.1: 3.2.1

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2025/10/29 14:44:06 / [Repository](https://github.com/Codeception/module-asserts)   / [Releases](https://github.com/Codeception/module-asserts/releases)



## What's Changed
* chore: allow installation of lib-asserts v3 by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/module-asserts/pull/33


**Full Changelog**: https://github.com/Codeception/module-asserts/compare/3.2.0...3.2.1


### lib-web 2.0.0: 2.0.0

Released by [![](https://avatars.githubusercontent.com/in/15368?v=4&s=16){:height="16" width="16"} github-actions[bot]](https://github.com/apps/github-actions) on 2025/09/04 11:39:54 / [Repository](https://github.com/Codeception/lib-web)   / [Releases](https://github.com/Codeception/lib-web/releases)



# [2.0.0](https://github.com/Codeception/lib-web/compare/1.0.7...2.0.0) (2025-09-04)


### Bug Fixes

* **ci:** correct branch name ([f901da6](https://github.com/Codeception/lib-web/commit/f901da66668ddaeb8bb9dd2b1e8b19dd83e96b99))






### module-phpbrowser 3.0.2: 3.0.2

Released by [![](https://avatars.githubusercontent.com/in/15368?v=4&s=16){:height="16" width="16"} github-actions[bot]](https://github.com/apps/github-actions) on 2025/09/04 10:46:47 / [Repository](https://github.com/Codeception/module-phpbrowser)   / [Releases](https://github.com/Codeception/module-phpbrowser/releases)



## [3.0.2](https://github.com/Codeception/module-phpbrowser/compare/3.0.1...3.0.2) (2025-09-04)


### Bug Fixes

* Merge pull request [[#39](https://github.com/Codeception/module-phpbrowser/issues/39)](https://github.com/Codeception/module-phpbrowser/issues/39) from leobedrosian/fix-multipart-format-nested-arrays ([ff2ecb3](https://github.com/Codeception/module-phpbrowser/commit/ff2ecb354e5a48f80a492595ecb588b125fc9013))
* use local server in tests httpstat.us is down ([66fc8c5](https://github.com/Codeception/module-phpbrowser/commit/66fc8c5599a0191d31b7c9dd4618fe751ed92ea4))






### Codeception 5.3.2: 5.3.2

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2025/05/26 07:51:41 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



## What's Changed
* Rollback getSubscribedEvents Extension refactor by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/Codeception/pull/6862

**Full Changelog**: https://github.com/Codeception/Codeception/compare/5.3.1...5.3.2


### Codeception 5.3.1: 5.3.1

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2025/05/13 23:25:43 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



## What's Changed
* Issue 6857: Upddate Actor::__call() to have return type 'mixed' by **[troy-rudolph](https://github.com/troy-rudolph)** in https://github.com/Codeception/Codeception/pull/6858
* Fix auto-injection of the tester property by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/Codeception/pull/6856

## New Contributors
* **[troy-rudolph](https://github.com/troy-rudolph)** made their first contribution in https://github.com/Codeception/Codeception/pull/6858

**Full Changelog**: https://github.com/Codeception/Codeception/compare/5.3.0...5.3.1


### Codeception 5.2.2: 5.2.2

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2025/05/07 12:49:57 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



## What's Changed
* 5.2: Fix loading keywords in behat/gherkin v4.12 by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/Codeception/pull/6855


**Full Changelog**: https://github.com/Codeception/Codeception/compare/5.2.1...5.2.2


### module-asserts 3.2.0: 3.2.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2025/05/07 03:33:49 / [Repository](https://github.com/Codeception/module-asserts)   / [Releases](https://github.com/Codeception/module-asserts/releases)



## What's Changed
* Bump lib-asserts dependency by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/module-asserts/pull/30
* Update to PHP 8.2, Codeception 5 and static analysis by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/module-asserts/pull/31


**Full Changelog**: https://github.com/Codeception/module-asserts/compare/3.1.0...3.2.0


### Codeception 5.3.0: 5.3.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2025/05/06 19:04:29 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



## What's Changed
* Update readme.md by **[rossaddison](https://github.com/rossaddison)** in https://github.com/Codeception/Codeception/pull/6834
* Fix loading keywords in behat/gherkin v4.12 by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/Codeception/pull/6839
* Update Scenario.php: Adding default value to `current()` by **[ThomasLandauer](https://github.com/ThomasLandauer)** in https://github.com/Codeception/Codeception/pull/6798
* Simplify Step classes by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/Codeception/pull/6842
* Simplify reporter classes by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/Codeception/pull/6803
* Simplify Subscriber classes by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/Codeception/pull/6843
* Fix AssertsTest CI pipeline by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/Codeception/pull/6847
* Simplify Test classes by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/Codeception/pull/6845
* Simplify Template classes by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/Codeception/pull/6844
* Simplify Util classes by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/Codeception/pull/6846
* Simplify src root classes by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/Codeception/pull/6849
* Remove PHP 8.1 Support by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/Codeception/pull/6848
* Migrate commands to use AsCommand attribute by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/Codeception/pull/6850
* Add PHPStan by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/Codeception/pull/6851

## New Contributors
* **[rossaddison](https://github.com/rossaddison)** made their first contribution in https://github.com/Codeception/Codeception/pull/6834

**Full Changelog**: https://github.com/Codeception/Codeception/compare/5.2.1...5.3.0


### module-doctrine 3.2.0: 3.2.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2025/04/25 05:14:21 / [Repository](https://github.com/Codeception/module-doctrine)   / [Releases](https://github.com/Codeception/module-doctrine/releases)



## What's Changed
* Update Doctrine.php: Adding upgrade instructions by **[ThomasLandauer](https://github.com/ThomasLandauer)** in https://github.com/Codeception/module-doctrine/pull/29
* Declare nullable parameter types explicitly by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/module-doctrine/pull/31
* Fix support for doctrine/dbal v2 by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/module-doctrine/pull/32
* PHP 8.4: Fix E_STRICT deprecation by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/module-doctrine/pull/34

**Full Changelog**: https://github.com/Codeception/module-doctrine/compare/3.1.0...3.2.0


### module-asserts 3.1.0: 3.1.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2025/04/24 17:21:11 / [Repository](https://github.com/Codeception/module-asserts)   / [Releases](https://github.com/Codeception/module-asserts/releases)



## What's Changed
* Test against PHP 8.3 + 8.4, drop PHP 8.0 by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/module-asserts/pull/28
* Add missing assertion tests by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/module-asserts/pull/29


**Full Changelog**: https://github.com/Codeception/module-asserts/compare/3.0.0...3.1.0


### module-db 3.2.2: 3.2.2

Released by [![](https://avatars.githubusercontent.com/u/4129631?v=4&s=16){:height="16" width="16"} szhajdu](https://github.com/szhajdu) on 2025/03/03 08:10:59 / [Repository](https://github.com/Codeception/module-db)   / [Releases](https://github.com/Codeception/module-db/releases)



## What's Changed
* fix: properly quote table names with schema definition [#84](https://github.com/Codeception/module-db/issues/84) by **[sabee-bb](https://github.com/sabee-bb)** in https://github.com/Codeception/module-db/pull/86

## New Contributors
* **[sabee-bb](https://github.com/sabee-bb)** made their first contribution in https://github.com/Codeception/module-db/pull/86

**Full Changelog**: https://github.com/Codeception/module-db/compare/3.2.1...3.2.2


### module-redis 3.2.1: 3.2.1

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2025/02/24 06:24:43 / [Repository](https://github.com/Codeception/module-redis)   / [Releases](https://github.com/Codeception/module-redis/releases)



* Test against PHP 8.4 by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/module-redis/pull/20
* Support PHPUnit 12 by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/module-redis/pull/21


### lib-web 1.0.7: 1.0.7

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2025/02/23 14:06:56 / [Repository](https://github.com/Codeception/lib-web)   / [Releases](https://github.com/Codeception/lib-web/releases)



* Declare nullable parameter types explicitly for PHP 8.4 compatibility by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/lib-web/pull/12
* Test against PHP 8.4 by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/lib-web/pull/13
* Support PHPUnit 12 by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/lib-web/pull/14



### Codeception 5.2.1: 5.2.1

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2025/02/20 15:01:00 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



## What's Changed
* Support PHPUnit 12 by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/Codeception/pull/6826
* Fix missing absolute path resolving in ParamsLoader by **[garvinhicking](https://github.com/garvinhicking)** in https://github.com/Codeception/Codeception/pull/6828

**Full Changelog**: https://github.com/Codeception/Codeception/compare/5.2.0...5.2.1


### Codeception 5.2.0: 5.2.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2025/02/16 20:31:08 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



## What's Changed
* Fix FAIL message color highlighting by **[antonvolokha](https://github.com/antonvolokha)** in [#6754](https://github.com/Codeception/Codeception/issues/6754)
* Update the codebase to PHP 8.1 by **[TavoNiievez](https://github.com/TavoNiievez)** in [#6747](https://github.com/Codeception/Codeception/issues/6747)
* generate:cest: Adding `declare(strict_types=1);` and return type `void` to generated files by **[ThomasLandauer](https://github.com/ThomasLandauer)** in [#6736](https://github.com/Codeception/Codeception/issues/6736)
* Declare nullable parameter types explicitly by **[W0rma](https://github.com/W0rma)** in [#6774](https://github.com/Codeception/Codeception/issues/6774) , [#6775](https://github.com/Codeception/Codeception/issues/6775)
* chore: Included githubactions in the dependabot config ([#6471](https://github.com/Codeception/Codeception/issues/6471)) by **[SamMousa](https://github.com/SamMousa)** in [#6783](https://github.com/Codeception/Codeception/issues/6783)
* Added new option --disable-coverage-php to skip coverage.serialized report by **[adrenalinkin](https://github.com/adrenalinkin)** in [#6761](https://github.com/Codeception/Codeception/issues/6761)
* chore: add branch alias for main to fix composer install with dev deps by **[SamMousa](https://github.com/SamMousa)** in [#6787](https://github.com/Codeception/Codeception/issues/6787)
* chore(ci): prevent test CI running twice on PR branches by **[SamMousa](https://github.com/SamMousa)** in [#6788](https://github.com/Codeception/Codeception/issues/6788)
* Simplify classes by **[TavoNiievez](https://github.com/TavoNiievez)** in [#6767](https://github.com/Codeception/Codeception/issues/6767) , [#6750](https://github.com/Codeception/Codeception/issues/6750) , [#6764](https://github.com/Codeception/Codeception/issues/6764)
* PHP 8.4: `E_STRICT` deprecation by **[W0rma](https://github.com/W0rma)** in [#6802](https://github.com/Codeception/Codeception/issues/6802)
* Fix PHP 8.4 deprecation. by **[kagg-design](https://github.com/kagg-design)** in [#6811](https://github.com/Codeception/Codeception/issues/6811)
* Fix test suite names in bootstrap command by **[W0rma](https://github.com/W0rma)** in [#6813](https://github.com/Codeception/Codeception/issues/6813)
* Docs (minor) by **[ThomasLandauer](https://github.com/ThomasLandauer)** in [#6804](https://github.com/Codeception/Codeception/issues/6804) , [#6805](https://github.com/Codeception/Codeception/issues/6805) , [#6806](https://github.com/Codeception/Codeception/issues/6806) , 6807 , [#6792](https://github.com/Codeception/Codeception/issues/6792) , [#6810](https://github.com/Codeception/Codeception/issues/6810) , [#6751](https://github.com/Codeception/Codeception/issues/6751) , [#6744](https://github.com/Codeception/Codeception/issues/6744)

## New Contributors
* **[antonvolokha](https://github.com/antonvolokha)** made their first contribution in https://github.com/Codeception/Codeception/pull/6754
* **[adrenalinkin](https://github.com/adrenalinkin)** made their first contribution in https://github.com/Codeception/Codeception/pull/6761
* **[kagg-design](https://github.com/kagg-design)** made their first contribution in https://github.com/Codeception/Codeception/pull/6811

**Full Changelog**: https://github.com/Codeception/Codeception/compare/5.1.2...5.2.0


### module-webdriver 4.0.3: 4.0.3

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2025/02/14 07:14:37 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)



## What's Changed
* Support PHPUnit 12 by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/module-webdriver/pull/140
* Fix incorrect documentation of log_js_error by **[SOHELAHMED7](https://github.com/SOHELAHMED7)** in https://github.com/Codeception/module-webdriver/pull/129
* Fix ChromeDriver links by **[blankse](https://github.com/blankse)** in https://github.com/Codeception/module-webdriver/pull/137
* `pressKey`: Fixing `@param string|array<string|string> $chars` by **[ThomasLandauer](https://github.com/ThomasLandauer)** in https://github.com/Codeception/module-webdriver/pull/138
* Fix PHP 8.4 deprecation for E_STRICT constant by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/module-webdriver/pull/139
* Update WebDriver.php: reloadPage by **[ThomasLandauer](https://github.com/ThomasLandauer)** in https://github.com/Codeception/module-webdriver/pull/125

## New Contributors
* **[SOHELAHMED7](https://github.com/SOHELAHMED7)** made their first contribution in https://github.com/Codeception/module-webdriver/pull/129
* **[blankse](https://github.com/blankse)** made their first contribution in https://github.com/Codeception/module-webdriver/pull/137

**Full Changelog**: https://github.com/Codeception/module-webdriver/compare/4.0.2...4.0.3


### module-db 3.2.1: 3.2.1

Released by [![](https://avatars.githubusercontent.com/u/4129631?v=4&s=16){:height="16" width="16"} szhajdu](https://github.com/szhajdu) on 2025/02/06 19:56:35 / [Repository](https://github.com/Codeception/module-db)   / [Releases](https://github.com/Codeception/module-db/releases)



## What's Changed
* fix: allow uppercase table names by quoting the table name when fetching the primary key of a table in PostgreSQL by **[jandrusku](https://github.com/jandrusku)** in https://github.com/Codeception/module-db/pull/82

## New Contributors
* **[jandrusku](https://github.com/jandrusku)** made their first contribution in https://github.com/Codeception/module-db/pull/82

**Full Changelog**: https://github.com/Codeception/module-db/compare/3.2.0...3.2.1


### module-db 3.2.0: 3.2.0

Released by [![](https://avatars.githubusercontent.com/u/4129631?v=4&s=16){:height="16" width="16"} szhajdu](https://github.com/szhajdu) on 2025/01/31 22:25:44 / [Repository](https://github.com/Codeception/module-db)   / [Releases](https://github.com/Codeception/module-db/releases)



## What's Changed
* test: Run test against PHP 8.3 by **[szhajdu](https://github.com/szhajdu)** in https://github.com/Codeception/module-db/pull/71
* docs: Use short array syntax for consistency by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/module-db/pull/72
* feat: Configure nullable types explicitly by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/module-db/pull/73
* test: /opt/mssql-tools/bin/sqlcmd tool not found in given path by **[szhajdu](https://github.com/szhajdu)** in https://github.com/Codeception/module-db/pull/80
* test: Run test against PHP 8.4 by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/module-db/pull/77
* test: Avoid deprecated direct access to driver and dbh property by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/module-db/pull/81
* docs: Fix yaml format in PHPDoc and remove duplication by **[ThomasLandauer](https://github.com/ThomasLandauer)** in https://github.com/Codeception/module-db/pull/78
* chore: Remove unnecessary files from Composer package by **[s1lver](https://github.com/s1lver)** in https://github.com/Codeception/module-db/pull/83

## New Contributors
* **[ThomasLandauer](https://github.com/ThomasLandauer)** made their first contribution in https://github.com/Codeception/module-db/pull/78
* **[s1lver](https://github.com/s1lver)** made their first contribution in https://github.com/Codeception/module-db/pull/83

**Full Changelog**: https://github.com/Codeception/module-db/compare/3.1.4...3.2.0


### module-webdriver 4.0.2: 4.0.2

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2024/08/10 00:21:53 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)



## What's Changed
* Update WebDriver.php: Minor by **[ThomasLandauer](https://github.com/ThomasLandauer)** in https://github.com/Codeception/module-webdriver/pull/131
* Update WebDriver.php: executeJS: Removing jQuery by **[ThomasLandauer](https://github.com/ThomasLandauer)** in https://github.com/Codeception/module-webdriver/pull/127
* Update WebDriver.php: Minor by **[ThomasLandauer](https://github.com/ThomasLandauer)** in https://github.com/Codeception/module-webdriver/pull/123
* Declare nullable parameter types explicitly by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/module-webdriver/pull/134
* Improper Exception Handling in _closeSession Function by **[eXorus](https://github.com/eXorus)** in https://github.com/Codeception/module-webdriver/pull/133

## New Contributors
* **[W0rma](https://github.com/W0rma)** made their first contribution in https://github.com/Codeception/module-webdriver/pull/134

**Full Changelog**: https://github.com/Codeception/module-webdriver/compare/4.0.1...4.0.2


### module-redis 3.2.0: 3.2.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2024/07/28 11:47:55 / [Repository](https://github.com/Codeception/module-redis)   / [Releases](https://github.com/Codeception/module-redis/releases)



* Allow sebastian/comparator ^6.0 to support PHPUnit 11 by **[maryo](https://github.com/maryo)** in https://github.com/Codeception/module-redis/pull/19



### module-db 3.1.4: 3.1.4

Released by [![](https://avatars.githubusercontent.com/u/4129631?v=4&s=16){:height="16" width="16"} szhajdu](https://github.com/szhajdu) on 2024/05/16 20:15:44 / [Repository](https://github.com/Codeception/module-db)   / [Releases](https://github.com/Codeception/module-db/releases)



## What's Changed
* Support ODBC 18 in tests by **[szhajdu](https://github.com/szhajdu)** in https://github.com/Codeception/module-db/pull/66
* Validate PSR12 codestyle with PHPCS [#69](https://github.com/Codeception/module-db/issues/69) by **[szhajdu](https://github.com/szhajdu)** in https://github.com/Codeception/module-db/pull/70


**Full Changelog**: https://github.com/Codeception/module-db/compare/3.1.3...3.1.4


### module-doctrine2 3.0.4: 3.0.4

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2024/04/04 16:33:24 / [Repository](https://github.com/Codeception/module-doctrine2)   / [Releases](https://github.com/Codeception/module-doctrine2/releases)



## What's Changed
* Test against PHP 8.2 + 8.3 by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/module-doctrine2/pull/76
* Update composer.json: Adding `abandoned` by **[ThomasLandauer](https://github.com/ThomasLandauer)** in https://github.com/Codeception/module-doctrine2/pull/80

**Full Changelog**: https://github.com/Codeception/module-doctrine2/compare/3.0.3...3.0.4


### Codeception 5.1.2: 5.1.2

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2024/03/07 07:22:27 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



* Prevent unrelated error from being displayed if a scenario step has failed by **[craig-mcmahon](https://github.com/craig-mcmahon)** in [#6743](https://github.com/Codeception/Codeception/issues/6743)
* Replace Laravel5 with Laravel module in module installation suggestion by **[W0rma](https://github.com/W0rma)** in [#6742](https://github.com/Codeception/Codeception/issues/6742)


### module-db 3.1.3: 3.1.3

Released by [![](https://avatars.githubusercontent.com/u/4129631?v=4&s=16){:height="16" width="16"} szhajdu](https://github.com/szhajdu) on 2024/03/04 19:29:12 / [Repository](https://github.com/Codeception/module-db)   / [Releases](https://github.com/Codeception/module-db/releases)



## What's Changed
* [bugfix] [#49](https://github.com/Codeception/module-db/issues/49) Fix last insert id return type in case of dblib (3.x) by **[szhajdu](https://github.com/szhajdu)** in https://github.com/Codeception/module-db/pull/56

## New Contributors
* **[szhajdu](https://github.com/szhajdu)** made their first contribution in https://github.com/Codeception/module-db/pull/56

**Full Changelog**: https://github.com/Codeception/module-db/compare/3.1.2...3.1.3


### Codeception 5.1.1: 5.1.1

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2024/02/23 21:53:22 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



* Reimplemented coverage:exclude option for PHPUnit 11 in [#6739](https://github.com/Codeception/Codeception/issues/6739)
* Improved output of Bootstrap command  by **[ThomasLandauer](https://github.com/ThomasLandauer)** in [#6735](https://github.com/Codeception/Codeception/issues/6735)


### module-doctrine 3.1.0: 3.1.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2024/02/17 22:38:06 / [Repository](https://github.com/Codeception/module-doctrine)   / [Releases](https://github.com/Codeception/module-doctrine/releases)



## What's Changed
* Support doctrine/orm v3 + doctrine/dbal v4 by **[W0rma](https://github.com/W0rma)** and **[Victor-Truhanovich](https://github.com/Victor-Truhanovich)** in https://github.com/Codeception/module-doctrine/pull/26
* Test against PHP 8.2 + 8.3 by **[W0rma](https://github.com/W0rma)**
* Remove version number from the module name by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/module-doctrine/pull/28



### module-webdriver 3.2.2: 3.2.2

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2024/02/16 14:01:34 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)



* Fix namespace mismatch of ActionSequence by **[mbrodala](https://github.com/mbrodala)** in https://github.com/Codeception/module-webdriver/pull/116
* Fix type error when using `seeLink` by **[craig-mcmahon](https://github.com/craig-mcmahon)** in https://github.com/Codeception/module-webdriver/pull/119
* Fix WebDriver connection exception handling by **[Naktibalda](https://github.com/Naktibalda)** in https://github.com/Codeception/module-webdriver/pull/121


### module-webdriver 4.0.1: 4.0.1

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2024/02/16 12:54:25 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)



## What's Changed
* Minor: Newer array syntax by **[ThomasLandauer](https://github.com/ThomasLandauer)** in https://github.com/Codeception/module-webdriver/pull/115
* Fix namespace mismatch of ActionSequence by **[mbrodala](https://github.com/mbrodala)** in https://github.com/Codeception/module-webdriver/pull/116
* Removing self-closing slashes by **[ThomasLandauer](https://github.com/ThomasLandauer)** in https://github.com/Codeception/module-webdriver/pull/117
* Fix type error when using `seeLink` by **[craig-mcmahon](https://github.com/craig-mcmahon)** in https://github.com/Codeception/module-webdriver/pull/119
* disable-gpu argument no longer needed by **[marcovtwout](https://github.com/marcovtwout)** in https://github.com/Codeception/module-webdriver/pull/113
* Update configuration for Selenium Server v4 by **[marcovtwout](https://github.com/marcovtwout)** in https://github.com/Codeception/module-webdriver/pull/114
* Support PHPUnit 11 by **[Naktibalda](https://github.com/Naktibalda)** in https://github.com/Codeception/module-webdriver/pull/120
* Fix WebDriver connection exception handling by **[Naktibalda](https://github.com/Naktibalda)** in https://github.com/Codeception/module-webdriver/pull/121

## New Contributors
* **[craig-mcmahon](https://github.com/craig-mcmahon)** made their first contribution in https://github.com/Codeception/module-webdriver/pull/119
* **[marcovtwout](https://github.com/marcovtwout)** made their first contribution in https://github.com/Codeception/module-webdriver/pull/113

**Full Changelog**: https://github.com/Codeception/module-webdriver/compare/4.0.0...4.0.1


### lib-web 1.0.6: 1.0.6

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2024/02/06 20:50:54 / [Repository](https://github.com/Codeception/lib-web)   / [Releases](https://github.com/Codeception/lib-web/releases)



* Support PHPUnit 11 by **[Naktibalda](https://github.com/Naktibalda)** in https://github.com/Codeception/lib-web/pull/11
* Adding details to `grabAttributeFrom()` by **[ThomasLandauer](https://github.com/ThomasLandauer)** in https://github.com/Codeception/lib-web/pull/10



### Codeception 5.1.0: 5.1.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2024/02/04 13:52:44 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



* Support PHPUnit 11

Note: PHPUnit 11 does not support excluding files from code coverage report


### lib-web 1.0.5: 1.0.5

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2024/01/13 11:56:59 / [Repository](https://github.com/Codeception/lib-web)   / [Releases](https://github.com/Codeception/lib-web/releases)



* Fixing Markdown Code Syntax by **[ThomasLandauer](https://github.com/ThomasLandauer)** in https://github.com/Codeception/lib-web/pull/9


### module-db 3.1.2: 3.1.2

Released by [![](https://avatars.githubusercontent.com/u/1256298?v=4&s=16){:height="16" width="16"} sergeyklay](https://github.com/sergeyklay) on 2024/01/12 08:19:37 / [Repository](https://github.com/Codeception/module-db)   / [Releases](https://github.com/Codeception/module-db/releases)



## What's Changed
* Fix Db::executeQuery() for null parameter by **[W0rma](https://github.com/W0rma)** in https://github.com/Codeception/module-db/pull/63

## New Contributors
* **[W0rma](https://github.com/W0rma)** made their first contribution in https://github.com/Codeception/module-db/pull/63

**Full Changelog**: https://github.com/Codeception/module-db/compare/3.1.1...3.1.2


### Codeception 5.0.13: 5.0.13

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2023/12/22 19:46:56 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



* Add actor to Cest tests dataProviders by **[weeg](https://github.com/weeg)** in [#6696](https://github.com/Codeception/Codeception/issues/6696)
* Support symfony 7 by **[W0rma](https://github.com/W0rma)** in [#6723](https://github.com/Codeception/Codeception/issues/6723)
* Avoid infinite loop while waiting for all running tests to finish by **[MarcelBolten](https://github.com/MarcelBolten)** in [#6710](https://github.com/Codeception/Codeception/issues/6710)
* Add missing "Attribute::IS_REPEATABLE" to DataProvider attribute by **[Fahl-Design](https://github.com/Fahl-Design)** in [#6715](https://github.com/Codeception/Codeception/issues/6715)
* Support binary data intest examples by **[pongee](https://github.com/pongee)** in [#6708](https://github.com/Codeception/Codeception/issues/6708)
* Improve rendering of $I->assertThat step by **[jtheuerkauf](https://github.com/jtheuerkauf)** in [#6719](https://github.com/Codeception/Codeception/issues/6719)


### module-phpbrowser 3.0.1: 3.0.1

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2023/12/08 19:46:06 / [Repository](https://github.com/Codeception/module-phpbrowser)   / [Releases](https://github.com/Codeception/module-phpbrowser/releases)



* Support for symfony/browser-kit v7



### module-filesystem 3.0.1: 3.0.1

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2023/12/08 19:24:04 / [Repository](https://github.com/Codeception/module-filesystem)   / [Releases](https://github.com/Codeception/module-filesystem/releases)



* Support symfony/finder v7


### lib-web 1.0.4: 1.0.4

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2023/12/01 11:38:48 / [Repository](https://github.com/Codeception/lib-web)   / [Releases](https://github.com/Codeception/lib-web/releases)



* Support Symfony 7 by **[Naktibalda](https://github.com/Naktibalda)** in https://github.com/Codeception/lib-web/pull/8


### module-db 3.1.1: 3.1.1

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2023/12/01 11:34:57 / [Repository](https://github.com/Codeception/module-db)   / [Releases](https://github.com/Codeception/module-db/releases)



* Fix dump loading (adds advice to increase pcre.backtrack_limit) by **[rizort](https://github.com/rizort)** in https://github.com/Codeception/module-db/pull/46
* [bugfix] [#47](https://github.com/Codeception/module-db/issues/47) Malformed UTF-8 characters, possibly incorrectly encoded by **[cybd](https://github.com/cybd)** in https://github.com/Codeception/module-db/pull/48


### lib-web 1.0.3: 1.0.3

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2023/11/27 06:43:46 / [Repository](https://github.com/Codeception/lib-web)   / [Releases](https://github.com/Codeception/lib-web/releases)



* Minor: Newer array syntax by **[ThomasLandauer](https://github.com/ThomasLandauer)** in https://github.com/Codeception/lib-web/pull/6



### Codeception 5.0.12: 5.0.12

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2023/10/15 18:28:39 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



* Wait for all tests to finish before accessing the serialized test results by **[MarcelBolten](https://github.com/MarcelBolten)** in [#6702](https://github.com/Codeception/Codeception/issues/6702)
* Updated Support Ukraine link in version string


### module-mezzio 4.0.2: 4.0.2

Released by [![](https://avatars.githubusercontent.com/u/152236?v=4&s=16){:height="16" width="16"} Slamdunk](https://github.com/Slamdunk) on 2023/09/22 05:57:54 / [Repository](https://github.com/Codeception/module-mezzio)   / [Releases](https://github.com/Codeception/module-mezzio/releases)



## What's Changed
* Added support for diactoros v3. by **[luiscunhaafricainternetgroup](https://github.com/luiscunhaafricainternetgroup)** in https://github.com/Codeception/module-mezzio/pull/17

## New Contributors
* **[luiscunhaafricainternetgroup](https://github.com/luiscunhaafricainternetgroup)** made their first contribution in https://github.com/Codeception/module-mezzio/pull/17

**Full Changelog**: https://github.com/Codeception/module-mezzio/compare/4.0.1...4.0.2


### Codeception 5.0.11: 5.0.11

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2023/08/22 06:53:38 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



## What's Changed
* fix sharding for empty tests file by **[SamMousa](https://github.com/SamMousa)** in https://github.com/Codeception/Codeception/pull/6667
* Add AllowDynamicProperties attribute to Unit by **[erickskrauch](https://github.com/erickskrauch)** in https://github.com/Codeception/Codeception/pull/6666
* Include mock expectations in assertion count  by **[rene-bos](https://github.com/rene-bos)** in https://github.com/Codeception/Codeception/pull/6672
* Allow multiple test dependencies by **[mbrodala](https://github.com/mbrodala)** in https://github.com/Codeception/Codeception/pull/6676
* Fix JUnitReporter compatibility with PHPUnit 10.3 by **[Naktibalda](https://github.com/Naktibalda)** in https://github.com/Codeception/Codeception/pull/6685

## New Contributors
* **[rene-bos](https://github.com/rene-bos)** made their first contribution in https://github.com/Codeception/Codeception/pull/6672
* **[mbrodala](https://github.com/mbrodala)** made their first contribution in https://github.com/Codeception/Codeception/pull/6676

**Full Changelog**: https://github.com/Codeception/Codeception/compare/5.0.10...5.0.11


### lib-web 1.0.2: 1.0.2

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2023/04/18 20:33:22 / [Repository](https://github.com/Codeception/lib-web)   / [Releases](https://github.com/Codeception/lib-web/releases)



* Mentioning `<html>` tag requirement by **[ThomasLandauer](https://github.com/ThomasLandauer)** in https://github.com/Codeception/lib-web/pull/4


### module-doctrine2 3.0.3: 3.0.3

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2023/04/18 19:38:46 / [Repository](https://github.com/Codeception/module-doctrine2)   / [Releases](https://github.com/Codeception/module-doctrine2/releases)



* Adding recommendation for Symfony users by **[ThomasLandauer](https://github.com/ThomasLandauer)** in https://github.com/Codeception/module-doctrine2/pull/69


### module-doctrine2 3.0.2: 3.0.2

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2023/03/18 18:36:57 / [Repository](https://github.com/Codeception/module-doctrine2)   / [Releases](https://github.com/Codeception/module-doctrine2/releases)



* Documentation updates [#67](https://github.com/Codeception/module-doctrine2/issues/67) and [#68](https://github.com/Codeception/module-doctrine2/issues/68) by **[ThomasLandauer](https://github.com/ThomasLandauer)** 


### Codeception 5.0.10: 5.0.10

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2023/03/14 07:27:00 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



* JUnitReporter: Fixed compatibility with PHPUnit 10.0.16 [#6656](https://github.com/Codeception/Codeception/issues/6656)
* Recorder extension: Fixed type error [#6643](https://github.com/Codeception/Codeception/issues/6643) by **[thomashohn](https://github.com/thomashohn)**
* Validate test filter pattern without warning [#6641](https://github.com/Codeception/Codeception/issues/6641) by **[dmitryuk](https://github.com/dmitryuk)**


### Codeception 5.0.9: 5.0.9

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2023/02/11 14:42:09 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



* JUnitReporter: Do not set 'useless' testsuite attribute in strict mode [#6635](https://github.com/Codeception/Codeception/issues/6635) by **[gileri](https://github.com/gileri)**
* Fixed static $defaultName deprecated in _completion command [#6633](https://github.com/Codeception/Codeception/issues/6633) by **[dmitryuk](https://github.com/dmitryuk)**
* Replaced object property assertions removed from PHPUnit 10



### module-mezzio 4.0.1: 4.0.1

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2023/02/09 06:57:42 / [Repository](https://github.com/Codeception/module-mezzio)   / [Releases](https://github.com/Codeception/module-mezzio/releases)



* Support codeception/lib-innerbrowser v4


### module-lumen 3.0.1: 3.0.1

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2023/02/09 06:43:17 / [Repository](https://github.com/Codeception/module-lumen)   / [Releases](https://github.com/Codeception/module-lumen/releases)



* Support codeception/lib-innerbrowser v4


### module-laminas 3.0.2: 3.0.2

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2023/02/09 06:36:25 / [Repository](https://github.com/Codeception/module-laminas)   / [Releases](https://github.com/Codeception/module-laminas/releases)



* Support codeception/lib-innerbrowser v4


### module-doctrine2 3.0.1: 3.0.1

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2023/02/06 07:55:15 / [Repository](https://github.com/Codeception/module-doctrine2)   / [Releases](https://github.com/Codeception/module-doctrine2/releases)



* Fix deprecated string interpolation by **[Kolyunya](https://github.com/Kolyunya)** in https://github.com/Codeception/module-doctrine2/pull/59


### module-webdriver 4.0.0: 4.0.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2023/02/03 22:06:31 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)



* Supports PHPUnit 10


### Codeception 5.0.8: 5.0.8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2023/02/03 21:58:10 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



* Supports PHPUnit 10


### module-webdriver 3.2.1: 3.2.1

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2023/02/03 21:48:22 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)



* 3.x versions are compatible with PHPUnit 9 only


### Codeception 5.0.7: 5.0.7

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2023/01/14 20:06:31 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



* Disabled phpcs checks in generated action files [#6621](https://github.com/Codeception/Codeception/issues/6621)
* `$I->wantTo()` no longer changes test title at runtime [#6622](https://github.com/Codeception/Codeception/issues/6622)
* Display correct failed step when failures and errors happened during test run [#6623](https://github.com/Codeception/Codeception/issues/6623)
* Fixed indentation of `step_decorators` in config files generated by `bootstrap` [#6624](https://github.com/Codeception/Codeception/issues/6624)
* Enabled `Conditional`, `Retry` and `tryTo` decorators in acceptance suite generated by `bootstrap` [#6624](https://github.com/Codeception/Codeception/issues/6624)  
* Improved handling of anonymous classes in parser [#6626](https://github.com/Codeception/Codeception/issues/6626)


### module-redis 3.1.0: 3.1.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2023/01/13 21:20:53 / [Repository](https://github.com/Codeception/module-redis)   / [Releases](https://github.com/Codeception/module-redis/releases)



* Support for predis/predis v2


### module-cli 2.0.1: 2.0.1

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2023/01/13 18:58:12 / [Repository](https://github.com/Codeception/module-cli)   / [Releases](https://github.com/Codeception/module-cli/releases)



* Unset SHELL_VERBOSITY environment variable before execution of command [#13](https://github.com/Codeception/module-cli/issues/13) 


### Codeception 5.0.6: 5.0.6

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/12/28 14:20:04 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



* Fixed `canSee` assertions in Unit format [#6610](https://github.com/Codeception/Codeception/issues/6610)
* `tryTo` methods must return boolean result [#6614](https://github.com/Codeception/Codeception/issues/6614)
* Fixed various issues with handling of `@skip` and `@incomplete` annotations and attributes in Cest format [#6617](https://github.com/Codeception/Codeception/issues/6617)
* Stopped adding `__mocked` field to mocks created by Stub library [#6620](https://github.com/Codeception/Codeception/issues/6620)
* Fixed deprecated string syntax in Run command [#6618](https://github.com/Codeception/Codeception/issues/6618) by **[shtiher-pp](https://github.com/shtiher-pp)**


### module-db 3.1.0: 3.1.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/12/03 10:23:12 / [Repository](https://github.com/Codeception/module-db)   / [Releases](https://github.com/Codeception/module-db/releases)



* Implemented `grabEntryFromDatabase` and `grabEntriesFromDatabase` methods by **[JesusTheHun](https://github.com/JesusTheHun)** in https://github.com/Codeception/module-db/pull/43
* Improved handling of auto_increment field in `haveInDatabase` tear down by **[JesusTheHun](https://github.com/JesusTheHun)** in https://github.com/Codeception/module-db/pull/44
* Add docker elements to ease local testing by **[JesusTheHun](https://github.com/JesusTheHun)** in https://github.com/Codeception/module-db/pull/42



### module-db 2.1.0: 2.1.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/12/03 10:22:30 / [Repository](https://github.com/Codeception/module-db)   / [Releases](https://github.com/Codeception/module-db/releases)



* Implemented `grabEntryFromDatabase` and `grabEntriesFromDatabase` methods by **[JesusTheHun](https://github.com/JesusTheHun)** in https://github.com/Codeception/module-db/pull/43
* Improved handling of auto_increment field in `haveInDatabase` tear down by **[JesusTheHun](https://github.com/JesusTheHun)** in https://github.com/Codeception/module-db/pull/44
* Add docker elements to ease local testing by **[JesusTheHun](https://github.com/JesusTheHun)** in https://github.com/Codeception/module-db/pull/42



### Codeception 5.0.5: 5.0.5

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/11/20 11:33:41 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



* Don't disable test shuffling when --shard option is used ([#6605](https://github.com/Codeception/Codeception/issues/6605))
* Provided typed signatures for attributes ([#6600](https://github.com/Codeception/Codeception/issues/6600)) by **[mdoelker](https://github.com/mdoelker)**
* Support for Attributes in generated Actions files ([#6593](https://github.com/Codeception/Codeception/issues/6593)) by **[yesdevnull](https://github.com/yesdevnull)**
* Fixed expectNotToPerformAssertions in unit tests ([#6602](https://github.com/Codeception/Codeception/issues/6602)) by **[yesdevnull](https://github.com/yesdevnull)**


### module-laminas 3.0.1: 3.0.1

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/11/20 11:03:09 / [Repository](https://github.com/Codeception/module-laminas)   / [Releases](https://github.com/Codeception/module-laminas/releases)



* Add public getter to access the application instance by **[fourhundredfour](https://github.com/fourhundredfour)** in https://github.com/Codeception/module-laminas/pull/20
* grabServiceFromContainer: Returned service is not always object by **[svycka](https://github.com/svycka)** in https://github.com/Codeception/module-laminas/pull/23


### Codeception 5.0.4: 5.0.4

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/10/30 19:21:03 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



* Execute FailFast subscriber before module _failed hooks [#6586](https://github.com/Codeception/Codeception/issues/6586) by **[yesdevnull](https://github.com/yesdevnull)**
* Fixed parsing of **[skip](https://github.com/skip)** annotation [#6596](https://github.com/Codeception/Codeception/issues/6596)
* Undeprecated untyped method arguments in Cest format [#6591](https://github.com/Codeception/Codeception/issues/6591)
* Removed unnecessary overrides of $resultAggregator property in Unit format and TestCaseWrapper [#6590](https://github.com/Codeception/Codeception/issues/6590)
* Print failure/error/warning/skipped/incomplete messages in HTML reports [#6595](https://github.com/Codeception/Codeception/issues/6595)
* Fixed counting of successful tests [#6595](https://github.com/Codeception/Codeception/issues/6595)


### module-webdriver 3.2.0: 3.2.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/10/15 19:26:14 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)



* Optionally suppress cookie debug output in seeCookie(), dontSeeCookie(), resetCookie() and loadSessionSnapshot() methods by **[lolli42](https://github.com/lolli42)** in https://github.com/Codeception/module-webdriver/pull/111


### Codeception 5.0.3: 5.0.3

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/09/30 15:48:28 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



* Fixed passing test result to dependent tests in unit tests ([#6580](https://github.com/Codeception/Codeception/issues/6580))
* Fixed `TypeError` when **[coversNothing](https://github.com/coversNothing)** annotation is used by Slamdunk ([#6582](https://github.com/Codeception/Codeception/issues/6582))
* `codecept init unit` creates `tests/Support` directory ([#6578](https://github.com/Codeception/Codeception/issues/6578))
* Fixed phar file url in `self-update` command by **[voku](https://github.com/voku)** ([#6563](https://github.com/Codeception/Codeception/issues/6563))
* Added message how to exit Codeception console by **[ThomasLandauer](https://github.com/ThomasLandauer)** ([#6561](https://github.com/Codeception/Codeception/issues/6561))
* Improved compatibility with PHPUnit 10


### module-webdriver 1.4.1: 1.4.1

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/09/12 05:29:45 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)



* Fixed negative tab offset crashes by **[webmaster777](https://github.com/webmaster777)** in https://github.com/Codeception/module-webdriver/pull/108


### module-webdriver 2.0.4: 2.0.4

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/09/12 05:28:56 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)



* Fixed negative tab offset crashes by **[webmaster777](https://github.com/webmaster777)** in https://github.com/Codeception/module-webdriver/pull/108


### module-webdriver 3.1.3: 3.1.3

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/09/12 04:57:16 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)



* Fixed negative tab offset crashes by **[webmaster777](https://github.com/webmaster777)** in https://github.com/Codeception/module-webdriver/pull/108
* Documentation updates by **[luke-](https://github.com/luke-)** and **[salmanlt](https://github.com/salmanlt)**



### Codeception 5.0.2: 5.0.2

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/08/20 18:24:07 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



* Fixed remote code coverage for namespaced suites ([#6533](https://github.com/Codeception/Codeception/issues/6533))
* Fixed data provider in abstract Cest class **[p-golovin](https://github.com/p-golovin)** ([#6560](https://github.com/Codeception/Codeception/issues/6560))
* Fixed issue when include groups and test groups empty **[geega](https://github.com/geega)** ([#6557](https://github.com/Codeception/Codeception/issues/6557))


### Codeception 5.0.1: 5.0.1

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/08/13 16:49:00 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



* Propagate --ext and --override parameters to included test suites by **[calvinalkan](https://github.com/calvinalkan)** ([#6536](https://github.com/Codeception/Codeception/issues/6536))
* Fixed false negative message about stecman/symfony-console-completion package by **[geega](https://github.com/geega)** ([#6541](https://github.com/Codeception/Codeception/issues/6541))
* Fixed a number of issues in template functionality ([#6552](https://github.com/Codeception/Codeception/issues/6552))
* Fixed DataProvider, to properly load dataProviders from abstract classes by **[Basster](https://github.com/Basster)** ([#6549](https://github.com/Codeception/Codeception/issues/6549))


### Codeception 4.2.2: 4.2.2

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/08/13 13:56:22 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



* Propagate --ext and --override parameters to included test suites ([#6536](https://github.com/Codeception/Codeception/issues/6536))
* Fixed false negative message about stecman/symfony-console-completion package ([#6541](https://github.com/Codeception/Codeception/issues/6541))


### module-phpbrowser 2.5.0: 2.5.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/08/06 13:44:12 / [Repository](https://github.com/Codeception/module-phpbrowser)   / [Releases](https://github.com/Codeception/module-phpbrowser/releases)



* 2.5 branch makes Codeception 5 compatible with Symfony 4.4 components


### Codeception 5.0.0: 5.0.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/07/28 08:41:10 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



#### 5.0.0

[Blog post](https://codeception.com/07-28-2022/codeception-5.html)

Summary of all differences from Codeception 4

##### Added

* Basic attribute support
* `--shard`, `--grep`, `--filter` options
* Test can be filtered by data provider case number or name
* Tests of all formats are reported as useless if they perform no assertions and `reports_useless_tests` setting is enabled
* Array of variables can be passed to all `pause` functions/methods
* Dynamic configuration with parameters can use arrays and other non-string types ([#6409](https://github.com/Codeception/Codeception/issues/6409))
* `codecept_pause` function and `$this->pause()` in unit tests ([#6387](https://github.com/Codeception/Codeception/issues/6387))
* Interactive console is executed in the scope of paused test class.
* New code coverage settings:
  - `path_coverage` - enables path and branch coverage
  - `strict_covers_annotation` - marks test as risky if it has `@covers` annotation but executes some other code
  - `ignore_deprecated_code` - doesn't collect code coverage for code having `@deprecated` annotation
  - `disable_code_coverage_ignore` - ignores `@codeCoverageIgnore`, `@codeCoverageIgnoreStart` and `@codeCoverageIgnoreEnd` annotations
* Optional value to `fail-fast` option
* Dynamic configuration with parameters can use arrays and other non-string types

##### Changed

* PHPUnit is no longer the engine of Codeception, but TestCase format is still supported and assertions are still used
* Generators create namespaced test suites by default
* Replaced Hoa Console with PsySH in `codecept console`
* Used Symfony VarDumper in `codecept_debug`
* Fixed DotReporter output format
* Module `after` and `failed` hooks are executed in reverse order
* Introduced strict typing and other features of PHP 7 and 8.
* Cest format can use data providers from other classes
* Fixed injecting dependencies to actor in Cest and Gherkin formats [#6506](https://github.com/Codeception/Codeception/issues/6506)
* Variadic parameters can be skipped in dependency injection [#6505](https://github.com/Codeception/Codeception/issues/6505)
* Deprecated untyped method arguments in Cest format [#6521](https://github.com/Codeception/Codeception/issues/6521)

##### Removed

* `JSON` and `TAP` report formats
* Code coverage blacklist functionality
* `generate:cept` command (`Cept` format itself is deprecated)
* Deprecated class aliases:
  - Codeception\TestCase\Test
  - Codeception\Platform\Group
  - Codeception\Platform\Group
  - Codeception\TestCase
* Settings
  - `log_incomplete_skipped`
  - `paths.log` (replaced by `paths.output`)
  - Suite setting `class_name` (replaced by `actor`)
  - Global setting `actor` (replaced by `actor_prefix`)
* `Configuration::logDir` method (replaced by `Configuration::outputDir` in 2.0)
* Custom reporters implementing TestListener are no longer supported and must be converted to Extensions

##### Supported versions

* PHP 8
* PHPUnit 9 (prepared for upcoming PHPUnit 10)
* Symfony 4.4 - 6.x


### Codeception 5.0.0-RC8: 5.0.0-RC8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/07/28 08:25:46 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



* Deprecated untyped method arguments in Cest format [#6521](https://github.com/Codeception/Codeception/issues/6521)
* Improved code style of generated files [#6522](https://github.com/Codeception/Codeception/issues/6522)
* Removed "Powered by PHPUnit" message [#6520](https://github.com/Codeception/Codeception/issues/6520)


### module-webdriver 3.1.2: 3.1.2

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/07/27 09:10:01 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)



* Fix type error in PHP 8.1 when converting ms to sec [#103](https://github.com/Codeception/module-webdriver/issues/103)


### module-webdriver 2.0.3: 2.0.3

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/07/27 09:08:02 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)



* Fix type error in PHP 8.1 when converting ms to sec [#103](https://github.com/Codeception/module-webdriver/issues/103)


### Codeception 5.0.0-RC7: 5.0.0-RC7

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/07/22 05:52:09 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



* Fixed injecting dependencies to actor in Cest and Gherkin formats [#6506](https://github.com/Codeception/Codeception/issues/6506)
* Variadic parameters can be skipped in dependency injection [#6505](https://github.com/Codeception/Codeception/issues/6505)


### module-datafactory 3.0.0: 3.0.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/07/18 16:39:04 / [Repository](https://github.com/Codeception/module-datafactory)   / [Releases](https://github.com/Codeception/module-datafactory/releases)



* Support for Codeception 5.0


### Codeception 5.0.0-RC6: 5.0.0-RC6

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/07/12 07:13:56 / [Repository](https://github.com/Codeception/Codeception)   / [Releases](https://github.com/Codeception/Codeception/releases)



* Added new attributes (Prepare, Env, BeforeClass,AfterClass, Given, When, Then)
* Class level attributes are applied to all methods
* Codeception attributes are supported in unit tests
* Cest format can use data providers from other classes



### module-sequence 3.0.0: 3.0.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/05/31 05:48:59 / [Repository](https://github.com/Codeception/module-sequence)   / [Releases](https://github.com/Codeception/module-sequence/releases)



* Support for Codeception 5


### module-queue 3.0.0: 3.0.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/05/30 06:22:13 / [Repository](https://github.com/Codeception/module-queue)   / [Releases](https://github.com/Codeception/module-queue/releases)



* Support Codeception 5


### module-queue 2.1.0: 2.1.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/05/30 06:18:31 / [Repository](https://github.com/Codeception/module-queue)   / [Releases](https://github.com/Codeception/module-queue/releases)



* Declared more types in method signatures


### module-mongodb 3.0.0: 3.0.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/05/27 06:42:29 / [Repository](https://github.com/Codeception/module-mongodb)   / [Releases](https://github.com/Codeception/module-mongodb/releases)



* Support Codeception 5


### module-memcache 3.0.0: 3.0.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/05/27 05:49:34 / [Repository](https://github.com/Codeception/module-memcache)   / [Releases](https://github.com/Codeception/module-memcache/releases)



* Support for Codeception 5
* Use mixed type in method signatures


### module-memcache 2.0.1: 2.0.1

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/05/27 05:40:50 / [Repository](https://github.com/Codeception/module-memcache)   / [Releases](https://github.com/Codeception/module-memcache/releases)



* Specified types in more method signatures


### module-ftp 3.0.0: 3.0.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/05/26 05:55:16 / [Repository](https://github.com/Codeception/module-ftp)   / [Releases](https://github.com/Codeception/module-ftp/releases)



* Support Codeception 5


### module-ftp 2.0.3: 2.0.3

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/05/26 05:52:13 / [Repository](https://github.com/Codeception/module-ftp)   / [Releases](https://github.com/Codeception/module-ftp/releases)



* Specified parameter types for more methods


### module-ftp 2.0.2: 2.0.2

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/05/26 05:43:35 / [Repository](https://github.com/Codeception/module-ftp)   / [Releases](https://github.com/Codeception/module-ftp/releases)



* Fixed return types of `grabFileSize` and `grabFileModified`
* `$contents` parameter of `writeToFile` must be string.
* Added types to signatures were possible.
* Fixed assignment to `$this->filePath`


### module-apc 3.0.0: 3.0.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/05/26 04:56:29 / [Repository](https://github.com/Codeception/module-apc)   / [Releases](https://github.com/Codeception/module-apc/releases)



* Support for Codeception 5
* Removed support for APC extension
* Stricter types


### module-phpbrowser 1.0.3: 1.0.3

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/05/21 13:52:31 / [Repository](https://github.com/Codeception/module-phpbrowser)   / [Releases](https://github.com/Codeception/module-phpbrowser/releases)



* Updated dependencies


### module-phpbrowser 2.0.3: 2.0.3

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/05/21 13:49:33 / [Repository](https://github.com/Codeception/module-phpbrowser)   / [Releases](https://github.com/Codeception/module-phpbrowser/releases)



* Updated dependencies


### module-webdriver 3.1.1: 3.1.1

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/04/09 08:33:11 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)



* Removed dontSeeCheckboxIsChecked parameter type declaration to permit arrays


### lib-web 1.0.1: 1.0.1

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/04/09 08:19:47 / [Repository](https://github.com/Codeception/lib-web)   / [Releases](https://github.com/Codeception/lib-web/releases)



* Removed dontSeeCheckboxIsChecked parameter type declaration to permit arrays and match seeCheckboxIsChecked


### module-lumen 3.0.0: 3.0.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/03/29 18:00:52 / [Repository](https://github.com/Codeception/module-lumen)   / [Releases](https://github.com/Codeception/module-lumen/releases)



* Compatibility with Codeception 5


### module-phpbrowser 3.0.0: 3.0.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/03/20 09:45:52 / [Repository](https://github.com/Codeception/module-phpbrowser)   / [Releases](https://github.com/Codeception/module-phpbrowser/releases)



* Support for Codeception 5


### module-filesystem 2.0.2: 2.0.2

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/03/14 18:52:49 / [Repository](https://github.com/Codeception/module-filesystem)   / [Releases](https://github.com/Codeception/module-filesystem/releases)



* Improved error handling [#19](https://github.com/Codeception/module-filesystem/issues/19) 


### module-filesystem 3.0.0: 3.0.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/03/14 18:51:07 / [Repository](https://github.com/Codeception/module-filesystem)   / [Releases](https://github.com/Codeception/module-filesystem/releases)



* Support for Codeception 5


### module-webdriver 3.1.0: 3.1.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/03/11 17:08:21 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)



* Moved WebDriver constraints from codeception/codeception
* Moved code shared with lib-innerbrowser to codeception/lib-web
* Improved code style


### lib-web 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/03/11 08:38:48 / [Repository](https://github.com/Codeception/lib-web)   / [Releases](https://github.com/Codeception/lib-web/releases)






### module-db 1.2.0: 1.2.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/03/05 19:47:19 / [Repository](https://github.com/Codeception/module-db)   / [Releases](https://github.com/Codeception/module-db/releases)



* Add `skip_cleanup_if_failed` option for not cleaning up failed tests
* Null safety in destructor [#30](https://github.com/Codeception/module-db/issues/30) by **[Archanium](https://github.com/Archanium)**


### module-db 2.0.2: 2.0.2

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/03/05 19:36:19 / [Repository](https://github.com/Codeception/module-db)   / [Releases](https://github.com/Codeception/module-db/releases)



* Add `skip_cleanup_if_failed` option for not cleaning up failed tests
* Null safety in destructor [#30](https://github.com/Codeception/module-db/issues/30) by **[Archanium](https://github.com/Archanium)**


### module-db 3.0.1: 3.0.1

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/03/05 19:29:02 / [Repository](https://github.com/Codeception/module-db)   / [Releases](https://github.com/Codeception/module-db/releases)



* Add `skip_cleanup_if_failed` option for not cleaning up failed tests
* Null safety in destructor [#30](https://github.com/Codeception/module-db/issues/30) by **[Archanium](https://github.com/Archanium)**


### module-redis 3.0.0: 3.0.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/02/20 17:41:06 / [Repository](https://github.com/Codeception/module-redis)   / [Releases](https://github.com/Codeception/module-redis/releases)



* Support for Codeception 5


### module-db 1.1.1: 1.1.1

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/02/20 17:06:05 / [Repository](https://github.com/Codeception/module-db)   / [Releases](https://github.com/Codeception/module-db/releases)



* Fix Sqlite primary key column detection on PHP 8.1


### module-db 2.0.1: 2.0.1

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/02/20 17:05:36 / [Repository](https://github.com/Codeception/module-db)   / [Releases](https://github.com/Codeception/module-db/releases)



* Fix Sqlite primary key column detection on PHP 8.1


### module-db 3.0.0: 3.0.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/02/20 17:03:37 / [Repository](https://github.com/Codeception/module-db)   / [Releases](https://github.com/Codeception/module-db/releases)



* Codeception 5 support


### module-mezzio 4.0.0: 4.0.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/02/20 16:38:14 / [Repository](https://github.com/Codeception/module-mezzio)   / [Releases](https://github.com/Codeception/module-mezzio/releases)



* Support Codeception 5


### module-webdriver 3.0.0: 3.0.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/02/20 16:31:03 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)



* Codeception 5 support


### module-laminas 3.0.0: 3.0.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/02/20 15:37:34 / [Repository](https://github.com/Codeception/module-laminas)   / [Releases](https://github.com/Codeception/module-laminas/releases)



* Support for Codeception 5


### module-asserts 3.0.0: 3.0.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/02/20 10:53:01 / [Repository](https://github.com/Codeception/module-asserts)   / [Releases](https://github.com/Codeception/module-asserts/releases)



* Codeception 5 support


### module-doctrine2 3.0.0: 3.0.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/02/20 10:51:03 / [Repository](https://github.com/Codeception/module-doctrine2)   / [Releases](https://github.com/Codeception/module-doctrine2/releases)



* Codeception 5 support


### module-doctrine2 2.0.1: 2.0.1

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/01/28 18:34:39 / [Repository](https://github.com/Codeception/module-doctrine2)   / [Releases](https://github.com/Codeception/module-doctrine2/releases)



* Binary strings don't break (dont)seeInRepository by **[frankverhoeven](https://github.com/frankverhoeven)**


### module-webdriver 2.0.2: 2.0.2

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/01/23 12:00:55 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)



* Fixed TypeError in `grabTextFrom` when array is used as parameter by **[olexp](https://github.com/olexp)** 
* Changed `assertEquals` to `assertSame` is many methods by **[TavoNiievez](https://github.com/TavoNiievez)** 


### module-webdriver 2.0.1: 2.0.1

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2021/12/29 16:57:38 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)



* Respect `performOn` with `fillField` [#80](https://github.com/Codeception/module-webdriver/issues/80) by **[mbrodala](https://github.com/mbrodala)** 
* `submitForm` considers only elements having `name` attribute [#83](https://github.com/Codeception/module-webdriver/issues/83) by **[dahaupt](https://github.com/dahaupt)** 
* Fixed type error in `wait` method [#85](https://github.com/Codeception/module-webdriver/issues/85) by **[marc-mabe](https://github.com/marc-mabe)** 
* Fixed types in method signatures and docblocks [#88](https://github.com/Codeception/module-webdriver/issues/88) by **[Naktibalda](https://github.com/Naktibalda)** 


### module-mezzio 3.0.2: 3.0.2

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2021/12/26 17:51:01 / [Repository](https://github.com/Codeception/module-mezzio)   / [Releases](https://github.com/Codeception/module-mezzio/releases)



* Added support for laminas-diactoros v2 by **[samuelnogueira](https://github.com/samuelnogueira)**


### module-lumen 2.1.0: 2.1.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/12/24 20:16:08 / [Repository](https://github.com/Codeception/module-lumen)   / [Releases](https://github.com/Codeception/module-lumen/releases)



## What's Changed

* PHP 7.4 or higher is required.
* Updated code base to PHP 7.4 (https://github.com/Codeception/module-lumen/pull/15)
* Update dependencies (https://github.com/Codeception/module-lumen/pull/16)
* The changelog has been added to the Readme file, by **[Arhell](https://github.com/Arhell)** in https://github.com/Codeception/module-lumen/pull/14


### module-phpbrowser 2.0.2: 2.0.2

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/12/21 15:23:57 / [Repository](https://github.com/Codeception/module-phpbrowser)   / [Releases](https://github.com/Codeception/module-phpbrowser/releases)



* **Small bug fix**: Fix some types (https://github.com/Codeception/module-phpbrowser/pull/21)


### module-redis 1.4.1: 1.4.1

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/12/21 02:02:03 / [Repository](https://github.com/Codeception/module-redis)   / [Releases](https://github.com/Codeception/module-redis/releases)



* Update dependencies (https://github.com/Codeception/module-redis/pull/15)


### module-asserts 2.0.1: 2.0.1

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/12/18 17:11:54 / [Repository](https://github.com/Codeception/module-asserts)   / [Releases](https://github.com/Codeception/module-asserts/releases)



## What's Changed

* Removed the use statement to not make static analysis trip over by **[Rockylars](https://github.com/Rockylars)** in https://github.com/Codeception/module-asserts/pull/19
* Update dependencies by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/module-asserts/pull/20


### module-ftp 2.0.1: 2.0.1

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/12/18 15:18:57 / [Repository](https://github.com/Codeception/module-ftp)   / [Releases](https://github.com/Codeception/module-ftp/releases)



## What's Changed

* Update dependencies by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/module-ftp/pull/6


### module-laminas 1.3.1: 1.3.1

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/12/18 14:39:53 / [Repository](https://github.com/Codeception/module-laminas)   / [Releases](https://github.com/Codeception/module-laminas/releases)



## What's Changed

* Update dependencies by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/module-laminas/pull/21


### module-phpbrowser 2.0.1: 2.0.1

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/12/18 14:26:57 / [Repository](https://github.com/Codeception/module-phpbrowser)   / [Releases](https://github.com/Codeception/module-phpbrowser/releases)



* Update dependencies by **[TavoNiievez](https://github.com/TavoNiievez)** and **[Naktibalda](https://github.com/Naktibalda)** in https://github.com/Codeception/module-phpbrowser/pull/20


### module-mezzio 3.0.1: 3.0.1

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/12/18 14:26:02 / [Repository](https://github.com/Codeception/module-mezzio)   / [Releases](https://github.com/Codeception/module-mezzio/releases)



## What's Changed

* Update dependencies by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/module-mezzio/pull/14


### module-filesystem 2.0.1: 2.0.1

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/12/18 14:24:07 / [Repository](https://github.com/Codeception/module-filesystem)   / [Releases](https://github.com/Codeception/module-filesystem/releases)



## What's Changed

* Update dependencies by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/module-filesystem/pull/15


### module-redis 1.4.0: 1.4.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2021/12/13 06:06:22 / [Repository](https://github.com/Codeception/module-redis)   / [Releases](https://github.com/Codeception/module-redis/releases)



* seeInRedis displays a difference between expected value and actual value 


### module-asserts 2.0.0: 2.0.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/12/07 15:06:26 / [Repository](https://github.com/Codeception/module-asserts)   / [Releases](https://github.com/Codeception/module-asserts/releases)



## What's Changed

* PHP 7.4 or higher is required.
* Support PHP 8.1
* Updated code base to PHP 7.4 by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/module-asserts/pull/13 and https://github.com/Codeception/module-asserts/pull/17
* Replace `Codeception\Util\Stub` with `Codeception\Stub` in tests by **[Naktibalda](https://github.com/Naktibalda)** in https://github.com/Codeception/module-asserts/pull/11
* The changelog has been added to the Readme file, by **[Arhell](https://github.com/Arhell)** in https://github.com/Codeception/module-asserts/pull/16

**Full Changelog**: https://github.com/Codeception/module-asserts/compare/1.3.1...2.0.0


### module-datafactory 2.0.0: 2.0.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/12/07 15:00:26 / [Repository](https://github.com/Codeception/module-datafactory)   / [Releases](https://github.com/Codeception/module-datafactory/releases)



## What's Changed

* PHP 7.4 or higher is required.
* Support PHP 8.1
* Updated code base to PHP 7.4 by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/module-datafactory/pull/9 and https://github.com/Codeception/module-datafactory/pull/14
* Documentation changes by **[DavertMik](https://github.com/DavertMik)** in https://github.com/Codeception/module-datafactory/pull/11
* The changelog has been added to the Readme file, by **[Arhell](https://github.com/Arhell)** in https://github.com/Codeception/module-datafactory/pull/13

**Full Changelog**: https://github.com/Codeception/module-datafactory/compare/1.1.0...2.0.0


### module-mongodb 2.0.0: 2.0.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/12/07 14:55:38 / [Repository](https://github.com/Codeception/module-mongodb)   / [Releases](https://github.com/Codeception/module-mongodb/releases)



## What's Changed

* PHP 7.4 or higher is required.
* Updated code base to PHP 7.4 by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/module-mongodb/pull/7 and https://github.com/Codeception/module-mongodb/pull/11
* The changelog has been added to the Readme file, by **[Arhell](https://github.com/Arhell)** in https://github.com/Codeception/module-mongodb/pull/10

**Full Changelog**: https://github.com/Codeception/module-mongodb/compare/1.1.1...2.0.0


### module-sequence 2.0.0: 2.0.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/12/07 14:36:31 / [Repository](https://github.com/Codeception/module-sequence)   / [Releases](https://github.com/Codeception/module-sequence/releases)



## What's Changed

* PHP 7.4 or higher is required.
* Support PHP 8.1
* Updated code base to PHP 7.4 by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/module-sequence/pull/4
* The changelog has been added to the Readme file, by **[Arhell](https://github.com/Arhell)** in https://github.com/Codeception/module-sequence/pull/3

**Full Changelog**: https://github.com/Codeception/module-sequence/compare/1.0.1...2.0.0


### module-webdriver 2.0.0: 2.0.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/12/07 14:34:27 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)



## What's Changed

* PHP 7.4 or higher is required.
* Updated code base to PHP 7.4 by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/module-webdriver/pull/82
* Fixed type incompatibility in Webdriver by **[grossmannmartin](https://github.com/grossmannmartin)** in https://github.com/Codeception/module-webdriver/pull/78

**Full Changelog**: https://github.com/Codeception/module-webdriver/compare/1.4.0...2.0.0


### module-redis 1.3.0: 1.3.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/12/07 14:25:54 / [Repository](https://github.com/Codeception/module-redis)   / [Releases](https://github.com/Codeception/module-redis/releases)



## What's Changed

* PHP 7.4 or higher is required.
* Support PHP 8.1
* Updated code base to PHP 7.4 by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/module-redis/pull/11

**Full Changelog**: https://github.com/Codeception/module-redis/compare/1.2.0...1.3.0


### module-queue 2.0.0: 2.0.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/12/07 14:20:38 / [Repository](https://github.com/Codeception/module-queue)   / [Releases](https://github.com/Codeception/module-queue/releases)



## What's Changed

* PHP 7.4 or higher is required.
* Support PHP 8.1
* Updated code base to PHP 7.4 by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/module-queue/pull/6
* The changelog has been added to the Readme file, by **[Arhell](https://github.com/Arhell)** in https://github.com/Codeception/module-queue/pull/5

**Full Changelog**: https://github.com/Codeception/module-queue/compare/1.1.1...2.0.0


### module-memcache 2.0.0: 2.0.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/12/07 14:17:46 / [Repository](https://github.com/Codeception/module-memcache)   / [Releases](https://github.com/Codeception/module-memcache/releases)



## What's Changed

* PHP 7.4 or higher is required.
* Support PHP 8.1
* Updated code base to PHP 7.4 by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/module-memcache/pull/6
* The changelog has been added to the Readme file, by **[Arhell](https://github.com/Arhell)** in https://github.com/Codeception/module-memcache/pull/3
* Fix status badge by **[Arhell](https://github.com/Arhell)** in https://github.com/Codeception/module-memcache/pull/5

**Full Changelog**: https://github.com/Codeception/module-memcache/compare/1.0.1...2.0.0


### module-filesystem 2.0.0: 2.0.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/12/07 13:37:45 / [Repository](https://github.com/Codeception/module-filesystem)   / [Releases](https://github.com/Codeception/module-filesystem/releases)



## What's Changed

* PHP 7.4 or higher is required.
* Support PHP 8.1
* Updated code base to PHP 7.4 by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/module-filesystem/pull/9 and https://github.com/Codeception/module-filesystem/pull/13
* Replace `Codeception\Util\Stub` with `Codeception\Stub` in tests by **[Naktibalda](https://github.com/Naktibalda)** in https://github.com/Codeception/module-filesystem/pull/5
* Improved tests in order to run them from `vendor/` directory by **[Naktibalda](https://github.com/Naktibalda)** in https://github.com/Codeception/module-filesystem/pull/6
* The changelog has been added to the Readme file, by **[Arhell](https://github.com/Arhell)** in https://github.com/Codeception/module-filesystem/pull/12

**Full Changelog**: https://github.com/Codeception/module-filesystem/compare/1.0.3...2.0.0


### module-ftp 2.0.0: 2.0.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/12/07 13:32:34 / [Repository](https://github.com/Codeception/module-ftp)   / [Releases](https://github.com/Codeception/module-ftp/releases)



## What's Changed

* PHP 7.4 or higher is required.
* Updated code base to PHP 7.4 by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/module-ftp/pull/5
* The changelog has been added to the Readme file, by **[Arhell](https://github.com/Arhell)** in https://github.com/Codeception/module-ftp/pull/4

**Full Changelog**: https://github.com/Codeception/module-ftp/compare/1.0.2...2.0.0


### module-cli 2.0.0: 2.0.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/12/07 06:11:12 / [Repository](https://github.com/Codeception/module-cli)   / [Releases](https://github.com/Codeception/module-cli/releases)



## What's Changed

* PHP 7.4 or higher is required.
* Support PHP 8.1
* Updated code base to PHP 7.4 by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/module-cli/pull/10
* The changelog has been added to the Readme file, by **[Arhell](https://github.com/Arhell)** in https://github.com/Codeception/module-cli/pull/9

**Full Changelog**: https://github.com/Codeception/module-cli/compare/1.1.1...2.0.0


### module-mezzio 3.0.0: 3.0.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/12/07 06:04:58 / [Repository](https://github.com/Codeception/module-mezzio)   / [Releases](https://github.com/Codeception/module-mezzio/releases)



## What's Changed

* PHP 7.4 or higher is required.
* Support PHP 8.1
* Updated code base to PHP 7.4 by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/module-mezzio/pull/9 and https://github.com/Codeception/module-mezzio/pull/12
* The changelog has been added to the Readme file, by **[Arhell](https://github.com/Arhell)** in https://github.com/Codeception/module-mezzio/pull/11

**Full Changelog**: https://github.com/Codeception/module-mezzio/compare/2.0.2...3.0.0


### module-doctrine2 2.0.0: 2.0.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/12/07 05:59:34 / [Repository](https://github.com/Codeception/module-doctrine2)   / [Releases](https://github.com/Codeception/module-doctrine2/releases)



## What's Changed

* PHP 7.4 or higher is required.
* Support PHP 8.1
* Updated code base to PHP 7.4 by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/module-doctrine2/pull/40 and https://github.com/Codeception/module-doctrine2/pull/47
* Added phpstan by **[b1rdex](https://github.com/b1rdex)** in https://github.com/Codeception/module-doctrine2/pull/46
* Use hash to store repository mock by **[olexp](https://github.com/olexp)** in https://github.com/Codeception/module-doctrine2/pull/45 and https://github.com/Codeception/module-doctrine2/pull/48
* Better explaining `depends` by **[ThomasLandauer](https://github.com/ThomasLandauer)** in https://github.com/Codeception/module-doctrine2/pull/23
* Adding link to `doctrine/data-fixtures` by **[ThomasLandauer](https://github.com/ThomasLandauer)** in https://github.com/Codeception/module-doctrine2/pull/39
* The changelog has been added to the Readme file, by **[Arhell](https://github.com/Arhell)** in https://github.com/Codeception/module-doctrine2/pull/43

**Full Changelog**: https://github.com/Codeception/module-doctrine2/compare/1.1.1...2.0.0


### module-apc 2.0.0: 2.0.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/12/07 05:51:33 / [Repository](https://github.com/Codeception/module-apc)   / [Releases](https://github.com/Codeception/module-apc/releases)



## What's Changed

* PHP 7.4 or higher is required.
* Updated code base to PHP 7.4 by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/module-apc/pull/6
* The changelog has been added to the Readme file, by **[Arhell](https://github.com/Arhell)** in https://github.com/Codeception/module-apc/pull/5

**Full Changelog**: https://github.com/Codeception/module-apc/compare/1.0.2...2.0.0


### module-laminas 1.3.0: 1.3.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/12/07 05:44:00 / [Repository](https://github.com/Codeception/module-laminas)   / [Releases](https://github.com/Codeception/module-laminas/releases)



## What's Changed

* PHP 7.4 or higher is required.
* Updated code base to PHP 7.4 by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/module-laminas/pull/18

**Full Changelog**: https://github.com/Codeception/module-laminas/compare/1.2.1...1.3.0


### module-db 2.0.0: 2.0.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/12/07 05:38:52 / [Repository](https://github.com/Codeception/module-db)   / [Releases](https://github.com/Codeception/module-db/releases)



## What's Changed

* PHP 7.4 or higher is required.
* Updated code base to PHP 7.4 by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/module-db/pull/26
* Replace `Codeception\Util\Stub` with `Codeception\Stub` in tests by **[Naktibalda](https://github.com/Naktibalda)** in https://github.com/Codeception/module-db/pull/13
* The changelog has been added to the Readme file, by **[Arhell](https://github.com/Arhell)** in https://github.com/Codeception/module-db/pull/24

**Full Changelog**: https://github.com/Codeception/module-db/compare/1.1.0...2.0.0


### module-phpbrowser 2.0.0: 2.0.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/12/07 05:24:45 / [Repository](https://github.com/Codeception/module-phpbrowser)   / [Releases](https://github.com/Codeception/module-phpbrowser/releases)



## What's Changed

* PHP 7.4 or higher is required.
* Updated code base to PHP 7.4 by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/module-phpbrowser/pull/12 and https://github.com/Codeception/module-phpbrowser/pull/17
* Cast uri to string by **[Naktibalda](https://github.com/Naktibalda)** in https://github.com/Codeception/module-phpbrowser/pull/14
* The changelog has been added to the Readme file, by **[Arhell](https://github.com/Arhell)** in https://github.com/Codeception/module-phpbrowser/pull/16

**Full Changelog**: https://github.com/Codeception/module-phpbrowser/compare/1.0.2...2.0.0


### module-laminas 1.2.1: 1.2.1

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/10/19 17:56:16 / [Repository](https://github.com/Codeception/module-laminas)   / [Releases](https://github.com/Codeception/module-laminas/releases)



Fix incorrect type hint ([#19](https://github.com/Codeception/module-laminas/issues/19)) by **[olexp](https://github.com/olexp)** and **[TavoNiievez](https://github.com/TavoNiievez)** .


### module-laminas 1.2.0: addFactoryToContainer

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2021/10/16 08:01:31 / [Repository](https://github.com/Codeception/module-laminas)   / [Releases](https://github.com/Codeception/module-laminas/releases)



* Add addFactoryToContainer method [#17](https://github.com/Codeception/module-laminas/issues/17) by **[olexp](https://github.com/olexp)** 


### module-redis 1.2.0: 1.2.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/10/08 15:41:43 / [Repository](https://github.com/Codeception/module-redis)   / [Releases](https://github.com/Codeception/module-redis/releases)



- The minimum version of PHP is now 7.1
- Added strict types and return types

Other minor changes:
- Add debug info to redis cleanup ([#1](https://github.com/Codeception/module-redis/issues/1)) by **[convenient](https://github.com/convenient)**
- Add changelog to `README` file ([#10](https://github.com/Codeception/module-redis/issues/10)) by **[Arhell](https://github.com/Arhell)**


### module-laminas 1.1.0: 1.1.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/10/06 00:34:16 / [Repository](https://github.com/Codeception/module-laminas)   / [Releases](https://github.com/Codeception/module-laminas/releases)



- Support for PHP versions lower than 7.3 is removed.
- Code standards updated to PHP 7.3 by **[TavoNiievez](https://github.com/TavoNiievez)** .
- Remove dependency on laminas/laminas-console ([#13](https://github.com/Codeception/module-laminas/issues/13)) by **[javabudd](https://github.com/javabudd)** .
- Various documentation improvements by **[Naktibalda](https://github.com/Naktibalda)** and **[Arhell](https://github.com/Arhell)** .


### module-webdriver 1.4.0: Added new methods

Released by [![](https://avatars.githubusercontent.com/u/220264?v=4&s=16){:height="16" width="16"} DavertMik](https://github.com/DavertMik) on 2021/09/02 12:08:19 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)



* Added `type` method which types in characters into an active input.

```php
$I->type('Hello world');
```
You can emulate user input by setting a delay between key types:

```php
$I->type('Hello world', 0.1);
```

* Added `seeNumberOfTabs` assertion to check how many tabs are opened at this moment:

```php
$I->seeNumberOfTabs(2);
```


### module-webdriver 1.3.0: Add new option webdriver_proxy

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2021/08/22 07:22:29 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)



Add new option webdriver_proxy to tunnel requests to the remote WebDriver server


### module-webdriver 1.2.2: Documentation update

Released by [![](https://avatars.githubusercontent.com/u/220264?v=4&s=16){:height="16" width="16"} DavertMik](https://github.com/DavertMik) on 2021/08/19 11:16:42 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)






### module-lumen 2.0.1: 2.0.1

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/04/29 14:24:58 / [Repository](https://github.com/Codeception/module-lumen)   / [Releases](https://github.com/Codeception/module-lumen/releases)



**Fix** Factory compatibility issue with Lumen < 7 ([#12](https://github.com/Codeception/module-lumen/issues/12)) by  **[ibpavlov](https://github.com/ibpavlov)**.



### module-webdriver 1.2.1: Documentation update

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2021/04/23 17:31:52 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)






### module-redis 1.1.0: Allow more parameters to be sent to Predis Client

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2021/03/31 16:04:36 / [Repository](https://github.com/Codeception/module-redis)   / [Releases](https://github.com/Codeception/module-redis/releases)



See [#6](https://github.com/Codeception/module-redis/issues/6)


### module-datafactory 1.1.0: Added Custom Store

Released by [![](https://avatars.githubusercontent.com/u/220264?v=4&s=16){:height="16" width="16"} DavertMik](https://github.com/DavertMik) on 2021/03/16 19:42:52 / [Repository](https://github.com/Codeception/module-datafactory)   / [Releases](https://github.com/Codeception/module-datafactory/releases)



Custom Store can be used for Data Factory. See [#2](https://github.com/Codeception/module-datafactory/issues/2) 


### module-lumen 2.0.0: 2.0.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/01/19 05:02:29 / [Repository](https://github.com/Codeception/module-lumen)   / [Releases](https://github.com/Codeception/module-lumen/releases)



**New features:**
 - `Lumen 6`, `Lumen 7`, and `Lumen 8` compatibility.
 - Module documentation updated.
 - Added typed arguments.
 - Updated the module's code base following PHP 7.3+ standards.

**Breaking changes:**
 - Removed support for PHP versions lower than `PHP 7.3`.
 - Removed support for `Lumen 5` and lower.

> **Minor change**: Adding link to "central" parts explanation ([#4](https://github.com/Codeception/module-lumen/issues/4)) by **[ThomasLandauer](https://github.com/ThomasLandauer)**.


### module-webdriver 1.2.0: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2021/01/17 19:30:29 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)



* Implemented makeElementScreenshot by **[Blaimi](https://github.com/Blaimi)** 
* Documentation improvements


### module-datafactory 1.0.1: PHP8 support

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/12/30 15:56:46 / [Repository](https://github.com/Codeception/module-datafactory)   / [Releases](https://github.com/Codeception/module-datafactory/releases)






### module-cli 1.1.1: Preparation for PHPUnit 10

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/12/26 16:58:43 / [Repository](https://github.com/Codeception/module-cli)   / [Releases](https://github.com/Codeception/module-cli/releases)



Use wrapper for assertRegExp method


### module-db 1.1.0: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/12/20 13:38:20 / [Repository](https://github.com/Codeception/module-db)   / [Releases](https://github.com/Codeception/module-db/releases)



Add support for IS NOT NULL in database assertions [#12](https://github.com/Codeception/module-db/issues/12) 


### module-mongodb 1.1.1: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/11/26 07:20:07 / [Repository](https://github.com/Codeception/module-mongodb)   / [Releases](https://github.com/Codeception/module-mongodb/releases)






### module-doctrine2 1.1.1: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/11/26 06:57:10 / [Repository](https://github.com/Codeception/module-doctrine2)   / [Releases](https://github.com/Codeception/module-doctrine2/releases)






### module-laminas 1.0.0: First release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/11/25 07:58:15 / [Repository](https://github.com/Codeception/module-laminas)   / [Releases](https://github.com/Codeception/module-laminas/releases)



* Renamed module-zf2 to module-laminas
* Supports PHP 8


### module-mezzio 2.0.2: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/11/25 07:15:31 / [Repository](https://github.com/Codeception/module-mezzio)   / [Releases](https://github.com/Codeception/module-mezzio/releases)






### module-redis 1.0.1: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/11/25 06:44:01 / [Repository](https://github.com/Codeception/module-redis)   / [Releases](https://github.com/Codeception/module-redis/releases)






### module-webdriver 1.1.4: Documentation improvements

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/11/16 07:24:08 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)






### module-cli 1.1.0: Add grabShellOutput method

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/11/16 06:27:24 / [Repository](https://github.com/Codeception/module-cli)   / [Releases](https://github.com/Codeception/module-cli/releases)






### module-doctrine2 1.1.0: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/11/14 20:44:32 / [Repository](https://github.com/Codeception/module-doctrine2)   / [Releases](https://github.com/Codeception/module-doctrine2/releases)



* Configurable purge mode - DELETE or TRUNCATE 
* Catch MappingException thrown by Doctrine 2.9 


### module-queue 1.1.1: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/10/31 19:08:59 / [Repository](https://github.com/Codeception/module-queue)   / [Releases](https://github.com/Codeception/module-queue/releases)






### module-sequence 1.0.1: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/10/31 19:03:32 / [Repository](https://github.com/Codeception/module-sequence)   / [Releases](https://github.com/Codeception/module-sequence/releases)






### module-memcache 1.0.1: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/10/28 13:30:19 / [Repository](https://github.com/Codeception/module-memcache)   / [Releases](https://github.com/Codeception/module-memcache/releases)






### module-lumen 1.0.1: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/10/28 07:48:01 / [Repository](https://github.com/Codeception/module-lumen)   / [Releases](https://github.com/Codeception/module-lumen/releases)



Depends on Lumen libraries actually supporting PHP 8


### module-laravel5 1.1.1: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/10/28 07:06:39 / [Repository](https://github.com/Codeception/module-laravel5)   / [Releases](https://github.com/Codeception/module-laravel5/releases)



Depends on Laravel libraries actually supporting PHP 8


### module-ftp 1.0.2: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/10/27 06:39:25 / [Repository](https://github.com/Codeception/module-ftp)   / [Releases](https://github.com/Codeception/module-ftp/releases)






### module-apc 1.0.2: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/10/26 06:16:30 / [Repository](https://github.com/Codeception/module-apc)   / [Releases](https://github.com/Codeception/module-apc/releases)






### module-webdriver 1.1.3: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/10/24 15:41:47 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)






### module-phpbrowser 1.0.2: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/10/24 15:29:51 / [Repository](https://github.com/Codeception/module-phpbrowser)   / [Releases](https://github.com/Codeception/module-phpbrowser/releases)






### module-filesystem 1.0.3: PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/10/24 14:50:10 / [Repository](https://github.com/Codeception/module-filesystem)   / [Releases](https://github.com/Codeception/module-filesystem/releases)



* PHP 8 support
* Delete local copy of autogenerated documentation
* Use wrapper methods to avoid PHPUnit 9 deprecation messages and keep it working with PHPUnit 10


### module-db 1.0.2: PHP8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/10/23 18:22:43 / [Repository](https://github.com/Codeception/module-db)   / [Releases](https://github.com/Codeception/module-db/releases)



* Support PHP 8 (no code changes)
* Require stable version of codeception/codeception


### module-cli 1.0.4: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/10/23 17:52:08 / [Repository](https://github.com/Codeception/module-cli)   / [Releases](https://github.com/Codeception/module-cli/releases)



* Support PHP 8 (no code change)
* Deleted local copy of generated documentation


### module-asserts 1.3.1: PHP8 support

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/10/21 16:49:39 / [Repository](https://github.com/Codeception/module-asserts)   / [Releases](https://github.com/Codeception/module-asserts/releases)



* Support PHP 8 (no code changes)
* Reverted docblock change to fix static analysis ([#9](https://github.com/Codeception/module-asserts/issues/9) by **[edwinkortman](https://github.com/edwinkortman)**)


### module-webdriver 1.1.2: Documentation improvements

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/10/11 18:55:38 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)






### module-cli 1.0.3: Documentation improvements

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/10/11 18:35:08 / [Repository](https://github.com/Codeception/module-cli)   / [Releases](https://github.com/Codeception/module-cli/releases)






### module-asserts 1.3.0: Support for full PHPUnit public API

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/08/28 08:10:16 / [Repository](https://github.com/Codeception/module-asserts)   / [Releases](https://github.com/Codeception/module-asserts/releases)



[#7](https://github.com/Codeception/module-asserts/issues/7)  by **[TavoNiievez](https://github.com/TavoNiievez)** 


### module-webdriver 1.1.1: Multibyte characters are allowed in build artefact filenames

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/08/28 07:01:59 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)



[#17](https://github.com/Codeception/module-webdriver/issues/17) by **[takaoyuri](https://github.com/takaoyuri)** 


### module-phpbrowser 1.0.1: Support Guzzle 7.x

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/07/05 15:35:51 / [Repository](https://github.com/Codeception/module-phpbrowser)   / [Releases](https://github.com/Codeception/module-phpbrowser/releases)






### module-webdriver 1.1.0: switchToFrame

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/05/31 08:52:02 / [Repository](https://github.com/Codeception/module-webdriver)   / [Releases](https://github.com/Codeception/module-webdriver/releases)



* Introduced switchToFrame method [#9](https://github.com/Codeception/module-webdriver/issues/9) 


### module-asserts 1.2.1: Require lib-asserts 1.12+

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/04/20 07:28:56 / [Repository](https://github.com/Codeception/module-asserts)   / [Releases](https://github.com/Codeception/module-asserts/releases)






### module-asserts 1.2.0: New assertions

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/04/18 10:03:04 / [Repository](https://github.com/Codeception/module-asserts)   / [Releases](https://github.com/Codeception/module-asserts/releases)



Added new assertion methods:
* assertMatchesRegularExpression
* assertDoesNotMatchRegularExpression
* assertFileDoesNotExist

They were introduced in PHPUnit 9 to replace older method names, but Asserts module makes them work with older versions of PHPUnit too.


### module-mongodb 1.1.0: Cleanup: dirty

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/04/01 09:22:36 / [Repository](https://github.com/Codeception/module-mongodb)   / [Releases](https://github.com/Codeception/module-mongodb/releases)



* Added `cleanup: dirty` config option


### module-laravel5 1.1.0: Compatibility with Laravel 7

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/03/28 15:01:29 / [Repository](https://github.com/Codeception/module-laravel5)   / [Releases](https://github.com/Codeception/module-laravel5/releases)



* Different ExceptionHandlerDecorator
* haveMultiple doesn't pass $name argument to factory(), because Laravel 7 does not support it anymore.


### module-mezzio 2.0.1: 2.0.1

Released by [![](https://avatars.githubusercontent.com/u/152236?v=4&s=16){:height="16" width="16"} Slamdunk](https://github.com/Slamdunk) on 2020/03/17 11:14:58 / [Repository](https://github.com/Codeception/module-mezzio)   / [Releases](https://github.com/Codeception/module-mezzio/releases)



[Full Changelog](https://github.com/Codeception/module-mezzio/compare/2.0.0...2.0.1)

**Fixed bugs:**

- Session persistance: clean up $_SESSION between tests [\[#3](https://github.com/Codeception/module-mezzio/issues/3)](https://github.com/Codeception/module-mezzio/pull/3)


### module-mezzio 2.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/03/06 08:25:48 / [Repository](https://github.com/Codeception/module-mezzio)   / [Releases](https://github.com/Codeception/module-mezzio/releases)






### module-ftp 1.0.1: Fixed Filename cannot be empty error when SFTP key is not specified

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/02/29 14:55:56 / [Repository](https://github.com/Codeception/module-ftp)   / [Releases](https://github.com/Codeception/module-ftp/releases)






### module-cli 1.0.2: Fixed dontSeeInShellOutput for older versions of PHPUnit

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/02/07 17:34:52 / [Repository](https://github.com/Codeception/module-cli)   / [Releases](https://github.com/Codeception/module-cli/releases)






### module-cli 1.0.1: Compatibility with PHPUnit 9

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/02/07 17:11:44 / [Repository](https://github.com/Codeception/module-cli)   / [Releases](https://github.com/Codeception/module-cli/releases)



Use assertStringNotContainsString instead of assertNotContains in dontSeeInShellOutput


### module-zf2 1.0.3: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/01/29 15:19:36 / [Repository](https://github.com/Codeception/module-zf2)   / [Releases](https://github.com/Codeception/module-zf2/releases)



* Use doctrine entitymanager from config
* Add persisted services before bootstrap


### module-queue 1.1.0: Implemented driver for Pheanstalk 4 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/01/28 13:23:15 / [Repository](https://github.com/Codeception/module-queue)   / [Releases](https://github.com/Codeception/module-queue/releases)






### module-zf2 1.0.2: Empty request content can't be null

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/01/23 17:55:51 / [Repository](https://github.com/Codeception/module-zf2)   / [Releases](https://github.com/Codeception/module-zf2/releases)



[#2](https://github.com/Codeception/module-zf2/issues/2) 


### module-zf2 1.0.1: Add Server parameters to ZendRequest

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/01/22 15:14:48 / [Repository](https://github.com/Codeception/module-zf2)   / [Releases](https://github.com/Codeception/module-zf2/releases)






### module-apc 1.0.1: Removed requirement for ext-apc from composer.json

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/01/21 07:45:14 / [Repository](https://github.com/Codeception/module-apc)   / [Releases](https://github.com/Codeception/module-apc/releases)






### module-db 1.0.1: Mysql: use single quotes for string value in getPrimaryKey

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2019/12/08 18:03:36 / [Repository](https://github.com/Codeception/module-db)   / [Releases](https://github.com/Codeception/module-db/releases)



Fixes some compatibility issue with MariaDB https://github.com/Codeception/Codeception/issues/5778


### module-filesystem 1.0.2: Support symfony/finder 5

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2019/12/04 17:14:16 / [Repository](https://github.com/Codeception/module-filesystem)   / [Releases](https://github.com/Codeception/module-filesystem/releases)






### module-doctrine2 1.0.1: Updated documentation

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2019/11/13 17:34:35 / [Repository](https://github.com/Codeception/module-doctrine2)   / [Releases](https://github.com/Codeception/module-doctrine2/releases)






### module-asserts 1.1.1: Documented that stringEnds functions were added in 1.1.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2019/11/13 17:33:39 / [Repository](https://github.com/Codeception/module-asserts)   / [Releases](https://github.com/Codeception/module-asserts/releases)






### module-asserts 1.1.0: Add assertStringEndsWith and assertStringEndsNotWith

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2019/11/12 16:47:30 / [Repository](https://github.com/Codeception/module-asserts)   / [Releases](https://github.com/Codeception/module-asserts/releases)






### module-filesystem 1.0.1: Compatible with codeception/codeception releases and branches

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2019/11/09 20:33:00 / [Repository](https://github.com/Codeception/module-filesystem)   / [Releases](https://github.com/Codeception/module-filesystem/releases)






### module-phpbrowser 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2019/10/19 15:28:32 / [Repository](https://github.com/Codeception/module-phpbrowser)   / [Releases](https://github.com/Codeception/module-phpbrowser/releases)






### module-lumen 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2019/10/19 15:27:37 / [Repository](https://github.com/Codeception/module-lumen)   / [Releases](https://github.com/Codeception/module-lumen/releases)






### module-laravel5 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2019/10/19 15:27:22 / [Repository](https://github.com/Codeception/module-laravel5)   / [Releases](https://github.com/Codeception/module-laravel5/releases)






### module-doctrine2 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2019/10/19 15:27:12 / [Repository](https://github.com/Codeception/module-doctrine2)   / [Releases](https://github.com/Codeception/module-doctrine2/releases)






### module-db 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2019/10/19 15:27:01 / [Repository](https://github.com/Codeception/module-db)   / [Releases](https://github.com/Codeception/module-db/releases)






### module-zf2 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2019/10/18 11:24:38 / [Repository](https://github.com/Codeception/module-zf2)   / [Releases](https://github.com/Codeception/module-zf2/releases)






### module-sequence 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2019/10/18 11:24:11 / [Repository](https://github.com/Codeception/module-sequence)   / [Releases](https://github.com/Codeception/module-sequence/releases)






### module-redis 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2019/10/18 11:23:43 / [Repository](https://github.com/Codeception/module-redis)   / [Releases](https://github.com/Codeception/module-redis/releases)






### module-queue 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2019/10/18 11:23:32 / [Repository](https://github.com/Codeception/module-queue)   / [Releases](https://github.com/Codeception/module-queue/releases)






### module-mongodb 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2019/10/18 11:21:41 / [Repository](https://github.com/Codeception/module-mongodb)   / [Releases](https://github.com/Codeception/module-mongodb/releases)






### module-memcache 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2019/10/18 11:21:22 / [Repository](https://github.com/Codeception/module-memcache)   / [Releases](https://github.com/Codeception/module-memcache/releases)






### module-filesystem 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2019/10/18 11:21:11 / [Repository](https://github.com/Codeception/module-filesystem)   / [Releases](https://github.com/Codeception/module-filesystem/releases)






### module-ftp 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2019/10/18 11:20:59 / [Repository](https://github.com/Codeception/module-ftp)   / [Releases](https://github.com/Codeception/module-ftp/releases)






### module-datafactory 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2019/10/18 11:07:51 / [Repository](https://github.com/Codeception/module-datafactory)   / [Releases](https://github.com/Codeception/module-datafactory/releases)






### module-cli 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2019/10/18 11:07:08 / [Repository](https://github.com/Codeception/module-cli)   / [Releases](https://github.com/Codeception/module-cli/releases)






### module-asserts 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2019/10/18 11:06:52 / [Repository](https://github.com/Codeception/module-asserts)   / [Releases](https://github.com/Codeception/module-asserts/releases)






### module-apc 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2019/10/18 11:06:05 / [Repository](https://github.com/Codeception/module-apc)   / [Releases](https://github.com/Codeception/module-apc/releases)





