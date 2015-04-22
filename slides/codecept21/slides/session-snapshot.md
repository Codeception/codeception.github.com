## WebDriver: Session Snapshot

``` php
public function login(AcceptanceTeser $I)
{
     // if snapshot exists - skipping login
     if ($I->loadSessionSnapshot('login')) return;

     // logging in
     $I->amOnPage('/login');
     $I->fillField('name', 'jon');
     $I->fillField('password', '123345');
     $I->click('Login');

     // saving snapshot
     $I->saveSessionSnapshot('login');
```
