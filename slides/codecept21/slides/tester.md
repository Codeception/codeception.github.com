##  Extending Tester

``` php
<?php
class AcceptanceTester extends \Codeception\Actor
{
    // methods taken from module are here:
    use _generated\AcceptanceTesterActions;

    // but this class won't be regenerated
    // so you can use it to extend with own actions

    public function login()
    {
      // implement it here!    
    }
}
```
