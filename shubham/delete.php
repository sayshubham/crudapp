<?php
include("config.php");
$id = $_GET['id'];
$sql="delete from data where sr='$id'";
$result = mysqli_query($conn, $sql);
if($result){
    header("Location:crud.php");
}
else{
    echo "some error occurs";
}

?>