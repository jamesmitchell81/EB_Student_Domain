<?php namespace Models\Entities;

class Event
{
    private $title = "";
    private $description = "";
    private $start_datetime;
    private $end_datetime;
    private $location = "";
    private $reminder;
    private $attendees = [];

    public function setDateTime($start_datetime, $end_datetime)
    {
        $this->start_datetime = $start_datetime;
        $this->end_datetime = $end_datetime;
    }

    public function getEndDateTime()
    {
        return $this->end_datetime;
    }

    public function getStartDateTime()
    {
        return $this->start_datetime;
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
