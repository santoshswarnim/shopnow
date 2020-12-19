
<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "shopNowDB");

  $hotsaleresult = mysqli_query($db, "SELECT * FROM table_hotsale");
  $productresult = mysqli_query($db, "SELECT PName,CName,Price,Description,Image FROM Products WHERE CName='Latest Product' ");
  $specialSale=mysqli_query($db, "SELECT * FROM tbl_specialSale");
  $specialSale1 = mysqli_query($db, "SELECT * FROM tbl_specialSale");
?>

<?php include ('header.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
.dashain{
  width:auto;
  height:600px;
  position: relative;
  animation: myfirst 1s linear 1s infinite alternate;
}
@keyframes myfirst {
  0%   {background-color:pink;}
  10%  {background-color:yellow;}
  20%  {background-color:orange;}
  30%  {background-color:blue;}
  40% {background-color:purple;}
  50% {background-color:red;}
  60% {background-color:grey;}
  70% {background-color:white;}
  80% {background-color:cyan;}
  90% {background-color:orange;}
  100% {background-color:red;}
}
* {box-sizing: border-box;}
body {font-family: arial, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

.slideshow-container {
  max-width: 100%;
  position: relative;
  margin:auto;
}
.active {
  background-color: #717171;
}
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .8} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .8} 
  to {opacity: 1}
}

span{
    display: inline-block;
    width: 180px;
    white-space: nowrap;
    overflow: hidden !important;
    text-overflow: ellipsis;
  }

</style>
</head>
<body>
<div class="dashain">
<div class="slideshow-container">

  <?php
    while ($row = mysqli_fetch_array($hotsaleresult)) {
      echo "<div class='mySlides fade'>";
        echo "<img src='../admin/Hotsales/".$row['Image']."' style='width:100%;' height= '600px'>";
        /*echo "<div class='text'>".$row['Description']."</div>";*/
      echo "</div>";
    }
  ?>
</div>
</div>
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  slides[slideIndex-1].style.display = "block";  
  setTimeout(showSlides, 4000);
}
</script>

  <div class="teej">
    <?php
      $row = mysqli_fetch_array($specialSale1);
       echo "<h3>".$row['Name']."</h3>";
    ?>
   <!--  <h3>Teej Special</h3> -->
<div class="body">
  <ul>
      <?php
    while ($row = mysqli_fetch_array($specialSale)) {
      echo "<li>";
      echo "<form action='description1.php' method='POST'>";
      echo "<input type='hidden' name='pname' value='".$row['PName']."'/>";
      echo "<input type='hidden' name='cname' value='Special Sale'/>";
      echo "<button type='submit' name='desButton'>";
      echo "<img src='../admin/tbl_specialSale/".$row['Image']."' width='200px' height='180px'>";;
      echo "<h4>".$row['PName']."</h4>";
      echo "<span>".$row['Description']."</span>";
      echo "<p> Price: ".$row['Price']."</p>";
      echo "</button></form>";
      echo "</li>";
    }
  ?>
    </ul>
    </div>
    </div>

  <div class="foryou">
    <h3>Latest Items</h3>
    <ul>

      <?php
    while ($row = mysqli_fetch_array($productresult)) {
      echo "<li>";
      echo "<form action='description1.php' method='POST'>";
      echo "<input type='hidden' name='pname' value='".$row['PName']."'/>";
      echo "<input type='hidden' name='cname' value='Latest Product'/>";
      echo "<button type='submit' name='desButton'>";
      echo"<img src='../admin/Products/".$row['Image']."' width='200px' height='180px'>";;
      echo "<h4>".$row['PName']."</h4>";
      echo "<span>".$row['Description']."</span>";
      echo "<p> Price: ".$row['Price']."</p>";
      echo "</button></form>";
      echo "</li>";
    }
  ?>
</ul>
    </div>
  <?php include ('footer.php') ?>
</body>
</html>