<?php

require_once './_util/Authentication.php';

class SignInModel
{
  private $args = [];
  private $username;
  private $password;
  private $errors = [];

  public function __construct($args = [])
  {
    $this->args = $args;

    $this->username = Input::post('username');
    $this->password = Input::post('password');
  }

  public function authorised()
  {
    $auth = new Authentication($this->username, $this->password);

    if ( !$auth->authenticate() )
    {
      $this->errors = $auth->getErrors();
      return false;
    }

    return true;
  }

  public function getUsername()
  {
    return $this->username;
  }

  public function getErrors()
  {
    return $this->errors;
  }
}