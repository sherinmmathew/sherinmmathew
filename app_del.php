<?php

$u_id=$_GET['id'];
//$user_id=$_GET['user_id'];
include("connect.php");
$sql=mysql_query("DELETE FROM appointment where appointment_id = '$u_id'");
	header("location:view_appointment.php");