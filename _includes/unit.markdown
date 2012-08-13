### Unit Test

{% highlight php %}
class UserTest extends \Codeception\TestCase\Test
{
    public function testUserSave() {
        $user = Stub::make('User');
        $user->setName('davert');
        $this->assertEquals('davert', $user->getName());
        $user->save();
        $this->codeGuy->seeInDatabase('users', array('name' => 'davert'));
    }
}
{% endhighlight %}

### Scenario-Driven Unit Test

{% highlight php %}
<?php
class UserControllerCest {
    public $class = 'UserController';

    public function createAction(CodeGuy $I)
    {
        $I->haveFakeClass($userController = Stub::makeEmptyExcept('UserController'));
        $I->executeTestedMethodOn($userController, array('username' => 'MilesDavis', 'email' => 'miles@davis.com'))
        $I->seeResultEquals(true)
        $I->seeMethodInvoked($userController, 'renderHtml')
        $I->seeInDabatase('users', array('username' => 'MilesDavis'));
    }
}
?>
{% endhighlight %}

