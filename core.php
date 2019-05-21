<?php 
ob_start();
session_start();
	$host='localhost';
	$user='root';
	$password='';
	$dbname='user';
	$con=mysqli_connect($host,$user,$password,$dbname);
function loggedin(){
	if(isset($_SESSION['userid']) && !empty($_SESSION['userid']))
		return true;
	else
		return false;
}

function test_input($con,$data) {
  $data = trim($data);
  $date=strip_tags($data);
  $data=htmlentities($data);
  $data=mysqli_escape_string($con,$data);
  return $data;
}
 ?>