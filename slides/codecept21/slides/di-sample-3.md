``` php
// inject modules into helpers
class AcceptanceHelper 
{
  protected $webDriverModule;
  
  function _inject(\Codecepiton\Module\WebDriver $wd)
  {
      $this->webDriverModule = $wd;
  }
}

```