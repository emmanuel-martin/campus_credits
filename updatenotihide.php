<?php
include 'config.php';

 
$id =  $_GET["notifi_id"];

$sql = "update notifications set status='Hide' WHERE notifi_id = $id ";
if($sql)
{
    header("location:NotifiFac.php");
}
mysqli_query($conn,$sql); 


?>