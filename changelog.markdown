---
layout: page
title: Codeception Changelog
---

<div class="alert alert-warning">Download specific version at <a href="/builds">builds page</a></div>

# Changelog



### module-rest 1.4.1: AsJson Step Decorator

Released by [![](https://avatars.githubusercontent.com/u/220264?v=4&s=16) DavertMik](https://github.com/DavertMik) on 2021/11/17 12:52:07 / [🦑 Repository](https://github.com/Codeception/module-rest)   / [📦 Releases](https://github.com/Codeception/module-rest/releases)



Step descorator `AsJson` was introduced to simplify sending and parsing JSON requests and responses.
Add it to suite configuration:

```yaml
actor: ApiTester
step_decorators:
    - \Codeception\Step\AsJson
```
or if you use API template:
```yaml
suites:
    api:
        actor: ApiTester
        step_decorators:
            - \Codeception\Step\AsJson
```
Rebuild actions:

```
./vendor/bin/codecept build
```

And you get new actions:

* `sendPostAsJson`
* `sendGetAsJson`

... basically all `send*` methods will receive `AsJson` pair which sends request in JSON and returns parsed response:

```php
<?php
$user = $I->sendPostAsJson('user', ['id' => 1]);
codecept_debug($user['id'])
$I->assertEquals(1, $user['id'])
```


### module-rest 1.4.0: return response on send* actions

Released by [![](https://avatars.githubusercontent.com/u/220264?v=4&s=16) DavertMik](https://github.com/DavertMik) on 2021/11/17 10:52:08 / [🦑 Repository](https://github.com/Codeception/module-rest)   / [📦 Releases](https://github.com/Codeception/module-rest/releases)



send* actions were updated to return a response:

```php
$response = $I->sendGet('/users');
$response = $I->sendPost('/users', ['name' => 'jon']);
$response = $I->sendPut('/users/1', ['name' => 'jon']);
$response = $I->sendPatch('/users/1', ['name' => 'jon']);
$response = $I->sendDelete('/users/1');
$response = $I->send('PATCH','/users/1', ['name' => 'jon']);
```


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


### module-amqp 1.1.1: seeMessageInQueueContainsText acks message

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/09/05 07:47:08 / [🦑 Repository](https://github.com/Codeception/module-amqp)   / [📦 Releases](https://github.com/Codeception/module-amqp/releases)



* Stops keeping message in unacked stated, by **[renq](https://github.com/renq)** 


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


### module-rest 1.3.1: DELETE  method sends request body

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/04/23 09:02:05 / [🦑 Repository](https://github.com/Codeception/module-rest)   / [📦 Releases](https://github.com/Codeception/module-rest/releases)



Revert change implemented in 1.3.0


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


### module-phalcon 1.1.0: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2021/01/16 12:03:45 / [🦑 Repository](https://github.com/Codeception/module-phalcon)   / [📦 Releases](https://github.com/Codeception/module-phalcon/releases)



* Added ability to use parameters defined in the service container [#3](https://github.com/Codeception/module-phalcon/issues/3)
* Fix: `$cookie->setSecure()` always as boolean [#6](https://github.com/Codeception/module-phalcon/issues/6)


### module-datafactory 1.0.1: PHP8 support

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/12/30 15:56:46 / [🦑 Repository](https://github.com/Codeception/module-datafactory)   / [📦 Releases](https://github.com/Codeception/module-datafactory/releases)






### Codeception 4.1.14: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/12/28 19:22:25 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Improved compatibility logic for Symfony EventDispatcher


### Codeception 4.1.14: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/12/28 19:22:25 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Improved compatibility logic for Symfony EventDispatcher


### Codeception 4.1.13: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/12/20 13:45:38 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Gherkin: Fixed loading methods from namespaced helper classes [#6057](https://github.com/Codeception/Codeception/issues/6057)


### Codeception 4.1.13: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/12/20 13:45:38 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Gherkin: Fixed loading methods from namespaced helper classes [#6057](https://github.com/Codeception/Codeception/issues/6057)


### module-mongodb 1.1.1: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/11/26 07:20:07 / [🦑 Repository](https://github.com/Codeception/module-mongodb)   / [📦 Releases](https://github.com/Codeception/module-mongodb/releases)






### module-redis 1.0.1: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/11/25 06:44:01 / [🦑 Repository](https://github.com/Codeception/module-redis)   / [📦 Releases](https://github.com/Codeception/module-redis/releases)






### Codeception 4.1.12: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/11/16 06:44:03 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Dependency Injection: Fix PHP types being treated as classes [#6031](https://github.com/Codeception/Codeception/issues/6031) by **[cs278](https://github.com/cs278)**


### Codeception 4.1.12: 

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/11/16 06:44:03 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Dependency Injection: Fix PHP types being treated as classes [#6031](https://github.com/Codeception/Codeception/issues/6031) by **[cs278](https://github.com/cs278)**


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






### module-memcache 1.0.1: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/10/28 13:30:19 / [🦑 Repository](https://github.com/Codeception/module-memcache)   / [📦 Releases](https://github.com/Codeception/module-memcache/releases)






### module-ftp 1.0.2: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/10/27 06:39:25 / [🦑 Repository](https://github.com/Codeception/module-ftp)   / [📦 Releases](https://github.com/Codeception/module-ftp/releases)






### module-apc 1.0.2: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/10/26 06:16:30 / [🦑 Repository](https://github.com/Codeception/module-apc)   / [📦 Releases](https://github.com/Codeception/module-apc/releases)






### module-rest 1.2.5: Support PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/10/24 15:22:52 / [🦑 Repository](https://github.com/Codeception/module-rest)   / [📦 Releases](https://github.com/Codeception/module-rest/releases)






### module-filesystem 1.0.3: PHP 8

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/10/24 14:50:10 / [🦑 Repository](https://github.com/Codeception/module-filesystem)   / [📦 Releases](https://github.com/Codeception/module-filesystem/releases)



* PHP 8 support
* Delete local copy of autogenerated documentation
* Use wrapper methods to avoid PHPUnit 9 deprecation messages and keep it working with PHPUnit 10


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


### module-rest 1.2.4: Documentation improvements

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/10/11 18:39:31 / [🦑 Repository](https://github.com/Codeception/module-rest)   / [📦 Releases](https://github.com/Codeception/module-rest/releases)






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






### module-rest 1.2.2: JsonType improvements

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/08/28 06:58:51 / [🦑 Repository](https://github.com/Codeception/module-rest)   / [📦 Releases](https://github.com/Codeception/module-rest/releases)



* Support for negative values, >= and <= matchers in JsonType comparisons .
* Improved docs for Json Matchers


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


### module-rest 1.2.1: Documentation updates

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/07/05 15:46:13 / [🦑 Repository](https://github.com/Codeception/module-rest)   / [📦 Releases](https://github.com/Codeception/module-rest/releases)






### Codeception 4.1.6: Compatibility with PHPUnit 9.2

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/06/07 16:37:13 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)






### Codeception 4.1.6: Compatibility with PHPUnit 9.2

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/06/07 16:37:13 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)






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


### module-mongodb 1.1.0: Cleanup: dirty

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/04/01 09:22:36 / [🦑 Repository](https://github.com/Codeception/module-mongodb)   / [📦 Releases](https://github.com/Codeception/module-mongodb/releases)



* Added `cleanup: dirty` config option


### Codeception 4.1.4: Another build return type bugfix

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/03/23 17:18:20 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Build: Fix bug with void type not being picked up correctly [#5880](https://github.com/Codeception/Codeception/issues/5880) by **[Jamesking56](https://github.com/Jamesking56)**
* Test --report flag (the bugfix in phpunit-wrapper library)


### Codeception 4.1.4: Another build return type bugfix

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/03/23 17:18:20 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Build: Fix bug with void type not being picked up correctly [#5880](https://github.com/Codeception/Codeception/issues/5880) by **[Jamesking56](https://github.com/Jamesking56)**
* Test --report flag (the bugfix in phpunit-wrapper library)


### Codeception 4.1.3: Build command: return type hint improvements

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/03/17 16:56:14 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Build: Use non-deprecated method to get return type hint on PHP 7.1+ [#5876](https://github.com/Codeception/Codeception/issues/5876)
* Build: Ensure that the return keyword is not used when method returns void type [#5878](https://github.com/Codeception/Codeception/issues/5878) by **[Jamesking56](https://github.com/Jamesking56)**


### Codeception 4.1.3: Build command: return type hint improvements

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/03/17 16:56:14 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Build: Use non-deprecated method to get return type hint on PHP 7.1+ [#5876](https://github.com/Codeception/Codeception/issues/5876)
* Build: Ensure that the return keyword is not used when method returns void type [#5878](https://github.com/Codeception/Codeception/issues/5878) by **[Jamesking56](https://github.com/Jamesking56)**


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


### Codeception 4.1.0: Support PHPUnit 9.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/02/07 20:34:19 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)






### Codeception 4.1.0: Support PHPUnit 9.0

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/02/07 20:34:19 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)






### module-rest 1.2.0: Response validation using JsonSchema

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/02/01 19:29:49 / [🦑 Repository](https://github.com/Codeception/module-rest)   / [📦 Releases](https://github.com/Codeception/module-rest/releases)






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






### module-rest 1.0.1: Updated flow/jsonpath library to 0.5

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/01/17 16:55:55 / [🦑 Repository](https://github.com/Codeception/module-rest)   / [📦 Releases](https://github.com/Codeception/module-rest/releases)






### Codeception 4.0.2: 4.0.2

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/01/14 14:54:31 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Fixed errors in bootstrap scripts [#5806](https://github.com/Codeception/Codeception/issues/5806)


### Codeception 4.0.2: 4.0.2

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2020/01/14 14:54:31 / [🦑 Repository](https://github.com/Codeception/Codeception)   / [📦 Releases](https://github.com/Codeception/Codeception/releases)



* Fixed errors in bootstrap scripts [#5806](https://github.com/Codeception/Codeception/issues/5806)


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






### module-filesystem 1.0.2: Support symfony/finder 5

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/12/04 17:14:16 / [🦑 Repository](https://github.com/Codeception/module-filesystem)   / [📦 Releases](https://github.com/Codeception/module-filesystem/releases)






### module-filesystem 1.0.1: Compatible with codeception/codeception releases and branches

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/11/09 20:33:00 / [🦑 Repository](https://github.com/Codeception/module-filesystem)   / [📦 Releases](https://github.com/Codeception/module-filesystem/releases)






### module-rest 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/10/19 15:29:01 / [🦑 Repository](https://github.com/Codeception/module-rest)   / [📦 Releases](https://github.com/Codeception/module-rest/releases)






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






### module-apc 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/10/18 11:06:05 / [🦑 Repository](https://github.com/Codeception/module-apc)   / [📦 Releases](https://github.com/Codeception/module-apc/releases)






### module-amqp 1.0.0: Initial release

Released by [![](https://avatars.githubusercontent.com/u/395992?v=4&s=16) Naktibalda](https://github.com/Naktibalda) on 2019/10/18 11:05:50 / [🦑 Repository](https://github.com/Codeception/module-amqp)   / [📦 Releases](https://github.com/Codeception/module-amqp/releases)





