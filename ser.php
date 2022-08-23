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

        <h1>services</h1>
    </body>

</html>