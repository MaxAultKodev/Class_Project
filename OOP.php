<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Class Project -OOP Concepts-</title>
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
    </head>
    <?php
    require_once 'includes/header.php';
    require_once 'includes/menu.php';
    ?>
    <body>
        <div class="content">
            <h2>Object Oriented Concepts</h2>
            <form action="OOP.php" method="POST">
                <div class="tall-block">
                    <h4>Create a Class</h4>
                    <hr>
                    <?php
                        show_source('classes/Person.php');
                    ?>
                </div>
                   <div class="tall-block">
                    <h4>Person Demo</h4>
                    <hr>
                    <?php
                    show_source ('classes/PersonDemo.php');
                    ?>
                </div>
                <div class="tall-block">
                    <h4>Results</h4>
                    <hr>
                    <?php
                    include 'classes/PersonDemo.php';
                    ?>
                </div>
            </form>
        </div>
            <?php
            require_once 'includes/footer.php';
            ?>
    </body>
</html>
