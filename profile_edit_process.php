<?php
include("connect.php");
$user_id=$_POST['user_id'];
$name=$_POST['name'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$target_dir = "upload/";
$pro_pic=$_FILES['PF_file']['name'];
$proc_tmp=$_FILES['PF_file']['tmp_name'];
echo $pro_pic;

$qry=mysql_query("update user_details set user_full_name='$name',user_address='$address',phone='$phone',email_id='$email' where user_details_id='$user_id'");

$query="insert into profile_pic(user_details_id,image_path) values('$user_id','$pro_pic')";
$reslt=mysql_query($query);
move_uploaded_file($proc_tmp,$target_dir.$pro_pic);

echo "<script>window.onload=function(){alert('Updated');window.location='profile.php';}</script>";

?>