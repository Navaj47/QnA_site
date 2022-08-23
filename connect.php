<?php

$sn="localhost";
$un="root";
$p="";
$dn="users";
$conn= mysqli_connect($sn,$un,$p,$dn);

if(!$conn){
    echo "not connected";
}


?>