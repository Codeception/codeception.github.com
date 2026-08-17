---
layout: page
title: Codeception Changelog
---

<div class="alert alert-warning">Download specific version at <a href="/builds">builds page</a></div>

# Changelog



### module-laminas 3.0.2: 3.0.2

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2023/02/09 06:36:25 / [Repository](https://github.com/Codeception/module-laminas)   / [Releases](https://github.com/Codeception/module-laminas/releases)



* Support codeception/lib-innerbrowser v4


### module-laminas 3.0.1: 3.0.1

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/11/20 11:03:09 / [Repository](https://github.com/Codeception/module-laminas)   / [Releases](https://github.com/Codeception/module-laminas/releases)



* Add public getter to access the application instance by **[fourhundredfour](https://github.com/fourhundredfour)** in https://github.com/Codeception/module-laminas/pull/20
* grabServiceFromContainer: Returned service is not always object by **[svycka](https://github.com/svycka)** in https://github.com/Codeception/module-laminas/pull/23


### module-laminas 3.0.0: 3.0.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2022/02/20 15:37:34 / [Repository](https://github.com/Codeception/module-laminas)   / [Releases](https://github.com/Codeception/module-laminas/releases)



* Support for Codeception 5


### module-laminas 1.3.1: 1.3.1

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/12/18 14:39:53 / [Repository](https://github.com/Codeception/module-laminas)   / [Releases](https://github.com/Codeception/module-laminas/releases)



## What's Changed

* Update dependencies by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/module-laminas/pull/21


### module-laminas 1.3.0: 1.3.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/12/07 05:44:00 / [Repository](https://github.com/Codeception/module-laminas)   / [Releases](https://github.com/Codeception/module-laminas/releases)



## What's Changed

* PHP 7.4 or higher is required.
* Updated code base to PHP 7.4 by **[TavoNiievez](https://github.com/TavoNiievez)** in https://github.com/Codeception/module-laminas/pull/18

**Full Changelog**: https://github.com/Codeception/module-laminas/compare/1.2.1...1.3.0


### module-laminas 1.2.1: 1.2.1

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/10/19 17:56:16 / [Repository](https://github.com/Codeception/module-laminas)   / [Releases](https://github.com/Codeception/module-laminas/releases)



Fix incorrect type hint ([#19](https://github.com/Codeception/module-laminas/issues/19)) by **[olexp](https://github.com/olexp)** and **[TavoNiievez](https://github.com/TavoNiievez)** .


### module-laminas 1.2.0: addFactoryToContainer

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2021/10/16 08:01:31 / [Repository](https://github.com/Codeception/module-laminas)   / [Releases](https://github.com/Codeception/module-laminas/releases)



* Add addFactoryToContainer method [#17](https://github.com/Codeception/module-laminas/issues/17) by **[olexp](https://github.com/olexp)** 


### module-laminas 1.1.0: 1.1.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16){:height="16" width="16"} TavoNiievez](https://github.com/TavoNiievez) on 2021/10/06 00:34:16 / [Repository](https://github.com/Codeception/module-laminas)   / [Releases](https://github.com/Codeception/module-laminas/releases)



- Support for PHP versions lower than 7.3 is removed.
- Code standards updated to PHP 7.3 by **[TavoNiievez](https://github.com/TavoNiievez)** .
- Remove dependency on laminas/laminas-console ([#13](https://github.com/Codeception/module-laminas/issues/13)) by **[javabudd](https://github.com/javabudd)** .
- Various documentation improvements by **[Naktibalda](https://github.com/Naktibalda)** and **[Arhell](https://github.com/Arhell)** .


### module-phalcon4 v1.0.7: v1.0.7

Released by [![](https://avatars.githubusercontent.com/u/3289702?v=4&s=16){:height="16" width="16"} Jeckerson](https://github.com/Jeckerson) on 2021/05/18 18:21:15 / [Repository](https://github.com/Codeception/module-phalcon4)   / [Releases](https://github.com/Codeception/module-phalcon4/releases)



Updated code base to PHP 7.2 ([#14](https://github.com/Codeception/module-phalcon4/issues/14)):
- Added strict types
- Added return types
- Added some type hints
- Removed unnecessary qualifiers
- sha1 by default instead of md5.


### module-phalcon4 v1.0.6: v1.0.6

Released by [![](https://avatars.githubusercontent.com/u/3289702?v=4&s=16){:height="16" width="16"} Jeckerson](https://github.com/Jeckerson) on 2021/04/13 21:30:04 / [Repository](https://github.com/Codeception/module-phalcon4)   / [Releases](https://github.com/Codeception/module-phalcon4/releases)



* Fixed Request service redefinition ([#7](https://github.com/Codeception/module-phalcon4/issues/7))


### module-phalcon4 v1.0.5: v1.0.5

Released by [![](https://avatars.githubusercontent.com/u/3289702?v=4&s=16){:height="16" width="16"} Jeckerson](https://github.com/Jeckerson) on 2021/02/10 22:09:30 / [Repository](https://github.com/Codeception/module-phalcon4)   / [Releases](https://github.com/Codeception/module-phalcon4/releases)



Changed
* Removed limitation of PHP 8.0 version in composer.json


### module-laminas 1.0.0: First release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16){:height="16" width="16"} Naktibalda](https://github.com/Naktibalda) on 2020/11/25 07:58:15 / [Repository](https://github.com/Codeception/module-laminas)   / [Releases](https://github.com/Codeception/module-laminas/releases)



* Renamed module-zf2 to module-laminas
* Supports PHP 8


### module-phalcon4 v1.0.4: v1.0.4

Released by [![](https://avatars.githubusercontent.com/u/7444246?v=4&s=16){:height="16" width="16"} ruudboon](https://github.com/ruudboon) on 2020/08/26 09:34:29 / [Repository](https://github.com/Codeception/module-phalcon4)   / [Releases](https://github.com/Codeception/module-phalcon4/releases)



Fixed
- Session To Use Session Manager 


### module-phalcon4 1.0.3: v1.0.3

Released by [![](https://avatars.githubusercontent.com/u/7444246?v=4&s=16){:height="16" width="16"} ruudboon](https://github.com/ruudboon) on 2020/01/11 17:02:24 / [Repository](https://github.com/Codeception/module-phalcon4)   / [Releases](https://github.com/Codeception/module-phalcon4/releases)



Fixed
- Dependencies


### module-phalcon4 1.0.2: v1.0.2

Released by [![](https://avatars.githubusercontent.com/u/7444246?v=4&s=16){:height="16" width="16"} ruudboon](https://github.com/ruudboon) on 2020/01/07 12:32:16 / [Repository](https://github.com/Codeception/module-phalcon4)   / [Releases](https://github.com/Codeception/module-phalcon4/releases)



Fixed
- Replacing service in DI from functional test not working


### module-phalcon4 1.0.1: v1.0.1

Released by [![](https://avatars.githubusercontent.com/u/7444246?v=4&s=16){:height="16" width="16"} ruudboon](https://github.com/ruudboon) on 2020/01/06 11:26:42 / [Repository](https://github.com/Codeception/module-phalcon4)   / [Releases](https://github.com/Codeception/module-phalcon4/releases)



Removed composer.lock
Updated dependencies
Updated SQL schema
Updated DocBlocks


### module-phalcon4 1.0.0: v1.0.0

Released by [![](https://avatars.githubusercontent.com/u/7444246?v=4&s=16){:height="16" width="16"} ruudboon](https://github.com/ruudboon) on 2020/01/06 09:32:56 / [Repository](https://github.com/Codeception/module-phalcon4)   / [Releases](https://github.com/Codeception/module-phalcon4/releases)



Initial release of the Codeception module for Phalcon 4.

