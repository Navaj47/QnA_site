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

session_start();
$Name=@$_SESSION['Name'];

if(!$_SESSION['login']){
    
    header("location:login.php");
   
}

?>

        <?php



if($_SERVER["REQUEST_METHOD"]=="POST"){
    $title=$_POST['Title'];
    $disc=$_POST['Disc'];

$disc=str_replace("<" , "&lt" , $disc);
$disc=str_replace(">" , "&gt" , $disc);
$disc=str_replace(";" , "&#59" , $disc);
$disc=str_replace(":" , "&#58" , $disc);
$disc=str_replace('"' , "&#34" , $disc);
$disc=str_replace("'" , "&#39" , $disc);

  $title=str_replace("<" , "&lt" ,   $title);
  $title=str_replace(">" , "&gt" ,   $title);
  $title=str_replace(";" , "&#59" ,   $title);
  $title=str_replace(":" , "&#58" ,   $title);
  $title=str_replace('"' , "&#34" ,   $title);
  $title=str_replace("'" , "&#39" ,   $title);
    
if($title != "" && $disc != ""){

    $PUser_Id=$_SESSION['User_Id'];
    $query="INSERT INTO `forum` (`User_Id` , `Name` , `Title` , `Disc`) VALUES ('".$PUser_Id."','".$Name."', '".$title."','".$disc."');
        ";
        $result=mysqli_query($conn , $query);


        $post=true;
}
}

?>



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


        <form method="post" action="post.php">

            <!-- <input type="text" placeholder="Enter Your Name" name="Name">
            <br><br> -->

            <input type="text" placeholder="Enter Your Title" name="Title">
            <br><br>

            <input type="text" placeholder="Discription" name="Disc">
            <br><br>

            <input type="submit" name="submit" value="Submit" id="btn">
            <br><br>


        </form>
        <?php
if(@$post){
    echo"  <h2>post added successfully</h2>";
}
?>

    </body>

</html>