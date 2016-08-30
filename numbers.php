<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <title>Number Functions</title>
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
    </head>
    <?php
    require_once 'includes/header.php';
    require_once 'includes/menu.php';
    ?>
    <body>
        <div class="content">
            <h2>Number Functions</h2>
            <center>

                <table border="2" width="60%" cellspacing="5" cellpadding="2">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Original</th>
                            <th>Modified</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--First Row-->
                        <tr>
                            <td><?php echo 'English Notation: '; ?></td>
                            <td>
                                <?php
                                $number1 = 1234.5678;
                                echo $number1;
                                ?>
                            </td>
                            <td>
                                <?php
                                $english_format_number = number_format($number1, 2, ".", ",");
                                echo $english_format_number;
                                ?>
                            </td>
                        </tr>
                        <!--Second Row-->
                        <tr>
                            <td><?php echo'Rounding Function: ' ?></td>
                            <td><?php
                                $number2 = 55.55555;
                                echo $number2;
                                ?>
                            </td>
                            <td><?php
                                $number_rounded = round($number2);
                                echo $number_rounded;
                                ?>

                            </td>
                        </tr>
                        <!--Third Row-->
                        <tr>
                            <td>Precedence</td>
                            <td>
                                <?php
                                $number3 = number_format(3 + 4 / 6, 2);
                                echo '(3 + 4 / 6)';
                                ?>
                            </td>
                            <td><?php 
                            echo $number3 
                                    ?>
                            </td>
                        </tr>
                        <!--Fourth Row-->
                        <tr>
                            <td><?php 
                                    echo 'Autoincrement: ' 
                                ?>
                            </td>
                            <td><?php 
                            echo '$x = 3';
                                ?>
                            </td>
                            <td><?php   
                                $x=3;
                                echo ++$x;
                                ?>
                            </td>
                        </tr>
                        <!--Fifth Row-->
                        <tr>
                            <td><?php 
                                    echo'Autodecrement: ' 
                                ?>
                           </td>
                            <td><?php 
                            echo '$x = 3';
                                ?>
                            </td>
                            <td><?php   
                                $x=3;
                                echo --$x;
                                ?>
                            </td>
                        </tr>

                        <!--Seventh Row-->
                        <tr>
                            <td><?php
                                    echo 'Random Number: ' 
                                ?>
                            </td>
                            <td><?php 
                                echo 'Random number 0 - 100';
                                ?>
                            </td>
                            <td><?php 
                                echo rand(0,100);
                                ?>
                            </td>
                        </tr>
                       
                    </tbody>
                </table>


                <a href="http://www.w3schools.com/php/php_ref_math.asp" target="_blank">List of all math functions </a>

            </center>
        </div>
        <?php
        require_once 'includes/footer.php';
        ?>
    </body>
</html>
