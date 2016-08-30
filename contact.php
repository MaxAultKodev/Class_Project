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
        <div class='content'>
            <form action= "contact_handler.php" method ="post">
                <label for='title'> Salutation:</label>
                <select name='title'>
                    <option value='Mr.'>Mr.</option>
                    <option value='Mrs.'>Mrs.</option>
                    <option value='Ms.'>Ms.</option>
                    <option value='Lord'>Lord</option>
                </select>
                <br>
                <label for='firstName'> First Name:</label>
                <input type='text' name ='firstName'Value='' maxLength='15'
                       placeholder="type your name dummy" required/>
                <br>
                <label for='lastName'> Last Name:</label>
                <input type='text' name ='lastName'Value=''maxLength='15'
                       placeholder="type your name dummy" required/>
                <br>
                <label for='zipCode'> Zip Code:</label>
                <input type='text' name ='zipCode'Value=''maxLength='5'
                       placeholder="type your zip dummy" />
                <br>
                <label for='email'> Email:</label>
                <input type='email' name ='email'Value=''maxLength='15'
                       placeholder="type your email dummy" required/>
                 <br>
                <label for='url'> URL:</label>
                <input type='url' name ='url'Value=''
                       placeholder="type your site dummy" />
                <br>
                <label for='yourAge'> Age: </label>
                <input type='range' name ='yourAge'Value='30'
                       min='5' max='99' step='1'/>
            <input type ="Submit" value ="Submit"/>
        </div>
        <?php
        require_once 'includes/footer.php';
        ?>
    </body>
</html>
