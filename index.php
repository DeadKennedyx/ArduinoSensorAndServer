<?php

	include("connect.php"); 	
	
	$link=Connection();

	$result=mysql_query("SELECT * FROM `detecciones` ORDER BY `timeStamp` DESC",$link);
?>

<html>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="style.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <head>
      <title>Sensor Data</title>
   </head>
<body>
 <div class="container col-xs-12">
         <header role="banner">
            
            <h1 class="col-md-4 col-lg-4" style="text-align:center;">Arduino</h1><img style="margin:0 auto;" src="https://yt3.ggpht.com/-XW1x_JT1g24/AAAAAAAAAAI/AAAAAAAAAAA/lMWjeVh_HEw/s900-c-k-no/photo.jpgs" class="img-header col-md-4  col-lg-4"><h1 class="col-md-4 col-lg-4" style="text-align:center;">Server</h1>

         </header>
      </div>
   <div class="container" style="text-align:center; margin-left:100px;" >
   	<h1>Lectura del sensor</h1>

   <table style="margin-left:420px;"border="1" class="tabla" cellspacing="1" cellpadding="1">
		<tr>
			<td>&nbsp;Timestamp&nbsp;</td>
			<td>&nbsp;Deteccion 1&nbsp;</td>
			<td>&nbsp;Centimetros 1&nbsp;</td>
		</tr>

      <?php 
		  if($result!==FALSE){
		     while($row = mysql_fetch_array($result)) {
		        printf("<tr><td> &nbsp;%s </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td></tr>", 
		           $row["timeStamp"], $row["deteccion"], $row["centimetros"]);
		     }
		     mysql_free_result($result);
		     mysql_close();
		  }
      ?>

   </table>

   </div>
</body>
</html>
