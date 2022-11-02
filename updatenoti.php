<?php

include 'config.php';

 
$id =  $_GET["notifi_id"];

$sql = "update notifications set status='Visible' WHERE notifi_id = $id ";
if($sql)
{
    header("location:NotifiFac.php");
}
mysqli_query($conn,$sql); 


?>