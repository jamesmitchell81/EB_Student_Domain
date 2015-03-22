<?php namespace Models\Entities;

include 'Person.php';

use Models\Entities\Person;

class Student extends Person
{
    private $student_id;
    private $modules = [];
    private $term_address = "";
    private $home_address = "";
    private $mobile;
    private $password = "";
    private $gender = "";

    /**
     * @return mixed
     */
    public function getStudentId()
    {
        return $this->student_id;
    }

    /**
     * @param mixed $student_id
     */
    public function setStudentId($student_id)
    {
        $this->student_id = $student_id;
    }

    public function addModule(Module $module)
    {
        $this->modules[] = $module;
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
    public function setModules($modules = [])
    {
        $this->modules = $modules;
    }

    /**
     * @return string
     */
    public function getTermAddress()
    {
        return $this->term_address;
    }

    /**
     * @param string $term_address
     */
    public function setTermAddress($term_address)
    {
        $this->term_address = $term_address;
    }

    /**
     * @return string
     */
    public function getHomeAddress()
    {
        return $this->home_address;
    }

    /**
     * @param string $home_address
     */
    public function setHomeAddress($home_address)
    {
        $this->home_address = $home_address;
    }

    /**
     * @return mixed
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param mixed $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }
}