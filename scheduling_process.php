<?php
include("connect.php");
$user_id=$_POST['user_id'];
$start_time=$_POST['start_time'];
$end_time=$_POST['end_time'];

$q="insert into time(stime,etime,user_details_id) values('$start_time,'$end_time','$user_id')";
$reslt=mysql_query($q);