<?php
    require_once('template/config.php');

    function dProduct(){
        if(isset($_REQUEST['id'])&&!empty($_REQUEST['id'])){
                $id=$_REQUEST['id'];
                $db=new con();
                $link=$db->db_connect();
                $qry="select * from products where id=$id;";
                $res=mysqli_query($link,$qry);
                if(mysqli_num_rows($res) > 0){
                        $row=mysqli_fetch_assoc($res);
                        echo "<div class='container'>";
                        echo "<strong>$row[title]</strong><br/>";
                        echo "<img width='15%' height='15%' src='prod-img/$row[image]'/> <br>";
                        echo "<strong>Description:</strong> $row[description]<br/>";
                        echo "<strong>Price:</strong> $$row[price]<br/>";
                        echo "<a href='cart.php?remove=$row[id]'><strong>Remove from cart.</strong></a>";
                        echo "</div>";
                }
        }
    }
    function displayProducts(){
        $db=new con();
        $link=$db->db_connect();
        $qry='select * from products;';
        $res=mysqli_query($link,$qry);
        if(mysqli_num_rows($res) > 0){
                echo "<div class='container'>";
                while($row=mysqli_fetch_assoc($res)){
                        echo "<div class='one-half column' style='margin-left: 1em;'>";
                        echo "<strong>$row[title]</strong><br/>";
                        echo "<img width='150px' height='250px' src='prod-img/$row[image]'/> <br>";
                        echo "<strong>Description:</strong> $row[description]<br/>";
                        echo "<strong>Price:</strong> $$row[price]<br/>";
                        echo "<a href='index.php?atc=$row[id]'><strong>Add To Cart</strong></a>";
                        echo "<hr>";
                        echo "</div>";
                }
                echo "</div>";
        }
    }

    function displayCart(){
        if(isset($_SESSION['cart'])&&$_SESSION['cart']!==0){
                $items = explode(',',$_SESSION['cart']);
                $arraySize=sizeof($items);
                $db=new con();
                $link=$db->db_connect();
                echo "<div class='container'>";
                echo "<table>";
                echo "<th>Title</th>";
                echo "<th>Price</th>";
                $total = 0;
                for($i=0;$i<$arraySize;$i++){
                    $qry="select id,title,price from products where id=$items[$i];";
                    $res=mysqli_query($link,$qry);
                    if(mysqli_num_rows($res) > 0){
                        while($row=mysqli_fetch_assoc($res)){
                            echo "<tr>";
                            echo "<td><a href='product.php?id=$row[id]'>$row[title]</a></td>";
                            echo "<td>$row[price]</td>";
                            echo "<td><a href='cart.php?remove=$row[id]'>x</a></td>";
                            echo "</tr>";
                            $total = $total + $row['price'];
                        }
                }
                }
                echo "</table>";
                echo "<strong>TOTAL: $".$total."</strong>";
                echo "</div>";
            }else{
                echo "<div class='container'>
                <h3 style='margin-bottom:0;'>Cart is empty</h3>
                <br>
                <a href='index.php'>Browse Products</a>
                </div>";
            }
    }

    function deleteCart(){
        if(isset($_REQUEST['remove'])){
                $itemid = $_REQUEST['remove'];
                $itemslist = explode(',',$_SESSION['cart']);
                $key=array_search($itemid,$itemslist);
                unset($itemslist[$key]);
                $totalitems=sizeof($itemslist);
                if(!$totalitems==0){
                    $_SESSION['cart'] = implode(',',$itemslist);
                }
                else{
                    unset($_SESSION['cart']);
                }
            }
    }

    function addProducts(){
        $title=htmlspecialchars($_POST['title']);
        $price=htmlspecialchars($_POST['price']);
        $description=htmlspecialchars($_POST['description']);
        $date=date("Y-m-d");
        $db=new con();
        $link=$db->db_connect();
        $imageName=addImage($title);
        $qry="insert into products values(NULL,'$title',$price,'$description','$date','$imageName');";
        $res=mysqli_query($link,$qry) or die(mysqli_error($link));
        echo $res;
        if($res){
            echo 'data added';
        }else{
            echo 'failed';
        }
    }

    function addImage($title){
        $uploadDirectory = "prod-img/";
    
        $errors = []; // Store all foreseen and unforseen errors here
    
        $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions
    
        $fileName = time().'-'.$_FILES['myfile']['name'];
        $fileSize = $_FILES['myfile']['size'];
        $fileTmpName  = $_FILES['myfile']['tmp_name'];
        $fileType = $_FILES['myfile']['type'];
        $tmpEXT=explode('.',$fileName);
        $fileExtension = strtolower(end($tmpEXT));
    
        $uploadPath = $uploadDirectory . basename($fileName); 
    
        if (isset($_POST['b1'])) {
    
            if (! in_array($fileExtension,$fileExtensions)) {
                $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
            }
    
            if ($fileSize > 20000000) {
                $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
            }
    
            if (empty($errors)) {
                $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
    
                if ($didUpload) {
                    echo "The file " . basename($fileName) . " has been uploaded";
                } else {
                    echo "An error occurred somewhere. Try again or contact the admin";
                }
            } else {
                foreach ($errors as $error) {
                    echo $error . "These are the errors" . "\n";
                }
            }
        }
        return $fileName;
    }