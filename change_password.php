<?php 
	require 'core.php';
	if(!loggedin())
		header('Location: login.php');

  if( isset($_POST['curpw']) && !empty($_POST['curpw']) && isset($_POST['newpw']) && !empty($_POST['newpw']) && isset($_POST['repw']) && !empty($_POST['repw']) ){

    $current=$_POST['curpw'];
    $current=md5($current);
    $new=$_POST['newpw'];
    $re=$_POST['repw'];
    $id=$_SESSION['userid'];
    $query="SELECT password FROM names WHERE id='$id' ";
    $qr=mysqli_query($con,$query);
    if($qr){
      $row=mysqli_fetch_assoc($qr);
      if(!strcmp($row['password'], $current) && !strcmp($new, $re)){
          
          $new=md5($new);
          $query1="UPDATE names SET password='$new' WHERE id='$id' ";
          $qr1=mysqli_query($con,$query1);
          if($qr1)
              echo '<script>alert("PASSWORD SUCCESSFULLY UPDATED");window.location.href="welcome.php"</script>';
          else
              echo '<script>alert("FAILED TO UPDATE PASSWORD");window.location.href="changepw.php"</script>';
      }else
          echo '<script>alert("CURRENT PASSWORD IS INCORRECT OR PASSWORDS DIDNOT MATCH");window.location.href="changepw.php"</script>';

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
  	<link rel="stylesheet" type="text/css" href="weldesign.css">
  	<script type="text/javascript" src="welres.js"></script>
 </head>
 <body>
 		<div class="container-fluid" id="box1">
 			<nav class="navbar">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">SADDA CAMPUS</a>
                    <img alt="logo" src="index1.jpg" class="img-responsive" width="50" height="50"/>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#box">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collape navbar-collapse" id="box">
                    <ul class="nav navbar-nav">
                        <li><a href="welcome.php">HOME PAGE</a></li>
                        <li><a href="#">CONTACT</a></li>
                    </ul>
                    <ul class="nav navbar-right">
						<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Profile<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="changepw.php">Change password</a></li>
                                <li><a href="logout.php">Log out</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-right">
                    	<li><a href="#">HELLO <?php echo $_SESSION['usern'] ?></a></li>
                    </ul>
                </div>
       </nav>
      <div id="box2">
        <h2>Change Password</h2>
        </br>
        <form role="form" action="changepw.php" method="POST">
        <div class="form-group">
            <label for="password">Enter current password:</label>
            <input type="password" class="form-control"  name="curpw" required>
        </div>
        <div class="form-group">
            <label for="password">Enter new password:</label>
            <input type="password" class="form-control"  name="newpw" required>
        </div>
        <div class="form-group">
            <label for="password">Re-enter current password:</label>
            <input type="password" class="form-control"  name="repw" required>
        </div>
        
        
        <input type="submit" name="submit" value="CHANGE">
      </form>
      </div>

    </div>


 </body>
 </html>