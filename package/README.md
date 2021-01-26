This directory contains files necessary for building Phar file

Modules excluded from phar file:
* datafactory
* doctrine2
* laravel5
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
3. Run `./vendor/bin/robo build:phar72`
4. Run `./vendor/bin/robo build:phar56`
5. Run `./vendor/bin/robo release`
6. Commit added files and push
