<?php namespace DAO;

include_once './_database/DatabaseQuery.php';
// include_once './_models/_entities/Module.php';

use PDO;
use Models\Entities\Module;
use Database\DatabaseQuery;

class ModuleDAO
{
  private $db;

  public function getModuleById($id)
  {
    $this->db = new DatabaseQuery();
    $this->db->setInt('id', $id);
    $this->db->select('SELECT m.idModuleCode, m.Title,
                          m.Description, m.Level
                       FROM Module m
                       WHERE m.idModuleCode = :id AND m.Status = "Current"');
    $data = $this->db->first();

    $modules = [];

    if ( $data )
    {
      extract($data);

      $modules[0] = new Module();
      $modules[0]->setModuleCode($idModuleCode);
      $modules[0]->setTitle($Title);
      $modules[0]->setDescription($Description);
      $modules[0]->setLevel($Level);
    }

    return $modules;
  }

  public function getUserModules($username)
  {
    $this->db = new DatabaseQuery();
    $this->db->setInt('username', $username);
    $this->db->select('SELECT m.idModuleCode, m.Title,
                          m.Description, m.Level
                       FROM Module m
                       WHERE m.idModuleCode IN (SELECT idModuleCode
                                                FROM ModuleStudents s
                                                WHERE idStudent = :username)');
    $data = $this->db->all();

    $modules = [];

    foreach ($data as $index => $module) {

      extract($module);

      $modules[] = new Module();
      $modules[$index]->setModuleCode($idModuleCode);
      $modules[$index]->setTitle($Title);
      $modules[$index]->setDescription($Description);
      $modules[$index]->setLevel($Level);
    }
    return $modules;
  }
}











