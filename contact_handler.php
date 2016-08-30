<!DOCTYPE html>


<?php
    $title = filter_input(INPUT_POST,'title' );
    $fName = filter_input(INPUT_POST,'firstName' );
    $lName = filter_input(INPUT_POST,'lastName' );
    $zip = filter_input(INPUT_POST,'zipCode' );
    $email = filter_input(INPUT_POST,'email' );
    $url = filter_input(INPUT_POST,'url' );
    

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Class Project</title>
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
    </head>
    <?php
    require_once 'includes/header.php';
    require_once 'includes/menu.php';
    ?>
    <body>
        <div class='content'>
            <h3>Contact Handler</h3>
                  <?php
                  echo "<p>Thank you, $title $lName for your comments."
                          . "<br> We will send lots of SPAM to $email, and begin "
                          . "trying to backdoor $url.";
                  ?>
                  
        </div>
        <?php
        require_once 'includes/footer.php';
        ?>
    </body>
</html>