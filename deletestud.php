<?php

$connx=mysqli_connect("localhost","root","","minipro");

 
$id =  $_GET["stu_id"];

$sql = "DELETE FROM student1 WHERE stu_id = $id ";

if(mysqli_query($connx,$sql))
{
header("location:StudProfiles.php");

}

?>