---
layout: page
title: Codeception Changelog
---

<div class="alert alert-warning">Download specific version at <a href="/builds">builds page</a></div>

# Changelog



### module-redis 1.2.0: 1.2.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16) TavoNiievez](https://github.com/TavoNiievez) on 2021/10/08 15:41:43 / [🦑 Repository](https://github.com/Codeception/module-redis)   / [📦 Releases](https://github.com/Codeception/module-redis/releases)



- The minimum version of PHP is now 7.1
- Added strict types and return types

Other minor changes:
- Add debug info to redis cleanup ([#1](https://github.com/Codeception/module-redis/issues/1)) by **[convenient](https://github.com/convenient)**
- Add changelog to `README` file ([#10](https://github.com/Codeception/module-redis/issues/10)) by **[Arhell](https://github.com/Arhell)**


### module-rest 1.3.2: 1.3.2

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/10/08 09:37:07 / [🦑 Repository](https://github.com/Codeception/module-rest)   / [📦 Releases](https://github.com/Codeception/module-rest/releases)



* Preserve zero fraction when encoding json [#63](https://github.com/Codeception/module-rest/issues/63) by **[RusiPapazov](https://github.com/RusiPapazov)**


### module-laminas 1.1.0: 1.1.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16) TavoNiievez](https://github.com/TavoNiievez) on 2021/10/06 00:34:16 / [🦑 Repository](https://github.com/Codeception/module-laminas)   / [📦 Releases](https://github.com/Codeception/module-laminas/releases)



- Support for PHP versions lower than 7.3 is removed.
- Code standards updated to PHP 7.3 by **[TavoNiievez](https://github.com/TavoNiievez)** .
- Remove dependency on laminas/laminas-console ([#13](https://github.com/Codeception/module-laminas/issues/13)) by **[javabudd](https://github.com/javabudd)** .
- Various documentation improvements by **[Naktibalda](https://github.com/Naktibalda)** and **[Arhell](https://github.com/Arhell)** .


### module-laravel 2.1.0: 2.1.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16) TavoNiievez](https://github.com/TavoNiievez) on 2021/09/10 05:09:10 / [🦑 Repository](https://github.com/Codeception/module-laravel)   / [📦 Releases](https://github.com/Codeception/module-laravel/releases)



New methods:

- `amActingAs`
- `assertAuthenticatedAs`
- `assertCredentials`
- `assertInvalidCredentials`
- `dontSeeInSession`
- `dontSeeSessionHasValues`
- `enableMiddleware`
- `flushSession`
- `haveInSession`
- `seedDatabase`

Non-logical changes:

- added missing docs and fixed broken links.

This release includes a general refactoring of the code ([#30](https://github.com/Codeception/module-laravel/issues/30)) that makes it easier to navigate and read, especially using an IDE.

See the full list of changes [here](https://github.com/Codeception/module-laravel/milestone/3). 


### module-amqp 1.1.1: seeMessageInQueueContainsText acks message

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/09/05 07:47:08 / [🦑 Repository](https://github.com/Codeception/module-amqp)   / [📦 Releases](https://github.com/Codeception/module-amqp/releases)



* Stops keeping message in unacked stated, by **[renq](https://github.com/renq)** 


### module-webdriver 1.4.0: Added new methods

Released by [![](https://avatars.githubusercontent.com/u/220264?v=4&s=16) DavertMik](https://github.com/DavertMik) on 2021/09/02 12:08:19 / [🦑 Repository](https://github.com/Codeception/module-webdriver)   / [📦 Releases](https://github.com/Codeception/module-webdriver/releases)



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

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/08/22 07:22:29 / [🦑 Repository](https://github.com/Codeception/module-webdriver)   / [📦 Releases](https://github.com/Codeception/module-webdriver/releases)



Add new option webdriver_proxy to tunnel requests to the remote WebDriver server


### module-webdriver 1.2.2: Documentation update

Released by [![](https://avatars.githubusercontent.com/u/220264?v=4&s=16) DavertMik](https://github.com/DavertMik) on 2021/08/19 11:16:42 / [🦑 Repository](https://github.com/Codeception/module-webdriver)   / [📦 Releases](https://github.com/Codeception/module-webdriver/releases)






### Codeception 3.1.3: Security fix

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/08/06 17:36:46 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Security fix: Disable deserialization of RunProcess class ([#6241](https://github.com/Codeception/Codeception/issues/6241)) reported by **[snoopysecurity](https://github.com/snoopysecurity)**


### Codeception 3.1.3: Security fix

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/08/06 17:36:46 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Security fix: Disable deserialization of RunProcess class ([#6241](https://github.com/Codeception/Codeception/issues/6241)) reported by **[snoopysecurity](https://github.com/snoopysecurity)**


### Codeception 4.1.22: Security fix

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/08/06 17:31:37 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Security fix: Disable deserialization of RunProcess class ([#6241](https://github.com/Codeception/Codeception/issues/6241)) reported by **[snoopysecurity](https://github.com/snoopysecurity)**
* Reduce memory consumption of very large tests ([#6230](https://github.com/Codeception/Codeception/issues/6230)) by **[esnelubov](https://github.com/esnelubov)**
* Support guzzlehttp/psr7 v2 by **[W0rma](https://github.com/W0rma)**
* Fix W3C warning in reports generated by Recorder extension ([#6224](https://github.com/Codeception/Codeception/issues/6224)) by RickR2H


### Codeception 4.1.22: Security fix

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/08/06 17:31:37 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Security fix: Disable deserialization of RunProcess class ([#6241](https://github.com/Codeception/Codeception/issues/6241)) reported by **[snoopysecurity](https://github.com/snoopysecurity)**
* Reduce memory consumption of very large tests ([#6230](https://github.com/Codeception/Codeception/issues/6230)) by **[esnelubov](https://github.com/esnelubov)**
* Support guzzlehttp/psr7 v2 by **[W0rma](https://github.com/W0rma)**
* Fix W3C warning in reports generated by Recorder extension ([#6224](https://github.com/Codeception/Codeception/issues/6224)) by RickR2H


### module-laravel 2.0.1: 2.0.1

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16) TavoNiievez](https://github.com/TavoNiievez) on 2021/08/02 15:51:15 / [🦑 Repository](https://github.com/Codeception/module-laravel)   / [📦 Releases](https://github.com/Codeception/module-laravel/releases)



- fix: uploaded files should have test flag set to true ([#26](https://github.com/Codeception/module-laravel/issues/26)) by **[fkupper](https://github.com/fkupper)**
- remove return type of callArtisan ([#25](https://github.com/Codeception/module-laravel/issues/25)) by **[fkupper](https://github.com/fkupper)**
- add link to changelog in readme ([#24](https://github.com/Codeception/module-laravel/issues/24)) by **[Arhell](https://github.com/Arhell)** 


### module-symfony 2.0.5: 2.0.5

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16) TavoNiievez](https://github.com/TavoNiievez) on 2021/07/07 01:17:57 / [🦑 Repository](https://github.com/Codeception/module-symfony)   / [📦 Releases](https://github.com/Codeception/module-symfony/releases)



Added assertions for Symfony Mime component ([#139](https://github.com/Codeception/module-symfony/issues/139)):

- `assertEmailAddressContains`
- `assertEmailAttachmentCount`
- `assertEmailHasHeader`
- `assertEmailHeaderNotSame`
- `assertEmailHeaderSame`
- `assertEmailHtmlBodyContains`
- `assertEmailHtmlBodyNotContains`
- `assertEmailNotHasHeader`
- `assertEmailTextBodyContains`
- `assertEmailTextBodyNotContains`


### module-symfony 2.0.4: 2.0.4

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16) TavoNiievez](https://github.com/TavoNiievez) on 2021/06/07 06:16:58 / [🦑 Repository](https://github.com/Codeception/module-symfony)   / [📦 Releases](https://github.com/Codeception/module-symfony/releases)



- New method: `$I->goToLogoutPath();`
- `$I->logout();` is now an alias for `$I->logoutProgrammatically();`

- Added changelog link to readme.md ([#136](https://github.com/Codeception/module-symfony/issues/136)) by **[Arhell](https://github.com/Arhell)**




### module-symfony 2.0.3: 2.0.3

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16) TavoNiievez](https://github.com/TavoNiievez) on 2021/06/01 01:51:37 / [🦑 Repository](https://github.com/Codeception/module-symfony)   / [📦 Releases](https://github.com/Codeception/module-symfony/releases)



- Added Symfony 5.3 compatibility ([#133](https://github.com/Codeception/module-symfony/issues/133)).
- Added new method:  `$I->seeRequestTimeIsLessThan()` ([#132](https://github.com/Codeception/module-symfony/issues/132)).


### Codeception 4.1.21: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/05/28 18:10:56 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Fix `dry-run` compatibility with symfony/console 5.3
* Coverage: Don't attempt to set cookie domain when it is "localhost" [#6210](https://github.com/Codeception/Codeception/issues/6210) by **[marcovtwout](https://github.com/marcovtwout)**
* Coverage: Don't attempt to read cookies while an alert is open [#6211](https://github.com/Codeception/Codeception/issues/6211) by **[marcovtwout](https://github.com/marcovtwout)**


### Codeception 4.1.21: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/05/28 18:10:56 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Fix `dry-run` compatibility with symfony/console 5.3
* Coverage: Don't attempt to set cookie domain when it is "localhost" [#6210](https://github.com/Codeception/Codeception/issues/6210) by **[marcovtwout](https://github.com/marcovtwout)**
* Coverage: Don't attempt to read cookies while an alert is open [#6211](https://github.com/Codeception/Codeception/issues/6211) by **[marcovtwout](https://github.com/marcovtwout)**


### module-yii2 1.1.3: 1.1.3

Released by [![](https://avatars.githubusercontent.com/u/47294?v=4&s=16) samdark](https://github.com/samdark) on 2021/05/24 20:06:33 / [🦑 Repository](https://github.com/Codeception/module-yii2)   / [📦 Releases](https://github.com/Codeception/module-yii2/releases)



- Add ability to specify application class in config ([#48](https://github.com/Codeception/module-yii2/issues/48))


### module-phalcon4 v1.0.7: v1.0.7

Released by [![](https://avatars.githubusercontent.com/u/3289702?v=4&s=16) Jeckerson](https://github.com/Jeckerson) on 2021/05/18 18:21:15 / [🦑 Repository](https://github.com/Codeception/module-phalcon4)   / [📦 Releases](https://github.com/Codeception/module-phalcon4/releases)



Updated code base to PHP 7.2 ([#14](https://github.com/Codeception/module-phalcon4/issues/14)):
- Added strict types
- Added return types
- Added some type hints
- Removed unnecessary qualifiers
- sha1 by default instead of md5.


### module-lumen 2.0.1: 2.0.1

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16) TavoNiievez](https://github.com/TavoNiievez) on 2021/04/29 14:24:58 / [🦑 Repository](https://github.com/Codeception/module-lumen)   / [📦 Releases](https://github.com/Codeception/module-lumen/releases)



**Fix** Factory compatibility issue with Lumen < 7 ([#12](https://github.com/Codeception/module-lumen/issues/12)) by  **[ibpavlov](https://github.com/ibpavlov)**.



### module-webdriver 1.2.1: Documentation update

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/04/23 17:31:52 / [🦑 Repository](https://github.com/Codeception/module-webdriver)   / [📦 Releases](https://github.com/Codeception/module-webdriver/releases)






### module-rest 1.3.1: DELETE  method sends request body

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/04/23 09:02:05 / [🦑 Repository](https://github.com/Codeception/module-rest)   / [📦 Releases](https://github.com/Codeception/module-rest/releases)



Revert change implemented in 1.3.0


### module-symfony 2.0.2: 2.0.2

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16) TavoNiievez](https://github.com/TavoNiievez) on 2021/04/16 13:39:49 / [🦑 Repository](https://github.com/Codeception/module-symfony)   / [📦 Releases](https://github.com/Codeception/module-symfony/releases)



Logical changes by **[mrsombre](https://github.com/mrsombre)** : 
- Fix Doctrine Connection service alias ([#129](https://github.com/Codeception/module-symfony/issues/129))

Documentation changes by **[ThomasLandauer](https://github.com/ThomasLandauer)** :
- `submitSymfonyForm()`: Mentioning `name` attribute ([#128](https://github.com/Codeception/module-symfony/issues/128))


### module-phalcon4 v1.0.6: v1.0.6

Released by [![](https://avatars.githubusercontent.com/u/3289702?v=4&s=16) Jeckerson](https://github.com/Jeckerson) on 2021/04/13 21:30:04 / [🦑 Repository](https://github.com/Codeception/module-phalcon4)   / [📦 Releases](https://github.com/Codeception/module-phalcon4/releases)



* Fixed Request service redefinition ([#7](https://github.com/Codeception/module-phalcon4/issues/7))


### module-rest 1.3.0: 1.3.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/04/08 08:28:48 / [🦑 Repository](https://github.com/Codeception/module-rest)   / [📦 Releases](https://github.com/Codeception/module-rest/releases)



* Add generic send method taking HTTP method as parameter
* Don't send request body with DELETE and OPTIONS requests
* Validate url and params parameters of all send methods
* Document that sendPost, sendPut, sendPatch methods accept string and JsonSerializable as params too
* Other documentation improvements


### Codeception 4.1.20: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/04/02 16:43:57 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Fix compatibility with PHP 7.0


### Codeception 4.1.20: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/04/02 16:43:57 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Fix compatibility with PHP 7.0


### module-redis 1.1.0: Allow more parameters to be sent to Predis Client

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/03/31 16:04:36 / [🦑 Repository](https://github.com/Codeception/module-redis)   / [📦 Releases](https://github.com/Codeception/module-redis/releases)



See [#6](https://github.com/Codeception/module-redis/issues/6)


### module-symfony 2.0.1: 2.0.1

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16) TavoNiievez](https://github.com/TavoNiievez) on 2021/03/28 15:48:38 / [🦑 Repository](https://github.com/Codeception/module-symfony)   / [📦 Releases](https://github.com/Codeception/module-symfony/releases)



Minor changes in documentation by **[ThomasLandauer](https://github.com/ThomasLandauer)** :
- Added info from the '*[Codeception for Symfony](https://codeception.com/for/symfony)*' page ([#98](https://github.com/Codeception/module-symfony/issues/98))
- Explaining the `stopFollowingRedirects()` restriction for email ([#118](https://github.com/Codeception/module-symfony/issues/118))
- Added 'See also' in related email functions ([#122](https://github.com/Codeception/module-symfony/issues/122))
- Standardize `"@example.com"` as domain in documentation ([#124](https://github.com/Codeception/module-symfony/issues/124))
- Mentioning Symfony Mailer requirement ([#126](https://github.com/Codeception/module-symfony/issues/126))
- Changing Fail message for Symfony Mailer ([#127](https://github.com/Codeception/module-symfony/issues/127))



### Codeception 4.1.19: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/03/28 13:33:05 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Action file generator supports PHP 8 union types
* Action file generator generates typehints for method parameters
* Removed dead code related to DataProviderTestSuite
* Removed documentation related to Cept format
* Deprecated generate:cept command
* Documentation improvements



### Codeception 4.1.19: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/03/28 13:33:05 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Action file generator supports PHP 8 union types
* Action file generator generates typehints for method parameters
* Removed dead code related to DataProviderTestSuite
* Removed documentation related to Cept format
* Deprecated generate:cept command
* Documentation improvements



### module-amqp 1.1.0: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/03/21 15:29:11 / [🦑 Repository](https://github.com/Codeception/module-amqp)   / [📦 Releases](https://github.com/Codeception/module-amqp/releases)



* Support PHP 8.0
* Support php-amqplib v3


### module-datafactory 1.1.0: Added Custom Store

Released by [![](https://avatars.githubusercontent.com/u/220264?v=4&s=16) DavertMik](https://github.com/DavertMik) on 2021/03/16 19:42:52 / [🦑 Repository](https://github.com/Codeception/module-datafactory)   / [📦 Releases](https://github.com/Codeception/module-datafactory/releases)



Custom Store can be used for Data Factory. See [#2](https://github.com/Codeception/module-datafactory/issues/2) 


### module-rest 1.2.8: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/03/02 06:51:05 / [🦑 Repository](https://github.com/Codeception/module-rest)   / [📦 Releases](https://github.com/Codeception/module-rest/releases)



Append query params to URL for HEAD requests


### Codeception 4.1.18: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/02/23 17:12:18 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Fix cleanup of included test directories [#6117](https://github.com/Codeception/Codeception/issues/6117) by **[rolandsaven](https://github.com/rolandsaven)**
* Clean command will not delete .gitkeep files in _output directory [#6118](https://github.com/Codeception/Codeception/issues/6118)
* Add line break between opening tag and namespace in generated Cest and Test files [#6072](https://github.com/Codeception/Codeception/issues/6072)


### Codeception 4.1.18: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/02/23 17:12:18 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Fix cleanup of included test directories [#6117](https://github.com/Codeception/Codeception/issues/6117) by **[rolandsaven](https://github.com/rolandsaven)**
* Clean command will not delete .gitkeep files in _output directory [#6118](https://github.com/Codeception/Codeception/issues/6118)
* Add line break between opening tag and namespace in generated Cest and Test files [#6072](https://github.com/Codeception/Codeception/issues/6072)


### module-symfony 2.0.0: 2.0.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16) TavoNiievez](https://github.com/TavoNiievez) on 2021/02/12 22:31:22 / [🦑 Repository](https://github.com/Codeception/module-symfony)   / [📦 Releases](https://github.com/Codeception/module-symfony/releases)



* **New:**
  * Added Twig assertions: [`seeCurrentTemplateIs`](https://codeception.com/docs/modules/Symfony#seeCurrentTemplateIs), [`seeRenderedTemplate`](https://codeception.com/docs/modules/Symfony#seeRenderedTemplate) and [`dontSeeRenderedTemplate`](https://codeception.com/docs/modules/Symfony#dontSeeRenderedTemplate).
  * The [`grabSentEmails`](https://codeception.com/docs/modules/Symfony#grabSentEmails) and [`grabLastSentEmail`](https://codeception.com/docs/modules/Symfony#grabLastSentEmail) functions were added.
  * Added [`SeeOrphanEvent`](https://codeception.com/docs/modules/Symfony#seeOrphanEvent) and [`dontSeeOrphanEvent`](https://codeception.com/docs/modules/Symfony#dontSeeOrphanEvent) assertions.
  * The `$url` parameter is now optional in the [`seePageIsAvailable`](https://codeception.com/docs/modules/Symfony#seePageIsAvailable) assertion.
* **BC:**
  * `Symfony 3.4` support removed. `Symfony 4.4` or higher is now required.
  * Support for [`Swift Mailer`](https://symfony.com/doc/current/email.html) was dropped in favor of [`Symfony Mailer`](https://symfony.com/doc/current/mailer.html); the [`mailer`](https://github.com/Codeception/module-symfony/pull/9/files) configuration parameter was removed.

> If you are already using `Symfony 4.4` or higher it should not be necessary to make changes to your tests to update!


### module-phalcon4 v1.0.5: v1.0.5

Released by [![](https://avatars.githubusercontent.com/u/3289702?v=4&s=16) Jeckerson](https://github.com/Jeckerson) on 2021/02/10 22:09:30 / [🦑 Repository](https://github.com/Codeception/module-phalcon4)   / [📦 Releases](https://github.com/Codeception/module-phalcon4/releases)



Changed
* Removed limitation of PHP 8.0 version in composer.json


### Codeception 4.1.17: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/02/01 07:32:33 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Fix `codecept run suite` when suite name matches directory (bug introduced in 4.1.16)
* `codecept run tests` is equivalent to `codecept run`
* `codecept run :filter` works without specifying suite [#6105](https://github.com/Codeception/Codeception/issues/6105)
* `codecept run tests:filter` works too


### Codeception 4.1.17: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/02/01 07:32:33 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Fix `codecept run suite` when suite name matches directory (bug introduced in 4.1.16)
* `codecept run tests` is equivalent to `codecept run`
* `codecept run :filter` works without specifying suite [#6105](https://github.com/Codeception/Codeception/issues/6105)
* `codecept run tests:filter` works too


### Codeception 4.1.16: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/01/26 07:33:02 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Detect the suite from a test path relative to the current working dir ([#6051](https://github.com/Codeception/Codeception/issues/6051))
* GroupManager: Fixed bug introduced in 4.1.15
* Show location of warning in error message ([#6090](https://github.com/Codeception/Codeception/issues/6090))


### Codeception 4.1.16: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/01/26 07:33:02 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Detect the suite from a test path relative to the current working dir ([#6051](https://github.com/Codeception/Codeception/issues/6051))
* GroupManager: Fixed bug introduced in 4.1.15
* Show location of warning in error message ([#6090](https://github.com/Codeception/Codeception/issues/6090))


### module-lumen 2.0.0: 2.0.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16) TavoNiievez](https://github.com/TavoNiievez) on 2021/01/19 05:02:29 / [🦑 Repository](https://github.com/Codeception/module-lumen)   / [📦 Releases](https://github.com/Codeception/module-lumen/releases)



**New features:**
 - `Lumen 6`, `Lumen 7`, and `Lumen 8` compatibility.
 - Module documentation updated.
 - Added typed arguments.
 - Updated the module's code base following PHP 7.3+ standards.

**Breaking changes:**
 - Removed support for PHP versions lower than `PHP 7.3`.
 - Removed support for `Lumen 5` and lower.

> **Minor change**: Adding link to "central" parts explanation ([#4](https://github.com/Codeception/module-lumen/issues/4)) by **[ThomasLandauer](https://github.com/ThomasLandauer)**.


### Codeception 4.1.15: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/01/17 19:32:00 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* GroupManager: Show which group contains a missing file [#5938](https://github.com/Codeception/Codeception/issues/5938)
* Ignore . namespace in generators when someone pass path as a class name, e.g. ./foo [#5818](https://github.com/Codeception/Codeception/issues/5818)
* Removed "Running with seed" from CLI report ([#6088](https://github.com/Codeception/Codeception/issues/6088)) by **[eXorus](https://github.com/eXorus)**
* Suggest most similar module in missing module exception [#6079](https://github.com/Codeception/Codeception/issues/6079) by **[c33s](https://github.com/c33s)**


### Codeception 4.1.15: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/01/17 19:32:00 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* GroupManager: Show which group contains a missing file [#5938](https://github.com/Codeception/Codeception/issues/5938)
* Ignore . namespace in generators when someone pass path as a class name, e.g. ./foo [#5818](https://github.com/Codeception/Codeception/issues/5818)
* Removed "Running with seed" from CLI report ([#6088](https://github.com/Codeception/Codeception/issues/6088)) by **[eXorus](https://github.com/eXorus)**
* Suggest most similar module in missing module exception [#6079](https://github.com/Codeception/Codeception/issues/6079) by **[c33s](https://github.com/c33s)**


### module-webdriver 1.2.0: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/01/17 19:30:29 / [🦑 Repository](https://github.com/Codeception/module-webdriver)   / [📦 Releases](https://github.com/Codeception/module-webdriver/releases)



* Implemented makeElementScreenshot by **[Blaimi](https://github.com/Blaimi)** 
* Documentation improvements


### module-phalcon 1.1.0: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/01/16 12:03:45 / [🦑 Repository](https://github.com/Codeception/module-phalcon)   / [📦 Releases](https://github.com/Codeception/module-phalcon/releases)



* Added ability to use parameters defined in the service container [#3](https://github.com/Codeception/module-phalcon/issues/3)
* Fix: `$cookie->setSecure()` always as boolean [#6](https://github.com/Codeception/module-phalcon/issues/6)


### module-datafactory 1.0.1: PHP8 support

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/12/30 15:56:46 / [🦑 Repository](https://github.com/Codeception/module-datafactory)   / [📦 Releases](https://github.com/Codeception/module-datafactory/releases)






### module-laravel 2.0.0: 2.0.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16) TavoNiievez](https://github.com/TavoNiievez) on 2020/12/29 20:52:27 / [🦑 Repository](https://github.com/Codeception/module-laravel)   / [📦 Releases](https://github.com/Codeception/module-laravel/releases)



**New features:**
 - `Laravel 6`, `Laravel 7`, and `Laravel 8` compatibility.
 - Module documentation updated.
 - Added typed arguments.
 - Updated the module's code base following PHP 7.3+ standards.

**Breaking changes:**
 - Removed support for PHP versions lower than `PHP 7.3`.
 - Removed support for `Laravel 5` and lower.
 - The `Codeception\Module\Laravel5` class was renamed to `Codeception\Module\Laravel`:
```diff
# tests/funcional.suite.yml
modules:
  enabled:
    - Asserts
-    - Laravel5:
+    - Laravel:
        environment_file: .env.testing
```
> **Minor change**: Adding link to "central" parts explanation ([#8](https://github.com/Codeception/module-laravel/issues/8)) by **[ThomasLandauer](https://github.com/ThomasLandauer)**.

If you're interested in contributing to this module and didn't know where to start, a [contribution guide](https://github.com/Codeception/module-laravel/blob/main/CONTRIBUTING.md) is now available, thanks to **[ThomasLandauer](https://github.com/ThomasLandauer)** and **[TavoNiievez](https://github.com/TavoNiievez)**.


### Codeception 4.1.14: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/12/28 19:22:25 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Improved compatibility logic for Symfony EventDispatcher


### Codeception 4.1.14: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/12/28 19:22:25 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Improved compatibility logic for Symfony EventDispatcher


### module-yii2 1.1.2: 1.1.2

Released by [![](https://avatars.githubusercontent.com/u/47294?v=4&s=16) samdark](https://github.com/samdark) on 2020/12/28 11:32:21 / [🦑 Repository](https://github.com/Codeception/module-yii2)   / [📦 Releases](https://github.com/Codeception/module-yii2/releases)



- PHP 8 support [#18](https://github.com/Codeception/module-yii2/issues/18) by **[samdark](https://github.com/samdark)**
- Fix for support `Instance::of()` in configuration [#21](https://github.com/Codeception/module-yii2/issues/21) by **[antonovsky](https://github.com/antonovsky)**
- Initialize `$_SERVER['QUERY_STRING']` to mimic normal behavior of most webservers by **[eborned](https://github.com/eborned)**


### module-cli 1.1.1: Preparation for PHPUnit 10

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/12/26 16:58:43 / [🦑 Repository](https://github.com/Codeception/module-cli)   / [📦 Releases](https://github.com/Codeception/module-cli/releases)



Use wrapper for assertRegExp method


### module-laravel 1.1.2: 1.1.2

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16) TavoNiievez](https://github.com/TavoNiievez) on 2020/12/26 15:43:02 / [🦑 Repository](https://github.com/Codeception/module-laravel)   / [📦 Releases](https://github.com/Codeception/module-laravel/releases)



Update project name to `module-laravel` ([#4](https://github.com/Codeception/module-laravel/issues/4))


### module-laravel 1.1.1: 1.1.1

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16) TavoNiievez](https://github.com/TavoNiievez) on 2020/12/26 14:18:48 / [🦑 Repository](https://github.com/Codeception/module-laravel)   / [📦 Releases](https://github.com/Codeception/module-laravel/releases)



Support PHP 8 *(Depends on Laravel libraries actually supporting PHP 8)* by **[Naktibalda](https://github.com/Naktibalda)** 


### module-symfony 1.6.0: 1.6.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16) TavoNiievez](https://github.com/TavoNiievez) on 2020/12/20 16:52:03 / [🦑 Repository](https://github.com/Codeception/module-symfony)   / [📦 Releases](https://github.com/Codeception/module-symfony/releases)



* New methods by **[TavoNiievez](https://github.com/TavoNiievez)**:
  * dontSeeEventTriggered
  * seeFormErrorMessages
  * seeUserHasRoles

* Remembered authentication methods now also verify the Cookie generated ([#81](https://github.com/Codeception/module-symfony/issues/81))
* Fixed time metric when running test with `--debug` ([#77](https://github.com/Codeception/module-symfony/issues/77))

If you're interested in contributing to this module and didn't know where to start, a [contribution guide is now available](https://github.com/Codeception/module-symfony/blob/master/CONTRIBUTING.md), thanks to **[ThomasLandauer](https://github.com/ThomasLandauer)** and **[TavoNiievez](https://github.com/TavoNiievez)** ([#79](https://github.com/Codeception/module-symfony/issues/79)).

**BC:** Removed support for `PHP 7.1` and `PHP 7.2`.

> Minor changes: ([#65](https://github.com/Codeception/module-symfony/issues/65)) ([#78](https://github.com/Codeception/module-symfony/issues/78)) 



### Codeception 4.1.13: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/12/20 13:45:38 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Gherkin: Fixed loading methods from namespaced helper classes [#6057](https://github.com/Codeception/Codeception/issues/6057)


### Codeception 4.1.13: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/12/20 13:45:38 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Gherkin: Fixed loading methods from namespaced helper classes [#6057](https://github.com/Codeception/Codeception/issues/6057)


### module-db 1.1.0: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/12/20 13:38:20 / [🦑 Repository](https://github.com/Codeception/module-db)   / [📦 Releases](https://github.com/Codeception/module-db/releases)



Add support for IS NOT NULL in database assertions [#12](https://github.com/Codeception/module-db/issues/12) 


### module-symfony 1.5.0: 1.5.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16) TavoNiievez](https://github.com/TavoNiievez) on 2020/12/11 20:50:16 / [🦑 Repository](https://github.com/Codeception/module-symfony)   / [📦 Releases](https://github.com/Codeception/module-symfony/releases)



* New method by **[ThomasLandauer](https://github.com/ThomasLandauer)**:
  * dontSeeInSession

* New methods by **[TavoNiievez](https://github.com/TavoNiievez)**:
  * dontSeeRememberedAuthentication
  * grabNumRecords
  * seeEventTriggered
  * seeRememberedAuthentication
  * seeSessionHasValues
  * persistPermanentService

* Now you can run test for all the methods of this module in https://github.com/Codeception/symfony-module-tests .

* **BC:** Remove PHP 7.0 support ([#69](https://github.com/Codeception/module-symfony/issues/69)), code standards updated to PHP 7.1+ ([#75](https://github.com/Codeception/module-symfony/issues/75))
* **BC:** Removed parameter flags in `seeAuthentication`, `dontSeeAuthentication` and `persistService`, use  `seeRememberedAuthentication`, `dontSeeRememberedAuthentication` and `persistPermanentService` instead.

> Minor logical change in [#74](https://github.com/Codeception/module-symfony/issues/74).


### module-symfony 1.4.2: 1.4.2

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16) TavoNiievez](https://github.com/TavoNiievez) on 2020/11/26 12:56:36 / [🦑 Repository](https://github.com/Codeception/module-symfony)   / [📦 Releases](https://github.com/Codeception/module-symfony/releases)



* Support PHP 8 by **[Naktibalda](https://github.com/Naktibalda)** 

> Minor non-logical changes in [#57](https://github.com/Codeception/module-symfony/issues/57) and [#62](https://github.com/Codeception/module-symfony/issues/62).



### module-mongodb 1.1.1: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/11/26 07:20:07 / [🦑 Repository](https://github.com/Codeception/module-mongodb)   / [📦 Releases](https://github.com/Codeception/module-mongodb/releases)






### module-doctrine2 1.1.1: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/11/26 06:57:10 / [🦑 Repository](https://github.com/Codeception/module-doctrine2)   / [📦 Releases](https://github.com/Codeception/module-doctrine2/releases)






### module-symfony 1.4.1: 1.4.1

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16) TavoNiievez](https://github.com/TavoNiievez) on 2020/11/25 19:31:47 / [🦑 Repository](https://github.com/Codeception/module-symfony)   / [📦 Releases](https://github.com/Codeception/module-symfony/releases)



* Minor logic fixes ([#58](https://github.com/Codeception/module-symfony/issues/58)), ([#59](https://github.com/Codeception/module-symfony/issues/59)), and ([#60](https://github.com/Codeception/module-symfony/issues/60)) by **[TavoNiievez](https://github.com/TavoNiievez)** 


### module-laminas 1.0.0: First release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/11/25 07:58:15 / [🦑 Repository](https://github.com/Codeception/module-laminas)   / [📦 Releases](https://github.com/Codeception/module-laminas/releases)



* Renamed module-zf2 to module-laminas
* Supports PHP 8


### module-mezzio 2.0.2: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/11/25 07:15:31 / [🦑 Repository](https://github.com/Codeception/module-mezzio)   / [📦 Releases](https://github.com/Codeception/module-mezzio/releases)






### module-redis 1.0.1: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/11/25 06:44:01 / [🦑 Repository](https://github.com/Codeception/module-redis)   / [📦 Releases](https://github.com/Codeception/module-redis/releases)






### module-symfony 1.4.0: 1.4.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16) TavoNiievez](https://github.com/TavoNiievez) on 2020/11/24 16:56:31 / [🦑 Repository](https://github.com/Codeception/module-symfony)   / [📦 Releases](https://github.com/Codeception/module-symfony/releases)



* New methods by **[TavoNiievez](https://github.com/TavoNiievez)**:
  * seeFormErrorMessage ([#50](https://github.com/Codeception/module-symfony/issues/50))
  * dontSeeFormErrors function ([#49](https://github.com/Codeception/module-symfony/issues/49))
  * seeFormHasErrors function ([#48](https://github.com/Codeception/module-symfony/issues/48))

* Minor logic fixes ([#51](https://github.com/Codeception/module-symfony/issues/51)), ([#47](https://github.com/Codeception/module-symfony/issues/47)), ([#44](https://github.com/Codeception/module-symfony/issues/44)), ([#41](https://github.com/Codeception/module-symfony/issues/41)) and ([#56](https://github.com/Codeception/module-symfony/issues/56)).


### module-symfony 1.3.0: 1.3.0

Released by [![](https://avatars.githubusercontent.com/u/64917965?v=4&s=16) TavoNiievez](https://github.com/TavoNiievez) on 2020/11/16 16:52:18 / [🦑 Repository](https://github.com/Codeception/module-symfony)   / [📦 Releases](https://github.com/Codeception/module-symfony/releases)



* New methods by **[TavoNiievez](https://github.com/TavoNiievez)**:
  * grabRepository ([#27](https://github.com/Codeception/module-symfony/issues/27))
  * seeUserPasswordDoesNotNeedRehash ([#29](https://github.com/Codeception/module-symfony/issues/29))
  * grabParameter ([#30](https://github.com/Codeception/module-symfony/issues/30))
  * submitSymfonyForm ([#32](https://github.com/Codeception/module-symfony/issues/32))
  * seePageIsAvailable ([#33](https://github.com/Codeception/module-symfony/issues/33))
  * seePageRedirectsTo ([#33](https://github.com/Codeception/module-symfony/issues/33))

* Supports vlucas/phpdotenv v5 ([#28](https://github.com/Codeception/module-symfony/issues/28))
* Minor logic fixes ([#35](https://github.com/Codeception/module-symfony/issues/35)), ([#36](https://github.com/Codeception/module-symfony/issues/36)), ([#37](https://github.com/Codeception/module-symfony/issues/37)) and ([#38](https://github.com/Codeception/module-symfony/issues/38))

* Improved documentation of the 'Parts' feature by **[ThomasLandauer](https://github.com/ThomasLandauer)** ([#40](https://github.com/Codeception/module-symfony/issues/40))

* **BC**: Removed support for php 5.6 and Symfony 2.8 ([#39](https://github.com/Codeception/module-symfony/issues/39))


### module-webdriver 1.1.4: Documentation improvements

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/11/16 07:24:08 / [🦑 Repository](https://github.com/Codeception/module-webdriver)   / [📦 Releases](https://github.com/Codeception/module-webdriver/releases)






### Codeception 4.1.12: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/11/16 06:44:03 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Dependency Injection: Fix PHP types being treated as classes [#6031](https://github.com/Codeception/Codeception/issues/6031) by **[cs278](https://github.com/cs278)**


### Codeception 4.1.12: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/11/16 06:44:03 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Dependency Injection: Fix PHP types being treated as classes [#6031](https://github.com/Codeception/Codeception/issues/6031) by **[cs278](https://github.com/cs278)**


### module-cli 1.1.0: Add grabShellOutput method

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/11/16 06:27:24 / [🦑 Repository](https://github.com/Codeception/module-cli)   / [📦 Releases](https://github.com/Codeception/module-cli/releases)






### module-doctrine2 1.1.0: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/11/14 20:44:32 / [🦑 Repository](https://github.com/Codeception/module-doctrine2)   / [📦 Releases](https://github.com/Codeception/module-doctrine2/releases)



* Configurable purge mode - DELETE or TRUNCATE 
* Catch MappingException thrown by Doctrine 2.9 


### module-soap 1.0.1: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/11/07 20:10:24 / [🦑 Repository](https://github.com/Codeception/module-soap)   / [📦 Releases](https://github.com/Codeception/module-soap/releases)






### module-rest 1.2.7: Fix deprecation error

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/11/04 17:06:31 / [🦑 Repository](https://github.com/Codeception/module-rest)   / [📦 Releases](https://github.com/Codeception/module-rest/releases)



* Replaced deprecated JsonPath data() method with getData [#37](https://github.com/Codeception/module-rest/issues/37) by **[SoftCreatR](https://github.com/SoftCreatR)**


### Codeception 4.1.11: bugfix release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/11/03 17:36:41 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Add ServerConstAdapter for phpdotenv v5 [#6015](https://github.com/Codeception/Codeception/issues/6015) by #retnek
* Use fully qualified name for class constant defaults [#6016](https://github.com/Codeception/Codeception/issues/6016) by **[lastzero](https://github.com/lastzero)**
* Another patch for class constant default values [#6027](https://github.com/Codeception/Codeception/issues/6027) by **[mwi-gofore](https://github.com/mwi-gofore)**



### Codeception 4.1.11: bugfix release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/11/03 17:36:41 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Add ServerConstAdapter for phpdotenv v5 [#6015](https://github.com/Codeception/Codeception/issues/6015) by #retnek
* Use fully qualified name for class constant defaults [#6016](https://github.com/Codeception/Codeception/issues/6016) by **[lastzero](https://github.com/lastzero)**
* Another patch for class constant default values [#6027](https://github.com/Codeception/Codeception/issues/6027) by **[mwi-gofore](https://github.com/mwi-gofore)**



### module-rest 1.2.6: softcreatr/jsonpath

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/11/03 07:11:13 / [🦑 Repository](https://github.com/Codeception/module-rest)   / [📦 Releases](https://github.com/Codeception/module-rest/releases)



*  Replace flow/jsonpath with softcreatr/jsonpath ([#35](https://github.com/Codeception/module-rest/issues/35)) 


### module-queue 1.1.1: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/10/31 19:08:59 / [🦑 Repository](https://github.com/Codeception/module-queue)   / [📦 Releases](https://github.com/Codeception/module-queue/releases)






### module-sequence 1.0.1: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/10/31 19:03:32 / [🦑 Repository](https://github.com/Codeception/module-sequence)   / [📦 Releases](https://github.com/Codeception/module-sequence/releases)






### module-symfony 1.2.0: 1.2.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/10/31 18:41:28 / [🦑 Repository](https://github.com/Codeception/module-symfony)   / [📦 Releases](https://github.com/Codeception/module-symfony/releases)



* New methods by **[TavoNiievez](https://github.com/TavoNiievez)**:
  * amLoggedInAs
  * logout
  * seeInSession
  * seeAuthentication
  * dontSeeAuthentication
  * seeUserHasRole 
  * amOnAction
  * seeCurrentActionIs
  * seeNumRecords

* Supports vlucas/phpdotenv ^3.6 and  ^4.1
* Improved description and error messages of grabService and seeEmailIsSent by **[ThomasLandauer](https://github.com/ThomasLandauer)**


### module-memcache 1.0.1: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/10/28 13:30:19 / [🦑 Repository](https://github.com/Codeception/module-memcache)   / [📦 Releases](https://github.com/Codeception/module-memcache/releases)






### module-lumen 1.0.1: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/10/28 07:48:01 / [🦑 Repository](https://github.com/Codeception/module-lumen)   / [📦 Releases](https://github.com/Codeception/module-lumen/releases)



Depends on Lumen libraries actually supporting PHP 8


### module-laravel5 1.1.1: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/10/28 07:06:39 / [🦑 Repository](https://github.com/Codeception/module-laravel5)   / [📦 Releases](https://github.com/Codeception/module-laravel5/releases)



Depends on Laravel libraries actually supporting PHP 8


### module-ftp 1.0.2: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/10/27 06:39:25 / [🦑 Repository](https://github.com/Codeception/module-ftp)   / [📦 Releases](https://github.com/Codeception/module-ftp/releases)






### module-apc 1.0.2: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/10/26 06:16:30 / [🦑 Repository](https://github.com/Codeception/module-apc)   / [📦 Releases](https://github.com/Codeception/module-apc/releases)






### module-webdriver 1.1.3: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/10/24 15:41:47 / [🦑 Repository](https://github.com/Codeception/module-webdriver)   / [📦 Releases](https://github.com/Codeception/module-webdriver/releases)






### module-phpbrowser 1.0.2: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/10/24 15:29:51 / [🦑 Repository](https://github.com/Codeception/module-phpbrowser)   / [📦 Releases](https://github.com/Codeception/module-phpbrowser/releases)






### module-rest 1.2.5: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/10/24 15:22:52 / [🦑 Repository](https://github.com/Codeception/module-rest)   / [📦 Releases](https://github.com/Codeception/module-rest/releases)






### module-filesystem 1.0.3: PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/10/24 14:50:10 / [🦑 Repository](https://github.com/Codeception/module-filesystem)   / [📦 Releases](https://github.com/Codeception/module-filesystem/releases)



* PHP 8 support
* Delete local copy of autogenerated documentation
* Use wrapper methods to avoid PHPUnit 9 deprecation messages and keep it working with PHPUnit 10


### module-db 1.0.2: PHP8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/10/23 18:22:43 / [🦑 Repository](https://github.com/Codeception/module-db)   / [📦 Releases](https://github.com/Codeception/module-db/releases)



* Support PHP 8 (no code changes)
* Require stable version of codeception/codeception


### Codeception 4.1.9: PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/10/23 18:03:56 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Support PHP 8 [#5999](https://github.com/Codeception/Codeception/issues/5999)
* Generate correct default values in Actions files [#5999](https://github.com/Codeception/Codeception/issues/5999)
* Use sendGet in Api template [#5998](https://github.com/Codeception/Codeception/issues/5998) by **[ThomasLandauer](https://github.com/ThomasLandauer)**


### Codeception 4.1.9: PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/10/23 18:03:56 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Support PHP 8 [#5999](https://github.com/Codeception/Codeception/issues/5999)
* Generate correct default values in Actions files [#5999](https://github.com/Codeception/Codeception/issues/5999)
* Use sendGet in Api template [#5998](https://github.com/Codeception/Codeception/issues/5998) by **[ThomasLandauer](https://github.com/ThomasLandauer)**


### module-cli 1.0.4: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/10/23 17:52:08 / [🦑 Repository](https://github.com/Codeception/module-cli)   / [📦 Releases](https://github.com/Codeception/module-cli/releases)



* Support PHP 8 (no code change)
* Deleted local copy of generated documentation


### module-asserts 1.3.1: PHP8 support

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/10/21 16:49:39 / [🦑 Repository](https://github.com/Codeception/module-asserts)   / [📦 Releases](https://github.com/Codeception/module-asserts/releases)



* Support PHP 8 (no code changes)
* Reverted docblock change to fix static analysis ([#9](https://github.com/Codeception/module-asserts/issues/9) by **[edwinkortman](https://github.com/edwinkortman)**)


### module-webdriver 1.1.2: Documentation improvements

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/10/11 18:55:38 / [🦑 Repository](https://github.com/Codeception/module-webdriver)   / [📦 Releases](https://github.com/Codeception/module-webdriver/releases)






### module-rest 1.2.4: Documentation improvements

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/10/11 18:39:31 / [🦑 Repository](https://github.com/Codeception/module-rest)   / [📦 Releases](https://github.com/Codeception/module-rest/releases)






### module-cli 1.0.3: Documentation improvements

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/10/11 18:35:08 / [🦑 Repository](https://github.com/Codeception/module-cli)   / [📦 Releases](https://github.com/Codeception/module-cli/releases)






### Codeception 4.1.8: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/10/11 18:07:26 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Support Covertura code coverage format [#5994](https://github.com/Codeception/Codeception/issues/5994) by **[zachkknowbe4](https://github.com/zachkknowbe4)**
* Compatibility with vlucas/phpdotenv v5 [#5975](https://github.com/Codeception/Codeception/issues/5975) by **[johanzandstra](https://github.com/johanzandstra)**
* Support absolute output dir path on Windows [#5966](https://github.com/Codeception/Codeception/issues/5966) by **[Naktibalda](https://github.com/Naktibalda)**
* Fix --no-redirect option for run command [#5967](https://github.com/Codeception/Codeception/issues/5967) by **[convenient](https://github.com/convenient)**
* Code coverage: Don't make request to c3.php if remote=false [#5991](https://github.com/Codeception/Codeception/issues/5991) by **[dereuromark](https://github.com/dereuromark)**
* Gherkin: Fail on ambiguous step definition [#5866](https://github.com/Codeception/Codeception/issues/5866) by **[matthiasnoback](https://github.com/matthiasnoback)**
* Removed complicated merge logic for environment configurations [#5948](https://github.com/Codeception/Codeception/issues/5948) by **[Sasti](https://github.com/Sasti)**
* Logger extension: add .log to suite log files [#5982](https://github.com/Codeception/Codeception/issues/5982) by **[varp](https://github.com/varp)**


### Codeception 4.1.8: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/10/11 18:07:26 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Support Covertura code coverage format [#5994](https://github.com/Codeception/Codeception/issues/5994) by **[zachkknowbe4](https://github.com/zachkknowbe4)**
* Compatibility with vlucas/phpdotenv v5 [#5975](https://github.com/Codeception/Codeception/issues/5975) by **[johanzandstra](https://github.com/johanzandstra)**
* Support absolute output dir path on Windows [#5966](https://github.com/Codeception/Codeception/issues/5966) by **[Naktibalda](https://github.com/Naktibalda)**
* Fix --no-redirect option for run command [#5967](https://github.com/Codeception/Codeception/issues/5967) by **[convenient](https://github.com/convenient)**
* Code coverage: Don't make request to c3.php if remote=false [#5991](https://github.com/Codeception/Codeception/issues/5991) by **[dereuromark](https://github.com/dereuromark)**
* Gherkin: Fail on ambiguous step definition [#5866](https://github.com/Codeception/Codeception/issues/5866) by **[matthiasnoback](https://github.com/matthiasnoback)**
* Removed complicated merge logic for environment configurations [#5948](https://github.com/Codeception/Codeception/issues/5948) by **[Sasti](https://github.com/Sasti)**
* Logger extension: add .log to suite log files [#5982](https://github.com/Codeception/Codeception/issues/5982) by **[varp](https://github.com/varp)**


### module-rest 1.2.3: amNTLMAuthenticated supports Guzzle 7

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/09/17 13:38:02 / [🦑 Repository](https://github.com/Codeception/module-rest)   / [📦 Releases](https://github.com/Codeception/module-rest/releases)






### module-asserts 1.3.0: Support for full PHPUnit public API

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/08/28 08:10:16 / [🦑 Repository](https://github.com/Codeception/module-asserts)   / [📦 Releases](https://github.com/Codeception/module-asserts/releases)



[#7](https://github.com/Codeception/module-asserts/issues/7)  by **[TavoNiievez](https://github.com/TavoNiievez)** 


### module-symfony 1.1.1: Fixed seeEmailIsSent 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/08/28 07:06:19 / [🦑 Repository](https://github.com/Codeception/module-symfony)   / [📦 Releases](https://github.com/Codeception/module-symfony/releases)



[#9](https://github.com/Codeception/module-symfony/issues/9) by **[ThomasLandauer](https://github.com/ThomasLandauer)** and **[TavoNiievez](https://github.com/TavoNiievez)** 


### module-webdriver 1.1.1: Multibyte characters are allowed in build artefact filenames

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/08/28 07:01:59 / [🦑 Repository](https://github.com/Codeception/module-webdriver)   / [📦 Releases](https://github.com/Codeception/module-webdriver/releases)



[#17](https://github.com/Codeception/module-webdriver/issues/17) by **[takaoyuri](https://github.com/takaoyuri)** 


### module-rest 1.2.2: JsonType improvements

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/08/28 06:58:51 / [🦑 Repository](https://github.com/Codeception/module-rest)   / [📦 Releases](https://github.com/Codeception/module-rest/releases)



* Support for negative values, >= and <= matchers in JsonType comparisons .
* Improved docs for Json Matchers


### module-yii2 1.1.1: 1.1.1

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/08/28 06:53:33 / [🦑 Repository](https://github.com/Codeception/module-yii2)   / [📦 Releases](https://github.com/Codeception/module-yii2/releases)



* Change default value of transaction parameter to true [#4](https://github.com/Codeception/module-yii2/issues/4) by **[SaloEater](https://github.com/SaloEater)** 
* Fix ModuleException parameters, handle undefined [#12](https://github.com/Codeception/module-yii2/issues/12) by **[smichae](https://github.com/smichae)** 
* Validation errors for haveRecord method [#10](https://github.com/Codeception/module-yii2/issues/10) by **[ianikanov](https://github.com/ianikanov)** 


### Codeception 4.1.7: Compatibility with PHPUnit 9.3

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/08/28 06:43:25 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Compatibility with PhpCodeCoverage 9 and PHPUnit 9.3
* Show snapshot diff on fail [#5930](https://github.com/Codeception/Codeception/issues/5930) by **[fkupper](https://github.com/fkupper)**
* Ability to store non-json snapshots [#5945](https://github.com/Codeception/Codeception/issues/5945) by **[fkupperr](https://github.com/fkupperr)**
* Fixed step decorators in generated configuration file [#5936](https://github.com/Codeception/Codeception/issues/5936) by **[rene-hermenau](https://github.com/rene-hermenau)**
* Fixed single line style dataprovider [#5944](https://github.com/Codeception/Codeception/issues/5944) by **[edno](https://github.com/edno)**


### Codeception 4.1.7: Compatibility with PHPUnit 9.3

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/08/28 06:43:25 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Compatibility with PhpCodeCoverage 9 and PHPUnit 9.3
* Show snapshot diff on fail [#5930](https://github.com/Codeception/Codeception/issues/5930) by **[fkupper](https://github.com/fkupper)**
* Ability to store non-json snapshots [#5945](https://github.com/Codeception/Codeception/issues/5945) by **[fkupperr](https://github.com/fkupperr)**
* Fixed step decorators in generated configuration file [#5936](https://github.com/Codeception/Codeception/issues/5936) by **[rene-hermenau](https://github.com/rene-hermenau)**
* Fixed single line style dataprovider [#5944](https://github.com/Codeception/Codeception/issues/5944) by **[edno](https://github.com/edno)**


### module-phalcon4 v1.0.4: v1.0.4

Released by [![](https://avatars.githubusercontent.com/u/7444246?v=4&s=16) ruudboon](https://github.com/ruudboon) on 2020/08/26 09:34:29 / [🦑 Repository](https://github.com/Codeception/module-phalcon4)   / [📦 Releases](https://github.com/Codeception/module-phalcon4/releases)



Fixed
- Session To Use Session Manager 


### module-rest 1.2.1: Documentation updates

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/07/05 15:46:13 / [🦑 Repository](https://github.com/Codeception/module-rest)   / [📦 Releases](https://github.com/Codeception/module-rest/releases)






### module-phpbrowser 1.0.1: Support Guzzle 7.x

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/07/05 15:35:51 / [🦑 Repository](https://github.com/Codeception/module-phpbrowser)   / [📦 Releases](https://github.com/Codeception/module-phpbrowser/releases)






### Codeception 4.1.6: Compatibility with PHPUnit 9.2

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/06/07 16:37:13 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)






### Codeception 4.1.6: Compatibility with PHPUnit 9.2

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/06/07 16:37:13 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)






### module-webdriver 1.1.0: switchToFrame

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/05/31 08:52:02 / [🦑 Repository](https://github.com/Codeception/module-webdriver)   / [📦 Releases](https://github.com/Codeception/module-webdriver/releases)



* Introduced switchToFrame method [#9](https://github.com/Codeception/module-webdriver/issues/9) 


### Codeception 4.1.5: 4.1.5

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/05/24 14:03:59 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Fixed docker images
* Fixed indentation in generated Actor class, by **[cebe](https://github.com/cebe)**
* Added addToAssertionCount method to AssertionCounter trait, [#5918](https://github.com/Codeception/Codeception/issues/5918) by **[Archanium](https://github.com/Archanium)**


### Codeception 4.1.5: 4.1.5

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/05/24 14:03:59 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Fixed docker images
* Fixed indentation in generated Actor class, by **[cebe](https://github.com/cebe)**
* Added addToAssertionCount method to AssertionCounter trait, [#5918](https://github.com/Codeception/Codeception/issues/5918) by **[Archanium](https://github.com/Archanium)**


### module-webdriver 1.0.8: Suppress UnknownErrorException in _closeSession

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/04/29 13:52:51 / [🦑 Repository](https://github.com/Codeception/module-webdriver)   / [📦 Releases](https://github.com/Codeception/module-webdriver/releases)



* Suppress UnknownErrorException in _closeSession [#15](https://github.com/Codeception/module-webdriver/issues/15) 


### module-asserts 1.2.1: Require lib-asserts 1.12+

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/04/20 07:28:56 / [🦑 Repository](https://github.com/Codeception/module-asserts)   / [📦 Releases](https://github.com/Codeception/module-asserts/releases)






### module-asserts 1.2.0: New assertions

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/04/18 10:03:04 / [🦑 Repository](https://github.com/Codeception/module-asserts)   / [📦 Releases](https://github.com/Codeception/module-asserts/releases)



Added new assertion methods:
* assertMatchesRegularExpression
* assertDoesNotMatchRegularExpression
* assertFileDoesNotExist

They were introduced in PHPUnit 9 to replace older method names, but Asserts module makes them work with older versions of PHPUnit too.


### module-symfony 1.1.0: runSymfonyConsoleCommand 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/04/05 14:11:53 / [🦑 Repository](https://github.com/Codeception/module-symfony)   / [📦 Releases](https://github.com/Codeception/module-symfony/releases)



* runSymfonyConsoleCommand works with arguments, options and also console input


### module-webdriver 1.0.7: [switchToIFrame] fixed Undefined variable: els error

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/04/01 10:19:18 / [🦑 Repository](https://github.com/Codeception/module-webdriver)   / [📦 Releases](https://github.com/Codeception/module-webdriver/releases)






### module-mongodb 1.1.0: Cleanup: dirty

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/04/01 09:22:36 / [🦑 Repository](https://github.com/Codeception/module-mongodb)   / [📦 Releases](https://github.com/Codeception/module-mongodb/releases)



* Added `cleanup: dirty` config option


### module-laravel5 1.1.0: Compatibility with Laravel 7

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/03/28 15:01:29 / [🦑 Repository](https://github.com/Codeception/module-laravel5)   / [📦 Releases](https://github.com/Codeception/module-laravel5/releases)



* Different ExceptionHandlerDecorator
* haveMultiple doesn't pass $name argument to factory(), because Laravel 7 does not support it anymore.


### Codeception 4.1.4: Another build return type bugfix

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/03/23 17:18:20 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Build: Fix bug with void type not being picked up correctly [#5880](https://github.com/Codeception/Codeception/issues/5880) by **[Jamesking56](https://github.com/Jamesking56)**
* Test --report flag (the bugfix in phpunit-wrapper library)


### Codeception 4.1.4: Another build return type bugfix

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/03/23 17:18:20 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Build: Fix bug with void type not being picked up correctly [#5880](https://github.com/Codeception/Codeception/issues/5880) by **[Jamesking56](https://github.com/Jamesking56)**
* Test --report flag (the bugfix in phpunit-wrapper library)


### module-webdriver 1.0.6: Fixed setCookie in w3c mode

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/03/23 17:15:52 / [🦑 Repository](https://github.com/Codeception/module-webdriver)   / [📦 Releases](https://github.com/Codeception/module-webdriver/releases)



Modern browsers reject cookies with singlepart domain names, the best option is not to set domain property unless explicitly specified.


### Codeception 4.1.3: Build command: return type hint improvements

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/03/17 16:56:14 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Build: Use non-deprecated method to get return type hint on PHP 7.1+ [#5876](https://github.com/Codeception/Codeception/issues/5876)
* Build: Ensure that the return keyword is not used when method returns void type [#5878](https://github.com/Codeception/Codeception/issues/5878) by **[Jamesking56](https://github.com/Jamesking56)**


### Codeception 4.1.3: Build command: return type hint improvements

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/03/17 16:56:14 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Build: Use non-deprecated method to get return type hint on PHP 7.1+ [#5876](https://github.com/Codeception/Codeception/issues/5876)
* Build: Ensure that the return keyword is not used when method returns void type [#5878](https://github.com/Codeception/Codeception/issues/5878) by **[Jamesking56](https://github.com/Jamesking56)**


### module-mezzio 2.0.1: 2.0.1

Released by [![](https://avatars.githubusercontent.com/u/152236?v=4&s=16) Slamdunk](https://github.com/Slamdunk) on 2020/03/17 11:14:58 / [🦑 Repository](https://github.com/Codeception/module-mezzio)   / [📦 Releases](https://github.com/Codeception/module-mezzio/releases)



[Full Changelog](https://github.com/Codeception/module-mezzio/compare/2.0.0...2.0.1)

**Fixed bugs:**

- Session persistance: clean up $_SESSION between tests [\[#3](https://github.com/Codeception/module-mezzio/issues/3)](https://github.com/Codeception/module-mezzio/pull/3)


### Codeception 4.1.2: Bugfixes

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/03/14 16:54:45 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Fixed --no-redirect option does not exist error [#5857](https://github.com/Codeception/Codeception/issues/5857) by **[liamjtoohey](https://github.com/liamjtoohey)**
* Init command: Check the composer option config.vendor_dir when updating composer [#5871](https://github.com/Codeception/Codeception/issues/5871) by **[gabriel-lima96](https://github.com/gabriel-lima96)**
* Add return type hint to the generated actions above PHP 7.0 [#5862](https://github.com/Codeception/Codeception/issues/5862) by **[pezia](https://github.com/pezia)**
* Prevent merged config array ballooning in memory [#5871](https://github.com/Codeception/Codeception/issues/5871) by **[AndrewFeeney](https://github.com/AndrewFeeney)**
* Do not truncate arguments for --html options [#5870](https://github.com/Codeception/Codeception/issues/5870) by **[adaniloff](https://github.com/adaniloff)**


### Codeception 4.1.2: Bugfixes

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/03/14 16:54:45 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Fixed --no-redirect option does not exist error [#5857](https://github.com/Codeception/Codeception/issues/5857) by **[liamjtoohey](https://github.com/liamjtoohey)**
* Init command: Check the composer option config.vendor_dir when updating composer [#5871](https://github.com/Codeception/Codeception/issues/5871) by **[gabriel-lima96](https://github.com/gabriel-lima96)**
* Add return type hint to the generated actions above PHP 7.0 [#5862](https://github.com/Codeception/Codeception/issues/5862) by **[pezia](https://github.com/pezia)**
* Prevent merged config array ballooning in memory [#5871](https://github.com/Codeception/Codeception/issues/5871) by **[AndrewFeeney](https://github.com/AndrewFeeney)**
* Do not truncate arguments for --html options [#5870](https://github.com/Codeception/Codeception/issues/5870) by **[adaniloff](https://github.com/adaniloff)**


### module-webdriver 1.0.5: Fixed compatibility with PHP 5.6

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/03/06 08:39:36 / [🦑 Repository](https://github.com/Codeception/module-webdriver)   / [📦 Releases](https://github.com/Codeception/module-webdriver/releases)






### module-mezzio 2.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/03/06 08:25:48 / [🦑 Repository](https://github.com/Codeception/module-mezzio)   / [📦 Releases](https://github.com/Codeception/module-mezzio/releases)






### module-webdriver 1.0.4: Fixed switchToIframe by name

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/03/04 16:54:45 / [🦑 Repository](https://github.com/Codeception/module-webdriver)   / [📦 Releases](https://github.com/Codeception/module-webdriver/releases)



* Fixed switchToIframe by name when php-webdriver 1.8 is used [#6](https://github.com/Codeception/module-webdriver/issues/6) by **[eXorus](https://github.com/eXorus)** 


### module-ftp 1.0.1: Fixed Filename cannot be empty error when SFTP key is not specified

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/02/29 14:55:56 / [🦑 Repository](https://github.com/Codeception/module-ftp)   / [📦 Releases](https://github.com/Codeception/module-ftp/releases)






### Codeception 4.1.1: Minor improvements

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/02/19 17:02:05 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* --no-artifacts flag for run command [#5646](https://github.com/Codeception/Codeception/issues/5646) by **[Mitrichius](https://github.com/Mitrichius)**
* Fix recorder filename with special chars [#5846](https://github.com/Codeception/Codeception/issues/5846) by **[gimler](https://github.com/gimler)**


### Codeception 4.1.1: Minor improvements

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/02/19 17:02:05 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* --no-artifacts flag for run command [#5646](https://github.com/Codeception/Codeception/issues/5646) by **[Mitrichius](https://github.com/Mitrichius)**
* Fix recorder filename with special chars [#5846](https://github.com/Codeception/Codeception/issues/5846) by **[gimler](https://github.com/gimler)**


### module-webdriver 1.0.3: Fixed cookie domain match

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/02/15 21:26:34 / [🦑 Repository](https://github.com/Codeception/module-webdriver)   / [📦 Releases](https://github.com/Codeception/module-webdriver/releases)



[#5](https://github.com/Codeception/module-webdriver/issues/5) by **[Josh-G](https://github.com/Josh-G)** 


### Codeception 4.1.0: Support PHPUnit 9.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/02/07 20:34:19 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)






### Codeception 4.1.0: Support PHPUnit 9.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/02/07 20:34:19 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)






### module-cli 1.0.2: Fixed dontSeeInShellOutput for older versions of PHPUnit

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/02/07 17:34:52 / [🦑 Repository](https://github.com/Codeception/module-cli)   / [📦 Releases](https://github.com/Codeception/module-cli/releases)






### module-cli 1.0.1: Compatibility with PHPUnit 9

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/02/07 17:11:44 / [🦑 Repository](https://github.com/Codeception/module-cli)   / [📦 Releases](https://github.com/Codeception/module-cli/releases)



Use assertStringNotContainsString instead of assertNotContains in dontSeeInShellOutput


### module-webdriver 1.0.2: Updated documentation of debug_log_entries

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/02/04 17:25:43 / [🦑 Repository](https://github.com/Codeception/module-webdriver)   / [📦 Releases](https://github.com/Codeception/module-webdriver/releases)



module-webdriver does not display Selenium logs on every error by default,
for debugging please change debug_log_entries in module configuration to positive value.


### module-rest 1.2.0: Response validation using JsonSchema

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/02/01 19:29:49 / [🦑 Repository](https://github.com/Codeception/module-rest)   / [📦 Releases](https://github.com/Codeception/module-rest/releases)






### module-yii2 1.1.0: Module implements Codeception's MultiSession

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/02/01 19:26:08 / [🦑 Repository](https://github.com/Codeception/module-yii2)   / [📦 Releases](https://github.com/Codeception/module-yii2/releases)



[#3](https://github.com/Codeception/module-yii2/issues/3) by **[mytskine](https://github.com/mytskine)** 


### module-zf2 1.0.3: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/01/29 15:19:36 / [🦑 Repository](https://github.com/Codeception/module-zf2)   / [📦 Releases](https://github.com/Codeception/module-zf2/releases)



* Use doctrine entitymanager from config
* Add persisted services before bootstrap


### module-queue 1.1.0: Implemented driver for Pheanstalk 4 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/01/28 13:23:15 / [🦑 Repository](https://github.com/Codeception/module-queue)   / [📦 Releases](https://github.com/Codeception/module-queue/releases)






### module-rest 1.1.0: Allow to add or remove server parameters

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/01/28 08:16:49 / [🦑 Repository](https://github.com/Codeception/module-rest)   / [📦 Releases](https://github.com/Codeception/module-rest/releases)



[#7](https://github.com/Codeception/module-rest/issues/7) by **[svycka](https://github.com/svycka)** 


### Codeception 4.0.3: Fixed command autocompletion

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/01/24 07:41:14 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Fixed command autocompletion [#5806](https://github.com/Codeception/Codeception/issues/5806) by **[svycka](https://github.com/svycka)**


### Codeception 4.0.3: Fixed command autocompletion

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/01/24 07:41:14 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Fixed command autocompletion [#5806](https://github.com/Codeception/Codeception/issues/5806) by **[svycka](https://github.com/svycka)**


### module-zf2 1.0.2: Empty request content can't be null

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/01/23 17:55:51 / [🦑 Repository](https://github.com/Codeception/module-zf2)   / [📦 Releases](https://github.com/Codeception/module-zf2/releases)



[#2](https://github.com/Codeception/module-zf2/issues/2) 


### module-zf2 1.0.1: Add Server parameters to ZendRequest

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/01/22 15:14:48 / [🦑 Repository](https://github.com/Codeception/module-zf2)   / [📦 Releases](https://github.com/Codeception/module-zf2/releases)






### module-apc 1.0.1: Removed requirement for ext-apc from composer.json

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/01/21 07:45:14 / [🦑 Repository](https://github.com/Codeception/module-apc)   / [📦 Releases](https://github.com/Codeception/module-apc/releases)






### module-webdriver 1.0.1: webdriver package moved to php-webdriver org

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/01/20 08:00:05 / [🦑 Repository](https://github.com/Codeception/module-webdriver)   / [📦 Releases](https://github.com/Codeception/module-webdriver/releases)






### module-rest 1.0.1: Updated flow/jsonpath library to 0.5

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/01/17 16:55:55 / [🦑 Repository](https://github.com/Codeception/module-rest)   / [📦 Releases](https://github.com/Codeception/module-rest/releases)






### Codeception 4.0.2: 4.0.2

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/01/14 14:54:31 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Fixed errors in bootstrap scripts [#5806](https://github.com/Codeception/Codeception/issues/5806)


### Codeception 4.0.2: 4.0.2

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/01/14 14:54:31 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Fixed errors in bootstrap scripts [#5806](https://github.com/Codeception/Codeception/issues/5806)


### module-phalcon4 1.0.3: v1.0.3

Released by [![](https://avatars.githubusercontent.com/u/7444246?v=4&s=16) ruudboon](https://github.com/ruudboon) on 2020/01/11 17:02:24 / [🦑 Repository](https://github.com/Codeception/module-phalcon4)   / [📦 Releases](https://github.com/Codeception/module-phalcon4/releases)



Fixed
- Dependencies


### module-phalcon4 1.0.2: v1.0.2

Released by [![](https://avatars.githubusercontent.com/u/7444246?v=4&s=16) ruudboon](https://github.com/ruudboon) on 2020/01/07 12:32:16 / [🦑 Repository](https://github.com/Codeception/module-phalcon4)   / [📦 Releases](https://github.com/Codeception/module-phalcon4/releases)



Fixed
- Replacing service in DI from functional test not working


### module-phalcon4 1.0.1: v1.0.1

Released by [![](https://avatars.githubusercontent.com/u/7444246?v=4&s=16) ruudboon](https://github.com/ruudboon) on 2020/01/06 11:26:42 / [🦑 Repository](https://github.com/Codeception/module-phalcon4)   / [📦 Releases](https://github.com/Codeception/module-phalcon4/releases)



Removed composer.lock
Updated dependencies
Updated SQL schema
Updated DocBlocks


### module-phalcon4 1.0.0: v1.0.0

Released by [![](https://avatars.githubusercontent.com/u/7444246?v=4&s=16) ruudboon](https://github.com/ruudboon) on 2020/01/06 09:32:56 / [🦑 Repository](https://github.com/Codeception/module-phalcon4)   / [📦 Releases](https://github.com/Codeception/module-phalcon4/releases)



Initial release of the Codeception module for Phalcon 4.


### Codeception 4.0.1: Bugfix release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/12/21 16:26:45 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Fixed error reporting error in upgrade4 script
* Symfony 5 compatibility: Improved detection of event-dispatcher version


### Codeception 4.0.1: Bugfix release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/12/21 16:26:45 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Fixed error reporting error in upgrade4 script
* Symfony 5 compatibility: Improved detection of event-dispatcher version


### Codeception 4.0.0: First release without modules

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/12/19 16:54:29 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)






### Codeception 4.0.0: First release without modules

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/12/19 16:54:29 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)






### module-db 1.0.1: Mysql: use single quotes for string value in getPrimaryKey

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/12/08 18:03:36 / [🦑 Repository](https://github.com/Codeception/module-db)   / [📦 Releases](https://github.com/Codeception/module-db/releases)



Fixes some compatibility issue with MariaDB https://github.com/Codeception/Codeception/issues/5778


### module-filesystem 1.0.2: Support symfony/finder 5

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/12/04 17:14:16 / [🦑 Repository](https://github.com/Codeception/module-filesystem)   / [📦 Releases](https://github.com/Codeception/module-filesystem/releases)






### module-doctrine2 1.0.1: Updated documentation

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/11/13 17:34:35 / [🦑 Repository](https://github.com/Codeception/module-doctrine2)   / [📦 Releases](https://github.com/Codeception/module-doctrine2/releases)






### module-asserts 1.1.1: Documented that stringEnds functions were added in 1.1.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/11/13 17:33:39 / [🦑 Repository](https://github.com/Codeception/module-asserts)   / [📦 Releases](https://github.com/Codeception/module-asserts/releases)






### module-asserts 1.1.0: Add assertStringEndsWith and assertStringEndsNotWith

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/11/12 16:47:30 / [🦑 Repository](https://github.com/Codeception/module-asserts)   / [📦 Releases](https://github.com/Codeception/module-asserts/releases)






### module-filesystem 1.0.1: Compatible with codeception/codeception releases and branches

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/11/09 20:33:00 / [🦑 Repository](https://github.com/Codeception/module-filesystem)   / [📦 Releases](https://github.com/Codeception/module-filesystem/releases)






### module-yii2 1.0.1: Use stable versions of codeception and innerbrowser

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/10/25 17:33:04 / [🦑 Repository](https://github.com/Codeception/module-yii2)   / [📦 Releases](https://github.com/Codeception/module-yii2/releases)






### module-webdriver 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/10/19 15:29:58 / [🦑 Repository](https://github.com/Codeception/module-webdriver)   / [📦 Releases](https://github.com/Codeception/module-webdriver/releases)






### module-yii2 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/10/19 15:29:42 / [🦑 Repository](https://github.com/Codeception/module-yii2)   / [📦 Releases](https://github.com/Codeception/module-yii2/releases)






### module-symfony 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/10/19 15:29:13 / [🦑 Repository](https://github.com/Codeception/module-symfony)   / [📦 Releases](https://github.com/Codeception/module-symfony/releases)






### module-rest 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/10/19 15:29:01 / [🦑 Repository](https://github.com/Codeception/module-rest)   / [📦 Releases](https://github.com/Codeception/module-rest/releases)






### module-phpbrowser 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/10/19 15:28:32 / [🦑 Repository](https://github.com/Codeception/module-phpbrowser)   / [📦 Releases](https://github.com/Codeception/module-phpbrowser/releases)






### module-lumen 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/10/19 15:27:37 / [🦑 Repository](https://github.com/Codeception/module-lumen)   / [📦 Releases](https://github.com/Codeception/module-lumen/releases)






### module-laravel5 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/10/19 15:27:22 / [🦑 Repository](https://github.com/Codeception/module-laravel5)   / [📦 Releases](https://github.com/Codeception/module-laravel5/releases)






### module-doctrine2 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/10/19 15:27:12 / [🦑 Repository](https://github.com/Codeception/module-doctrine2)   / [📦 Releases](https://github.com/Codeception/module-doctrine2/releases)






### module-db 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/10/19 15:27:01 / [🦑 Repository](https://github.com/Codeception/module-db)   / [📦 Releases](https://github.com/Codeception/module-db/releases)






### module-phalcon 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/10/19 15:02:04 / [🦑 Repository](https://github.com/Codeception/module-phalcon)   / [📦 Releases](https://github.com/Codeception/module-phalcon/releases)



* Extracted module-phalcon from codeception/codeception 3.1.2
* Use columnMap by retrieving record id if needed


### module-zf2 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/10/18 11:24:38 / [🦑 Repository](https://github.com/Codeception/module-zf2)   / [📦 Releases](https://github.com/Codeception/module-zf2/releases)






### module-sequence 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/10/18 11:24:11 / [🦑 Repository](https://github.com/Codeception/module-sequence)   / [📦 Releases](https://github.com/Codeception/module-sequence/releases)






### module-soap 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/10/18 11:23:56 / [🦑 Repository](https://github.com/Codeception/module-soap)   / [📦 Releases](https://github.com/Codeception/module-soap/releases)






### module-redis 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/10/18 11:23:43 / [🦑 Repository](https://github.com/Codeception/module-redis)   / [📦 Releases](https://github.com/Codeception/module-redis/releases)






### module-queue 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/10/18 11:23:32 / [🦑 Repository](https://github.com/Codeception/module-queue)   / [📦 Releases](https://github.com/Codeception/module-queue/releases)






### module-mongodb 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/10/18 11:21:41 / [🦑 Repository](https://github.com/Codeception/module-mongodb)   / [📦 Releases](https://github.com/Codeception/module-mongodb/releases)






### module-memcache 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/10/18 11:21:22 / [🦑 Repository](https://github.com/Codeception/module-memcache)   / [📦 Releases](https://github.com/Codeception/module-memcache/releases)






### module-filesystem 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/10/18 11:21:11 / [🦑 Repository](https://github.com/Codeception/module-filesystem)   / [📦 Releases](https://github.com/Codeception/module-filesystem/releases)






### module-ftp 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/10/18 11:20:59 / [🦑 Repository](https://github.com/Codeception/module-ftp)   / [📦 Releases](https://github.com/Codeception/module-ftp/releases)






### module-datafactory 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/10/18 11:07:51 / [🦑 Repository](https://github.com/Codeception/module-datafactory)   / [📦 Releases](https://github.com/Codeception/module-datafactory/releases)






### module-cli 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/10/18 11:07:08 / [🦑 Repository](https://github.com/Codeception/module-cli)   / [📦 Releases](https://github.com/Codeception/module-cli/releases)






### module-asserts 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/10/18 11:06:52 / [🦑 Repository](https://github.com/Codeception/module-asserts)   / [📦 Releases](https://github.com/Codeception/module-asserts/releases)






### module-apc 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/10/18 11:06:05 / [🦑 Repository](https://github.com/Codeception/module-apc)   / [📦 Releases](https://github.com/Codeception/module-apc/releases)






### module-amqp 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/10/18 11:05:50 / [🦑 Repository](https://github.com/Codeception/module-amqp)   / [📦 Releases](https://github.com/Codeception/module-amqp/releases)





