<?php

class Event
{
    private $title = "";
    private $description = "";
    private $startDateTime;
    private $endDateTime;
    private $location = "";
    private $reminder;
    private $attendees = [];
    private $diaryName;

    public function setDiaryName($diaryName)
    {
        $this->diaryName = $diaryName;
    }

    public function getDiaryName()
    {
        return $this->diaryName;
    }

    public function getDate($format = '')
    {
        if ( $format == '' )
        {
            return date('Y-m-d', $this->startDateTime); // default
        }
        return ($this->startDateTime) ? date($format, strtotime($this->startDateTime)) : "";
    }

    public function getStartTime($format = '')
    {
        if ( $format == '' )
        {
            return date('H:i:s', strtotime($this->startDateTime)); // default
        }
        return ($this->startDateTime) ? date($format, strtotime($this->startDateTime)) : "";
    }

    public function setDateTime($startDateTime, $endDateTime)
    {
        $this->startDateTime = $startDateTime;
        $this->endDateTime = $endDateTime;
    }

    public function setEndDateTime($endDateTime)
    {
        $this->endDateTime = $endDateTime;
    }

    public function getEndDateTime()
    {
        return $this->endDateTime;
    }

    public function setStartDateTime($startDateTime)
    {
        $this->startDateTime = $startDateTime;
    }

    public function getStartDateTime()
    {
        return $this->startDateTime;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
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
     * @return array
     */
    public function getAttendees()
    {
        return $this->attendees;
    }

    /**
     * @param array $attendees
     */
    public function setAttendees($attendees)
    {
        $this->attendees = $attendees;
    }

    public function addAttendee(PersonInterface $attendee)
    {
        $this->attendees[] = $attendee;
    }
}
