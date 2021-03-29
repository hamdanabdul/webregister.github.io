<center>
<?php
	include 'database.php';	
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$str="select * from tmabsence";
		$result=mysqli_query($con,$str);

		echo '<br><br>';
	    echo '<h3>INTERACTIVE CRUD IN PHP</h3>';
	    echo '<table border="2" cellpadding="10">';
	    echo '<th> No </th> <th> NO. REG </th> <th> NAMA </th> <th colspan="2"> ACTION </th>';
		echo '<form method="post" action="">';
		if((mysqli_num_rows($result))> 0) 
		{
			while($row=mysqli_fetch_array($result))
			{
				if($id==$row[0]) 
				{
					echo '<tr><td><center><input type="text" name="name" value="'.$row[1].'"></center></td><td><center><input type="text" name="email" value="'.$row[2].'"></center></td><td><center><input type="text" name="password" value="'.$row[3].'"></center></td><td><input type="submit" name="done" value="&nbsp;Done&nbsp;"></td><td><input type="submit" name="cancel" value="Cancel"></td></tr>';
					echo '<input type="hidden" name="iid" value="'.$row[0].'"';
				}
				else
				echo '<tr><td><center>'.$row[1].'</center></td><td><center>'.$row[2].'</center></td><td><center>'.$row[3].'</center></td><td><button disabled>&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;</button></td><td><button disabled>Delete</button></td></tr>';
			}
			echo '</form';
			echo '<tr><td><center><input type="text" disabled></center></td><td><center><input type="text" disabled></center></td><td><center><input type="text" disabled></center></td><td><input type="submit" value="&nbsp;&nbsp;Save&nbsp;" disabled></td><td><input type="reset" value="&nbsp;Reset" disabled></td></tr>';
			echo "</table>";
		}	
		if(isset($_POST['cancel']))
		header("Location:index.php");
		else if(isset($_POST['done']))
		{
			$id=$_POST['iid'];
			$name=$_POST['name'];
			$password=$_POST['password'];
			$email=$_POST['email'];
			$str="update users set username='$name',email='$email',password='$password' where id='$id'";
			mysqli_query($con,$str);
			header("Location:index.php");
		}		
	}
	else
		header("Location:index.php");
?>
</center>