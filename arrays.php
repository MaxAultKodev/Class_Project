<html>
    <head>
        <meta charset="UTF-8">
        <title>Arrays</title>
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
    </head>
    <?php
    require_once 'includes/header.php';
    require_once 'includes/menu.php';
    ?>

    <body>
        <div class="content">
            <div class="small-block" style="float:left">
                <h4>Index Array Creation (One Line)</h4>
                <fieldset>
                    <legend>Code</legend>
                    $cars = array("Chevy", "Ford", "Jeep");<br>
                    echo "I like " . $cars[0] . " the most.";
                </fieldset>
                <fieldset>
                    <legend>Result</legend>
                    <?php
                    $cars = array("Chevy", "Ford", "Jeep");
                    echo "I like " . $cars[1] . " the most.";
                    ?>
                </fieldset>
                
            </div>
            <div class="small-block" style="float:left">
                <h4>Index Array Creation (Manually)</h4>
                <fieldset>
                    <legend>Code</legend>
                    $cars[0] = "Chevy";<br>
                    $cars[1] = "Ford";<br>
                    $cars[2] = "Jeep";<br>
                    echo "I like " . $cars[1] . " the most.";
                </fieldset>
                <fieldset>
                    <legend>Result</legend>
                    <?php
                    $cars[0] = "Chevy";
                    $cars[1] = "Ford";
                    $cars[2] = "Jeep";
                    echo "I like " . $cars[1] . " the most.";
                    ?>
                </fieldset>
                
            </div>
            <div class="small-block" style="float:left">
                <h4>Count Function</h4>
                <fieldset>
                    <legend>Code</legend>
                    $colors = array("red", "blue", "green", "Yellow");<br>
                    echo "There are " . count($colors) . " in the array.";
                </fieldset>
                <fieldset>
                    <legend>Result</legend>
                    <?php
                    $colors = array("Red", "Blue", "Green", "Yellow");
                    echo "There are " . count($colors) . " in the array.";
                    ?>
                </fieldset>
                
            </div>
            <div class="small-block" style="float:left">
                <h4>Associative Array</h4>
                <fieldset>
                    <legend>Code</legend>
                    $sounds = array("Dog" => "bark", "Cat" => "meow", "Cow" => "moo");<br>
                    echo "Cows - " . $sounds["Cow"];<br>
                    echo "Dogs - " . $sounds["Dog"];<br>
                    echo "Cats - " . $sounds["Cat"];
                </fieldset>
                <fieldset>
                    <legend>Result</legend>
                    <?php
                    $sounds = array("Dog" => "bark", "Cat" => "meow", "Cow" => "moo");
                    echo "Cows - " . $sounds["Cow"] . "<br>";
                    echo "Dogs - " . $sounds["Dog"] . "<br>";
                    echo "Cats - " . $sounds["Cat"];
                    ?>
                </fieldset>
               
            </div>
        
        </div>
    </body>

    <?php
    require_once 'includes/footer.php';
    ?>

</html>