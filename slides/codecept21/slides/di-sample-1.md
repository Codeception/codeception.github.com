``` php
// inject page objects
function updatePassword(Page\User $page, AcceptanceTester $I)
{
    $this->page->openProfile();
    $this->page->editProfile();
    $I->fillField($this->page->oldPasswordField, '123456');
    $I->fillField($this->page->newPasswordField, '654321');
    $I->fillField($this->page->passwordFieldRepeat, '654321');
    $I->click($this->page->saveBtn);
    $I->see('Password was updated');
}
```