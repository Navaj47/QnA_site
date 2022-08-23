<html>

    <body>

        <?php

session_start();

if(!$_SESSION['login']){
    
    header("location:login.php");
   
}

?>

        <link href="css.css" rel="stylesheet">
        <style>
        body {
            background-image: url("img1.jpg");
            background-size: cover;
        }
        </style>
        <a href='logout.php'>logout</a>
        <h1>Hello Navaj Sama</h1>

    </body>

</html>