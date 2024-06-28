<?php
session_start();
include('include/conect.php');
include('include/headercp.php');
$id=$_GET['id'];
$sql="DELETE FROM `news` WHERE newsId='$id'";
$r=mysqli_query($conn,$sql);
if($r){echo"<div class='alert alert-success text-center'>تم حذف الخبر</div>";
       header('location:news.php');}
else{echo"<div class='alert alert-danger text-center'>حدث خطأ    </div>";}
?>