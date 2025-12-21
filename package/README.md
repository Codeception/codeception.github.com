This directory contains files necessary for building Phar file

Modules excluded from phar file:
* datafactory
* doctrine
* laravel
* lumen
* phalcon
* symfony
* yii2
* zendexpressive / mezzio
* zf2 / laminas

Additional dependency compared with codeception/codecepion:
* hoa/console

### Build instructions
1. Install dependencies by running `composer install` in parent directory.
2. Disable phar.readonly in your php.ini file, it must be `phar.readonly = Off`
3. Build Codeception 5.3 phar file
    1. Run `./vendor/bin/robo build:phar82`
    2. Run `./vendor/bin/robo release82`
4. Commit added files and push