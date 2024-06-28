<?php
include 'conect.php';
?>
<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-rtl.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>لوحة التحكم</title>
</head>
<body>
        <!------------------------------nav--------------------------------->
    
        <div class="container" style="margin-top: 100px;">
            <div class="row">
                <!-- <div class"col-md-1"></div>-->
                <div class="col-md-10">
                    <nav class="navbar navbar-expand-sm navbar-dark fixed-top bg-dark">
                        <div id="logo">
                            <h2><b>المركز الفلسطيني للتعليم التقني</b></h2>
                          
                        </div>
                        <div class="list">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>
                        <div class="collapse navbar-collapse" id="nav-main">
                          <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                              <a class="nav-link" href="index.php">الرئيسية <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="about.php">عن المركز</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">تسجيل الدخول</a>
                              </li>
                          <?php 
                          if(isset($_SESSION['id'])){
                            ?>
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               الاعدادات
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="admins.php">لوحة التحكم</a>
                                <a class="dropdown-item" href="logout.php?id=<?php $_SESSION['id'];?>"> تسجيل الخروج</a>
                              </div>
                            </li>
                            <?php
                            }else{
                              echo "<li class='nav-item dropdown'>
                              <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                               الاعدادات
                              </a>
                              <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                <a class='dropdown-item' href='login.php'>تسجيل للوحة التحكم</a>
                              </div>
                            </li>";
                            }
                            ?>

                        </div>

                    </nav>
                </div>
            </div>
        </div>
        <!------------------------->

