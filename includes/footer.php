<div id="footer">
    <?php
    require_once 'variables.php';

    date_default_timezone_set('America/New_York');
    //session_start();
    ?>
    <table width ="100%" rules="all">
        <tr>
            <td>
                <?php
                if (isset($_SESSION['email'])) {
                    echo 'Hello, ' . $_SESSION['email'];
                } else 
                {
                    echo 'Not Logged In';
                }
                ?>
            </td>
            <td>
<?php
echo $copyrightBy
?>
            </td>
            <td>
                <?php
                  if (isset($_SESSION['loggedintime'])) {
                    echo 'You have been logged in since ' . 
                            date('g:i a',$_SESSION['loggedintime']);
                } else 
                {
                    echo 'Not Logged In';
                }
                ?>

            </td>

        </tr>
    </table>
</div>
