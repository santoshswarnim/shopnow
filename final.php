<?php
session_start();
// initializing variables
$email = "";
   
$errors = array(); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$a=0;
$code= $_POST['verify'];
$query = " SELECT * from tab ";
$Result = mysqli_query($conn,$query);
?>
<?php
while($row=mysqli_fetch_assoc($Result))
{
    $msg = $row['vp'];
    if($msg==$code)
    {
        $a=1;
    }
}   
if($a==1)
{

    $delete="TRUNCATE table tab";
    mysqli_query($conn,$delete);

    $username=$_SESSION['username'];
    $mobilenumber=$_SESSION['mobileNumber'];
    $temporaryaddress=$_SESSION['tempAddress'];
    $email=$_SESSION['email'];
    $password=$_SESSION['password'];
    $gender=$_SESSION['gender']; 
    if (count($errors) == 0) {
    $password = md5($password);//encrypt the password before saving in the database

    $query = "INSERT INTO users (email, password,username,temAddress,phoneNumber,Gender) 
              VALUES('$email', '$password','$username','$temporaryaddress','$mobilenumber','$gender')";
    mysqli_query($conn, $query);
    $_SESSION['name']=$username;
    $_SESSION['email'] = $email;
    header('location: index.php');
    }
}
else
{

    echo '<script> alert("Verification code did not matched")</script>';
    include("verify.php");
}

$conn->close();
?>