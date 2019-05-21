<?php 
	require 'core.php';
	if(!loggedin())
		header('Location: login.php');
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
       

        	<div class="tab">
  				<button class="tablinks" onclick="openTab(event, 'order')">ORDER DETAILS</button>
  				<button class="tablinks" onclick="openTab(event, 'restaurant')">RESTAURANTS</button>
  				<button class="tablinks" onclick="openTab(event, 'trans')">TRANSACTION</button>
			</div>

			<div id="order" class="tabcontent">
  				<div class="row">
  					<div class="col-md-6">
  						<h2>Enter date for order-info</h2>
  						<form role="form" action="ordate.php" method="POST">
    						<div class="form-group">
      							<label for="date">Date : </label>
      							<input type="date" class="form-control"  name="date" required>
   							</div>
   							<input type="submit" name="submit">
   						</form>
   					</div>
   					<div class="col-md-6">
  						<h2>Enter start date and end date (both inclusive) for order-info</h2>
  						<form role="form" action="rorder.php" method="POST">
    						<div class="form-group">
      							<label for="sdate">Start Date : </label>
      							<input type="date" class="form-control"  name="sdate" required>
   							</div>
   							<div class="form-group">
      							<label for="edate">End Date : </label>
      							<input type="date" class="form-control"  name="edate" required>
   							</div>
   							<input type="submit" name="submit">
   						</form>
   					</div>
   				</div>
    		
  		
			</div>

			<div id="restaurant" class="tabcontent">
          <h2>Select restaurant</h2>
          <form role="form" action="restau.php" method="POST">
                <div class="form-group">
                    <select name="restau_list">
                      <?php 
                      $query="SELECT code,name FROM restraunt WHERE 1";
                      $qr=mysqli_query($con,$query);
                      if($qr){
                          $list=array();
                          
                          while($row=mysqli_fetch_assoc($qr)){
                              $list[$row['code']]=$row['name'];
                          }
                      }
                          foreach ($list as $key => $value) {
                            echo "<option value=".$key.">".$value."</option></br>";
                          }
                       ?>
                    </select>
                </div>
                <input type="submit" name="submit">
              </form>
      </div>
			

			<div id="trans" class="tabcontent">
  				<h2>Enter parameters to check transactions</h2>
  				<form role="form" action="ordert.php" method="POST">
                <div class="form-group">
                    <label for="sdate">Start Date : </label>
                    <input type="date" class="form-control"  name="sdate" required>
                </div>
                <div class="form-group">
                    <label for="edate">End Date : </label>
                    <input type="date" class="form-control"  name="edate" required>
                </div>
                <input type="submit" name="submit">
              </form>
			</div>

    	</div>


 </body>
 </html>