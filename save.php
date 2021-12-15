<?php
	session_start();
	include 'database.php';
	if($_POST['type']==1){
		$name=$_POST['name'];
		$password=$_POST['password'];

		$duplicate=mysqli_query($conn,"select * from Admin where name='$name'");
		if (mysqli_num_rows($duplicate)>0)
		{
			echo json_encode(array("statusCode"=>201));
		}
		else{
			$sql = "INSERT INTO `Admin`( `name`, `password`)
			VALUES ('$name','$password')";
			if (mysqli_query($conn, $sql)) {
				$_SESSION['admin']=$name;
				echo json_encode(array("statusCode"=>200));
			}
			else {
				echo json_encode(array("statusCode"=>201));
			}
		}
		mysqli_close($conn);
	}
	if($_POST['type']==2){
		$name=$_POST['name'];
		$password=$_POST['password'];
		$check=mysqli_query($conn,"select * from Admin where name='$name' and password='$password'");
		if (mysqli_num_rows($check)>0){
			$_SESSION["admin"]=$name;

			echo json_encode(array("statusCode"=>200));
		}else{
			echo json_encode(array("statusCode"=>201));
		}
		mysqli_close($conn);
	}
?>
