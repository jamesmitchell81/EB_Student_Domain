<?php

// include "./_util/Input.php";

use Util\Input;

// get the users home area address if signed in.
// else give sign in page.
class BadRouteModel
{
  private $username;
  private $signedIn = false;
  private $isUser;

  public function __construct()
  {
    $this->username = Input::session('username');

    if ( $this->username )
    {
      // check if is user.

      // if not is user clear session data..
    }
  }

  public function userIsSignedIn()
  {
    return $this->signedIn;
  }

  public function isValidUser()
  {
    return $this->isUser;
  }

  public function geUsername()
  {
    return $this->username;
  }
}