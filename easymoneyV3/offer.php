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
		header('Location:offer_error.php');
	} 
	$match = '';
	if (isset($_POST["offer_btn"])){
		$title = strip_tags($_POST['title']);
		
		
		$date = date('Y-m-d h:i:s');
		$ins_sql = "INSERT INTO posts (title, description, category, location, payout, status, date, publisher) VALUES 
			('$title', '$_POST[description]', '$_POST[category]','$_POST[location]', '$_POST[payout]', 'active', '$date', '$_SESSION[user]')";
			$run_sql = mysqli_query($conn, $ins_sql);
			$match = '<div class = "alert alert-success">Job offer finished successfully!';
	}
?>

<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<script src="../js/jquery.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>
	
	<script defer src="../bootstrap/js/fontawesome-all.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/fontawesome.min.css"> 
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
	<style><?php include "style.css";?></style>
	</head>
	
	<body>
		<?php include "includes/header.php"; ?>
		<div style="width:50px;height:20px;"></div>
		
		<div class="container-fluid">
			<div align="center"><?php echo $match; ?></div>
			<div class="row">
				<?php include 'subscriber/includes/admin_panel.php'; ?>
				<div class="col col-sm-8">
				
				<div class="card card-inverse text-center" style="background-color:#edece3;">
					 <div class="card-header" style="background-color:#47d147; font-size:30px; font-family: Pacifico;">Offer a Job</div>
					 <div style="width:50px;height:20px;"></div>
					 <div class="container-fluid">
						<div class="row">	
							<div class="col col-sm-12">
								<div class="card card-inverse text-center" style="background-color:#47d147;">
									
									<div class="card-block">
										<div class="container">
											<div style="width:10px;height:10px;"></div>	
											<div class="row">
												<div class = "form-group col-sm-2"></div>
												<div class = "form-group col-sm-8">
													<div class = "col-sm-12">
														
														<form class="form-horizontal" action="offer.php" method="post" role="form" >
															<div class="form-group">
																<label for="title" class="control-label"><b>JOB NAME</b></label>
																<input type="text" id="title" class="form-control" placeholder="Job Name" name="title" required> 
															</div>
															<br>
															<div class="form-group">
																<label for="description" class="control-label"><b>JOB DESCRIPTION</b></label>
																<textarea id="description" class="form-control" placeholder="Write description about the job" name="description" ></textarea> 
															</div>
															<br>
															<div class="form-group">
																<label for="category" class="control-label"><b>CATEGORY</b></label>
																<select class="form-control" name="category" id="category" required>
																	<option value="">Select Any Category</option>
																	<?php 
																		$sel_sql = "SELECT * FROM category";
																		$run_sql = mysqli_query($conn, $sel_sql);
																		while($rows = mysqli_fetch_assoc($run_sql)){
																			echo '<option value="'.$rows['Category_name'].'">'.$rows['Category_name'].'</option>';
																		}
																	?>
																</select>
															</div>
															<br>
															<div class="form-group">
																<label for="location" class="control-label"><b>LOCATION</b></label>
																<input type="text" id="location" class="form-control" placeholder="Location" name="location" required> 
															</div>
															<!--<ul hidden class="form-group" id="input_4_4">
																<li class="form-group">
																	<input name="result" type="checkbox" value="result" id="result" class="radio_s" tabindex="4" checked>
																	<label id="result"></label>
																</li>
																<li class="form-group">
																	<input name="result2" type="checkbox" value="result2" id="result2" class="radio_s" tabindex="4" checked>
																	<label id="result2"></label>
																</li>
															</ul>-->
															<br>
															<div class="form-group">
																<label for="payout" class="control-label"><b>PAYOUT</b></label>
																<input type="text" id="payout" class="form-control" placeholder="Payout" name="payout" required> 
															</div>
															<br>
														
															<div class="form-group">
																<label  class="control-label"></label>
																<input type="submit" class="btn btn-primary btn-block" name="offer_btn" value="OFFER">
															</div>
															
														</form>	
													</div>
												</div>
											</div>		
										</div>
									</div>
								</div>		
							</div>
							
								 
						</div>
							
						<div style="width:50px;height:20px;"></div>	
						
					</div>		 
					<div style="width:50px;height:20px;"></div>			 
					<div class="card-footer text-muted" style="background-color:#47d147;"></div>				
				</div>					
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
		
		<script>
			function initMap() {
			var myLatLng = {lat: -25.363, lng: 131.044};

			var marker = new google.maps.Marker({
			  position: myLatLng,
			  map: map,
			  title: 'Hello World!'
			});
		  }
		</script>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLyw0zACeGCSbzHAzeWB9W-Akpm7zBKnw&libraries=places&callback=activatePlacesSearch">
		</script>
	</body>
</html>