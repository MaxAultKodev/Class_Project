<?php
{
    include'Person.php';
    
    echo 'Results<br><br>';
    $p1 = New Person();
    $p1->setFirstName("Sue");
    $p1->setLastName ("Brown");
    $p1->setEmail ("sue@aol.com");
    $p1->setUsername ("BrownsFan69");
    $p1->setZipcode (12345);
    echo 'First Name: '.$p1->getFirstName().'<br>';
    echo 'Last Name: '.$p1->getLastName().'<br>';
    echo 'Email: '.$p1->getEmail().'<br>';
    echo 'Username: '.$p1->getUsername().'<br>';
    echo 'Zipcode: '.$p1->getZipcode().'<br>';
}
