<center>

<?php
 session_start();
 $regno2 = $_SESSION['reg2'];

 include 'database.php'; // Using database connection file here

 if(isset($_POST['submit']))
 {		
      $strupdate="UPDATE tmabsence SET attendstat = 'P' where regno=".$regno2;
                  
     //  mysqli_query($con,$strupdate);
       $insert =  mysqli_query($con,$strupdate);
 
       if ($insert)
       {
        //echo '<h2><tr><td><center>' .$regno2. '</center></td></h2>';   
        //header("Location:index.php");
         // exit;
       }
      
 }
 
 // mysqli_close($db); // Close connection
        
?>


<?php
 include 'database.php'; // Using database connection file here
 $sqlmaster="select meetlinkid from tmeeting" ;
 
 $result=mysqli_query($con,$sqlmaster);
		
	 if((mysqli_num_rows($result))>0) 
	 {
	 	while($row=mysqli_fetch_array($result))
	 	{
            $meetlink= $row[0];
	 	}
	 }
 
 // mysqli_close($db); // Close connection
        
?>



<br></br> <br></br> <br></br> 
<a href="<?php echo $meetlink; ?>" target="_blank">Join Zoom</a>
</center>