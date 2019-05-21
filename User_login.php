<?php 

	$host='localhost';
	$user='root';
	$password='';
	$dbname='user';
	$con=mysqli_connect($host,$user,$password,$dbname);

	require 'core.php';
	
	if(loggedin())
		header('Location: welcome.php');
	
	if(isset($_POST['username']) && isset($_POST['password'])){
		$un=$_POST['username'];
		$pw=$_POST['password'];
    $un=test_input($con,$un);
    $pw=test_input($con,$pw);
    $pw=md5($pw);

		if(!empty($un) && !empty($pw)){
			$query="SELECT id, uname FROM names WHERE uname='$un' AND password='$pw' ";
			$qr=mysqli_query($con,$query);
			if($qr){
				if(mysqli_num_rows($qr)==0){
					$_SESSION['error']='Incorrect username or password!';
					header('Locstion: login.php');
				}
				else{
						$row = mysqli_fetch_row($qr);
					    $uid=$row[0];
					    $_SESSION['userid']=$uid;
					    $_SESSION['usern']=$row[1];
					    header('Location: welcome.php');
				}
			}
		}
	}
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Saddacampus-Online Food Delivery for the College Students</title>
  	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <style type="text/css">
        .jumbotron , #error,.container{
          background-color: #00ccff;
          font:120%;

        }
        body{
        	padding-top: 1.75%;
        	padding-bottom: 1.75%;
        	background-color: #8582AD;
        }
        #error{
        	font-size: 200%;
        	border: 0px;
        }
        #box{
        	width: 60%;
        	border: 2px black solid;
        	padding-top: auto;
        	border-radius: 15px;
        	padding-left: 15%;
        	padding-right: 15%;
        }
    </style>
</head>
<body>
	<div id="box" class="container">
      	<div class="jumbotron">
        	<img src="index1.jpg" class="image">
          	<h2>SaddaCampus Control Panel</h2>
      	</div>
		<form role="form" action="login.php" method="POST">
    		<div class="form-group">
      			<label for="username">Username:</label>
      			<input type="username" class="form-control"  name="username" required>
   			</div>
   			<div class="form-group">
    			<label for="pwd">Password:</label>
      			<input type="password" class="form-control" name="password" required>
    		</div>
    		<input type="submit" name="submit" value="LOGIN">
  		</form>

  		<div id="error" class="alert alert-danger">
  			<?php if(!empty($_SESSION['error'])) {
  			 			echo $_SESSION['error'];
  					} 
  			?>
  		</div>
  		<?php unset($_SESSION['error']); ?>
	</div>
</body>
</html>