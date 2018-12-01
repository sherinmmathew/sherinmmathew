<?php
include("connect.php");
$new_date = date('y-m-d', strtotime($_POST['choose_ur_date']));
$new_time = date('H:i', strtotime($_POST['choose_ur_time']));
$h_name=$_POST['h_name'];
$d_name=$_POST['d_name'];
$p_id=$_POST['p_id'];
$n_id=$_POST['n_id'];
$user_id=$_POST['u_id'];
$p_name=$_POST['p_name'];
#echo $user_id;
#echo $n_id;
#echo $p_id;
#echo $new_date;
#echo $new_time;
$q="insert into appointment(date,time,user_name,doctor_id,d_name,user_details_id,hospital,department,status) values('$new_date','$new_time','$n_id','$p_id','$p_name','$user_id','$h_name','$d_name','0')";
$reslt=mysql_query($q);
echo "<script>window.onload=function(){alert('Register Successfully... Confirmation will send soon :)');window.location='patient_home.php';}</script>";
?>