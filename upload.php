<?php
session_start();
include 'config.php';

$file_name= $_FILES['file']['temp_name'];
$tmp_name=$_FILES['file']['tmp_name'];

$file_up_name=time().$file_name;

move_uploaded_file($tmp_name,"files/".$file_up_name);



?>