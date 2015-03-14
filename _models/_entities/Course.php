<?php namespace Models\Entities;

class Course {
    private $title = "";
    private $description = "";
    private $course_leader;

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
    public function getCourseLeader()
    {
        return $this->course_leader;
    }

    /**
     * @param Lecturer $course_leader
     */
    public function setCourseLeader(Lecturer $course_leader)
    {
        $this->course_leader = $course_leader;
    }
}
