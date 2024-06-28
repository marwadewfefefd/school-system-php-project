<?php
session_start();
include('include/conect.php');
include('include/headercp.php');
$id=$_GET['id'];
$sql="DELETE FROM `menu` WHERE menuId='$id'";
$r=mysqli_query($conn,$sql);
if($r){echo"<div class='alert alert-success text-center'>تم الحذف </div>";
       header('location:menu.php');}
else{echo"<div class='alert alert-danger text-center'>حدث خطأ    </div>";}
?>