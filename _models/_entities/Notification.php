<?php namespace Models\Entities;

class Notification
{
    private $subject = "";
    private $body = "";
    private $sent_datetime;
    private $sender;

    public function __construct()
    {
        // get data
        // assign to variables.
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getSentDatetime()
    {
        return strtotime($this->sent_datetime);
    }

    /**
     * @param string $sent_datetime
     */
    public function setSentDatetime($sent_datetime)
    {
        $this->sent_datetime = $sent_datetime;
    }

    /**
     * @return string
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param string $sender
     */
    public function setSender(Person $sender)
    {
        $this->sender = $sender;
    }
}
