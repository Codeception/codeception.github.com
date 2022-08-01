---
layout: doc
title: InitTemplate - Codeception - Documentation
---


## Codeception\InitTemplate


* *Uses* `Codeception\Command\Shared\FileSystemTrait`, `Codeception\Command\Shared\StyleTrait`

Codeception templates allow creating a customized setup and configuration for your project.
An abstract class for installation template. Each init template should extend it and implement a `setup` method.
Use it to build a custom setup class which can be started with `codecept init` command.


{% highlight php %}

<?php
namespace Codeception\Template; // it is important to use this namespace so codecept init could locate this template
class CustomInstall extends \Codeception\InitTemplate
{
     public function setup()
     {
        // implement this
     }
}

{% endhighlight %}
This class provides various helper methods for building customized setup


#### __construct()

 *public* __construct($input, $output) 

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L60)

#### addModulesToComposer()

 *protected* addModulesToComposer(array $modules) 

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L237)

#### addStyles()

 *public* addStyles($output) 

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L12)

#### ask()

 *protected* ask($question, $answer = null) 

{% highlight php %}

<?php
// propose firefox as default browser
$this->ask('select the browser of your choice', 'firefox');

// propose firefox or chrome possible options
$this->ask('select the browser of your choice', ['firefox', 'chrome']);

// ask true/false question
$this->ask('do you want to proceed (y/n)', true);

{% endhighlight %}
 * `return` mixed|string

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L100)

#### breakParts()

 *protected* breakParts($class) 
 * `return` string[]

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L19)

#### checkInstalled()

 *protected* checkInstalled($dir = '.') 

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L198)

#### completeSuffix()

 *protected* completeSuffix($filename, $suffix) 

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L37)

#### createActor()

 *protected* createActor($name, $directory, array $suiteConfig) 

Create an Actor class and generate actions for it.
Requires a suite config as array in 3rd parameter.
 * `param array<string, mixed>` $suiteConfig

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L210)

#### createDirectoryFor()

 *protected* createDirectoryFor($basePath, $className = '') 

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L22)

#### createEmptyDirectory()

 *protected* createEmptyDirectory($dir) 

Create an empty directory and add a placeholder file into it

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L187)

#### createFile()

 *protected* createFile($filename, $contents, $force = false, $flags = 0) 

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L58)

#### createHelper()

 *protected* createHelper($name, $directory, array $settings = array ( )) 

Create a helper class inside a directory

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L166)

#### getNamespaceHeader()

 *protected* getNamespaceHeader($class) 

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L38)

#### getNamespaceString()

 *protected* getNamespaceString($class) 

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L32)

#### getNamespaces()

 *protected* getNamespaces($class) 

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L47)

#### getShortClassName()

 *protected* getShortClassName($class) 

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L26)

#### gitIgnore()

 *protected* gitIgnore($path) 

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L193)

#### initDir()

 *public* initDir($workDir) 

Change the directory where Codeception should be installed.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L69)

#### removeSuffix()

 *protected* removeSuffix($classname, $suffix) 

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L52)

#### say()

 *protected* say($message = '') 

Print a message to console.

{% highlight php %}

<?php
$this->say('Welcome to Setup');

{% endhighlight %}

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L126)

#### sayError()

 *protected* sayError($message) 

Print error message

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L142)

#### sayInfo()

 *protected* sayInfo($message) 

Print info message

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L158)

#### saySuccess()

 *protected* saySuccess($message) 

Print a successful message

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L134)

#### sayWarning()

 *protected* sayWarning($message) 

Print warning message

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L150)

#### setup()

 *abstract public* setup() 

Override this class to create customized setup.
 * `return` mixed

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L83)

#### updateComposerClassMap()

 *private* updateComposerClassMap($vendorDir = 'vendor') 

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L309)

<p>&nbsp;</p><div class="alert alert-warning">Reference is taken from the source code. <a href="https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php">Help us to improve documentation. Edit module reference</a></div>
