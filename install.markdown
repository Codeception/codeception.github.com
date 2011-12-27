# Installation

Easiest way to start using Codeception is by installing it by PEAR.

### PEAR
Install latest PEAR package:

```
$ pear channel-discover codeception.com/pear
```
```
$ pear install codeception/Codeception
```

### Phar

Download [codecept.phar](https://github.com/Codeception/Codeception/raw/master/package/codecept.phar)

Copy it into your project.
Run CLI utility:

```
$ php codecept.phar
```

## Getting Started

If you sucessfully installed Codeception, run this commands:

```
$ codecept install
```

this will install all dependency tools like PHPUnit and Mink

```
$ codecept bootstrap
```

this will create default directory structure and default test suites

```
$ codecept build
```

This will generate Guy-classes, in order to make autocomplete works.