<?php
session_start();
include('include/conect.php');
include('include/headercp.php');
$id=$_GET['id'];
$sql="DELETE FROM `users` WHERE id='$id'";
$r=mysqli_query($conn,$sql);
if($r){echo"<div class='alert alert-success text-center'>تم حذف القسم</div>";
       header('location:admins.php');}
else{echo"<div class='alert alert-danger text-center'>حدث خطأ    </div>";}
   ?>