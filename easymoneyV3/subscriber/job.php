<?php session_start();
	include 'includes/db.php';
	
	if (isset($_GET['No']))
    {
        $No = $_GET['No'];
        $sel_sql = "SELECT * FROM posts WHERE No='$No'";
		if ($run_sql = mysqli_query($conn, $sel_sql)){
			while($rows = mysqli_fetch_assoc($run_sql)){
				$post_title = $rows ['title'];
				$post_description = $rows ['description'];
				$post_location = $rows ['location'];
				$post_payout = $rows ['payout'];
				$post_publisher = $rows ['publisher'];
				$post_date = $rows ['date'];
				$post_category = $rows ['category'];
				$post_id = $rows ['No'];
			}
		}
    }
?>

<html>
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
						<a href="jobList.php"><i class="fas fa-arrow-left"></i>&nbsp; Go back on search results</a>
						<div style="width:0px;height:20px;"></div>
						<span style="font-size: 30px;" align="left"><?php echo $post_title?></span>
						<span style="float: right; padding-top: 20px">Job is published: <?php echo $post_date ?></span>
						<hr>

						<div class="row">
							<div class="col-sm-8" style="border: 1px solid lightgrey; border-radius:5px;">
								<div class="card-block">
									<table>
										<tbody>
											<tr>
												<td style="padding-top:10px; padding-bottom: 10px; color:grey;">Location:</td>
												<td>&nbsp;</td>
												<td style="padding-top:10px; padding-bottom: 10px"><?php echo $post_location ?> 
													<div style="color: #4d94ff; font-size:12px;">Message <?php echo $post_publisher ?> to get exact adress
													</div>
												</td>
											</tr>
											<tr style="">
												<td style="padding-top:10px; padding-bottom: 10px; color:grey;">Date:</td>
												<td>&nbsp;</td>
												<td style="padding-top:10px; padding-bottom: 10px">Anytime</td>
											</tr>
											<tr style="">
												<td style="padding-top:10px; padding-bottom: 10px; color:grey;">Category:</td>
												<td>&nbsp;</td>
												<td style="padding-top:10px; padding-bottom: 10px"><?php echo $post_category ?></td>
											</tr>
											<tr style="">
												<td style="padding-top:10px; padding-bottom: 10px; color:grey;">Job description:</td>
												<td style="width:50px;">&nbsp;</td>
												<td style="padding-top:10px; padding-bottom: 10px"><?php echo $post_description ?></td>
											</tr>
										</tbody>
									</table>
									<div style="height:20px"></div>
									<div class="container" style="background-color: #b3ffb3; padding-top:10px; padding-bottom: 10px">
										<img src="../images/noimg.png" style="width:10%">&nbsp;<?php echo $post_publisher ?>
										<span style="float:right; padding-top: 10px; padding-right:20px;">Are you interested? &nbsp;
											<?php
											$sql = "SELECT * FROM posts WHERE No = '$post_id' ORDER BY No DESC";	
											$run = mysqli_query($conn, $sql);
											while ($rows = mysqli_fetch_assoc($run)){
												echo '
													<a href="sendMessage.php?No='.$rows['No'].'" class="btn btn-sm btn-primary"><i class="far fa-envelope"></i>&nbsp;Send message</a>		
												';
											}
										?>
													
										</span>
									</div>
									<div style="height:10px;"></div>
								</div>	
							</div>
							<div class="col-sm-1">
							</div>
							<div class="col-sm-3" style="border: 1px solid lightgrey; border-radius:5px;">
								<div class="container">
									<div class="row">
										<div class="col-sm-6" align="center" style="color: grey; font-size: 15px; padding-top:25px;">
											Payout
										</div>
										<div class="col-sm-6" align="center" style="font-size: 30px; padding-top:12px;">
											<?php echo $post_payout?>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-12" align="center" style="color: grey; font-size: 15px; padding-top:10px;padding-bottom:10px;">
											You think you are a good candidat for this job?
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-12" align="center" style="padding-top:10px;">
											<a href="#" class="btn btn-lg btn-primary" style="background-color: ff7733; border: 1px solid lightgrey; border-radius:5px">Send request</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>		 
					<div style="width:0px;height:5px;"></div>			 
						
				</div>	
				
			</div>					
		</div>	
		
		<div style="width:50px;height:50px;"></div>
		<?php include "includes/footer.php"; ?>
	</body>
</html>