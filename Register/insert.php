<?php

session_start();

//Connect to server.
$con=mysqli_connect('localhost','root');
if(!$con){
	die("Server Connection Failed" . mysqli_error($con));
}


//Connect to database.
$db=mysqli_select_db($con,'social_certificate');
if(!$db){
	die("Database Connection Failed" . mysqli_error($db));
}


$name=$_POST['name'];
$email=$_POST['email'];
$post=$_POST['post'];
$start_date=$_POST['Start_date'];
$end_date=$_POST['end_date'];

$q="INSERT INTO `intern`(`NAME`, `EMAIL`, `POST`, `START_DATE`, `END_DATE`) VALUES ('$name','$email','$post','$start_date','$end_date')";

$result=mysqli_query($con,$q);

if($result){
	echo "<script>
	alert('Successfully entered details');
	window.location.href='http://localhost/Social_Certficate/Register/';
	</script>";
}else{
	echo "<script>
	alert('Not Successfully.Please try again');
	window.location.href='http://localhost/Social_Certficate/Register/';
	</script>";
}
