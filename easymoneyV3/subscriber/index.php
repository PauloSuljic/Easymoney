<?php session_start();
	include 'includes/db.php';
	if (isset($_SESSION['user']) && isset($_SESSION['password']) == true){
		$sel_sql = "SELECT * FROM register_info WHERE username = '$_SESSION[user]' AND password = '$_SESSION[password]'";
		if ($run_sql = mysqli_query($conn, $sel_sql)){
			if (mysqli_num_rows($run_sql) == 1){
			}else{
				header ('Location../index.php');
			}
		}
	}else{
		header('Location:../index.php');
	}

		if(isset($_POST['btn1'])){
		if (isset($_SESSION['user']) && isset($_SESSION['password']) == true){
		$sel_sql = "SELECT * FROM register_info WHERE username = '$_SESSION[user]' AND password = '$_SESSION[password]'";
		if ($run_sql = mysqli_query($conn, $sel_sql)){
			if (mysqli_num_rows($run_sql) == 1){
			}else{
				header ('Location: offer.php');
			}
		}
	}else{
		header('Location:offer_error.php');
	}
	}
	
	if(isset($_POST['btn2'])){
		if (isset($_SESSION['user']) && isset($_SESSION['password']) == true){
		$sel_sql = "SELECT * FROM register_info WHERE username = '$_SESSION[user]' AND password = '$_SESSION[password]'";
		if ($run_sql = mysqli_query($conn, $sel_sql)){
			if (mysqli_num_rows($run_sql) == 1){
			}else{
				header ('Location: offer.php');
			}
		}
	}else{
		header('Location:offer_error.php');
	}
	}
?>

<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
	<script src="../../js/jquery.js"></script>
	<script src="../../bootstrap/js/bootstrap.js"></script>
	
	<script defer src="../../bootstrap/js/fontawesome-all.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/fontawesome.min.css"> 
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
	<style><?php include "../logged_style.css";?></style>
	</head>
	
	<body>
		
		<?php include "includes/header.php";?>

			<div class="container-fluid" style="position: relative; text-align: center;">
				<div class="row">
					<div class="col-sm-12-fluid">
						<img class="mainImage" alt="" src="../images/dog2.jpg">
							<form class="form" action="search.php" method="post" role="form">
								<button type="submit" name="btn2" id="btn1" class="btn btn-lg btn-light text-dark"><i class="fa fa-map-marker-alt"></i>&nbsp Search for a job!
								</button>
							</form>
						<div class="imageTxt">Search. Find. Earn!</div>
					</div>
				</div>
			</div>
			
			<div style="height:50px;"></div>
			
			<div class="container-fluid" style="position: relative; text-align: center;">
				<div class="row">
					<div class="col-sm-6">
						<img class="secImage" alt="" src="../images/phone.jpg">
					</div>
					<div class="col-sm-6" style="padding-top: 50px;">
						<form class="form" action="offer.php" method="post" role="form">
							<button type="submit" name="btn2" id="btn2" class="btn btn-lg btn-light text-dark"><i class="fa fa-map-marker-alt"></i>&nbsp Offer a job!
							</button>
						</form>
						<div class="text1">You got to much to do, but no time or help?</div>
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



