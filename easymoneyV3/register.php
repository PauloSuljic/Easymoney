<?php
	include "includes/db.php";
	$match = '';
	if(isset($_POST["submit_btn"])){
		if ($_POST['password'] == $_POST['conf_password']){
			$date = date ("Y-m-d h:i:s");
			$ins_sql = "INSERT INTO register_info (name, username, email, password, country, user_date, role) VALUES 
			('$_POST[name]','$_POST[username]','$_POST[email]', '$_POST[password]', '$_POST[country]', '$date', 'subscriber')";
			$run_sql = mysqli_query($conn, $ins_sql);
			$match = '<div class = "alert alert-success">Registration finished successfully! <br> <a href="login.php">Login Here!</a></div>';
		}else{
			$match = '<div class = "alert alert-danger">Password does not match!</div>';
		}
	}
?>

<!DOCTYPE html>

<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EasyMoney Official</title>
	
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<script src="../js/jquery.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
	<style><?php include "style.css";?></style>
	</head>
	
	<body>
		<?php include "includes/header.php"; ?>
		
		<div style="width:10px;height:50px;"></div>
		<h2>Sign up in just few clicks!</h2>
			<div class="container" align="center"> 
				<div style="width:10px;height:50px;"></div>
		        <?php echo $match; ?>                        			
				<form class="form" action="register.php" method="post" role="form">
					<div class="form-group">
						<label for="name" class="control-label col-sm-2"><b>NAME</b></label>
						<div class="col-sm-5">
							<input type="text" id="name" class="form-control" placeholder="Full Name" name="name" required> 
						</div>
					</div>
					
					<div style="width:10px;height:25px;"></div>
					
					<div class="form-group">
						<label for="username" class="control-label col-sm-2"><b>USERNAME</b></label>
						<div class="col-sm-5">
							<input type="text" id="username" class="form-control" placeholder="Username" name="username" required> 
						</div>
					</div>
					
					<div style="width:10px;height:25px;"></div>
					
					<div class="form-group">
						<label for="email" class="control-label col-sm-2"><b>EMAIL ADRESS</b></label>
						<div class="col-sm-5">
							<input type="email" id="email" class="form-control" placeholder="Email Adress" name="email" required> 
						</div>
					</div>
					
					<div style="width:10px;height:25px;"></div>
					
					<div class="form-group">
						<label for="password" class="control-label col-sm-2"><b>PASSWORD</b></label>
						<div class="col-sm-5">
							<input type="password" id="password" class="form-control" placeholder="Password" name="password" required> 
						</div>
					</div>
					
					<div style="width:10px;height:25px;"></div>
					
					<div class="form-group">
						<label for="conf_password" class="control-label col-sm-2"><b>CONFIRM PASSWORD</b></label>
						<div class="col-sm-5">
							<input type="password" id="conf_password" class="form-control" placeholder="Confirm Password" name="conf_password" required> 
						</div>
					</div>
					
					<div style="width:10px;height:25px;"></div>
					
					<div class="form-group">
						<label for="password" class="control-label col-sm-2"><b>LOCATION</b></label>
						<div class="col-sm-5">
							<input type="text" id="country" class="form-control" placeholder="Where are you from?" name="country" required> 
						</div>
					</div>	
					
					<div class="form-group">
						<label  class="control-label col-sm-2"></label>
						<div class="col-sm-4">
							<input type="submit" class="btn btn-success btn-block" name="submit_btn" value="REGISTER"> 
						</div>
					</div>
				</form>
				
				
				<p style="font-size: 22px;">Already have an account?
					<a href="login.php">&nbsp; LOG IN HERE</a></p>
					<div style="width:10px;height:30px;"></div>
				
			</div>
		
		<div>
			<?php include "includes/footer.php"; ?>
		</div>
		<script>
			function activatePlacesSearch(){
				var input = document.getElementById('country');
				var autocomplete = new google.maps.places.Autocomplete(input);
			}
		</script>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLyw0zACeGCSbzHAzeWB9W-Akpm7zBKnw&libraries=places&callback=activatePlacesSearch">
		</script>
	</body>
</html>