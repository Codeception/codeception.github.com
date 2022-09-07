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


* `param \Symfony\Component\Console\Input\InputInterface` $input
* `param \Symfony\Component\Console\Output\OutputInterface` $output

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L60)

#### addModulesToComposer()

 *protected* addModulesToComposer(array $modules)


* `param array` $modules
* `return ?int`

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L237)

#### addStyles()

 *public* addStyles($output)


* `param \Symfony\Component\Console\Output\OutputInterface` $output
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L12)

#### ask()

 *protected* ask($question, $answer = null)


* `param string` $question
* `param array|string|bool|null` $answer
* `return mixed|string`

{% highlight php %}

<?php
// propose firefox as default browser
$this->ask('select the browser of your choice', 'firefox');

// propose firefox or chrome possible options
$this->ask('select the browser of your choice', ['firefox', 'chrome']);

// ask true/false question
$this->ask('do you want to proceed (y/n)', true);

{% endhighlight %}

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L100)

#### breakParts()

 *protected* breakParts($class)


* `param string` $class
* `return string[]`

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L19)

#### checkInstalled()

 *protected* checkInstalled($dir = '.')


* `param string` $dir
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L198)

#### completeSuffix()

 *protected* completeSuffix($filename, $suffix)


* `param string` $filename
* `param string` $suffix
* `return string`

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L37)

#### createActor()

 *protected* createActor($name, $directory, array $suiteConfig)


* `param array<string,` $ mixed> $suiteConfig
* `param string` $name
* `param string` $directory
* `param array` $suiteConfig
* `return void`

Create an Actor class and generate actions for it.

Requires a suite config as array in 3rd parameter.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L210)

#### createDirectoryFor()

 *protected* createDirectoryFor($basePath, $className = '')


* `param string` $basePath
* `param string` $className
* `return string`

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L22)

#### createEmptyDirectory()

 *protected* createEmptyDirectory($dir)


* `param string` $dir
* `return void`

Create an empty directory and add a placeholder file into it

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L187)

#### createFile()

 *protected* createFile($filename, $contents, $force = false, $flags = 0)


* `param string` $filename
* `param string` $contents
* `param bool` $force
* `param int` $flags
* `return bool`

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L58)

#### createHelper()

 *protected* createHelper($name, $directory, array $settings = array ( ))


* `param string` $name
* `param string` $directory
* `param array` $settings
* `return void`

Create a helper class inside a directory

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L166)

#### getNamespaceHeader()

 *protected* getNamespaceHeader($class)


* `param string` $class
* `return string`

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L38)

#### getNamespaceString()

 *protected* getNamespaceString($class)


* `param string` $class
* `return string`

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L32)

#### getNamespaces()

 *protected* getNamespaces($class)


* `param string` $class
* `return array`

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L47)

#### getShortClassName()

 *protected* getShortClassName($class)


* `param string` $class
* `return string`

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L26)

#### gitIgnore()

 *protected* gitIgnore($path)


* `param string` $path
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L193)

#### initDir()

 *public* initDir($workDir)


* `param string` $workDir
* `return void`

Change the directory where Codeception should be installed.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L69)

#### removeSuffix()

 *protected* removeSuffix($classname, $suffix)


* `param string` $classname
* `param string` $suffix
* `return string`

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L52)

#### say()

 *protected* say($message = '')


* `param string` $message
* `return void`

Print a message to console.

{% highlight php %}

<?php
$this->say('Welcome to Setup');

{% endhighlight %}

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L126)

#### sayError()

 *protected* sayError($message)


* `param string` $message
* `return void`

Print error message

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L142)

#### sayInfo()

 *protected* sayInfo($message)


* `param string` $message
* `return void`

Print info message

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L158)

#### saySuccess()

 *protected* saySuccess($message)


* `param string` $message
* `return void`

Print a successful message

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L134)

#### sayWarning()

 *protected* sayWarning($message)


* `param string` $message
* `return void`

Print warning message

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L150)

#### setup()

 *abstract public* setup()


* `return mixed`

Override this class to create customized setup.

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L83)

#### updateComposerClassMap()

 *private* updateComposerClassMap($vendorDir = 'vendor')


* `param string` $vendorDir
* `return void`

[See source](https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php#L309)

<p>&nbsp;</p><div class="alert alert-warning">Reference is taken from the source code. <a href="https://github.com/Codeception/Codeception/blob/5.0/src/Codeception/InitTemplate.php">Help us to improve documentation. Edit module reference</a></div>
