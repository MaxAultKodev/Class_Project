<hr>


<a href ='index.php'> Home | </a>


<?php


if (!isset($_SESSION['email'])) {
    ?>
    <a href ='login.php'> Login | </a>
    <a href ='signup.php'> Signup | </a>
    
    <?php
} else {
    ?>
    <a href ='logout.php'> Logout | </a>
    <?php
}
?>
<a href ='contact.php'> Contact | </a>


<a href ='numbers.php'> Numbers | </a>
<a href ='calculations.php'> Calculations | </a>
<a href ='string.php'> Strings | </a>
<a href ='arrays.php'> Arrays | </a>
<a href ='OOP.php'> OOP | </a>


<?php
if (isset($_SESSION['email'])) {
    ?>
    <a href ='php_server.php'> Server | </a>
    <a href ='php_info.php'> Info | </a>
    <?php
}
?>



<hr>