<?php
	session_start();
	include '../includes/db.php';
	if(isset($_POST['submit_login'])){
		if(!empty($_POST['username']) && !empty($_POST['password'])){
			$get_username = mysqli_real_escape_string($conn, $_POST['username']);
			$get_password = mysqli_real_escape_string($conn, $_POST['password']);
			
			$sql = "SELECT * FROM register_info WHERE username = '$get_username' AND password = '$get_password'";
			if ($result = mysqli_query($conn, $sql)){
				while($rows = mysqli_fetch_assoc($result)){ 
					if(mysqli_num_rows($result) == 1){
						$_SESSION['user'] = $get_username;
						$_SESSION['password'] = $get_password; 
						$_SESSION['role'] = $rows['role'];
						$_SESSION['user_id'] = $rows['user_id'];
							if($_SESSION['role'] == 'admin'){						
								header('Location: ../admin/index.php');
							}else{
								header('Location: ../subscriber/index.php');
							}
					}
				}
				if(mysqli_num_rows($result) != 1){
					header('Location: ../login.php?login_error=wrong');
				}
				
			}else{
				header ('Location: ../login.php?login_error=query_error');
			}	
		}else{
			header('Location: ../login.php?login_error=empty');
		}
		
	}else{
		
	}
	
?>