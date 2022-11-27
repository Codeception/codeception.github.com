---
layout: doc
title: Db - Codeception - Documentation
---



<div class="btn-group" role="group" style="float: right" aria-label="..."><a class="btn btn-default" href="https://github.com/Codeception/module-Db/releases">Releases</a><a class="btn btn-default" href="https://github.com/Codeception/module-db/tree/master/src/Codeception/Module/Db.php"><strong>source</strong></a></div>

# Db
### Installation

If you use Codeception installed using composer, install this module with the following command:

{% highlight yaml %}
composer require --dev codeception/module-db

{% endhighlight %}

Alternatively, you can enable `Db` module in suite configuration file and run
 
{% highlight yaml %}
codecept init upgrade4

{% endhighlight %}

This module was bundled with Codeception 2 and 3, but since version 4 it is necessary to install it separately.   
Some modules are bundled with PHAR files.  
Warning. Using PHAR file and composer in the same project can cause unexpected errors.  

### Description



Access a database.

The most important function of this module is to clean a database before each test.
This module also provides actions to perform checks in a database, e.g. [seeInDatabase()](https://codeception.com/docs/modules/Db#seeInDatabase)

In order to have your database populated with data you need a raw SQL dump.
Simply put the dump in the `tests/_data` directory (by default) and specify the path in the config.
The next time after the database is cleared, all your data will be restored from the dump.
Don't forget to include `CREATE TABLE` statements in the dump.

Supported and tested databases are:

* MySQL
* SQLite (i.e. just one file)
* PostgreSQL

Also available:

* MS SQL
* Oracle

Connection is done by database Drivers, which are stored in the `Codeception\Lib\Driver` namespace.
[Check out the drivers](https://github.com/Codeception/Codeception/tree/2.4/src/Codeception/Lib/Driver)
if you run into problems loading dumps and cleaning databases.

### Config

* dsn *required* - PDO DSN
* user *required* - username to access database
* password *required* - password
* dump - path to database dump
* populate: false - whether the the dump should be loaded before the test suite is started
* cleanup: false - whether the dump should be reloaded before each test
* reconnect: false - whether the module should reconnect to the database before each test
* waitlock: 0 - wait lock (in seconds) that the database session should use for DDL statements
* ssl_key - path to the SSL key (MySQL specific, @see https://php.net/manual/de/ref.pdo-mysql.php#pdo.constants.mysql-attr-key)
* ssl_cert - path to the SSL certificate (MySQL specific, @see https://php.net/manual/de/ref.pdo-mysql.php#pdo.constants.mysql-attr-ssl-cert)
* ssl_ca - path to the SSL certificate authority (MySQL specific, @see https://php.net/manual/de/ref.pdo-mysql.php#pdo.constants.mysql-attr-ssl-ca)
* ssl_verify_server_cert - disables certificate CN verification (MySQL specific, @see https://php.net/manual/de/ref.pdo-mysql.php)
* ssl_cipher - list of one or more permissible ciphers to use for SSL encryption (MySQL specific, @see https://php.net/manual/de/ref.pdo-mysql.php#pdo.constants.mysql-attr-cipher)
* databases - include more database configs and switch between them in tests.
* initial_queries - list of queries to be executed right after connection to the database has been initiated, i.e. creating the database if it does not exist or preparing the database collation
* skip_cleanup_if_failed - Do not perform the cleanup if the tests failed. If this is used, manual cleanup might be required when re-running
### Example

    modules:
       enabled:
          - Db:
             dsn: 'mysql:host=localhost;dbname=testdb'
             user: 'root'
             password: ''
             dump: 'tests/_data/dump.sql'
             populate: true
             cleanup: true
             reconnect: true
             waitlock: 10
             skip_cleanup_if_failed: true
             ssl_key: '/path/to/client-key.pem'
             ssl_cert: '/path/to/client-cert.pem'
             ssl_ca: '/path/to/ca-cert.pem'
             ssl_verify_server_cert: false
             ssl_cipher: 'AES256-SHA'
             initial_queries:
                 - 'CREATE DATABASE IF NOT EXISTS temp_db;'
                 - 'USE temp_db;'
                 - 'SET NAMES utf8;'

### Example with multi-dumps
    modules:
         enabled:
            - Db:
               dsn: 'mysql:host=localhost;dbname=testdb'
               user: 'root'
               password: ''
               dump:
                  - 'tests/_data/dump.sql'
                  - 'tests/_data/dump-2.sql'

### Example with multi-databases

    modules:
       enabled:
          - Db:
             dsn: 'mysql:host=localhost;dbname=testdb'
             user: 'root'
             password: ''
             databases:
                db2:
                   dsn: 'mysql:host=localhost;dbname=testdb2'
                   user: 'userdb2'
                   password: ''

### Example with Sqlite

    modules:
       enabled:
          - Db:
             dsn: 'sqlite:relative/path/to/sqlite-database.db'
             user: ''
             password: ''

### SQL data dump

There are two ways of loading the dump into your database:

#### Populator

The recommended approach is to configure a `populator`, an external command to load a dump. Command parameters like host, username, password, database
can be obtained from the config and inserted into placeholders:

For MySQL:

{% highlight yaml %}

modules:
   enabled:
      - Db:
         dsn: 'mysql:host=localhost;dbname=testdb'
         user: 'root'
         password: ''
         dump: 'tests/_data/dump.sql'
         populate: true # run populator before all tests
         cleanup: true # run populator before each test
         populator: 'mysql -u $user -h $host $dbname < $dump'

{% endhighlight %}

For PostgreSQL (using pg_restore)

{% highlight yaml %}
modules:
   enabled:
      - Db:
         dsn: 'pgsql:host=localhost;dbname=testdb'
         user: 'root'
         password: ''
         dump: 'tests/_data/db_backup.dump'
         populate: true # run populator before all tests
         cleanup: true # run populator before each test
         populator: 'pg_restore -u $user -h $host -D $dbname < $dump'

{% endhighlight %}

 Variable names are being taken from config and DSN which has a `keyword=value` format, so you should expect to have a variable named as the
 keyword with the full value inside it.

 PDO dsn elements for the supported drivers:
 * MySQL: [PDO_MYSQL DSN](https://secure.php.net/manual/en/ref.pdo-mysql.connection.php)
 * SQLite: [PDO_SQLITE DSN](https://secure.php.net/manual/en/ref.pdo-sqlite.connection.php) - use _relative_ path from the project root
 * PostgreSQL: [PDO_PGSQL DSN](https://secure.php.net/manual/en/ref.pdo-pgsql.connection.php)
 * MSSQL: [PDO_SQLSRV DSN](https://secure.php.net/manual/en/ref.pdo-sqlsrv.connection.php)
 * Oracle: [PDO_OCI DSN](https://secure.php.net/manual/en/ref.pdo-oci.connection.php)

#### Dump

Db module by itself can load SQL dump without external tools by using current database connection.
This approach is system-independent, however, it is slower than using a populator and may have parsing issues (see below).

Provide a path to SQL file in `dump` config option:

{% highlight yaml %}

modules:
   enabled:
      - Db:
         dsn: 'mysql:host=localhost;dbname=testdb'
         user: 'root'
         password: ''
         populate: true # load dump before all tests
         cleanup: true # load dump for each test
         dump: 'tests/_data/dump.sql'

{% endhighlight %}

 To parse SQL Db file, it should follow this specification:
 * Comments are permitted.
 * The `dump.sql` may contain multiline statements.
 * The delimiter, a semi-colon in this case, must be on the same line as the last statement:

{% highlight sql %}

-- Add a few contacts to the table.
REPLACE INTO `Contacts` (`created`, `modified`, `status`, `contact`, `first`, `last`) VALUES
(NOW(), NOW(), 1, 'Bob Ross', 'Bob', 'Ross'),
(NOW(), NOW(), 1, 'Fred Flintstone', 'Fred', 'Flintstone');

-- Remove existing orders for testing.
DELETE FROM `Order`;

{% endhighlight %}
### Query generation

`seeInDatabase`, `dontSeeInDatabase`, `seeNumRecords`, `grabFromDatabase` and `grabNumRecords` methods
accept arrays as criteria. WHERE condition is generated using item key as a field name and
item value as a field value.

Example:
{% highlight php %}

<?php
$I->seeInDatabase('users', ['name' => 'Davert', 'email' => 'davert@mail.com']);


{% endhighlight %}
Will generate:

{% highlight sql %}

SELECT COUNT(*) FROM `users` WHERE `name` = 'Davert' AND `email` = 'davert@mail.com'

{% endhighlight %}
Since version 2.1.9 it's possible to use LIKE in a condition, as shown here:

{% highlight php %}

<?php
$I->seeInDatabase('users', ['name' => 'Davert', 'email like' => 'davert%']);


{% endhighlight %}
Will generate:

{% highlight sql %}

SELECT COUNT(*) FROM `users` WHERE `name` = 'Davert' AND `email` LIKE 'davert%'

{% endhighlight %}
Null comparisons are also available, as shown here:

{% highlight php %}

<?php
$I->seeInDatabase('users', ['name' => null, 'email !=' => null]);


{% endhighlight %}
Will generate:

{% highlight sql %}

SELECT COUNT(*) FROM `users` WHERE `name` IS NULL AND `email` IS NOT NULL

{% endhighlight %}
### Public Properties
* dbh - contains the PDO connection
* driver - contains the Connection Driver


### Actions

#### amConnectedToDatabase

* `param string` $databaseKey
* `throws ModuleConfigException`
* `return void`

Make sure you are connected to the right database.

{% highlight php %}

<?php
$I->seeNumRecords(2, 'users');   //executed on default database
$I->amConnectedToDatabase('db_books');
$I->seeNumRecords(30, 'books');  //executed on db_books database
//All the next queries will be on db_books

{% endhighlight %}


#### dontSeeInDatabase

* `param string` $table
* `param array` $criteria
* `return void`

Effect is opposite to ->seeInDatabase

Asserts that there is no record with the given column values in a database.
Provide table name and column values.

{% highlight php %}

<?php
$I->dontSeeInDatabase('users', ['name' => 'Davert', 'email' => 'davert@mail.com']);

{% endhighlight %}
Fails if such user was found.

Comparison expressions can be used as well:

{% highlight php %}

<?php
$I->dontSeeInDatabase('posts', ['num_comments >=' => '0']);
$I->dontSeeInDatabase('users', ['email like' => 'miles%']);

{% endhighlight %}

Supported operators: `<`, `>`, `>=`, `<=`, `!=`, `like`.


#### grabColumnFromDatabase

* `param string` $table
* `param string` $column
* `param array` $criteria
* `return array`

Fetches all values from the column in database.

Provide table name, desired column and criteria.

{% highlight php %}

<?php
$mails = $I->grabColumnFromDatabase('users', 'email', array('name' => 'RebOOter'));

{% endhighlight %}


#### grabFromDatabase

* `param string` $table
* `param string` $column
* `param array` $criteria
* `return mixed` Returns a single column value or false

Fetches a single column value from a database.

Provide table name, desired column and criteria.

{% highlight php %}

<?php
$mail = $I->grabFromDatabase('users', 'email', array('name' => 'Davert'));

{% endhighlight %}
Comparison expressions can be used as well:

{% highlight php %}

<?php
$post = $I->grabFromDatabase('posts', ['num_comments >=' => 100]);
$user = $I->grabFromDatabase('users', ['email like' => 'miles%']);

{% endhighlight %}

Supported operators: `<`, `>`, `>=`, `<=`, `!=`, `like`.


#### grabNumRecords

* `param string` $table Table name
* `param array` $criteria Search criteria [Optional]
* `return int`

Returns the number of rows in a database


#### haveInDatabase

* `param string` $table
* `param array` $data
* `return int`

Inserts an SQL record into a database. This record will be erased after the test,
unless you've configured "skip_cleanup_if_failed", and the test fails.

{% highlight php %}

<?php
$I->haveInDatabase('users', array('name' => 'miles', 'email' => 'miles@davis.com'));

{% endhighlight %}


#### performInDatabase

* `param ` $databaseKey
* `param ActionSequence|array|callable` $actions
* `throws ModuleConfigException`
* `return void`

Can be used with a callback if you don't want to change the current database in your test.

{% highlight php %}

<?php
$I->seeNumRecords(2, 'users');   //executed on default database
$I->performInDatabase('db_books', function($I) {
    $I->seeNumRecords(30, 'books');  //executed on db_books database
});
$I->seeNumRecords(2, 'users');  //executed on default database

{% endhighlight %}
List of actions can be pragmatically built using `Codeception\Util\ActionSequence`:

{% highlight php %}

<?php
$I->performInDatabase('db_books', ActionSequence::build()
    ->seeNumRecords(30, 'books')
);

{% endhighlight %}
Alternatively an array can be used:

{% highlight php %}

$I->performInDatabase('db_books', ['seeNumRecords' => [30, 'books']]);

{% endhighlight %}

Choose the syntax you like the most and use it,

Actions executed from array or ActionSequence will print debug output for actions, and adds an action name to
exception on failure.


#### seeInDatabase

* `param string` $table
* `param array` $criteria
* `return void`

Asserts that a row with the given column values exists.

Provide table name and column values.

{% highlight php %}

<?php
$I->seeInDatabase('users', ['name' => 'Davert', 'email' => 'davert@mail.com']);

{% endhighlight %}
Fails if no such user found.

Comparison expressions can be used as well:

{% highlight php %}

<?php
$I->seeInDatabase('posts', ['num_comments >=' => '0']);
$I->seeInDatabase('users', ['email like' => 'miles@davis.com']);

{% endhighlight %}

Supported operators: `<`, `>`, `>=`, `<=`, `!=`, `like`.


#### seeNumRecords

* `param int` $expectedNumber Expected number
* `param string` $table Table name
* `param array` $criteria Search criteria [Optional]
* `return void`

Asserts that the given number of records were found in the database.

{% highlight php %}

<?php
$I->seeNumRecords(1, 'users', ['name' => 'davert'])

{% endhighlight %}


#### updateInDatabase

* `param string` $table
* `param array` $data
* `param array` $criteria
* `return void`

Update an SQL record into a database.

{% highlight php %}

<?php
$I->updateInDatabase('users', array('isAdmin' => true), array('email' => 'miles@davis.com'));

{% endhighlight %}

<p>&nbsp;</p><div class="alert alert-warning">Module reference is taken from the source code. <a href="https://github.com/Codeception/module-db/tree/master/src/Codeception/Module/Db.php">Help us to improve documentation. Edit module reference</a></div>
