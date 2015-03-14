<?php namespace Models\Entities;

class Notification
{
    private $subject = "";
    private $body = "";
    private $sent_datetime = "";
    private $sender = "";

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
    private function setSubject($subject)
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
    private function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getSentDatetime()
    {
        return $this->sent_datetime;
    }

    /**
     * @param string $sent_datetime
     */
    private function setSentDatetime($sent_datetime)
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
    private function setSender($sender)
    {
        $this->sender = $sender;
    }
}
