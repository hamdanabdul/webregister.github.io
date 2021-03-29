<?php
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