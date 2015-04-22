``` php
// inject step object
function addCustomer(Step\Admin $I)
{
    $I->amLoggedAsAdmin();
    $I->amOnCustomersPage();
    $I->click("Create");
    // ...

}
```