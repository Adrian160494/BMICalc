<?php
session_start();
?>

<div>
    <div class="loggedIn">
        <p id="loggedIn">Logged as: <?php echo $_SESSION['login']; ?></p>
        <p>Email: <?php echo $_SESSION['email']; ?></p>
        <a href="PHP/logout.php"><button class="btn btn-default">Log Out</button></a>
    </div>
</div>
