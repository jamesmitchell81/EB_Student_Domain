<?php namespace Models\Entities;

include 'PersonInterface.php';

class Person implements PersonInterface
{
    protected $title = "";
    protected $firstName = "";
    protected $middleName = "";
    protected $lastName = "";
    protected $emailAddress = "";

    /**
     * @return string
     */
    public function getFullName()
    {
        return "$this->title $this->firstName $this->middleName $this->lastName";
    }

    public function setFullName($title, $firstName, $lastName)
    {
        $this->title = $title;
        $this->$firstName = $firstName;
        $this->$lastName = $lastName;
    }

    /**
     * @return string
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
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * @param string $middle_name
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->LastName;
    }

    /**
     * @param string $last_name
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }


    /**
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @param string $emailAddress
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }



}