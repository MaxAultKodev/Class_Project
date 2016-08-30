<!DOCTYPE html>


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
        <div class="content">
            <pre>
                <?php
                print_r($_SERVER);
                ?>
            </pre>
        </div>
        <?php
        require_once 'includes/footer.php';
        ?>
    </body>
</html>
