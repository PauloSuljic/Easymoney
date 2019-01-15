<!DOCTYPE html>
<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<script src="../js/jquery.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
	<style><?php include "style.css";?></style>
	</head>
	<body>
		
		<?php include "includes/header.php";?>

			<div class="container-fluid" style="position: relative; text-align: center;">
				<div class="row">
					<div class="col-sm-12">
						<div style="height:50px;"></div>
						<div class="text1" style="font-size: 32px">Sorry. You must be logged in to offer a job.</div>
						<div style="width:10px;height:15px;"></div>
						<img src="images/sad.png" style="width:10%">
						<div style="width:10px;height:15px;"></div>
						<p style="font-size: 22px;">Don't have an account yet?
							<a href="register.php">&nbsp; SIGN UP HERE</a></p>
						<p style="font-size: 22px;">Or</p><p style="font-size: 22px;">
							<a href="login.php">&nbsp; LOG IN HERE</a></p>
							
					</div>
				</div>
			</div>

			<div style="height:50px;"></div>
			
		<?php include "includes/footer.php";?>
		
	<script>
	function myFunction() {
	  var x = document.getElementById("myTopnav");
	  if (x.className === "topnav") {
		x.className += " responsive";
	  } else {
		x.className = "topnav";
	  }
	}
	</script>

	</body>
</html>
