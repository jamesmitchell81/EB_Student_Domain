<?php namespace Models\Entities;

class Module {
    private $moduleCode = "";
    private $title = "";
    private $description = "";
    private $level = "";
    // lecturers...?

    public function getModuleCode()
    {
        return $this->moduleCode;
    }

    public function setModuleCode($moduleCode)
    {
        $this->moduleCode = $moduleCode;
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

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param string $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }
}