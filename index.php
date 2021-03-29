<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

	<title>Selamat Datang!</title>
</head>

<body>
	<center>
<?php
session_start();


$regno = $_SESSION['reg'];
$_SESSION['reg2'] = $regno;

//session
 if (!isset($_SESSION["login"])) {
   header("Location: login.php");
   exit;
 } 

	 $str = "select 
	 a.meetid,
	 a.regid,
	 a.regno,
	 a.attendance,
	 a.unitno,
	 d.ddname as tower 

	 from tmabsence a 
	 left outer join tunit u on
	 a.unitno = u.unitcode 
	 left outer join tdropd d on 
	 upper(d.ddgroupcode) = 'BLOCK' and
	 u.blockcode = d.ddcode

	 where 
	 a.attendstat = 'V'
	 and a.regno = " .$regno;
	


	 include 'database.php';


	 $result=mysqli_query($con,$str);
		
	 if((mysqli_num_rows($result))>0) 
	 {
	 	while($row=mysqli_fetch_array($result))
	 	{
	 		echo '<h2><tr><td><center>SELAMAT DATANG BAPAK/IBU '.$row[3]. ' PEMILIK UNIT '.$row[4]. ' TOWER '.$row[5]. '</center></td></h2>';
	 	}
	 }

	 echo '</form>';
	 echo "</table>";
?>
		<style>
			#my_camera {
				width: 320px;
				height: 240px;
				border: 1px black;
			}

			.center-block {
				margin-left: auto;
				margin-top: 10px;
			}
		</style>


		<div id="my_camera"></div>
		<br>
		<div id="results"></div><br>
		<input id="take" type=button value="Take Snapshot" onClick="take_snapshot()">

		<br></br>

		<form method="POST" action="updateabsence.php">
			<input type="submit" name="submit" value="Submit">

		</form>

		<a href="logout.php">Keluar</a>

	</center>
	<script type="text/javascript" src="webcam.min.js"></script>
	<script language="JavaScript">
		Webcam.set({
			width: 320,
			height: 240,
			image_format: 'jpeg',
			jpeg_quality: 90
		});
		Webcam.attach('#my_camera');

		function take_snapshot() {
			if (take.value === "Take Snapshot") {
				take.value = "Retake";

			} else {
				take.value = "Retake";
			}


			// take snapshot and get image data
			Webcam.snap(function (data_uri) {
				Webcam.upload(data_uri, '', function (code, text, Name) {
					document.getElementById('results').innerHTML =
						'' +
						'<img src="' + data_uri + '"style=" width: 300px;">';
				});
			});
		}
	</script>


	<!-- Optional JavaScript; choose one of the two! -->

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
	</script>

	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>
