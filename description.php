<?php include ('header.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		p {
    		white-space: pre-wrap;
    		margin:-5px;
		}
	</style>
</head>
<body>
	<h1>This is description page</h1>
  <div>
	<?php

		$pname= $_POST['pname'];
		$cname= $_POST['cname'];
		 $db = mysqli_connect("localhost", "root", "", "shopNowDB");
		 $result = mysqli_query($db, "SELECT PName,Price,Description,Image FROM Products WHERE PName='$pname'");
		 $result1 = mysqli_query($db, "SELECT Det1,Det2,Det3 FROM Details WHERE PName='$pname'");
		 $result2 = mysqli_query($db, "SELECT Images FROM DetailImages WHERE PName='$pname'");

		  	$row = mysqli_fetch_array($result);
  			 $row1 = mysqli_fetch_array($result1);
  			 $row2 = mysqli_fetch_array($result2);

  		if ($cname=='Special Sale') {

  			echo "<img src='../admin/tbl_specialSale/".$row['Image']."'style='width:10%; height:10%;' >";
  			echo '<br>';
  			echo "<p>".$row['PName']."</p>";
  			echo '<br>';
  			echo "<p>".$row['Price']."</p>";
  			echo '<br>';
  			echo "<p>".$row['Description']."</p>";
  			echo '<br>';
  			echo "<p>".$row1['Det1']."</p>";
  			echo '<br>';
  			echo "<p>".$row1['Det2']."</p>";
  			echo '<br>';
  			echo "<p>".$row1['Det3']."</p>";
  		}

  		else{
	  		echo "<img src='../admin/Products/".$row['Image']."'style='width:10%; height:10%;' >";
	  		echo '<br>';
	  		echo "<p>".$row['PName']."</p>";
	  		echo '<br>';
	  		echo "<p>".$row['Price']."</p>";
	  		echo '<br>';
	  		echo "<p>".$row['Description']."</p>";
	  		echo '<br>';
  			echo "<p>".$row1['Det1']."</p>";
  			echo '<br>';
  			echo "<p>".$row1['Det2']."<p>";
  			echo '<br>';
  			echo "<p>".$row1['Det3']."</p>";
	  	}
	?>
</div>
<hr>
<?php include ('footer.php') ?>
</body>
</html>