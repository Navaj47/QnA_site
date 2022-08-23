<?php
        require("connect.php");
        $exist=false;
        $dpas=false;

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email=$_POST['Email'];
    $pas=$_POST['Password'];
    $cpas=$_POST['CPassword'];
    $Name=$_POST['Name'];

    $sql= "SELECT * FROM `data` WHERE (`Email` = '".$email."')";
    $result=mysqli_query($conn , $sql);
    $num=mysqli_num_rows($result);
 if($num > 0){
     $exist=true;
 }

 else{
    $exist=false;

 }
 if(!$exist){
    if($pas == $cpas && $pas!=""){
        $hash=password_hash($pas, PASSWORD_DEFAULT);

        

     $Name=str_replace("<" , "&lt" ,    $Name);
     $Name=str_replace(">" , "&gt" ,    $Name);
     $Name=str_replace(";" , "&#59" ,    $Name);
     $Name=str_replace(":" , "&#58" ,    $Name);
     $Name=str_replace('"' , "&#34" ,    $Name);
     $Name=str_replace("'" , "&#39" ,    $Name);



        $query="INSERT INTO `data` (`Name` ,`Email`, `Password`) VALUES ('".$Name."','".$email."', '".$hash."');
        ";
        $result=mysqli_query($conn , $query);

        header("location: post.php");
    }


else{
    $dpas=true;
}
 }
else{
    $exist=true;
}

}
else{
    $nr=true;
}

?>



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


        <div class="myDiv">
            <div id="div1">
                <form method="post" action="sign_up.php">
                    <input type="text" placeholder="Enter Your Name" maxlength="50" name="Name">
                    <br><br>

                    <input type="email" placeholder="Enter Your Email" maxlength="25" name="Email">
                    <br><br>

                    <input type="password" placeholder="Password" maxlength="23" name="Password">
                    <br><br>

                    <input type="password" placeholder="Conferm password" name="CPassword">
                    <br><br>

                    <input type="submit" name="submit" value="Sign Up" id="btn">
                    <br><br>


                </form>
                <br><br>


            </div>
        </div>

        <?php

              if($exist){
                  echo "<h1 class='error'>User already exist</h1>";
              }
              
              if($dpas){
                echo "<h1 class='error'>password do not mach</h1>";
            }

            // if($nr){
            //     echo "data not send";
            // }

              ?>
    </body>

</html>