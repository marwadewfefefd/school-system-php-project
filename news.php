<?php
session_start();
if(isset($_SESSION['id'])){
include('include/conect.php');
include('include/headercp.php');
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
        <div class="col-md-10" id="main-area"style="margin-bottom:50px;">
                  <!-- display posts -->
                  <div class="row">
                  <div class="col-md-9">
                  <table class="table mb-5" style="background-color:#fff;">
                                    <tr style="color:#fff;background-color: var(--first-color)!important;">
                                        <th>#</th>
                                        <th>العنوان </th>
                                        <th>الصورة </th>
                                        <th>التفاصيل</th>
                                        <th>تاريخ الخبر </th>
                                        <th>تعديل </th>
                                        <th>حذف </th>
                                    </tr>  
                                        <?php
                                            $sql="SELECT * FROM `news`";
                                            $r=mysqli_query($conn,$sql);
                                            $no=0;
                                            while($row=mysqli_fetch_assoc($r)){
                                            $no++;
                                        ?>
                                    <tr>
                                        <td><?php echo $no ;?></td>
                                        <td><?php echo $row['newsTitle'];?></td>
                                        <td><?php echo"<img src='$row[newsImage]' width='80px' height='70px'>";  ?></td>
                                        <td><?php echo $row['newsDetail'];?></td>
                                        <td><?php echo $row['newsDate'];?></td>
                                        <td><a href="editnews.php?id=<?php echo $row['newsId'] ;?>&name=<?php echo $row['newsTitle'];?>&detail=<?php echo $row['newsDetail'];?>&date=<?php echo $row['newsDate'];?>&image=<?php echo $row['newsImage'];?>" class="btn btn-custom">تعديل </a></td>
                                        <td><a href="delnews.php?id=<?php echo $row['newsId']; ?>" class="btn btn-custom" name="delete">حذف </a></td>
                                    </tr>
                                    <?php 
                                        }
                                    ?>
                     </table>
                  </div>
                  <div class="col-md-1">
                      <a href="newnews.php"class="btn btn-info sidebtn " >إضافة خبر</a>
                  </div>
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