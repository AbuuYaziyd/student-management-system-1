<?php require('partials/head.php')?>
    <h1 class="text-center">Home Page</h1>
    <?php if(isset($_SESSION['login'])): ?>
    <p class="text-center">You have now access to courses and students</p>
    <?php else:?>
    <h5 class="text-center">Login to Continue...</h5>
    <?php endif;?>
<?php require('partials/footer.php');?>
