<?php

include 'includes/includedFiles.php';

?>

<div class="user-details">
    <div class="container border-bottom">
        <h2 class="text-center">EMAIL</h2>
        <input type="email" class="email" name="email" placeholder="Email Address"
               value="<?php echo $userLoggedIn->getEmailAddress(); ?>">
        <span class="message"></span>
        <button class="btn btn-green" onclick="">SAVE</button>
    </div>
    <div class="container">
        <h2 class="text-center">PASSWORD</h2>
        <input type="password" class="old-password" name="old-password" placeholder="Current Password">
        <input type="password" class="new-password" name="new-password" placeholder="New Password">
        <input type="password" class="confirm-password" name="confirm-password" placeholder="Confirm New Password">
        <span class="message"></span>
        <button class="btn btn-green" onclick="">SAVE</button>
    </div>
</div>
