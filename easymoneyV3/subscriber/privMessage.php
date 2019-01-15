<?php session_start();
	include 'includes/db.php';
	$match = '';
	
	$No = $_GET['No'];
	$sel_sql = "SELECT * FROM posts WHERE No='$No'";
	if ($run_sql = mysqli_query($conn, $sel_sql)){
		while($rows = mysqli_fetch_assoc($run_sql)){
			$receiver = $rows ['publisher'];
			$title = $rows ['title'];
		}
	}
	
	if (isset($_POST["send_btn"])){	
		$date = date('Y-m-d h:i:s');
		$sender = $_SESSION['user'];
		
		$ins_sql = "INSERT INTO messages (sender, date) VALUES ('$sender', '$date')";
		$run_sql = mysqli_query($conn, $ins_sql);
		
		$match = '<div class = "alert alert-success">Job offer finished successfully!';
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
		
			<div style="width:0px;height:20px;"></div>

			<div class="row">
				<div class="col col-sm-1"></div>
				<div class="col col-sm-10">
				
					<div class="container" style="background-color:">
						<div style="width:0px;height:20px;"></div>
						<span style="font-size: 30px;" align="left"><?php echo $receiver ?> ( <?php echo $title?> ) <?php echo $date?></span>
						<hr>
						<?php
						if (isset($_POST["offer_btn"])){
							$sql = "SELECT * FROM messages WHERE sender = '$_SESSION[user]' ORDER BY No DESC";	
							$run = mysqli_query($conn, $sql);
							while ($rows = mysqli_fetch_assoc($run)){
								echo '
										<div class="container" style="border: 1px solid lightgrey; border-radius: 10px; ">
											<div style="width:0px;height:10px;"></div>
											<div class="row">
												<div class="col-sm-2">
																	
												</div>
												<div class="col-sm-6" style="padding-top:10px;">
													<p>'.$rows['content'].'</p>
												</div>					
											</div>
											
											<hr>
											<div style="width:0px;height:10px;"></div>
										</div>
										<div style="width:0px;height:40px;"></div>
								';
							}
							}
						?>
					</div>		 
					<div style="width:0px;height:5px;"></div>			 
						
				</div>	
				
			</div>					
		</div>	
		
		<div style="width:50px;height:50px;"></div>
		<?php include "includes/footer.php"; ?>
	</body>
</html>