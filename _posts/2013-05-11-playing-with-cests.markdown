---
layout: post
title: "Playng with Cests"
date: 2013-05-11 22:03:50
---

*This is the second guestpost from **Ragazzo**. He writes about using Cest format in functional tests.*

As you already saw it is easy to use flat Cept files in Codeception for your tests. But what if you want to test CRUD operations so a Cept can take 50-70 rows long. In this case it would not be so "easy-to-read". 

This is where Codeception's Cests are really good to use. Cests are simple classes with no parents. You can use them like your classic PHPUnit classes. All that need to know is that each ```public``` Cest method is a separated scenario, which could be represented by a Cept file. 

The other issue we want to solve with Cest files is **UI mapping**. It's ok to start testing with relying on button names and field labels. But the more UI elements come to page, the more complex our selectors become. There should be a way to manage those UI elements for tests. It's better not to put too much CSS/XPath code into scenario as it affetcs readbility of code and hardens its support.

Lets see example of testing simple Yii 1.1 application page in Cest-way with ```PhpBrowser``` module:

{% highlight php %}
<?php

class IndexCest
{

  /**
   * user name text field
   * @type string
   */
  public $username = '#LoginForm_username';

  /**
   * user password text field
   * @type string
   */
  public $password = '#LoginForm_password';

  /**
   * submit button
   * @type string
   */
  public $enterButton = '#login-form input[type=submit]';

  /**
   *
   * @param \TestGuy $I
   * @param \Codeception\Scenario $scenario
   */
  public function check_basic_login_logout(\TestGuy $I, $scenario)
  {
    $I->wantTo('Test index page');
    $I->amOnPage('/');
    $I->see('My Web Application','#header');
    $I->click('Login');
    $I->amGoingTo('login in the test app');
    $I->fillField($this->username,'demo');
    $I->fillField($this->password,'demo');
    $I->click($this->enterButton);
    $I->seeLink('Logout (demo)');
    $I->click('Logout (demo)');
    $I->seeLink('Login');
  }

}
?>
{%endhighlight%}

  As you see, it was easy to add move out selectors into UI properties if we are inside a calss.

  Example of how to test CRUD operations with Selenium2 module is below. Please notice that all support methods are `protected`. They are called from test methods and won't be executed as test themeselves.

{% highlight php %}
<?php
/**
 * "Users" module CrudCest class file
 * @author Ragazzo
 */

class CrudCest
{

  /**
   * your fields definitions goes 
   * here with UI-mappings
   * and other fields.
   *
   */

  private $_userId;

  /**
   * new user created attributes
   */
  private $_newAttrs = array(
    'name'  => 'Ragazzo',
    'email' => 'someRagazzoEmail@example.com',
    'skype' => 'someRagazzoSkype',
  );

  /**
   * edited user attributes
   */
  private $_editAttrs = array(
    'skype' => 'newRagazzoSkype',
  );

  /**
   *
   * @param \WebGuy $I
   * @param \Codeception\Scenario $scenario
   */
  public function test_basic_users_module_crud(\WebGuy $I, $scenario)
  {
    $I->wantTo('create user and test basic crud in "Users" module');
    $I->am('system root user');
    $I->loginIntoTheSystem('somelogin','somepassword',$I);
    $this->create_new_user($I, $scenario);
    $this->update_created_user($I, $scenario);
    $this->delete_created_user($I, $scenario);
  }

  /**
   *
   * @param \WebGuy $I
   * @param \Codeception\Scenario $scenario
   */
  protected function create_new_user($I, $scenario)
  {
    $I->amGoingTo('create new user');
    $I->amOnPage('/users');

    $I->see('Users','.breadcrumbs')
    $I->see('Create','.btn');

    $I->click('Create','.btn');
    $I->seeInCurrentUrl('users/create');
    $I->see('Create','.breadcrumbs');

    $I->amGoingTo('submit form without required fields');
    $I->click($this->saveButton);

    $I->expectTo('see required validation errors');
    $I->see('Name field can not be empty');

    $I->amGoingTo('submit correctly filled form');
    $I->fillField($this->name, $this->_newAttrs['name']);
    $I->fillField($this->email, $this->_newAttrs['email']);
    $I->fillField($this->skype, $this->_newAttrs['skype']);
    $I->click($this->saveButton);

    $I->expectTo('see correctly saved user info');
    $I->seeInCurrenturl('users/view');
    $I->see('View','.breadcrumbs');
    $I->see('Delete','.btn');
    $I->see('Edit','.btn');
    $I->seeElement('.detail-view');
    $I->see($this->_newAttrs['name'],'.detail-view');
    $I->see($this->_newAttrs['email'],'.detail-view');
    $I->see($this->_newAttrs['skype'],'.detail-view');

    $this->_userId = $I->grabFromCurrentUri('~/id/(\d+)/~'); 
  }

  /**
   *
   * @param \WebGuy $I
   * @param \Codeception\Scenario $scenario
   */
  protected function update_created_user($I, $scenario)
  {
    $I->amGoingTo('change created user attributes');
    $I->amOnPage($this->editUrl.$this->_userId);
    $I->fillField($this->skype, $this->_editAttrs['skype']);
    $I->click($this->saveButton);

    $I->expectTo('see that attributes has changed');
    $I->seeInField($this->skype,$this->_editAttrs['skype']);
  }

  /**
   *
   * @param \WebGuy $I
   * @param \Codeception\Scenario $scenario
   */
  protected function delete_created_user($I, $scenario)
  {
    $I->amOnPage('/users');
    $I->see($this->_newAttrs['name'],'#users-grid');
    $I->click($this->_newAttrs['name'],'#users-grid');
    $I->see('Delete','.btn');
    $I->click('Delete','.btn');
    $I->seeInCurrentUrl('/users');
    $I->dontSee($this->_newAttrs['name'],'#users-grid');
  }

}
?>
{%endhighlight%}
In this way you can use Cests classes for some tasks where it is difficult to use flat Cepts. You also can use Cests classes as PageObjects. 

When you write tests with Codeception it is good to be verbose and use different methdos for that, so use them:

  - `$I->am` to say who you are and define your role;
  - `$I->wantTo` to say what feature you want to test;
  - `$I->amGoingTo` to say what you gonna do next;
  - `$I->expect` and `$I->expectTo` to say what do expect next to see in your test case as a user.

Use this commands instead of comments in your tests. They will be displayed in scenario output and will provide you with additional information on steps taken.

*We can say to Ragazzo for sharing his experience in using the Cest classes. Stil it might be a point of discussion, should a CRUD be tested in one test or in four. In both cases Cest classes are a good places to keep everything you need to test dealing with one entity. A user, in this case.*