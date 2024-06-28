<?php
session_start();
if(isset($_SESSION['id'])){
include('include/conect.php');
include('include/headercp.php');
$id=$_GET['id'];
$name=$_GET['name'];
$detail=$_GET['detail'];
$image=$_GET['image'];
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
                        $title=$_POST['title'];
                        $content=$_POST['content'];
                        $oldimage=$_POST['oldimage'];
                        if(empty($title)||empty($content)){
                            echo"<div class='alert alert-danger text-center'>الرجاء ملء الحقل ادناه </div>";
                        }
                        else{
                            if(isset($_FILES['postImage'])){
                                $imageName=$_FILES['postImage']['name'];
                                $imageTmp=$_FILES['postImage']['tmp_name'];
                                $imageType=$_FILES['postImage']['type'];
                                $imageSize=$_FILES['postImage']['size'];
                                $imageError=$_FILES['postImage']['error'];
                                $ext='img/';
                                $mmm=rand(0,1000).basename($imageName);
                                $ext=$ext.$mmm;
                                move_uploaded_file($imageTmp,$ext);
                                if($_FILES['postImage']['name'] !=''){
                                    $sql="UPDATE `news` SET `newsTitle`='$title',`newsDetail`='$content',`newsImage`='$ext' WHERE newsId='$id'";
                                    $result=mysqli_query($conn,$sql);
                                    if($result){echo "<div class='alert alert-success text-center'>تم تعديل البيانات    </div>";
                                                echo"<script>window.location.href='news.php';</script>";}
                                    else{echo"<div class='alert alert-danger text-center'>حدث خطأ  </div>";}}
    
                                    else{
                                        $sq="UPDATE `news` SET `newsTitle`='$title',`newsDetail`='$content',`newsImage`='$oldimage' WHERE newsId='$id'";
                                        $r=mysqli_query($conn,$sq);
                                        if($r){echo "<div class='alert alert-success text-center'>تم تعديل البيانات    </div>";
                                                    echo"<script>window.location.href='news.php';</script>";}
                                        else{echo"<div class='alert alert-danger text-center'>حدث خطأ  </div>";}

                                    }
                                
                                

                                }

                             
                            }
                        }
                    
                    ?>
                    <div class="titbtn"><button class="btn btn-custom2">تعديل الخبر </button></div>
                        <div class="form-group">
                            <label for="title">العنوان </label>
                            <input type="text" name="title" class="form-control" value="<?php echo $name ;?>">
                        </div>
                        <div class="form-group">
                            <label for="image"> صورة الخبر</label> 
                            <input type="file" id="image" class="form-control" name="postImage">
                            <input type="hidden" value="<?php echo $image ;?>" name="oldimage">
                        </div>

                        <div class="form-group">
                            <label for="content">تفاصيل الخبر</label>
                            <textarea class="form-control area" style="height:150px;" name="content" ><?php echo $detail ;?></textarea>
                        </div>

                        <button class=" btn btn-custom form-control"  name="add">إرسال </button>
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