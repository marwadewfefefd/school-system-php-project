<?php
session_start();
if(isset($_SESSION['id'])){
include('include/conect.php');
include('include/headercp.php');
$id=$_GET['id'];
$name=$_GET['name'];
$pass=$_GET['pass'];
?>
<body>
                <!----start content--------->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2" id="side-area">
                                <h4>لوحة التحكم</h4>
                                <ul>
                                     <!---------articles--------->
                                     <li data-toggle="collapse" href="#dep">
                                        
                                        <a href="#">
                                            <span><i class="fas fa-tags"></i></span>
                                            <span>الاقسام</span>
                                        </a>
                                    </li>
                                    <ul class="collapse" id="dep">
                                        <li>
                                            <a href="newdep.php">
                                                <span><i class="fas fa-edit"></i></span>
                                                <span>إضافة قسم  </span>
                                            </a>
                                        </li>
    
                                        <li>
                                            <a href="deps.php">
                                                <span><i class="fas fa-th"></i></span>
                                                <span>عرض الاقسام </span>
                                            </a>
                                        </li>
                                    </ul>
    
                                <!----end  articles--------->
                                <li>
                                        <a href="menu.php" target="_blank">
                                            <span><i class="fas fa-bars"></i></span>
                                            <span>القائمة </span>
                                        </a>
                                    </li>

                                <!---------articles--------->
                                <li data-toggle="collapse" href="#news">
                                        
                                        <a href="#">
                                            <span><i class="far fa-newspaper"></i></span>
                                            <span>الأ خبار</span>
                                        </a>
                                    </li>
                                    <ul class="collapse" id="news">
                                        <li>
                                            <a href="newnews.php">
                                                <span><i class="fas fa-edit"></i></span>
                                                <span>خبر جديد</span>
                                            </a>
                                        </li>
    
                                        <li>
                                            <a href="news.php">
                                                <span><i class="fas fa-th"></i></span>
                                                <span>كل الأخبار</span>
                                            </a>
                                        </li>
                                    </ul>
    
                                <!----end  articles--------->

                                 <!---------articles--------->
                                    <li data-toggle="collapse" href="#students">
                                        
                                        <a href="#">
                                            <span><i class="fas fa-user-graduate"></i></span>
                                            <span>الطلاب </span>
                                        </a>
                                    </li>
                                    <ul class="collapse" id="students">
                                        <li>
                                            <a href="newstudent.php">
                                                <span><i class="fas fa-edit"></i></span>
                                                <span>طالب جديد</span>
                                            </a>
                                        </li>
    
                                        <li>
                                            <a href="students.php">
                                                <span><i class="fas fa-th"></i></span>
                                                <span>عرض الطلاب</span>
                                            </a>
                                        </li>
                                    </ul>
    
                                <!----end  articles--------->

                                    <li>
                                        <a href="admins.php">
                                            <span><i class="fas fa-user-lock"></i></span>
                                            <span>مدراء الموقع </span>
                                        </a>
                                    </li>
    
                                    <li>
                                        <a href="logout.php">
                                            <span><i class="fas fa-sign-out-alt"></i></span>
                                            <span>تسجيل الخروج</span>
                                        </a>
                                    </li>
    
                                </ul>
                            </div>

            <!------------------------>
            <div class="col-md-10" id="main-area">
                <div class="add-category">
                    <form action="" method="POST" enctype="multipart/form-data" class="formcp"> 
                    <?php
                    if(isset($_POST['add'])){
                        $namee=htmlspecialchars($_POST['name']);
                        $passs=md5($_POST['pass']);
                        if(empty($namee)||empty($passs)){
                            echo"<div class='alert alert-danger text-center'>الرجاء ملء الحقل ادناه </div>";
                        }
                        else{
                            $sql="UPDATE `users` SET `username`='$namee',`password`='$passs' WHERE id='$id'";
                                $result=mysqli_query($conn,$sql);
                                if($result){echo "<div class='alert alert-success text-center'>تم تعديل البيانات    </div>";}
                                else{echo"<div class='alert alert-danger text-center'>حدث خطأ  </div>";}
                        }
                    }
                    ?>
                     <div class="w-100 p-3" style="text-align:center;background-color:#dfe6e9;"><h3>تعديل بيانات   </h3></div>
                        <div class="form-group">
                            <label for="title">اسم المستخدم </label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name ;?>">
                        </div>

                        <div class="form-group">
                            <label for="title">كلمة المرور </label>
                            <input type="password" name="pass" class="form-control" value="<?php echo $pass ;?>">
                        </div>
                       

                       

                        <button class=" btn btn-custom form-control" name="add">إرسال </button>
                    </form>
                </div>
            </div>
            <!------------------------>
        </div>
    </div>
</div>
<?php
   include('include/footer.php');
         }
         else{
         header('location:index.php');}
   ?>