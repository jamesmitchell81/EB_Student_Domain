<?php

class Assignment
{
    private $title = "";
    private $release_date = "";
    private $due_date = "";
    private $lecturer;
    private $module;

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

    /**
     * @return string
     */
    public function getReleaseDate()
    {
        return $this->release_date;
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
    public function getDueDate()
    {
        return $this->due_date;
    }

    /**
     * @param string $due_date
     */
    public function setDueDate($due_date)
    {
        $this->due_date = $due_date;
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
    public function setLecturer(Lecture $lecturer)
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
