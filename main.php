<html>

    <head>
        <title>Forum Project</title>
        <link rel="stylesheet" href="try.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Metal+Mania&display=swap" rel="stylesheet">


        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Upright:wght@300&display=swap" rel="stylesheet">





    </head>

    <body>

        <?php


require("connect.php");

?>


        <!-- <div class="main"> -->
        <div id="nav">
            <ul id=ul1>
                <li><a href="main.php">Nforum</a></li>


                <li>
                    <div class="dropdown">
                        <a href="#">CATAGORYS</a>
                        <div class="dropdown-content">
                            <?php
                        $sql="select * from `forum` LIMIT 5";
                        $result= mysqli_query($conn , $sql);

                         while($row= mysqli_fetch_assoc($result)){

                            $Sno=@$row['Sno'];
                 
                        echo ' <a href="http://localhost/navaj/forum/read.php?Sno='.$Sno.'">'.$row['Title'].'</a>';
}
?>

                        </div>
                    </div>
                </li>


                <li><a href="post.php">POST</a></li>
                <!-- <li><a href="ser.php">SERVICES</a></li> -->
                <li><a href="login.php">LOGIN</a></li>
                <li><a href="sign_up.php">SIGN UP</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </div>

        <?php


$sql="select * from `forum`";
$result= mysqli_query($conn , $sql);

$num= mysqli_num_rows($result);

if($num>0){
    while($row= mysqli_fetch_assoc($result)){
      /* img link

       https://source.unsplash.com/1600x900/?code,'.$img.'
      
      */
// $img=$row['Title'];
$Sno=$row['Sno'];
  echo'<div id="box">

            <img src="2.jpg" alt="...">
          
            <b>'.$row['Title'].'</b>
            <p>'.substr($row['Disc'] , 0 , 90).'...</p>
            <a href="read.php?Sno='.$Sno.'">read</a>
        </div>
';
    }
}


?>
        <!-- </div> -->
    </body>

</html>