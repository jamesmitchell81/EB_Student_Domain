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
    if ( empty($this->args) ) {
      $dao = new ModuleDAO();
      return $dao->getUserModules($this->username);
    } else {
      $dao = new ModuleDAO();
      $id = array_shift($this->args);
      return $dao->getModuleById($id, $this->username);
    }
    return;
  }

}