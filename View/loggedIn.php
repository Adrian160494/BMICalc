<?php
session_start();
?>

<div class="pull-right">
    <div class="loggedIn">
        <div  id="who">
            <p>Logged as: <?php echo $_SESSION['login']; ?> <span ng-click="releaseDiv()" id="release" class="material-icons">arrow_drop_down_circle</span></p>
        </div>
    </div>
    <div class="loginInfo">
        <div>
            <?php echo $_SESSION['email']; ?>
        </div>
        <div><a href="">Change password</a></div>
        <div><a href="PHP/logout.php"> Log Out</a></div>
    </div>
</div>
