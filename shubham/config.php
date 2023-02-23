<?php 
$servername="localhost";;
$username="root";
$password="";
$database="shubham";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("Failed to connect".mysqli_connect_error());
}

?>