<?php
   	include("connect.php");
   	
   	$link=Connection();

	$deteccion1=$_GET["deteccion1"];
	$centimetros1=$_GET["centimetros1"];

	$query = "INSERT INTO `Detecciones` (`deteccion`, `centimetros`) 
		VALUES ('".$deteccion1."','".$centimetros1."')"; 
   	
   	mysql_query($query,$link);
	mysql_close($link);

   	header("Location: index.php");
?>
