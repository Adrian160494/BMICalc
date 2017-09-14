<?php
session_start();
?>

<table class="pull-right">
    <tr>
        <td>Logged as: <?php echo $_SESSION['login']; ?></td><td>Email: <?php echo $_SESSION['email']; ?></td><td><a href="PHP/logout.php"> Log Out</a></td>
    </tr>
</table>