<?php namespace Models\Entities;

include 'Person.php';

use Models\Entities\Person;

class Lecturer extends Person
{
    private $tel_ext = "";
    private $modules = [];
    private $id;

    public function setID($id)
    {
        $this->id = $id;
    }

    public function getID()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTelExt()
    {
        return $this->tel_ext;
    }

    /**
     * @param string $tel_ext
     */
    public function setTelExt($tel_ext)
    {
        $this->tel_ext = $tel_ext;
    }

    /**
     * @return array
     */
    public function getModules()
    {
        return $this->modules;
    }

    /**
     * @param array $modules
     */
    public function setModules($modules)
    {
        $this->modules = $modules;
    }
}
