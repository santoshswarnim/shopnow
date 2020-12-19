<?php 
  session_start();
  if (!isset($_SESSION['email'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['email']);
  	header("location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Shopnow</title>
<link rel="stylesheet" type="text/css" href="homepageStyle.css">
<style type="text/css">
  .category{
     text-decoration: none;
     color: black;
  }

</style>
</head>
<body>
    <div class="upper">
    <ul class="up">

    <?php  if (isset($_SESSION['email'])) : ?>
    <li> <a href="index.php?logout='1'">Logout</a></li>
    <?php endif ?>
   
    <li><a href ="contactus.php">ContactUs</a></li>
    <li><a href ="aboutus.php">AboutUs</a></li>
  </ul>
    <a href="index.php"><img src="shopnow.png" altr="brand pic" width="140px" height="35px"></a>
    <div class="search">
    <form>
      <input type="text" placeholder="Input text you want to search..." name="search">
      <button type="submit">Search</button>
    </form>
  </div>
  </div>
  <div class="categories">
      <ul>
        <li><strong>Categories</strong>
          <ul>
            <li>Electronics
              <ul>
                <li><a href="catePages/Laptop.php" class="category">Laptops</a></li>
                <li><a href="catePages/Desktop.php" class="category">Desktops</a></li>
                <li><a href="catePages/Mobile.php" class="category">Mobiles</a></li>
                <li><a href="catePages/Speaker.php" class="category">Speakers</a></li>
                <li><a href="catePages/LCD.php" class="category">LCD/LED</a></li>
                <li><a href="catePages/Gaming.php" class="category">Gaming Consoles</a></li>
                <li><a href="catePages/Camera.php" class="category">Cameras</a></li>
                <li><a href="catePages/Printer.php" class="category">Printers</a></li>
              </ul>
            <li><a href="catePages/Cosmetic.php" class="category">Cosmetics</a></li>
            <li><a href="catePages/Health.php" class="category">Health & Beauty</a></li>
            <li><a href="catePages/Grocery.php" class="category">Groceries & Pets</a></li>
            <li><a href="catePages/WomenFashion.php" class="category">Women's Fashion</a></li>
            <li><a href="catePages/MenFashion.php" class="category">Men's Fashion</a></li>
            <li><a href="catePages/Sports.php" class="category">Sports & Outdoor</a></li>
            <li><a href="catePages/Automotive.php" class="category">Automotive & Moterbike</a></li>
            <li><a href="catePages/HomeAppliance.php" class="category">TV & Home appliances</a></li>
            </ul>
          </li>
          </ul>
        </li>
      </ul>
    </div>
<hr>
</body>
</html>