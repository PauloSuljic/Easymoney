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
		
		<div style="width:50px;height:20px;"></div>
		
		<div class="container-fluid">
			<div class="row">
			<div class="col col-sm-2">
			</div>
				<div class="col col-sm-8">
					 <div style="width:50px;height:px;"></div>
					 <div class="container-fluid">
						<div class="row">
							<div class="col col-sm-1">
							</div>
							<div class="col col-sm-10">
								<div class="container">
								<form action ="jobList.php" method="get" role="form">
									<div style="width:10px;height:10px;"></div>	
									<div style="font-size: 30px;" align="center">Search by:</div>
										<div style="width:10px;height:40px;"></div>
									<div class="row">
										<div class = "form-group col-sm-6" style="padding-left: 30px;">
											<div class = "text-left">LOCATION:</div>
												<div style="width:0px;height:5px;"></div>
													<div class="input-group" style="width:70%;">
														<input type="text" id="location" name="location" class="form-control" placeholder="Search location..." style="border-radius: 25px;">
													</div>
										</div>
									
										
										<div class = "form-group col-sm-6" style="padding-left: 20px;">
											<div class = "text-left">MINIMAL PAYOUT:</div>
												<div style="width:0px;height:5px;"></div>	
													<div class="input-group" style="width:70%;">
														<input type="text" id="payout" name="payout" class="form-control" placeholder="Enter numbers..." style="border-radius: 25px;">
													</div>
										</div>
									</div>
									
									<div style="width:10px;height:20px;"></div>	
									
									<div class = "form-group col-sm-12">
										<div class = "text-left">CATEGORY:</div>
											<div style="width:10px;height:10px;"></div>	
											<div class = "row">	
												<div class="col col-sm-6">
													<div class="category" data-toggle="buttons">
														<label class="btn btn-block" id="btn3">
															<div style="width:10px;height:4px;"></div>
															<input type="checkbox" name="category" id="category" value="education" hidden > <i class="fas fa-graduation-cap"style="font-size:20px"></i>&nbsp Education
															</input>
															<div style="width:10px;height:4px;"></div>
														</label>
													</div>
												</div>	
										
												<div class="col col-sm-6">
													<div class="category" data-toggle="buttons">
														<label class="btn btn-block" id="btn3">
															<div style="width:10px;height:4px;"></div>
															<input type="checkbox" name="category" id="category" value="hand-work" hidden> <i class="fas fa-wrench"style="font-size:20px"></i>&nbsp Hand-work
															</input>
															<div style="width:10px;height:4px;"></div>
														</label>
													</div>
												</div>
											</div>	
											
											<div style="width:10px;height:10px;"></div>
											
											<div class = "row">
												<div class="col col-sm-6">
													<div class="category" data-toggle="buttons">
														<label class="btn btn-block" id="btn3">
															<div style="width:10px;height:4px;"></div>
															<input type="checkbox" name="category" id="category" value="animal-welfare" hidden> <i class="fab fa-sticker-mule"style="font-size:20px"></i>&nbsp Animal welfare
															</input>
															<div style="width:10px;height:4px;"></div>
														</label>
													</div>
												</div>

												<div class="col col-sm-6">
													<div class="category" data-toggle="buttons">
														<label class="btn btn-block" id="btn3">
															<div style="width:10px;height:4px;"></div>
															<input type="checkbox" name="category" id="category" value="eldercare" hidden> <i class="fas fa-blind"style="font-size:20px"></i>&nbsp Eldercare
															</input>
															<div style="width:10px;height:4px;"></div>
														</label>
													</div>
												</div>
												
											</div>
											
											<div style="width:10px;height:28px;"></div>
												
											<div class = "row">
												<label class="control-label col-sm-12"></label>
												<div class="col-sm-12">
													<input type="submit" class="btn btn-primary btn-block" id="submit_btn" name="submit_btn" value="SEARCH"> 
												</div>
											</div>
									</div>

									<div style="width:10px;height:4px;"></div>
								</form>	
								</div>
										
							</div>
							<div class="col col-sm-1">
							</div>							
						</div>
							
						<div style="width:50px;height:20px;"></div>	
								<div style="width:50px;height:10px;"></div>	
					</div>		 
					<div style="width:50px;height:5px;"></div>
				
									
				</div>	
			
			</div>
			
		</div>
		
		<div style="width:50px;height:50px;"></div>
		<?php include "includes/footer.php"; ?>
		
				<script>
			google.maps.event.addDomListener(window, 'load', intilize);
			
			function activatePlacesSearch(){
				var input = document.getElementById('location');
				var autocomplete = new google.maps.places.Autocomplete(input);
			
				/*google.maps.event.addListener(autocomplete, 'place_changed',function(){
					var place = autocomplete.getPlace();
					var latitude = "Latitude: " + place.geometry.location.lat() + "<br/>";
					document.getElementById('result').innerHTML = latitude;
	
					var longitude = "Longitude: " + place.geometry.location.lng() + "<br/>";
					document.getElementById('result2').innerHTML = longitude;
				});*/

			};
		</script>
		
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLyw0zACeGCSbzHAzeWB9W-Akpm7zBKnw&libraries=places&callback=activatePlacesSearch">
		</script>
	</body>
</html>



