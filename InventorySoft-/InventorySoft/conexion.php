<?php
$conn = new mysqli("localhost","root","","inventorysoft");
	
	if($conn->connect_errno)
	{
		echo "No hay conexión: (" . $conn->connect_errno . ") " . $conn->connect_error;
	} else {
        echo "Conexcion exitosa";
    }
?>