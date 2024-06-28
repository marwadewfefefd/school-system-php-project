<?php
session_start();
if(isset($_SESSION['id'])){
include('include/conect.php');
include('include/header.php');
?>
<body>
<section class="dep" style="margin-bottom:200px;">
    <div class="container">

    <?php
      $Id=$_GET['id'];
      $sql="select * from department where depid=$Id;";
      $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
      
      ?>
      <div class="row" style="min-height:320px">
      <div class="card col-md-8">
          <div class="card-header text-justify"><h4><?php echo "أهلا بك في قسم:  ". $row['depname'];?></h4> </div>
          <div class="card-body text-justify">
              <p><?php echo $row['depdetail'];  ?></p>
          </div>
      </div>
<?php } ?>
    <!--------------------------->
    
    <div class="card col-md-4" >
        <div class="card-header text-center">
            التسجيل في القسم</div>
            <div class="card-body text-center">
            <a href="addstudent.php"><button class="btn btn-info ff">تسجيل طالب جديد</button></a>
            </div>
        </div>
        
    </div>
</div>
</section>
<?php
   include('include/footer.php');
         }
         else{
         header('location:index.php');}
   ?>