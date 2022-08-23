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


    <?php


require("connect.php");

            



            
if($_SERVER["REQUEST_METHOD"]=="POST"){


    session_start();
  
    $CUser_Id=$_SESSION['User_Id'];
    $CName=@$_SESSION['Name'];
    $CDisc=$_POST['Disc'];
    $Sno=$_POST['Sno'];
    }

    // session_start();
    // $User_Id=$_SESSION['User_Id'];
    
    $CDisc=@str_replace("<" , "&lt" , $CDisc);
    $CDisc=str_replace(">" , "&gt" , $CDisc);
    $CDisc=str_replace(";" , "&#59" , $CDisc);
    $CDisc=str_replace(":" , "&#58" , $CDisc);
    $CDisc=str_replace('"' , "&#34" ,$CDisc);
    $CDisc=str_replace("'" , "&#39" , $CDisc);

if(@$CDisc != ""){

    $sql=@"INSERT INTO `comments` (`Name`, `Disc`, `Cat_Id`, `User_Id`) VALUES ('$CName', '$CDisc', '$Sno', '$CUser_Id')";
    $result= mysqli_query($conn , $sql);
}
   
  
    
       
    if($_SERVER["REQUEST_METHOD"]=="GET"){
$Sno=@$_GET['Sno'];
    }

$sql="SELECT * FROM `forum` WHERE Sno=$Sno";
$result= mysqli_query($conn , $sql);
    while($row= mysqli_fetch_assoc($result)){
    
          
            $FName=$row['Name'];
            $FTitle=$row['Title'];
            $FDisc=$row['Disc'];
 
}

?>

    <body>
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

                            $sno=@$row['Sno'];
                 
                        echo ' <a href="http://localhost/navaj/forum/read.php?Sno='.$sno.'">'.$row['Title'].'</a>';
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





        <div id="read">

            <?php
           echo'<h1>'.$FTitle.'</h1>';
           
           echo'<p>'.$FDisc.'</p>';
           
            ?>
            <hr>


            <div id="qna">
                <h1>browse your questions</h1>






                <?php

@session_start();
$login=@$_SESSION['login'];
if(@$_SESSION['login']){
    
 
   
   echo '<form method="post" action="read.php">
        
   <!-- <input class="qnain" type="text" placeholder="Enter Your Name" name="Name"> -->

        <input class="qnain" type="Text" placeholder="Discription" name="Disc">
        <br><br>
        <!-- <input type="number" class="qnain" placeholder="User Id" name="User_Id"> -->
        
        
        <input type="hidden" class="qnain" name="Sno" value="'.$Sno.'">

                <input type="submit" id="qnasub" name="submit" value="Add" id="btn">


                <br><br>


                </form>';

                }

                else{
                echo "<h2>login For Add Your Comment</h2>";
                }

                ?>


                <?php

$sql="SELECT * FROM `comments` where Cat_Id=$Sno";
$result= mysqli_query($conn , $sql);
    while($row= mysqli_fetch_assoc($result)){
    
          
            $CName=$row['Name'];
            $CDisc=$row['Disc'];
            $CCat_Id=$row['Cat_Id'];

            
            echo' <div class="comment">';


echo '<img src="d.webp" alt=".....">';
            echo "  <h2>".$CName."</h2>
            <p>".$CDisc."</p>
            </div>";

 
}


        


                 ?>


            </div>

            <!-- </div> -->
    </body>

</html>