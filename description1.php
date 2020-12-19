<?php include ('header.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Description</title>
<link rel="stylesheet" type="text/css" href="style.css">
<style>

.cont1{
  float:left;
  margin-left:40px;
  background-image: url('desback.jpg');
  height:530px;
  width:300px;
  border:1px solid rgb(25,25,112);

}

 .btn {
  background-color: rgb(25,25,112);
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
  cursor: pointer;
  opacity: 0.6;
}

 .btn:hover{
  opacity: 1;

 }

 .cont2{
  float:right;
  height:600px;
  width:800px;
 }


 .btn {
  background-color: rgb(25,25,112);
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
  cursor: pointer;
  opacity: 0.6;
}

 .btn:hover{
  opacity: 1;
 }

 #formcontent {
  width:800px;
  height:600px;
  margin-top: 20px;
  margin-bottom: 20px;
  margin-left:220px;
  display:none;
  box-shadow: 2px 2px 15px grey;
  background-color:rgb(25,25,112,0.3);
}

#formcontent input{
  width:300px;
  height:60px;
  margin:15px 20px 20px 250px;
}

#formcontent input:hover{
  background-color:rgb(212,212,212);
  }

#formcontent span{
  margin-left:60px;
}

#method{
  display:inline-block;
}

#method img{
  padding:1px;
  box-shadow: 2px 2px 15px grey;
  opacity:0.8;
}

#method img:hover{
  background-color:rgb(25,25,112);
  opacity:1;

}

.paybtn{
  margin-left:40px
}

#thanku{
  position:absolute;
  z-index:1;
  height:360px;
  width:400px;
  margin-top:-45%;
  margin-left:30%;
  box-shadow: 2px 2px 15px grey;
  background-color:rgb(25,25,112,0.3);
  display:none;
  border-radius: 50px 20px;
}

#esewabar{
  position:absolute;
  z-index:1;
  height:420px;
  width:420px;
  margin-top:-45%;
  margin-left:30%;
  box-shadow: 2px 2px 15px grey;
  background-color:rgb(25,25,112,0.3);
  display:none;
  border-radius: 50px 20px;
}


</style>

<script type="text/javascript">

   function valid(id){
    var mobile= document.getElementById('mobile').value;
    var address= document.getElementById('address').value;
    var form1= document.getElementById('form1').value;

      if(mobile== ""){
      document.getElementById("mob").innerHTML="** please enter mobilenumber";
      return false;  
    }
    
    if(isNaN(mobile)){
      document.getElementById("mob").innerHTML="**mobile number must be digits";
      return false;
    }
    if(mobile.length!=10){
      document.getElementById("mob").innerHTML="**Mobile number must be of 10 digits";
      return false;
    }
    else{
      document.getElementById("mob").innerHTML="";
    }

     if(address== ""){
        document.getElementById("add").innerHTML= "**please insert your address";
        return false;
      }
     if(address.length<=10){
      document.getElementById("add").innerHTML="**please enter the specific address";
      return false;
      }
      else{
      document.getElementById("add").innerHTML="";
    }

    if(id == "cash"){
        thanku();
     }

    if(id == "esewa"){
        esewabar();
    }

  }

  function modify(){
     document.getElementById('formcontent').style.display="block";
     document.getElementById('des').style.display="none";

  }

  function thanku(){
    document.getElementById('thanku').style.display="block";
    document.getElementById('esewabar').style.display="none";
    document.getElementById('formcontent').style.opacity="0"; 
    setTimeout("document.getElementById('form1').submit()", 3000); 

  }

   function esewabar(){
    document.getElementById('esewabar').style.display="block";
    document.getElementById('formcontent').style.opacity="0";

  }
function remove(){
   document.getElementById('formcontent').style.display="none";
   document.getElementById('des').style.display="block"; 
  }

</script>

</head>
<body id="all">

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

        echo '<div id="des">
                <div class="cont1">
                  <center>
                    <h4>'.$row["PName"].'</h4>
                    <p>'.$row["Description"].'</p>
                    <img src="../admin/tbl_specialSale/'.$row["Image"].'" width="298px" height="300px">
                    <p>Price: '.$row['Price'].'</p>
  
                    <button type="button" class="btn" onclick= "modify()"> ShopNow</button>

                  </center>
                </div>';

            echo '<div class="cont2">';
            if($row1["Det1"]!=''){  
              echo '<h3>Details of the Product</h3>
                 <p>'.$row1["Det1"].'<p><hr>';
            }
            if($row1["Det2"]!=''){
               echo '<p>'.$row1["Det2"].'</p><hr>';
            }
            if($row1["Det3"]!=''){
                echo  '<p>'.$row1["Det3"].'</p><hr>';
            }
        echo '</div>
              </div>';
      }

      
      else{
        echo '<div id="des">
                <div class="cont1">
                  <center>
                    <h4>'.$row["PName"].'</h4>
                    <p>'.$row["Description"].'</p>
                    <img src="../admin/Products/'.$row["Image"].'" width="298px" height="300px">
                    <p>Price: '.$row['Price'].'</p>
  
                    <button type="button" class="btn" onclick= "modify()"> ShopNow</button>

                  </center>
                </div>';
            echo '<div class="cont2">';
            if($row1["Det1"]!=''){  
              echo '<h3>Details of the Product</h3>
                 <p>'.$row1["Det1"].'<p><hr>';
            }
            if($row1["Det2"]!=''){
               echo '<p>'.$row1["Det2"].'</p><hr>';
            }
            if($row1["Det3"]!=''){
                echo  '<p>'.$row1["Det3"].'</p><hr>';
            }
        echo '</div>
              </div>';

      }


?>

<div id="formcontent">
  <img src="close.png" width="25px" height="25px" style="float:right;" onclick="remove()"/>
    <form action="database.php" method="post"  name="form1" id="form1">
    <br><br>
    <div id="form">
    <label style="margin-left:250px;"><b>Current Mobile Number:</b></label><br>
    <input type="text" id="mobile" autocomplete="off" placeholder="Number you want to make contact" autofocus=""><br>
    <span style="margin-left:250px; color:red" id="mob" style="color:red"></span>
    <br><br>
    <label style="margin-left:250px;"><b>Current Address:</b></label><br>
    <input type="text" id="address" autocomplete="off" placeholder="Address you want to receive"><br>
    <span style="margin-left:250px; color:red" id="add"></span>
  </div>
    <br><br>


<div id="method">
  <center>
  <h2>Payment Methods</h2></center>
  <button type="button" onclick="valid(this.id)" id="esewa" class="paybtn"><img src="esewa.png" width="200px" height="150px"/></button>
  <img src="khalti.jpg" width="200px" height="150px" class="paybtn"/>
  <button type="button" onclick="valid(this.id)" id="cash" class="paybtn"><img src="Cash.jpg" width="200px" height="150px"/></button>
  </center>
</div>
  </form>
</div>

<div id="thanku">
  <center>
  <h2>Thanks For Choosing Us</h2>
  <img src="thank.png" width="180px" height="200px"/>
  <h3>We will contact you</h3>
  </center>
</div>

<div id="esewabar">
  <center>
  <h2>Scan this code in eSewa app</h2>
  <img src="esewabar.jpg" width="250px" height="250px"/><br><br>
  <button class="btn" onclick="thanku()">Done</button>
  </center>
</div>
<?php include ('footer.php'); ?>
</body>
</html>