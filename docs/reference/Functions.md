---
layout: doc
title: Functions - Codeception - Documentation
---

# Shorthand Functions

Shorthand functions can be used in your Codeception tests or helpers.

#### codecept_debug($data)

Prints information when running in debug mode. String, array, or object can be provided as argument.

#### codecept_pause(array $vars = [])

Starts an interactive pause in debug mode. The passed variables are available in the shell.

#### codecept_root_dir($appendPath = '')

Returns absolute path to the root directory (where `codeception.yml` is located)

#### codecept_output_dir($appendPath = '')

Returns absolute path to output directory (`tests/_output`)

#### codecept_data_dir($appendPath = '')

Returns absolute path to data directory (`tests/Support/Data`)

All directory functions append `$appendPath` to the returned path, e.g. `codecept_data_dir('dump.sql')`.

#### codecept_relative_path($path)

Returns `$path` relative to the root directory

#### codecept_absolute_path($path)

Returns `$path` unchanged if it is absolute, otherwise prepends the root directory

#### codecept_is_path_absolute($path)

Checks whether `$path` is absolute

#### codecept_log()

Returns the `Monolog\Logger` instance of the [Logger](https://codeception.com/extensions#Logger) extension, which must be enabled.
