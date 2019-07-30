<?php
	session_start();
	$error='';
	$con = mysqli_connect("localhost", "fokinpony", "fokinclave", "ilfokinco");
	
	$nombre = mysqli_real_escape_string($con,$_POST['nombre']);
	$apellido = mysqli_real_escape_string($con,$_POST['apellido']);


    	// if failed to connect
	if(mysqli_connect_error()){
		echo "Failed to connect" . mysqli_connect_error();
	}

	// if connect
	if(mysqli_ping($con)){
		if ($result = mysqli_query($con,"SELECT * FROM ilfokincircus WHERE nombre = '$nombre' AND apellido='$apellido'")){
            		$row_cnt = mysqli_num_rows($result);
            		if ($row_cnt==1){
            			$_SESSION['username'] = $username;
                        header("Location: success.html");
	                }
                    else {
                        header("Location: index.php");
                    }
		}
	}
	
	mysqli_close($con);
	
?>