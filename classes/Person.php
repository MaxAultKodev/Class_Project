<?php

class Person {

    private $firstName;
    private $lastName;
    private $email;
    private $username;
    private $zipcode;

    function __construct() 
    {
        
    }
    function getFirstName() 
    {
        return $this->firstName;
    }
    function getLastName() 
    {
        return $this->lastName;
    }
    function getEmail() 
    {
        return $this->email;
    }
    function getUsername() 
    {
        return $this->username;
    }
    function getZipcode() 
    {
        return $this->zipcode;
    }
    function setFirstName($firstName) 
    {
        $this->firstName = $firstName;
    }
    function setLastName($lastName) 
    {
        $this->lastName = $lastName;
    }
    function setEmail($email) 
    {
        $this->email = $email;
    }
    function setUsername($username) 
    {
        $this->username = $username;
    }
    function setZipcode($zipcode) 
    {
        $this->zipcode = $zipcode;
    }

    public function __toString() 
    {
        echo 'First Name: '.$this->firstName.'<br>';
        echo 'Last Name: '.$this->lastName.'<br>';
        echo 'email: '.$this->email.'<br>';
        echo 'Username: '.$this->username.'<br>';
        echo 'Zipcode: '.$this->zipcode.'<br>';
    }

    
    
}
