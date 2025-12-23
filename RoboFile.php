<?php

use Codeception\Util\DocumentationHelpers;
use Symfony\Component\Finder\Finder;

require __DIR__ . '/vendor/autoload.php';

class RoboFile extends \Robo\Tasks
{
    use DocumentationHelpers;

    const REPO_BLOB_URL = 'https://github.com/Codeception/Codeception/blob';
    const BRANCH_5x = '5.3';
    const BRANCH_MAIN = 'main';

    function post()
    {
        $title = $this->ask("Post title");
        $file  = strtolower(str_replace([
            ' ',
            ':'
        ], [
            '-',
            '-'
        ], $title));
        $date  = date('Y-m-d');
        $this->taskWriteToFile("_posts/$date-$file.markdown")
            ->line('---')
            ->line('layout: post')
            ->line("title: \"$title\"")
            ->line("date: $date 01:03:50")
            ->line("---\n")
            ->run();
    }

    function publish()
    {
        $this->taskGitStack()
            ->add('-A')
            ->commit('updated')
            ->pull()
            ->push()
            ->run();
    }
    

    /**
     * @desc generates modules reference from source files
     */
    public function buildDocs()
    {
        $this->say('generating documentation from source files');
        $this->taskComposerUpdate()->preferSource()->run();
        $this->buildDocsModules();
        $this->buildDocsUtils();
        $this->buildDocsCommands();
        $this->buildDocsStub();
        $this->buildDocsApi();
        $this->buildDocsExtensions();
        $this->changelog();
    }

    public function buildDocsModules()
    {
        $this->taskCleanDir('docs/modules')->run();
        $this->say("Modules");
        $modules = Finder::create()->files()->name('*.php')->in(__DIR__ . '/vendor/codeception/module-*/src/Codeception/Module')->depth('== 0');
        foreach ($modules as $module) {
            $moduleName     = basename(substr($module, 0, -4));
            $className      = 'Codeception\Module\\' . $moduleName;
            $classPath      = 'Codeception/Module/' . $moduleName;
            $repositoryName = basename(substr($module, 0, -1 * (strlen($classPath) + 9)));
            //echo $classPath, " ", $repositoryName, "\n"; continue;
            //TODO: take /src/$classPath.php directly from module
            $source            = "https://github.com/Codeception/$repositoryName/tree/master/src/$classPath.php";
            $documentationFile = 'docs/modules/' . $moduleName . '.md';
            $sourceMessage     = '<p>&nbsp;</p><div class="alert alert-warning">Module reference is taken from the source code. <a href="' . $source . '">Help us to improve documentation. Edit module reference</a></div>';
            $this->generateDocumentationForClass($className, $documentationFile, $sourceMessage);
            $this->postProcessModuleDocFile($documentationFile, $moduleName, $source);
        }
        //Page of old module displays content of new module
        $this->taskFilesystemStack()->symlink('Mezzio.md', 'docs/modules/ZendExpressive.md')->run();
        $this->taskFilesystemStack()->symlink('Laravel.md', 'docs/modules/Laravel5.md')->run();
        $this->taskFilesystemStack()->symlink('Laminas.md', 'docs/modules/ZF2.md')->run();

        // Don't update old Phalcon modules
        $this->taskGitStack()
            ->stopOnFail()
            ->checkout('-- docs/modules/Phalcon.md docs/modules/Phalcon4.md')
            ->run();
    }

    private function postProcessModuleDocFile($documentationFile, $name, $source)
    {
        $contents = file_get_contents($documentationFile);
        $contents = str_replace('## ', '### ', $contents);
        $buttons  = [
            'source' => $source,
        ];
        $buttonHtml = "\n\n" . '<div class="btn-group" role="group" style="float: right" aria-label="...">';
        $releasesUrl = "https://github.com/Codeception/module-$name/releases";
        $buttonHtml .= '<a class="btn btn-default" href="'.$releasesUrl.'">Releases</a>';
        foreach ($buttons as $link => $url) {
            if ($link == 'source') {
                $link = "<strong>$link</strong>";
            }
            $buttonHtml .= '<a class="btn btn-default" href="' . $url . '">' . $link . '</a>';
        }
        $buttonHtml .= '</div>' . "\n\n";

        $contents = $this->postProcessStandardElements($name, $buttonHtml . $contents);
        file_put_contents($documentationFile, $contents);
    }

    public function buildDocsUtils()
    {
        $this->say("Util Classes");
        $utils = [
            'Autoload'   => null,
            'Fixtures'   => null,
            'Locator'    => 'lib-web',
            'XmlBuilder' => 'lib-xml',
            'JsonType'   => 'module-rest',
            'HttpCode'   => 'lib-innerbrowser',
        ];

        foreach ($utils as $utilName => $repositoryName) {
            $className         = '\Codeception\Util\\' . $utilName;
            try {
                $documentationFile = 'docs/reference/' . $utilName . '.md';
                $this->documentApiClass($documentationFile, $className, false, $repositoryName);
                $this->postProcessFile($utilName, $documentationFile);
            } catch (\Exception $err) {

            }
        }
    }

    public function buildDocsCommands()
    {
        $this->say("Commands");

        $path     = __DIR__ . '/vendor/codeception/codeception/src/Codeception/Command';
        $commands = Finder::create()->files()->name('*.php')->depth(0)->in($path);

        $documentationFile = 'docs/reference/Commands.md';
        $commandGenerator  = $this->taskGenDoc($documentationFile);
        foreach ($commands as $command) {
            $commandName = basename(substr($command, 0, -4));
            $className   = '\Codeception\Command\\' . $commandName;
            $commandGenerator->docClass($className);
        }
        $commandGenerator
            ->prepend("# Console Commands\n")
            ->processClassSignature(function ($r, $text) {
                return "## " . $r->getShortName();
            })
            ->filterMethods(function (ReflectionMethod $r) {
                return false;
            })
            ->run();

        $this->postProcessFile('Commands', $documentationFile);
    }

    public function buildDocsStub()
    {
        $this->say("Stub Classes");

        $stubFile = 'docs/reference/Stub.md';
        $this->taskGenDoc($stubFile)
            ->docClass('Codeception\Stub')
            ->filterMethods(function (\ReflectionMethod $method) {
                if ($method->isConstructor() or $method->isDestructor()) {
                    return false;
                }
                if (!$method->isPublic()) {
                    return false;
                }
                if (strpos($method->name, '_') === 0) {
                    return false;
                }
                return true;
            })
            ->processMethodDocBlock(
                function (\ReflectionMethod $m, $doc) {
                    $doc = str_replace(array('@since'), array(' * available since version'), $doc);
                    $doc = str_replace(array(
                        ' @',
                        "\n@"
                    ), array(
                        "  * ",
                        "\n * "
                    ), $doc);
                    return $doc;
                }
            )
            ->processProperty(false)
            ->run();

        $mocksDocumentation = <<<EOF
# Mocks

Declare mocks inside `Codeception\Test\Unit` class.
If you want to use mocks outside it, check the reference for [Codeception/Stub](https://github.com/Codeception/Stub) library.      
EOF;

        $mockFile = 'docs/reference/Mock.md';
        $this->taskGenDoc($mockFile)
            ->docClass('Codeception\Test\Feature\Stub')
            ->docClass('Codeception\Stub\Expected')
            ->processClassDocBlock(false)
            ->processClassSignature(false)
            ->prepend($mocksDocumentation)
            ->filterMethods(function (\ReflectionMethod $method) {
                if ($method->isConstructor() or $method->isDestructor()) {
                    return false;
                }
                if (!$method->isPublic()) {
                    return false;
                }
                if (strpos($method->name, '_') === 0) {
                    return false;
                }
                if (strpos($method->name, 'stub') === 0) {
                    return false;
                }
                return true;
            })
            ->run();

        $this->postProcessFile('Stub', $stubFile);
        $this->postProcessFile('Mock', $mockFile);
    }

    public function buildDocsApi()
    {
        $this->say("API Classes");
        $apiClasses = ['\Codeception\Module', '\Codeception\InitTemplate'];

        foreach ($apiClasses as $apiClass) {
            $name              = (new ReflectionClass($apiClass))->getShortName();
            $documentationFile = 'docs/reference/' . $name . '.md';
            $this->documentApiClass($documentationFile, $apiClass, true);
            $this->postProcessFile($name, $documentationFile);
        }
    }

    public function buildDocsExtensions()
    {
        $this->say('Extensions');

        $path       = __DIR__ . '/vendor/codeception/codeception/ext';
        $extensions = Finder::create()->files()->sortByName()->name('*.php')->in($path);

        $extGenerator = $this->taskGenDoc('_includes/extensions.md');
        foreach ($extensions as $extension) {
            $extensionName = basename(substr($extension, 0, -4));
            $className     = '\Codeception\Extension\\' . $extensionName;
            $extGenerator->docClass($className);
        }
        $extGenerator
            ->prepend("# Official Extensions\n")
            ->processClassSignature(function (ReflectionClass $r, $text) {
                $name = $r->getShortName();
                return "## $name\n\n[See Source](" . self::REPO_BLOB_URL . "/" . self::BRANCH_MAIN . "/ext/$name.php)";
            })
            ->filterMethods(function (ReflectionMethod $r) {
                return false;
            })
            ->filterProperties(function ($r) {
                return false;
            })
            ->run();
    }

    protected function documentApiClass($file, $className, $all = false, $repositoryName = null)
    {
        if ($repositoryName === null) {
            $repositoryUrl = self::REPO_BLOB_URL . "/" . self::BRANCH_5x;
        } else {
            $repositoryUrl = 'https://github.com/Codeception/' . $repositoryName . '/blob/master';
        }
        $uri    = str_replace('\\', '/', $className);
        $source = $repositoryUrl . "/src$uri.php";

        $this->taskGenDoc($file)
            ->docClass($className)
            ->filterMethods(function (ReflectionMethod $r) use ($all, $className) {
                return $all || $r->isPublic();
            })
            ->append(
                '<p>&nbsp;</p><div class="alert alert-warning">Reference is taken from the source code. '
                . '<a href="' . $source . '">Help us to improve documentation. Edit module reference</a></div>'
            )
            ->processPropertySignature(function ($r) {
                return "\n#### $" . $r->name . "\n\n";
            })
            ->processPropertyDocBlock(function ($r, $text) {
                $modifiers = implode(' ', \Reflection::getModifierNames($r->getModifiers()));
                $text      = ' *' . $modifiers . '* **$' . $r->name . "**\n" . $text;
                $text      = preg_replace("~@(.*?)\s(.*)~", 'type `$2`', $text);
                return $text;
            })
            ->processClassDocBlock(
                function (ReflectionClass $r, $text) {
                    return $text . "\n";
                }
            )
            ->processMethodSignature(function ($r, $text) {
                return "#### {$r->name}()\n\n" . ltrim($text, '#');
            })
            ->processMethodDocBlock(
                function (ReflectionMethod $r, $text) use ($file, $source) {
                    //$file = str_replace(__DIR__, '', $r->getFileName());
                    //$source = self::REPO_BLOB_URL."/".self::STABLE_BRANCH. $file;

                    $line = $r->getStartLine();
                    $text = preg_replace("~^\s?@(.*?)\s~m", ' * `$1` $2', $text);
                    $text .= "\n[See source]($source#L$line)";
                    return "\n" . $text . "\n";
                }
            )
            ->reorderMethods('ksort')
            ->run();
    }

    public function changelog() {
        $this->say('building changelog');
        $this->taskWriteToFile('changelog.markdown')
            ->line('---')
            ->line('layout: page')
            ->line('title: Codeception Changelog')
            ->line('---')
            ->line('')
            ->line(
                '<div class="alert alert-warning">Download specific version at <a href="/builds">builds page</a></div>'
            )
            ->line('')
            ->line('# Changelog')
            ->line('')
            ->line($this->processChangelog())
            ->run();                    
    }    

    protected function oldProcessChangelog()
    {
        $sortByVersionDesc = function (\SplFileInfo $a, \SplFileInfo $b) {
            $pattern = '/^CHANGELOG-(\d+\.(?:x|\d+)).md$/';
            if (preg_match($pattern, $a->getBasename(), $matches1) && preg_match($pattern, $b->getBasename(), $matches2)) {
                return version_compare($matches1[1], $matches2[1]) * -1;
            }
            return 0;
        };
        $changelogFiles = Finder::create()->name('CHANGELOG-*.md')->in('vendor/codeception/codeception')->depth(0)->sort($sortByVersionDesc);
        $changelog = "\n";
        foreach ($changelogFiles as $file) {
            $changelog .= trim($file->getContents(), "\r\n") . "\n\n";
        }
        //user
        $changelog = preg_replace('~\s@([\w-]+)~', ' **[$1](https://github.com/$1)**', $changelog);
        //issue
        $changelog = preg_replace(
            '~#(\d+)~',
            '[#$1](https://github.com/Codeception/Codeception/issues/$1)',
            $changelog
        );
        //module
        $changelog = preg_replace('~\s\[(\w+)\]\s~', ' **[$1]** ', $changelog);
        return $changelog;
    }    

    /**
     * @param $name
     * @param $contents
     * @return mixed|string|string[]|null
     */
    private function postProcessStandardElements($name, $contents)
    {
        $highlight_languages = implode('|', [
            'php',
            'html',
            'bash',
            'yaml',
            'json',
            'xml',
            'sql',
            'gherkin'
        ]);
        $contents            = preg_replace(
            "~```\s?($highlight_languages)\b(.*?)```~ms",
            "{% highlight $1 %}\n$2\n{% endhighlight %}",
            $contents
        );
        $contents            = str_replace('{% highlight  %}', '{% highlight yaml %}', $contents);
        $contents            = preg_replace("~```\s?(.*?)```~ms", "{% highlight yaml %}\n$1\n{% endhighlight %}", $contents);
        // set default language in order not to leave unparsed code inside '```'

        $title    = $name;
        $contents = "---\nlayout: doc\ntitle: " . ($title != "" ? $title . " - " : "")
            . "Codeception - Documentation\n---\n\n" . $contents;
        return $contents;
    }

    /**
     * @param $pageName
     * @param $documentationFile
     */
    private function postProcessFile($pageName, $documentationFile)
    {
        $contents = $this->postProcessStandardElements($pageName, file_get_contents($documentationFile));
        file_put_contents($documentationFile, $contents);
    }

    public function buildPhar82()
    {
        $ignoredPlatformReqs = array(
            'ext-apcu',
            'ext-mongodb',
            'ext-phalcon',
        );

        $version    = self::BRANCH_5x . '.' . date('Ymd');
        $releaseDir = "releases/$version";
        $this->stopOnFail();
        $this->taskFilesystemStack()->mkdir('build/82')->run();
        $this->setCodeceptionVersionTo('^' . self::BRANCH_5x, $ignoredPlatformReqs);
        $this->setPlatformVersionTo('8.2.0', $ignoredPlatformReqs);
        $buildFile = 'build/82/codecept.phar';
        $this->buildPhar($buildFile);
        $this->updateVersionFile($buildFile, 'php82/codecept.version');
        $versionedFile = "$releaseDir/codecept.phar";
        $this->taskFilesystemStack()
            ->stopOnFail()
            ->mkdir($releaseDir)
            ->copy($buildFile, $versionedFile)
            ->remove('php82/codecept.phar')
            ->symlink("../$versionedFile", 'php82/codecept.phar')
            ->run();
    }

    public function release82()
    {
        $version    = self::BRANCH_5x . '.' . date('Ymd');
        $releaseDir = "releases/$version";
        $this->updateBuildsPage();

        $this->taskGitStack()
            ->stopOnFail()
            ->checkout('-- package/composer.json')
            ->add('builds.markdown')
            ->add('php82/codecept.phar')
            ->add('php82/codecept.version')
            ->add($releaseDir)
            ->run();
    }

    private function setPlatformVersionTo($version, $ignoredPlatformReqs = array())
    {
        $this->taskComposerConfig()->workingDir('package')->set('platform.php', $version)->run();
        $composerUpdate = $this->taskComposerUpdate();
        foreach ($ignoredPlatformReqs as $ignoredPlatformReq) {
            $composerUpdate->option('--ignore-platform-req', $ignoredPlatformReq);
        }
        $composerUpdate->preferDist()->optimizeAutoloader()->workingDir('package')->run();
    }

    private function setCodeceptionVersionTo($version, $ignoredPlatformReqs = array())
    {
        $composerRequire = $this->taskComposerRequire()
            ->dependency('codeception/codeception', $version);
        foreach ($ignoredPlatformReqs as $ignoredPlatformReq) {
            $composerRequire->option('--ignore-platform-req', $ignoredPlatformReq);
        }
        $composerRequire->workingDir('package')
            ->run();
    }

    /**
     * @desc creates codecept.phar
     * @throws Exception
     */
    public function buildPhar($targetFile)
    {
        $this->packPhar($targetFile);
        $dir = dirname($targetFile);
        //the file must be named codecept.phar to be executable
        $this->taskFilesystemStack()->copy($targetFile, $dir . '/codecept.phar')->run();
        $code = $this->taskExec('php codecept.phar')->dir($dir)->run()->getExitCode();
        if ($code !== 0) {
            throw new Exception("There was problem compiling phar");
        }
    }

    private function packPhar($pharFileName)
    {
        $pharTask = $this->taskPackPhar($pharFileName)
            ->compress()
            ->stub('package/stub.php');

        $finder = Finder::create()->files()
            ->ignoreVCS(true)
            ->name('*.php')
            ->name('*.php8')
            ->name('*.css')
            ->name('*.png')
            ->name('*.js')
            ->name('*.css')
            ->name('*.eot')
            ->name('*.svg')
            ->name('*.ttf')
            ->name('*.wof')
            ->name('*.woff')
            ->name('*.woff2')
            ->name('*.png')
            ->name('*.tpl')
            ->name('*.tpl.dist')
            ->name('*.html.dist')
            ->exclude('Tests')
            ->exclude('tests')
            ->exclude('benchmark')
            ->exclude('demo')
            ->in('package/vendor');

        foreach ($finder as $file) {
            $relativePathname = $file->getRelativePathname();
            if (strpos($relativePathname, 'codeception/') === 0) {
                //don't remove whitespace from Codeception files
                $pharTask->addFile('vendor/' . $relativePathname, $file->getRealPath());
            } else {
                $pharTask->addStripped('vendor/' . $relativePathname, $file->getRealPath());
            }
        }

        $pharTask->run();
    }

    public function processChangelog()
    {
        $client = new \Github\Client();
        $token = getenv('GH_PAT');
        if ($token) {
            $client->authenticate(getenv('GH_PAT'), null, \Github\Client::AUTH_ACCESS_TOKEN);
        }
        $allReleases = [];

        $repositories = $client->repos()->org('Codeception', ['per_page' => 100]);
        foreach ($repositories as $repository) {
            $repositoryName = $repository['name'];
            if ($repositoryName !== 'Codeception' && !str_starts_with($repositoryName, 'module-') && !str_starts_with($repositoryName, 'lib-')) {
                continue;
            }
            $this->say($repositoryName);

            if ($repository['disabled'] || $repository['archived']) {
                continue;
            }
            try {
                $releases = $client->repo()->releases()->all('codeception', $repositoryName);
                foreach ($releases as $k=> $release) {
                    $releases[$k]['repo'] = $repositoryName;
                }
                $allReleases = array_merge($allReleases, $releases);
            } catch (\Exception $err) {
//                $this->say("Repository not available " . $repository['name']);
//                $this->say($err->getMessage());
            }
        }

        usort($allReleases, function($r1, $r2) {
          return -(strtotime($r1['published_at']) <=> strtotime($r2['published_at']));
        });

        $changelog = "";

        foreach ($allReleases as $release) {
            $repo = $release['repo'] ?? 'Codeception';
            $changelog .= sprintf("\n\n### %s %s: %s\n\n", $repo, $release['tag_name'], $release['name']);

            $changelog .= sprintf('Released by [![](%s){:height="16" width="16"} %s](%s) on %s',
                $release['author']['avatar_url'] . '&s=16',
                $release['author']['login'],
                $release['author']['html_url'],
                date_format(date_create($release['published_at']),"Y/m/d H:i:s")
            );

            $changelog .= " / [Repository](https://github.com/Codeception/$repo)  ";
            $changelog .= " / [Releases](https://github.com/Codeception/$repo/releases)\n\n";

            $body = $release['body'];
            //user

            $body = preg_replace('~\s@([\w-]+)~', ' **[$1](https://github.com/$1)**', $body);
            //issue
            $body = preg_replace(
                '~#(\d+)~',
                "[#$1](https://github.com/Codeception/$repo/issues/$1)",
                $body
            );
            $changelog .= "\n\n$body\n";
        }

        return $changelog;
    }

    public function updateBuildsPage()
    {
        $sortByVersion = function (\SplFileInfo $a, \SplFileInfo $b) {
            return version_compare($a->getBaseName(), $b->getBaseName());
        };

        $releases = array_reverse(
            iterator_to_array(Finder::create()->depth(0)->directories()->sort($sortByVersion)->in('releases'))
        );
        $branch = null;
        $releaseFile = $this->taskWriteToFile('builds.markdown')
            ->line('---')
            ->line('layout: page')
            ->line('title: Codeception Builds')
            ->line('---')
            ->line('');

        foreach ($releases as $release) {
            $releaseName = $release->getBasename();
            $downloadUrl = "https://codeception.com/releases/$releaseName/codecept.phar";

            list($major, $minor) = explode('.', $releaseName);
            if ("$major.$minor" != $branch) {
                $branch = "$major.$minor";
                $releaseFile->line("\n## $branch");
                if ($major < 2) {
                    $releaseFile->line("*Requires: PHP 5.3 and higher + CURL*\n");
                } elseif ($major == 2 && $minor < 4) {
                    $releaseFile->line("*Requires: PHP 5.4 and higher + CURL*\n");
                } elseif ($major < 5) {
                    $releaseFile->line("*Requires: PHP 5.6 and higher + CURL*\n");
                } elseif ($minor < 3) {
                    $releaseFile->line("*Requires: PHP 8.0 and higher + CURL*\n");
                } else {
                    $releaseFile->line("*Requires: PHP 8.2 and higher + CURL*\n");
                }
                $releaseFile->line("* **[Download Latest $branch Release]($downloadUrl)**");
            }

            if (file_exists("releases/$releaseName/php54/codecept.phar")) {
                $downloadUrl2 = "https://codeception.com/releases/$releaseName/php54/codecept.phar";
                if (version_compare($releaseName, '2.4.0', '>=')) {
                    $versionLine = "* [$releaseName for PHP 7]($downloadUrl)";
                    $versionLine .= ", [for PHP 5.6]($downloadUrl2)";
                } elseif (version_compare($releaseName, '2.3.0', '>=')) {
                    $versionLine = "* [$releaseName for PHP 7]($downloadUrl)";
                    $versionLine .= ", [for PHP 5.4 - 5.6]($downloadUrl2)";
                } else {
                    $versionLine = "* [$releaseName for PHP 5.6+]($downloadUrl)";
                    $versionLine .= ", [for PHP 5.4 or 5.5]($downloadUrl2)";
                }
            } elseif (file_exists("releases/$releaseName/php56/codecept.phar")) {
                $versionLine = "* [$releaseName for PHP 7.2+]($downloadUrl)";
                $downloadUrl2 = "https://codeception.com/releases/$releaseName/php56/codecept.phar";
                $versionLine .= ", [for PHP 5.6 - 7.1]($downloadUrl2)";
            } else {
                $versionLine = "* [$releaseName]($downloadUrl)";
            }

            $releaseFile->line($versionLine);
        }
        $releaseFile->run();
    }

    /**
     * @param $pharFile
     * @param $versionFile
     */
    private function updateVersionFile($pharFile, $versionFile)
    {
        $hash = sha1_file($pharFile);
        if ($hash === false) {
            throw new Exception('Failed to write hash to file: ' . $versionFile);
        }
        $this->taskWriteToFile($versionFile)->text($hash)->run();
    }


}
