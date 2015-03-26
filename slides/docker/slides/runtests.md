## runtests.sh

```
#!/bin/sh
echo "Starting Services...."
service elasticsearch start > /dev/null 2>&1
service nginx start > /dev/null 2>&1
service php5-fpm start > /dev/null 2>&1
service mysql start > /dev/null 2>&1
service memcached start > /dev/null 2>&1
phantomjs --webdriver=4444 > /dev/null 2>&1 &
mailcatcher -f  > /dev/null 2>&1 &

echo "Running tests"
cd /project/$1 # switch to application
codecept run $2 # run tests from specific suite
```