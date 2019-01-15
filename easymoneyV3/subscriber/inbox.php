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
			<div style="font-size: 30px;" align="center">Inbox:</div><hr>
			<div style="width:10px;height:40px;"></div>
		</div>
			
		<div class="container" style="background-color:">
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-10">
					<div class="container">
						<div style="width:10px;height:10px;"></div>	
						<!--<div class="card-header text-center" style="background-color:#47d147; font-size:20px;font-family: Pacifico;">Nearest Jobs</div> -->
							<table class="table table-striped" style="font-family: ">
								<thead>
									<tr>
										<th>ID</th>
										<th>From</th>
										<th>Content</th>
										<th>Date</th>
									</tr>
								</thead>
								
								<tbody>
									<?php
										$sql = "SELECT * FROM messages WHERE receiver='$_SESSION[user]' or sender='$_SESSION[user]' ORDER BY id DESC";	
										$run = mysqli_query($conn, $sql);
										while ($rows = mysqli_fetch_assoc($run)){
											echo '
												<tr>
													<td>'.$rows['id'].'</td>
													<td>'.$rows['sender'].'</a></td>
													<td>'.$rows['content'].'</td>
													<td>'.$rows['date'].'</td>
												</tr>
											';
										}
										
									?>
								</tbody>
							</table>
					</div>
				</div>
				<div class="col-sm-1">
				</div>
			</div>
			<div style="width:50px;height:50px;"></div>	
			<hr>
			<div style="width:50px;height:50px;"></div>	
		</div>
		
		<?php include "includes/footer.php"; ?>
	</body>
</html>