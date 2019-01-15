<?php session_start();
	include 'includes/db.php';
	
	$login_err = '';
	
	if(isset($_GET['login_error'])){
		if($_GET['login_error'] == 'empty'){
			$login_err = '<div class = "alert alert-danger"> Username or Password was empty!</div>';
		}elseif($_GET['login_error'] == 'wrong'){
			$login_err = '<div class = "alert alert-danger"> Username or Password was wrong!</div>';
		}elseif($_GET['login_error'] == 'query_error'){
			$login_err = '<div class = "alert alert-danger"> There is some kind of database issue!</div>';
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
		<h2>Log in and start working!</h2>
			<div class="container" align="center"> 
				<div style="width:10px;height:40px;"></div>
				<?php echo $login_err; ?>				
				<form class="form" action="accounts/login.php" method="post" role="form">
					<div class="form-group">
						<label for="username" class="control-label col-sm-2"><b>USERNAME</b></label>
						<div class="col-sm-5">
							<input type="text" id="username" class="form-control" placeholder="Username" name="username" required> 
						</div>
					</div>
					
					<div style="width:10px;height:25px;"></div>
					
					<div class="form-group">
						<label for="password" class="control-label col-sm-2"><b>PASSWORD</b></label>
						<div class="col-sm-5">
							<input type="password" id="password" class="form-control" placeholder="Password" name="password" required> 
						</div>
					</div>
					
					<div class="form-group">
						<label  class="control-label col-sm-2"></label>
						<div class="col-sm-4">
							<input type="submit" class="btn btn-success btn-block" id="submit_login" name="submit_login" value="LOG IN"> 
						</div>
					</div>
				</form>
				
				
				<p style="font-size: 22px;">Don't have an account yet?
					<a href="register.php">&nbsp; SIGN UP HERE</a></p>
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