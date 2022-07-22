<?php
# this file is used only to create the table
$com = mysqli_connect("localhost","root","");
if($com){

    mysqli_query($com,"CREATE DATABASE kanachecker");
    echo "created database <br>";
}
$conn = mysqli_connect("localhost","root","","kanachecker");
if($conn)
{
    echo "connection established to database<br>";
    //creating tables
    mysqli_query($conn,"CREATE TABLE `userdata`(`id` int(20),`email` varchar(60),`password` varchar(30),`username` varchar(10),`score` int(10))");
    echo "created tables";
    
}
?>