<?php

include "./_models/_entities/Lecturer.php";

class Session
{
    private $room;
    private $startTime;
    private $endTime;
    private $weekday;
    private $lecturer;
    private $title;

    public function getDuration()
    {
        $start = strtotime($this->startTime);
        $end = strtotime($this->endTime);
        return $end - $start;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setLecturer(Lecturer $lecturer)
    {
        $this->lecturer = $lecturer;
    }

    public function getLecturer()
    {
        return $this->lecturer;
    }

    /**
     * @return mixed
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @param mixed $room
     */
    public function setRoom(Room $room)
    {
        $this->room = $room;
    }

    /**
     * @return mixed
     */
    public function getStartTime($format = '')
    {
        if ( $format == '' ) {
            return $this->startTime;
        }
        return ($this->startTime) ? date($format, strtotime($this->startTime)) : "";
    }

    /**
     * @param mixed $startTime
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    }

    /**
     * @return mixed
     */
    public function getEndTime($format = '')
    {
        if ( $format == '' ) {
            return $this->endTime;
        }
        return ($this->endTime) ? date($format, strtotime($this->endTime)) : "";
    }

    /**
     * @param mixed $endTime
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    }

    /**
     * @return mixed
     */
    public function getWeekday()
    {
        return $this->weekday;
    }

    /**
     * @param mixed $weekday
     */
    public function setWeekday($weekday)
    {
        $this->weekday = $weekday;
    }
}
