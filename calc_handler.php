

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
            <?php
            // Script 4.2 - handle_calc.php
            /* This script takes values from calculator.html and performs 
              total cost and monthly payment calculations. */

// Address error handling, if you want.
// Get the values from the $_POST array:
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $discount = $_POST['discount'];
            $tax = $_POST['tax'];
            $shipping = $_POST['shipping'];
            $payments = $_POST['payments'];

// Calculate the total:
            $total = $price * $quantity;
            $total = $total + $shipping;
            $total = $total - $discount;

// Determine the tax rate:
            $taxrate = $tax / 100;
            $taxrate = $taxrate + 1;

// Factor in the tax rate:
            $total = $total * $taxrate;

// Calculate the monthly payments:
            $monthly = $total / $payments;

// Print out the results:
            print "<p>You have selected to purchase:<br><br>
<span class=\"number\">$quantity</span> items at <br>
$<span class=\"number\">$price</span> price each plus  <br>
$<span class=\"number\">$shipping</span> shipping cost and <br>
<span class=\"number\">$tax</span> percent tax rate.<br>
After your $<span class=\"number\">$discount</span> discount, the total cost is 
$<span class=\"number\">$total</span>.<br>
Divided over <span class=\"number\">$payments</span> monthly payments, that would be $<span class=\"number\">$monthly</span> each.</p>";
            ?>
        </div>
    </body>

    <?php
    require_once 'includes/footer.php';
    ?>

</html>
