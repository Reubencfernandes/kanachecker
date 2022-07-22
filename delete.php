<?php
session_start();
if($_SESSION['id'])
{
    $id = $_SESSION["id"];
    $conn =  mysqli_connect("localhost","root","","kanachecker");
    if($conn){
    $finduser = "DELETE FROM `userdata` WHERE id = $id";
    $val = mysqli_query($conn,$finduser);
    session_destroy();
    header("location: http://localhost/kanachecker/home.php");
    }
}
?>