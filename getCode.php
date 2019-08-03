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
		if ($result = mysqli_query($con,"INSERT INTO ilfokincircus(nombre, apellido)  VALUES('$nombre', '$apellido')")){
			header("Location: success.html");
		}
	}
	
	mysqli_close($con);
	
?>