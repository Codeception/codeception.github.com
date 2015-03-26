## What's inside test container?

* Test container contain prepared database
* `./runtests.sh` starts all required services (nginx, mysql, selenium, redis, etc)
* Container stops when tests are finished
* No supervisors: we can execute only one process per run