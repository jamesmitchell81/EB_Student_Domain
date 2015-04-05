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
    private $id;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

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
        return ($this->startDateTime) ? date($format, $this->startDateTime) : "";
    }

    public function getStartTime($format = '')
    {
        if ( $format == '' )
        {
            return date('H:i:s', $this->startDateTime); // default
        }
        return ($this->startDateTime) ? date($format, $this->startDateTime) : "";
    }

    public function getEndTime($format = '')
    {
        if ( $format == '' )
        {
            return date('H:i:s', $this->endDateTime); // default
        }
        return ($this->endDateTime) ? date($format, $this->endDateTime) : "";
    }


    public function setDateTime($startDateTime, $endDateTime)
    {
        $this->setStartDateTime($startDateTime);
        $this->setEndDateTime($endDateTime);
    }

    public function setEndDateTime($endDateTime)
    {
        $this->endDateTime = strtotime($endDateTime);
    }

    public function getEndDateTime()
    {
        return $this->endDateTime;
    }

    public function setStartDateTime($startDateTime)
    {
        $this->startDateTime = strtotime($startDateTime);
    }

    public function getStartDateTime()
    {
        return $this->startDateTime;
    }

    public function getDuration()
    {
        $start = strtotime($this->startDateTime);
        $end = strtotime($this->endDateTime);
        return $end - $start;
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
