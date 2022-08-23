<?php
        require("connect.php");
       

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email=$_POST['Email'];
    $pas=$_POST['Password'];
    

    $sql= "SELECT * FROM `data` WHERE (`Email` = '".$email."')";
    $result=mysqli_query($conn , $sql);





    while($row= mysqli_fetch_assoc($result)){
    
        $User_Id=$row['User_Id'];
        $Name=$row['Name'];
        $hash=$row['Password'];
        
    }



    $num=mysqli_num_rows($result);
 if($num == 1){
     
     if(password_verify($pas , $hash)){
        $exist=true;
     }

 }

 else{
    $exist=false;

 }
 if(@$exist){

    session_start();
    $_SESSION['login']=true;
    $_SESSION['email']=$email;
    $_SESSION['Name']=$Name;
    $_SESSION['User_Id']=$User_Id;


    // $_SESSION['User_Id']=$User_Id;
    header("location: main.php");

 }
else{
    $error=true;
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
                <form method="post" action="login.php">
                    <input type="email" placeholder="Enter Your Email" maxlength="55" name="Email">
                    <br><br>

                    <input type="password" placeholder="Password" maxlength="23" name="Password">
                    <br><br>

                    <input type="submit" name="submit" value="Login" id="btn">
                    <br><br>


                </form>
                <br><br>


            </div>
        </div>


        <?php
 
 
// if($nr){
//     echo "<h3 class='error';>data not send</h3>";
// }
if(@$error){
    echo "<h3 class='error';>wrong Email OR Password</h3>";
}


            ?>
    </body>

</html>