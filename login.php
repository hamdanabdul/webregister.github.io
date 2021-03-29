<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Halama Login</title>
</head>

<body>
    <center>
        <?php

session_start();

//  if( isset($_SESSION["login"]) ) {
//     header("Location: index.php");
//       exit;
//   }

require 'database.php';


if( isset($_POST["login"]) ) {
    
    $reg = $_POST["regno"];
    $_SESSION['reg'] = $reg;

    $sqlChkClosed = "select upper(regstat) from tmabsence";

    $chkresult = mysqli_query($con,$sqlChkClosed); 
    
    if((mysqli_num_rows($chkresult))>0) 
        {
        while($row=mysqli_fetch_array($chkresult))
        {
        $regstat= $row[0];
        }
        }

    if ($regstat == 'CL') 
    {
      {echo '<h2><tr><td><center>Registration closed</center></td></h2>';}
    }   
    else
    {
        $sqlAttendStat = "select attendstat from tmabsence
        where regno = " .$reg;

        $result = mysqli_query($con,$sqlAttendStat);



        if((mysqli_num_rows($result))>0) 
        {
        while($row=mysqli_fetch_array($result))
        {
        $attendstat= $row[0];
        }
        }


        if (!empty($attendstat))
        {
        if ($attendstat == 'P')
        {echo '<h2><tr><td><center>Anda sudah teregistrasi</center></td></h2>';}
        else 
        {

        $row = mysqli_fetch_assoc($result);
        $_SESSION["login"] = true;
        header("location: index.php");
        exit;

        }
        }

        else 
        {
        echo '<h2><tr><td><center>Anda belum terdaftar</center></td></h2>';    
        }

    }

    

    
    //$error = true;
}


?>

        <br><br>
        <h3>Silahkan Input Register Number Anda!</h3>

        <?php
        if( isset($error) ) : ?>
        <p style="color:red; font-style:italic;">Register Number Tidak Terdaftar!</p>
        <?php endif; ?>

        <form action="" method="post">

            <ul>
                <label for="regno">Register Number :</label>
                <input type="text" name="regno" id="regno"> <br>
                <br>
                <button type="submit" name="login">Masuk</button>

            </ul>
        </form>
    </center>

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