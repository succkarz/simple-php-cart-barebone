<?php
    $pageTitle="Products";
    include_once('template/header.php');
    require_once('logic.php');
    if(isset($_REQUEST['atc'])&&!$_REQUEST['atc']==0){
        if(isset($_SESSION['cart'])&&!$_SESSION['cart']==0){
            $item=$_REQUEST['atc'];
            $items=explode(',',$_SESSION['cart']);
            if(in_array($item,$items)){
                echo "<script>alert('Item already in cart.');</script>";
            }else{
                $_SESSION['cart'].=",$item";
                echo "<script>alert('Item added to cart.`');</script>";
/*                 echo "<script>alert('Item added to cart');</script>"; */
            }
        }else{
            $item=$_REQUEST['atc'];
            $_SESSION['cart']=$item;
/*             echo "<script>alert('Item added to cart');</script>"; */
        }
    }
    displayProducts();
    include_once('template/footer.php');
?>