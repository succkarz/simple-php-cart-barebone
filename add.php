<?php
    $pageTitle="Add Products";
    include_once('template/header.php');
    include_once('logic.php');
    
    if(isset($_POST['b1'])){
        addProducts();
    }
?>
<div class="container">
<form action="" method="post" enctype="multipart/form-data">
<div class="row">
    <div class="six columns">
        <label for="title">Title</label>
        <input class="u-full-width" name="title" type="text" id="title">
        <label for="description">Description</label>
        <textarea class="u-full-width" name="description" placeholder="Enter description here..."></textarea>
    </div>
    <div class="six columns">
        <label for="custom-file-input">Select Image</label>
        <input name= "myfile" id="image" type="file" class="custom-file-input">
    </div>
</div>
        <label for="price">Price</label>
        <input type="text" name="price" id="price">
        <input class="button-primary" name="b1" type="submit" value="Submit">
</form>
</div>
<?php
    include_once('template/footer.php');
?>