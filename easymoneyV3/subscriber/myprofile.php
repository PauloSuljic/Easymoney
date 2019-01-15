<?php session_start();
	include 'includes/db.php';
	if (isset($_SESSION['user']) && isset($_SESSION['password']) == true){
		$sel_sql = "SELECT * FROM register_info WHERE username = '$_SESSION[user]' AND password = '$_SESSION[password]'";
		if ($run_sql = mysqli_query($conn, $sel_sql)){
			while($rows = mysqli_fetch_assoc($run_sql)){
				$user_name = $rows ['name'];
				$user_username = $rows ['username'];
				$user_email = $rows ['email'];
				$user_country = $rows ['country'];
					
				if (mysqli_num_rows($run_sql) == 1){
					if($rows['role'] == 'admin'){
					}else{
						header ('Location../index.php');
					}
				}else{
				header ('Location../index.php');
				}
			}
		}
	}else{
		header('Location:../index.php');
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
		<?php include "includes/header.php"; ?>
		
		<div class="container" style="background-color:">
		
			<div style="width:50px;height:20px;"></div>
			<div style="font-size: 30px;" align="center">My profile:</div><hr>
			<div style="width:10px;height:40px;"></div>
			
			<div class="row">
				<div class="col-sm-1" >
				</div>
				<div class="col-sm-2" align="center">
					<img src="../images/noimg.png" width="155px" class="img-circle">
					<div id="image" type="file" name="image" class="btn btn-control btn-primary">Change image</div>
				</div>
				<div class="col-sm-1">
				</div>
				<div class="col-sm-3" style="padding-left:30px; padding-top:50px">
					<h4 class="text-left"><?php echo $user_username ?> &nbsp;</h4>
					 <div style="width:20px;height:20px;"></div>
					<p class="text-left">
						<i class="fas fa-location-arrow"></i> 
						&nbsp <?php echo $user_country ?> 
					</p>									
					<p class="card-text text-left">
						<i class="fas fa-envelope-square"></i>  
						&nbsp <?php echo $user_email ?> </p>
				</div>
				<div class="col-sm-1">
				</div>
				<div class="col-sm-3" style="padding-left:0px; padding-top:50px">
					<h4 class="text-center">&nbsp; Overall</h4>
					 <div style="width:20px;height:20px;"></div>
					<p class="text-center" style="font-size: 50px;">
						<i class="fas fa-trophy"></i>
					&nbsp; 4.2</p>
				</div>
				<div class="col-sm-1" >
				</div>				
			</div>
			
			<div style="width:50px;height:50px;"></div>	
			<hr>
			<div style="width:50px;height:50px;"></div>	
		</div>
		
		
			
		<div class="container" style="background-color:">
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-4">
					<div class="container">
						<div style="width:0px;height:10px;"></div>	
						<h4 class="text-left">Basic Info</h4>
							<table class="table table-condensed">
								<tbody>
									<tr>
										<td>Gender :</td>
										<td></td>
									</tr>
									<tr>
										<td>Age :</td>
										<td></td>
									</tr>
									<tr>
										<td>Phone Number :</td>
										<td></td>
									</tr>
								</tbody>
							</table>
					</div>
				</div>
				<div class="col-sm-4" style="padding-left:30px; padding-top:10px">
					<h4 class="text-left">About Me</h4>		
						<div style="width:0px;height:20px;"></div>
						<p class="text-left" >&nbsp;&nbsp;  Hi, Im Paulo, I would like to work.</p>
					<div style="width:0px;height:10px;"></div>	
				</div>
				<div class="col-sm-2" align="center" style="padding-top: 50px;">
					<a href="edit2.php" class="btn btn-lg btn-primary">Edit profile info</a>
				</div>
			</div>
			<div style="width:50px;height:50px;"></div>	
			<hr>
			<div style="width:50px;height:50px;"></div>	
		</div>
			
		<div class="container" style="background-color:">
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-1" style="padding-top: 20px; padding-right:100px;">
					<p class="text-left" style="font-size: 80px;">
						<i class="far fa-clipboard"></i>
					</p>
				</div>
				<div class="col-sm-3">
					<div class="container">
						<div style="width:0px;height:10px;"></div>	
						<h4 class="text-left">Reserved jobs</h4>
							<p>Look for a confirmed jobs you have requested.</p>
							<a href="#reservedjobs" style="float:right;" class="btn btn-primary">Go &nbsp;<i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="container">
						<div style="width:0px;height:10px;"></div>	
						<h4 class="text-left">Offered jobs</h4>
							<p>Check and manage jobs you offered to other people.</p>
							<a href="#reservedjobs" style="float:right;" class="btn btn-primary">Go &nbsp;<i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="container">
						<div style="width:0px;height:10px;"></div>	
						<h4 class="text-left">Messages</h4>
							<p>You have x new messages in your inbox.</p>
							<a href="#reservedjobs" style="float:right;" class="btn btn-primary">Inbox &nbsp;<i class="far fa-envelope"></i></a>
					</div>
				</div>
			</div>
			<div style="width:50px;height:50px;"></div>	
			<hr>
			<div style="width:50px;height:50px;"></div>	
		</div>
		
		<?php include "includes/footer.php"; ?>
	</body>
</html>