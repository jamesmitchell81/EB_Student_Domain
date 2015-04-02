<?php

class Assignment
{
    private $title = "";
    private $release_date = "";
    private $due_date = "";
    private $lecturer;
    private $module;
    private $criteria = [];
    private $weighting;
    private $id;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getCriteria()
    {
        return $this->criteria;
    }

    public function setCriteria($criteria)
    {
        $this->criteria = $criteria;
    }

    /**
     * @return string
     */
    public function getReleaseDate($format = '')
    {
        if ( $format == '' ) {
            return $this->due_date;
        }
        return date($format, strtotime($this->release_date));
    }

    /**
     * @param string $release_date
     */
    public function setReleaseDate($release_date)
    {
        $this->release_date = $release_date;
    }

    /**
     * @return string
     */
    public function getDueDate($format = '')
    {
        if ( $format == '' ) {
            return $this->due_date;
        }
        return date($format, strtotime($this->due_date));
    }

    /**
     * @param string $due_date
     */
    public function setDueDate($due_date)
    {
        $this->due_date = $due_date;
    }

    public function setWeighting($weighting)
    {
        $this->weighting = $weighting;
    }

    public function getWeighting()
    {
        return $this->weighting;
    }

    public function getWeightingPC()
    {
        return $this->weighting * 100 . "%";
    }

    /**
     * @return mixed
     */
    public function getLecturer()
    {
        return $this->lecturer;
    }

    /**
     * @param mixed $lecturer
     */
    public function setLecturer(Lecturer $lecturer)
    {
        $this->lecturer = $lecturer;
    }

    /**
     * @return mixed
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * @param mixed $module
     */
    public function setModule(Module $module)
    {
        $this->module = $module;
    }
}
