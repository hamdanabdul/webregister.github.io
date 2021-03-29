<center>

<?php

if(isset($_POST['login']))
{
      
 $regno = $_POST["regno"];
 //$regno = $_SESSION['reg'];

 include 'database.php'; // Using database connection file here

 $sqlAttendStat = "select attendstat from tmabsence
                  where regno = " .$regno;
 
 $result=mysqli_query($con,$sqlAttendStat);
		
	 if((mysqli_num_rows($result))>0) 
	 {
	 	while($row=mysqli_fetch_array($result))
	 	{
            $attendstat= $row[0];
   
	 	}
	 }


        if ($attendstat == 'P')
          {echo '<h2><tr><td><center>Anda sudah teregistrasi</center></td></h2>';}
        else 
        {
          //$row = mysqli_fetch_assoc($result);
          $_SESSION['reg'] = $reg;
          header("location: index.php");
          exit;
        // echo '<h2><tr><td><center>Anda belum teregistrasi</center></td></h2>';

        }

        //mysqli_close($db); // Close connection
}
        
?>


<br><br>
<a href="login.php">Back</a>
</center>

