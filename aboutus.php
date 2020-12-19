<?php include ('header.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Shopnow</title>
<link rel="stylesheet" type="text/css" href="homepageStyle.css">

<style>
body{
background-color:rgb(212,212,212);
}
.welcome{
	width:500px;
	height:300px;
	float:right;
	margin-right:600px;
	background-color:rgb(25,25,112);
	color:white;
}
.welcome img{
	z-index: -1;
	float:left;
}
.welcome p{
	text-align: justify;
	float:right;
}
.details ul{

	float:left;
  margin:10px;

}
.details ul li{
	width:400px;	
  margin:5px;
}
</style>
</head>
<body>
<img src="ceo.jpg" width="200px" height="200px">	
<div class="welcome">
	<h2>Messege from CEO</h2>
	<p>It is to inform you that i am glad that our customers are satisifed by our services.
		In early 2010 I had a thought to launch a e-Commerce site but it is hard to find similar minded person
		so it was halt. An in 2015 my thought were finally put into action and we are here celebrating the milestone of our life.
		I am happy that you accepted my way of serving people in a easy and efficient way. </p> 
</div>
<div class="details">
<ul>
	<li>
	<h2>Our Story</h2>
	<p> ShopNow is an international business which has been serving since 2015. In nepal it was established in
		2017 and serving with a quality product as well as interactive Customer service. We have branches in four countries i.e. USA, Germany, Norway and Bhutan. Our head office is in Baneshor kathmandu.

		We have total 10,000 staff all over world.</p>
	</li>
<li>
	<h2> Our goals</h2>
	<ul>
		<li>Quality of Service</li>
		<li>Easy accesibilty</li>
		<li>Great reachability</li>
		<li>Easy refund mehanism</li>
		<li>Timley delivery</li>
		<li>Reactive custimer service</li>
	</ul>
</li>
<li>
		<h2>Our Programs</h2>
		<ul>
			<li>Social Service</li>
			<li>Library setup in rural areas</li>
			<li>Donation for earthquake victims</li>
			<li>Actively take part in blood donation</li>
		</ul>
</li>
 </ul>
</div>
<?php include ('footer.php');?>
</body>
</html>