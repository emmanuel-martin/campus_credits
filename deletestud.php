<?php

$connx=mysqli_connect("localhost","root","","minipro");

 
$id =  $_GET["stu_id"];

$sql = "DELETE FROM student1 WHERE stu_id = $id ";

mysqli_query($connx,$sql); 

?>