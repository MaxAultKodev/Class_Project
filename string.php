<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <title>String Functions</title>
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
    </head>
    <?php
    require_once 'includes/header.php';
    require_once 'includes/menu.php';
    ?>
    <body>
        <div class="content">
            <h2>String Functions</h2>
            <center>

                <table border="3" width="80%" cellspacing="10" cellpadding="3">
                    <thead>
                        <tr>
                            <th>Syntax</th>
                            <th>Description</th>
                            <th>Example</th>
                            <th> Example Modified</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--First Row-->
                        <tr>

                            <td>
                                
                                trim() 
                            </td>
                            <td>
                                Removes whitespace from both sides of the string
                            </td>
                            <td>
                                <?php
                                $string1 = '         lots of space        ';

                                echo $string1;
                                ?>
                            </td>
                            <td>
                                <?php
                                $string1Trimmed = trim($string1);
                                echo $string1Trimmed;
                                ?>

                            </td>


                        </tr>
                        <!--Second Row-->
                        <tr>
                            <td><?php echo 'str_word_count("Hello world!");'?></td>
                            
                            <td><?php
                                echo 'Counts the number of words in a String';
                                ?>
                            </td>
                            <td><?php
                                $string2 = 'one two three four';
                                echo $string2;
                                
                                ?>

                            </td>
                            <td>
                                <?php
                                echo str_word_count($string2);
                                 
                                ?>
                                
                            </td>
                        
                        </tr>
                        <!--Third Row-->
                        <tr>
                            <td><?php
                                echo 'strrev("Hello world!");'
                                ?>
                            </td>
                            <td>
                                <?php 
                            echo 'Reverses the desired String';
                            ?>
                            
                            
                            </td>
                            <td>
                                <?php
                                $string3 = 'This String is Reversed';
                                echo $string3;
                            ?>
                            </td>
                            <td>
                               <?php
                               echo strrev($string3); 
                               ?>
                                
                                
                            </td>
                            
                            
                            
                        </tr>
                        <!--Fourth Row-->
                        <tr>
                            <td><?php
                                echo 'str_replace("world","Dolly","Hello World!")';
                                ?>
                            </td>
                            <td><?php 
                            echo 'This will replace the word world with Dolly.'
                            ?></td>
                            <td><?php
                                $string4 = "Hello world";
                                echo $string4;
                                ?>
                            </td>
                            <td><?php
                                echo str_replace("world","Dolly",$string4);
                                
                                
                                ?>
                            </td>
                        </tr>
                        

                    </tbody>
                </table>


                <a href="http://www.w3schools.com/php/php_string.asp" target="_blank">Most common string functions </a>

            </center>
        </div>
<?php
require_once 'includes/footer.php';
?>
    </body>
</html>
