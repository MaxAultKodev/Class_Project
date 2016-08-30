<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <title>Calculations</title>
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
    </head>
    <?php
    require_once 'includes/header.php';
    require_once 'includes/menu.php';
    ?>

    <body>
        <div class="content">
            <form action="calc_handler.php" method="post">
                <label for="price">Price:</label>
                <input type="text" name="price" size="5" maxlength="6" 
                       required placeholder="Enter Price"/>
                <br>
                <label for="quantity">Quantity:</label>
                <input type="text" name="quantity" size="5" maxlength="6"
                       required placeholder="Enter Quantity"/>
                <br>
                <label for="discount">Discount:</label>
                <input type="text" name="discount" size="5" />
                <br>
                
                <label for="tax">Tax:</label>
                <input type="text" name="tax" size="3" /> (%)
                <br>
                
                <label for="shipping">Shipping Method:</label>
                <select name="shipping">
                    <option value="5.00">Slow and steady</option>
                    <option value="8.95">Put a move on it.</option>
                    <option value="19.36">I need it yesterday!</option>
                </select>
                <br>
                
                <label for="payments">Number of payments to make:</label>
                <input type="text" name="payments" size="3" /></p>
                <br>
                <input type="submit" name="submit" value="Calculate!" />

            </form>
            <?php
            ?>
        </div>
    </body>

    <?php
    require_once 'includes/footer.php';
    ?>

</html>
