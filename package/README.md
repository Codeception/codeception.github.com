This directory contains files necessary for building Phar file

Modules excluded from phar file:
* datafactory
* doctrine2
* laravel5
* lumen
* phalcon
* symfony
* yii2
* zendexpressive
* zf2

Additional dependency compared with codeception/codecepion:
* hoa/console

### Build instructions
1. Download robo.phar file wget https://robo.li/robo.phar
2. Disable phar.readonly in your php.ini file, it must be `phar.readonly = Off`
3. Run `php robo.phar build:php72`
4. Run `php robo.phar build:php56` 
5. Run `php robo.phar release`
6. Commit added files and push