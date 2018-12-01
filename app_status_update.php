<?php
$sts=$_GET['sts'];
$user_id=$_GET['id'];
//$user_id=$_GET['user_id'];
include("connect.php");
if($sts=='1')
{
	$sql=mysql_query("UPDATE appointment SET status='0' where 	appointment_id = '$user_id'");
	header("location:view_appointment.php");
}
else
{
	$sql=mysql_query("UPDATE appointment SET status='1' where  	appointment_id = '$user_id'");
	header("location:view_appointment.php");
}
?>