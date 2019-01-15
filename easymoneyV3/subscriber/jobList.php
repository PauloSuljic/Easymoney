<?php session_start();
	include 'includes/db.php';
	if (isset($_SESSION['user']) && isset($_SESSION['password']) == true){
		$sel_sql = "SELECT * FROM register_info, posts WHERE username = '$_SESSION[user]' AND password = '$_SESSION[password]'";
		if ($run_sql = mysqli_query($conn, $sel_sql)){
			while($rows = mysqli_fetch_assoc($run_sql)){
				$user_name = $rows ['name'];
				$user_username = $rows ['username'];
				$user_email = $rows ['email'];
				$user_country = $rows ['country'];
				$job_location = $rows ['location'];
				$job_category = $rows ['category'];
				$job_payout = $rows ['payout'];
			
				if (mysqli_num_rows($run_sql) == 1){
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
		
		<div style="width:0px;height:20px;"></div>
			<div class="container">
				<div class="row">
					<div class="col-sm-2">	
					</div>
					<div class="col-sm-8" align="center">
						<a href="search.php" class="btn btn-primary" id="filterBtn"><i class="fa fa-search"></i>
							&nbsp;&nbsp;
									<?php 
										echo $_GET['location']
									?> 
							&nbsp; | &nbsp; 
									<?php 
										echo $_GET['category']
									?> 
							&nbsp; | &nbsp; 
									<?php 
										echo $_GET['payout'] 
									?> 
						</a>
					</div>
					<div class="col-sm-2">
					</div>
				</div>
			</div>
		<hr>
			<div class="row">

				<div class="col col-sm-2"></div>
				<div class="col col-sm-8">
				
					<div class="container" style="background-color:">
						<div style="font-size: 30px;" align="center">List of jobs:</div><hr>

						<div class="row">
							<div class="col col-sm-12">
								<div class="card-block">
									<div class="container">
										<div style="width:10px;height:10px;"></div>	
										<?php
											if(isset ($_GET['submit_btn'])){
											$sql = "SELECT * FROM posts WHERE category = '$_GET[category]' AND NOT publisher = '$_SESSION[user]' ORDER BY No DESC";	
											$run = mysqli_query($conn, $sql);
											while ($rows = mysqli_fetch_assoc($run)){
												echo '
													<a href="job.php?No='.$rows['No'].'">
														<div class="container" style="border: 1px solid lightgrey; border-radius: 10px; ">
															<div style="width:0px;height:10px;"></div>
															<div class="row">
																<div class="col-sm-4" style="padding-top:10px; padding-left:30px; color: #4d94ff">
																	<div><i class="fas fa-location-arrow"></i>&nbsp;&nbsp;'.$rows['location'].'</div>				
																</div>
																<div class="col-sm-2">
																					
																</div>
																<div class="col-sm-6" style="padding-top:10px;">
																	<h4>'.$rows['title'].'</h4>
																	<p>'.$rows['description'].'</p>
																</div>					
															</div>
															
															<div style="width:0px;height:0px;"></div>
															<hr>
															<div class="row">
																<div class="col-sm-2" align="center">
																	<img src="../images/noimg.png" style="width:75%">
																</div>
																<div class="col-sm-4" style="padding-top:15px; font-size: 22px;">
																	<div>'.$rows['publisher'].'</div>				
																</div>
																<div class="col-sm-6" style="padding-top:15px; font-size: 22px;" align="right">
																	'.$rows['payout'].' kn
																</div>
															</div>
															<div style="width:0px;height:10px;"></div>
														</div>
														<div style="width:0px;height:40px;"></div>
													</a>
												';
											}
											}
										?>
									</div>
								</div>	
							</div>
						</div>
					<!--
						<div style="width:50px;height:10px;"></div>	
							<div class="float-center">
								<ul class="pagination mx-auto text-center">
									<?php
										if(isset ($_GET['submit_btn'])){
											$pagination_sql = "SELECT * FROM posts WHERE category = '$_GET[category]'"; 
											$run_pagination = mysqli_query($conn, $pagination_sql);
											
											$count = mysqli_num_rows($run_pagination);
											
											$total_pages = ceil($count/$per_page);
											
											if(isset ($_GET['category'])){
												$cat = $_GET['category'];
											}
											
											for($i=1;$i<=$total_pages;$i++){
												echo '<li class="page-item"><a class="page-link" href="jobs2.php?page='.$i.'?payout=&category='.$cat.'&submit_btn=SEARCH">'.$i.'</a></li>';
											
											}
										}
									?>	  
								</ul>
							</div> 
						-->
					</div>		 
					<div style="width:50px;height:5px;"></div>			 
						
				</div>	
				
			</div>					
		</div>	
		
		<div style="width:50px;height:50px;"></div>
		<?php include "includes/footer.php"; ?>
	</body>
</html>