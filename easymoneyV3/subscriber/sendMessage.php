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
						<span style="font-size: 30px;" align="left">Send message to <?php echo $receiver ?> about <?php echo $title?> </span>
						<hr>
						<?php 
							$sel_sql = "SELECT * FROM posts WHERE No='$No'";
							if ($run_sql = mysqli_query($conn, $sel_sql)){
								while($rows = mysqli_fetch_assoc($run_sql)){
									$receiver = $rows ['publisher'];
									echo '
										<form class="" action="privMessage.php?No='.$rows['No'].'" method="post" role="" >
											<div class="row">
												<div class="col-sm-1"></div>
												<div class="col-sm-10" style="border: 0px solid lightgrey; border-radius:5px;">
													<textarea id="content" class="form-control" placeholder="Ask a question..." name="content" style="height:25%" ></textarea> 
												</div>
												<div class="col-sm-1"></div>
											</div>
											
											<div style="height:10px;"></div>
											
											<div class="row">
												<div class="col-sm-11" align="right">
													<a href="#" class="btn btn-light">Back</a>
													<input type="submit" class="btn btn-primary" name="send_btn" value="Send">		
												</div>
											</div>
										</form>
									'
									;
								}
							}
						
							;
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