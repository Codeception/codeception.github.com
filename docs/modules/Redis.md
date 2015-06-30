---
layout: doc
title: Redis Module - Codeception - Documentation
---



<div class="btn-group" role="group" style="float: right" aria-label="..."><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/2.1/src/Codeception/Module/Redis.php">source</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/master/docs/modules/Redis.md">master</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/2.1/docs/modules/Redis.md"><strong>2.1</strong></a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/2.0/docs/modules/Redis.md">2.0</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/1.8/docs/modules/Redis.md">1.8</a></div>

# Redis Module

**For additional reference, please review the [source](https://github.com/Codeception/Codeception/tree/2.1/src/Codeception/Module/Redis.php)**


Works with Redis database.

Cleans up Redis database after each run.

### Status

* Maintainer: **judgedim**
* Stability: **beta**
* Contact: https://github.com/judgedim

### Configuration

* host *required* - redis host to connect
* port *required* - redis port.
* database *required* - redis database.
* cleanup: true - defined data will be purged before running every test.

### Public Properties
* driver - contains Connection Driver

#### Beta Version

Report an issue if this module doesn't work for you.

@author judgedim


#### cleanupRedis
 
Cleans up Redis database.

<p>&nbsp;</p><div class="alert alert-warning">Module reference is taken from the source code. <a href="https://github.com/Codeception/Codeception/tree/2.1/src/Codeception/Module/Redis.php">Help us to improve documentation. Edit module reference</a></div>
