<?php

include '_entities/Module.php';
include './_dao/ModuleDAO.php';

use Util\Input;
use Models\Entities\Module;
use DAO\ModuleDAO;

class ModuleModel
{
  private $args;
  private $username;

  public function __construct($args = [])
  {
    $this->args = $args;
    $this->username = Input::session('username');
  }

  public function getModules()
  {
    $dao = new ModuleDAO();
    if ( empty($this->args) ) {
      // get all modules.
    } else {
      // get specific module.
    }

  }

}