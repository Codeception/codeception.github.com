---
layout: doc
title: Cli - Codeception - Documentation
---



<div class="btn-group" role="group" style="float: right" aria-label="..."><a class="btn btn-default" href="https://github.com/Codeception/module-Cli/releases">Releases</a><a class="btn btn-default" href="https://github.com/Codeception/module-cli/tree/master/src/Codeception/Module/Cli.php"><strong>source</strong></a></div>

# Cli
### Installation

If you use Codeception installed using composer, install this module with the following command:

{% highlight yaml %}
composer require --dev codeception/module-cli

{% endhighlight %}

Alternatively, you can enable `Cli` module in suite configuration file and run
 
{% highlight yaml %}
codecept init upgrade4

{% endhighlight %}

This module was bundled with Codeception 2 and 3, but since version 4 it is necessary to install it separately.   
Some modules are bundled with PHAR files.  
Warning. Using PHAR file and composer in the same project can cause unexpected errors.  

### Description



Wrapper for basic shell commands and shell output

### Responsibility
* Maintainer: **davert**
* Status: **stable**
* Contact: codecept@davert.mail.ua

*Please review the code of non-stable modules and provide patches if you have issues.*

### Actions

#### dontSeeInShellOutput

* `param string` $text
* `return void`

Checks that output from latest command doesn't contain text


#### grabShellOutput

* `return string`

Returns the output from latest command


#### runShellCommand

* `param string` $command
* `param bool` $failNonZero
* `return void`

Executes a shell command.

Fails if exit code is > 0. You can disable this by passing `false` as second argument

{% highlight php %}

<?php
$I->runShellCommand('phpunit');

// do not fail test when command fails
$I->runShellCommand('phpunit', false);

{% endhighlight %}


#### seeInShellOutput

* `param string` $text
* `return void`

Checks that output from last executed command contains text


#### seeResultCodeIs

* `param int` $code
* `return void`

Checks result code. To verify a result code > 0, you need to pass `false` as second argument to `runShellCommand()`

{% highlight php %}

<?php
$I->seeResultCodeIs(0);

{% endhighlight %}


#### seeResultCodeIsNot

* `param int` $code
* `return void`

Checks result code

{% highlight php %}

<?php
$I->seeResultCodeIsNot(0);

{% endhighlight %}


#### seeShellOutputMatches

* `param string` $regex
* `return void`

<p>&nbsp;</p><div class="alert alert-warning">Module reference is taken from the source code. <a href="https://github.com/Codeception/module-cli/tree/master/src/Codeception/Module/Cli.php">Help us to improve documentation. Edit module reference</a></div>
