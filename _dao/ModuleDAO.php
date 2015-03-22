<?php namespace DAO;

include_once './_database/DatabaseQuery.php';

use PDO;
use Database\DatabaseQuery;

class ModuleDAO
{
  public function getModuleById($id, $username)
  {

  }

  public function getUserModules($username)
  {
    $this->db = new DatabaseQuery();
    $this->setInt('username', $username);
    $this->db->select('');

  }
}