<?php
session_start();
include('include/conect.php');
include('include/headercp.php');
?>
<style>
        .login{
            width:500px;
            margin:80px auto;
            background-color: #eaeaea;
            padding: 20px;
            border-radius: 25px;
            border:1px solid #eaeaea;
        }
        .login h5{
            color: #5b4834;
            margin-bottom: 20px;
            text-align:center;
            
        }
        .login button{
            margin-right:150px;
            width:120px;
        }
        body{
            background-color:#f1f2f6;
        }
    </style>
    </head>
    <body>
       <div class="login">
           <?php 
           if(isset($_POST['login'])){
           $username=$_POST['name'];
           $password=$_POST['password'];
           if(empty($username)||empty($password)){
            echo "<div class='alert alert-danger text-center'>الرجاء ملء الحقل ادناه </div>";
           }
           else{
               $sql="SELECT * FROM `users` WHERE username='$username' AND password='$password'";
               $result=mysqli_query($conn,$sql);
               if(mysqli_num_rows($result)==0){
                    echo "<div class='alert alert-danger text-center'>خطأ في اسم المستخدم او كلمة المرور</div>";
               }
               else{
                   $row=mysqli_fetch_assoc($result);
                   $_SESSION['id']=$row['id'];
                   $_SESSION['user']=$row['username'];
                   echo "<div class='alert alert-success text-center'>"."مرحبا بك يا ".$_SESSION['user']."سيتم تحويلك الى الموقع"."</div>";
                   header('REFRESH:3;URL=admins.php');

               }
           }
        }



?>
       <form method="POST" action="">
                <h5>تسجيل الدخول</h5>
                <div class="form-group">
                    <label for="name">اسم المستخدم </label>
                    <input type="text" class="form-control" id="name/"  name="name">
                </div>
            
                <div class="form-group">
                    <label for="pass">كلمة السر</label>
                    <input type="password" class="form-control" id="pass/"  name="password">
                </div>
                <button class="btn btn-custom" name="login">تسجيل الدخول</button>
            </form>
        </div>
       </div>
    <?php
   include('include/footer.php');
   ?>