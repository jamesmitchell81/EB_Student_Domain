<?php namespace Models\Entities;

interface PersonInterface
{
  function getFullName();
  function setFullName($title, $firstName, $surname);
  function getTitle();
  function getFirstName();
  function getMiddleName();
  function getLastName();
  function getEmailAddress();
  function setTitle($title);
  function setFirstName($firstName);
  function setMiddleName($middleName);
  function setLastName($lastName);
  function setEmailAddress($emailAddress);
}