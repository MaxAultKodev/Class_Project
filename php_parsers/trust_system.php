<?php

include_once("../includes/check_login_status.php");
$trust = $_POST['trust'];
$friend = $_POST['friend'];
$sqlSelect = "SELECT trustlevel FROM friends WHERE (user1= $friend OR user2 = $friend )AND (user1 = $log_username OR user2 = $log_username) AND accepted = '1'";
$sqlUpdate = "UPDATE friends SET trustlevel='$trust' WHERE (user1= $friend or user2 = $friend)AND (user1 = $log_username or user2 = $log_username) AND accepted = '1'";
$query = mysqli_query($db_conx, $sqlSelect);

if ($query == '99'){


    $queryUpdate = mysqli_query($db_conx, $sqlUpdate);

    echo "Trust Level Is".$queryUpdate;

            
}else {
    echo "inside the else";
    
}




?>