<?php
session_start();
$conn=mysqli_connect("localhost","root","","minipro");

$file_name= $_FILES['file']['temp_name'];
$tmp_name=$_FILES['file']['tmp_name'];

$file_up_name=time().$file_name;

move_uploaded_file($tmp_name,"files/".$file_up_name);



?>