---
layout: doc
title: Cli - Codeception - Documentation
---



<div class="btn-group" role="group" style="float: right" aria-label="..."><a class="btn btn-default" href="https://github.com/Codeception/module-Cli/releases">Changelog</a><a class="btn btn-default" href="https://github.com/Codeception/module-cli/tree/master/src/Codeception/Module/Cli.php"><strong>source</strong></a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/3.1/docs/modules/Cli.md">3.1</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/2.5/docs/modules/Cli.md">2.5</a><a class="btn btn-default" href="https://github.com/Codeception/Codeception/blob/1.8/docs/modules/Cli.md">1.8</a></div>

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
 
Checks that output from latest command doesn't contain text

 * `param` $text



#### runShellCommand
 
Executes a shell command.
Fails If exit code is > 0. You can disable this by setting second parameter to false

{% highlight php %}

<?php
$I->runShellCommand('phpunit');

// do not fail test when command fails
$I->runShellCommand('phpunit', false);

{% endhighlight %}

 * `param` $command
 * `param bool` $failNonZero


#### seeInShellOutput
 
Checks that output from last executed command contains text

 * `param` $text


#### seeResultCodeIs
 
Checks result code

{% highlight php %}

<?php
$I->seeResultCodeIs(0);

{% endhighlight %}

 * `param` $code


#### seeResultCodeIsNot
 
Checks result code

{% highlight php %}

<?php
$I->seeResultCodeIsNot(0);

{% endhighlight %}

 * `param` $code


#### seeShellOutputMatches
 
 * `param` $regex

<p>&nbsp;</p><div class="alert alert-warning">Module reference is taken from the source code. <a href="https://github.com/Codeception/module-cli/tree/master/src/Codeception/Module/Cli.php">Help us to improve documentation. Edit module reference</a></div>
