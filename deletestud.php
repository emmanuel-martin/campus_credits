<?php

include 'config.php';

 
$id =  $_GET["stu_id"];

$sql = "DELETE FROM student1 WHERE stu_id = $id ";

if(mysqli_query($conn,$sql))
{
header("location:StudProfiles.php");

}

?>