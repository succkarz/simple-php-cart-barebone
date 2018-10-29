<?php
  if(!session_id()){
    session_start();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/custom.js"></script>
    <title><?php echo $pageTitle; ?></title>
</head>
<body>
<header>
  <div class="full-width-container">
    <ul>
        <li><a href="index.php">PRODUCTS</a></li>
        <li><a href="cart.php">CART</a></li>
        <li><a href="add.php">ADD PRODUCTS</a></li>
        <li><a href="#">ABOUT US</a></li>
    </ul>
  </div>
</header>