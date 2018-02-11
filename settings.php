<?php

include 'includes/includedFiles.php';

?>

<div class="entityInfo">
    <div class="centerSection">
        <div class="userInfo">
            <?php
            $user = $userLoggedIn->getFirstAndLastName();
            echo "<h1 class='text-center'>{$user}</h1>";
            ?>
        </div>
    </div>
    <div class="buttonItems">
        <button class="btn btn-green center-block">USER DETAILS</button>
        <button class="btn btn-green center-block" onclick="logout();">LOGOUT</button>
    </div>
</div>
