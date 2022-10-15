<?php

$connx=mysqli_connect("localhost","root","","minipro");

 
$id =  $_GET["notifi_id"];

$sql = "update notifications set status='Visible' WHERE notifi_id = $id ";
if($sql)
{
    header("location:NotifiFac.php");
}
mysqli_query($connx,$sql); 


$sqltwo = "update notifications set status='Hide' WHERE notifi_id = $id ";
if($sqltwo)
{
    header("location:NotifiFac.php");
}
mysqli_query($connx,$sqltwo); 

?>