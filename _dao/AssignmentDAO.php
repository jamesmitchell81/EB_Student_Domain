<?php namespace DAO;

include_once './_database/DatabaseQuery.php';
include_once './_models/_entities/Assignment.php';

use PDO;
use Database\DatabaseQuery;
use Models\Entities\Assignment;

class AssignmentDAO
{
    private $db;

    public function getAssignmentsByModuleCode($code)
    {
        $this->db = new DatabaseQuery();
        $this->db->set('code', $code, PDO::PARAM_STR);
        $this->dt->select();

        $data = $this->all();

        $assignments = [];

        foreach ($data as $index => $assignment) {

            extract($assignment);

            $assignments[$index]->setTitle("");
            $assignments[$index]->setTitle("");
            $assignments[$index]->setTitle("");
            $assignments[$index]->setTitle("");
            // ...

        }



    }

    public function getUSerAssignments($username)
    {

    }

    public function getSubmittedAssignmentsByUser($username)
    {

    }




}