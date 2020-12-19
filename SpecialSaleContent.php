<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "shopNowDB");

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    // Get image name
    $image = $_FILES['image']['name'];
    // Get text
    $des = mysqli_real_escape_string($db, $_POST['description']);

    // image file directory
    $target = "tbl_specialSale/".basename($image);
    $sname=$_POST['sname'];
    $pname=$_POST['pname'];
    $price=$_POST['price'];
    $det1=$_POST['det1'];
    $det2=$_POST['det2'];
    $det3=$_POST['det3'];

    $targetDir = "DetailImages/";
    $allowTypes = array('jpg','png','jpeg','gif');

    $fileType = pathinfo($target,PATHINFO_EXTENSION);
    if(in_array($fileType, $allowTypes)){
        foreach($_FILES['images']['name'] as $key=>$val){
              // File upload path
              $fileName = basename($_FILES['images']['name'][$key]);
              $targetFilePath = $targetDir . $fileName;
              
              // Check whether file type is valid
              $fileType1 = pathinfo($targetFilePath,PATHINFO_EXTENSION);
              if(in_array($fileType1, $allowTypes)){
                  // Upload file to server
                  if(move_uploaded_file($_FILES["images"]["tmp_name"][$key], $targetFilePath)){
                      // Image db insert sql
                      $sql = "INSERT INTO DetailImages (PName,Images) VALUES ('$pname','$fileName')";
                    // execute query
                      mysqli_query($db, $sql);
                  }
              }
               else
                {
                  echo $fileName."<script>alert(' is not supported. Unable to insert file')</script>";
                }
          }

          $sql1 = "INSERT INTO Details (PName,Det1,Det2,Det3) VALUES ('$pname','$det1','$det2','$det3')";
            mysqli_query($db, $sql1);

             $sql2 = "INSERT INTO Products (PName,CName,Price,Description,Image) VALUES ('$pname','$sname','$price','$des','$image')";
            mysqli_query($db, $sql2);

          $sql3 = "INSERT INTO tbl_specialSale (Name,PName,Price,Description,Image) VALUES ('$sname','$pname','$price','$des','$image')";
            mysqli_query($db, $sql3);
             if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo "<script>alert('Product Data is inserted Successfully')</script>";
          }
          else{
            echo "<script>alert('Failed to upload image')</script>";
          }
    }
    else{
      echo "<script>alert('File format not supported. Unable to insert file')</script>";
    }
  }


  if (isset($_POST['delete'])){

    $pname=$_POST['pname'];

     $sql = "DELETE FROM Products WHERE PName='$pname'";
    // execute query
    mysqli_query($db, $sql);

     $sql = "DELETE FROM Details WHERE PName='$pname'";
    // execute query
    mysqli_query($db, $sql);

    $result=mysqli_query($db, "SELECT Images FROM DetailImages WHERE PName='$pname'");
    while ($row = mysqli_fetch_array($result)) {
      $image= $row['Images'];
      $file_to_delete = 'DetailImages/'.$image;
      unlink($file_to_delete);

    }
    $sql = "DELETE FROM DetailImages WHERE PName='$pname'";
    // execute query
    mysqli_query($db, $sql);


    $result1 = mysqli_query($db, "SELECT Image FROM tbl_specialSale WHERE PName='$pname'");
    $row1 = mysqli_fetch_array($result1);
    $image1=$row1['Image'];
    $file_to_delete1 = 'tbl_specialSale/'.$image1;
    unlink($file_to_delete1);

    $sql = "DELETE FROM tbl_specialSale WHERE PName='$pname'";
    // execute query
    mysqli_query($db, $sql);
    echo "<script>alert('The Product is Deleted')</script>";
  }
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="topnav.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: #008B8B
}
form {border: 3px solid #f1f1f1;}

input[type=text],textarea {
  width: 25%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color:#9ACD32;
  color: black;
  padding: 14px 20px;
  margin: 8px 0;
  margin-left: 50px;
  border-radius: 30px;
  cursor: pointer;
  width: 20%;
}

button:hover {
  opacity: 0.8;
}


.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
  <div class="topnav">
    <center><h1 style="font-family: 'Californian FB'; font-size: 70px; color: brown;">Shopnow Admin Panel</h1></center><hr>
  <a href="LatestProduct.php">New Product</a>
  <a href="slideContent.php">Slide Show Content</a>
  <a href="SpecialSaleContent.php">Special Sale Content</a>
</div>

<form action="SpecialSaleContent.php" method="POST" enctype="multipart/form-data">
  <div class="container">
    
    <label for="sname"><b>Special Sale Name:</b></label><br>
    <input type="text" placeholder="Enter Special Sale Name" name="sname" required><br>

   <label for="pname"><b>Product Name:</b></label><br>
    <input type="text" placeholder="Enter Product Name" name="pname" required><br>

    <label for="price"><b>Price of Procuct</b></label><br>
    <input type="text" placeholder="Enter Price" name="price" ><br>

    <label><b>Short Description:</b></label><br>
    <textarea id="des" placeholder="Short Description about Product...." name="description" ></textarea><br>

    <label style="size:50px;"><b>Input Picture: </b></label><br>
    <input type="file" name="image" /><br><br>

    <label><b>Detail1:</b></label><br>
    <textarea id="des" placeholder="Detail about Product...." name="det1" ></textarea><br>

    <label><b>Detail2:</b></label><br>
    <textarea id="des" placeholder="Detail about Product...." name="det2" ></textarea><br>

    <label><b>Detail3:</b></label><br>
    <textarea id="des" placeholder="Detail about Product...." name="det3" ></textarea><br>

    <label style="size:50px;"><b>Input Detail Images: </b></label><br>
    <input type="file" name="images[]" multiple /><br><br>
        
   <button type="submit" name="upload">Insert </button>
   <button type="submit" name="delete">Delete </button>
</div>
  
</form>

</body>
</html>






