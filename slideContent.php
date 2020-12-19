<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "shopNowDB");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    // Get image name
    $image = $_FILES['image']['name'];
    // Get text
    //$image_text = mysqli_real_escape_string($db, $_POST['image_text']);
    $des = mysqli_real_escape_string($db, $_POST['description']);

    // image file directory
    $target = "Hotsales/".basename($image);
    $pname=$_POST['pname'];
    $allowTypes = array('jpg','png','jpeg','gif');
    $fileType = pathinfo($target,PATHINFO_EXTENSION);

    if(in_array($fileType, $allowTypes)){
        $sql = "INSERT INTO table_hotsale (PName,Description,Image) VALUES ('$pname','$des','$image')";
        // execute query
        mysqli_query($db, $sql);

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

    $result = mysqli_query($db, "SELECT Image FROM table_hotsale WHERE PName='$pname'");
    $row = mysqli_fetch_array($result);
    $image=$row['Image'];
    $file_to_delete = 'Hotsales/'.$image;
    unlink($file_to_delete);

    $sql = "DELETE FROM table_hotsale WHERE PName='$pname'";
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

<form action="slideContent.php" method="POST" enctype="multipart/form-data">
  <div class="container">
    
   <label for="pname"><b>Product Name:</b></label><br>
    <input type="text" placeholder="Enter Product Name" name="pname" required><br>

    <label><b>Link Description:</b></label><br>
    <textarea id="des" placeholder="Link Description..." name="description"></textarea><br>

    <label style="size:50px;"><b>Input Picture: </b></label><br>
    <input type="file" id="file" name="image"/><br><br>
        
   <button type="submit" name='upload'>Insert </button>
   <button type="submit" name="delete">Delete </button>
</div>
  
</form>

</body>
</html>
