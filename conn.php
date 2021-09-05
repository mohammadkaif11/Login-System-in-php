<?php
//its is simple connection in localhost
//connected to server or database
$servername="localhost";
$username="root";
$password="";
$database="login"; 

//database name

// connected to server
$conn=mysqli_connect($servername,$username,$password,$database);
// its return two value true or flase

if(!$conn){ 
    echo "sorry for  connection is connected";
}


?>
