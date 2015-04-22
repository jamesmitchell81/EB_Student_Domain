<?php

require_once './_database/DatabaseQuery.php';

class Authentication
{
  private $username;
  private $providedPassword;
  private $storedPassword;

  private $errors;

  public function __construct($username = '', $password = '')
  {
    $this->username = $username;
    $this->providedPassword = $password;
  }

  public function authenticate()
  {
    if ( !$this->isUsername() )
    {
      $this->errors['username'] = "Invalid Username";
    }

    if ( !$this->passwordMatch() )
    {
      $this->errors['password'] = "Invalid Password";
    }

    return (empty($this->errors));
  }

  public function getErrors()
  {
    return $this->errors;
  }

  private function passwordMatch()
  {
    $this->getPassword();
    // password hash etc...
    return $this->providedPassword == $this->storedPassword;
  }

  private function isUsername()
  {
    $db = new DatabaseQuery();
    $db->setInt('username', $this->username);
    $db->setStr('status', "Live");

    $sql = 'SELECT DISTINCT idStudent FROM Student
            WHERE idStudent = :username AND Status = :status';

    $data = $db->select($sql)->first();

    return !empty($data);
  }

  private function getPassword()
  {
    $db = new DatabaseQuery();
    $db->setInt('username', $this->username);

    $sql = 'SELECT DISTINCT Password FROM Student WHERE idStudent = :username';
    $data = $db->select($sql)->first();

    $this->storedPassword = $data['Password'];
  }

}