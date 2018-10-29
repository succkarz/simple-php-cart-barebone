<?php
    $pageTitle="Cart";
    include_once('template/header.php');
    include_once('logic.php');
    deleteCart();
    displayCart();

    include_once('template/footer.php');
?>