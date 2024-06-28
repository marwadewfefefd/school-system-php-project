<?php
session_start();
include('include/conect.php');
include('include/header.php');
?>
<body>
    <!--------------------------->
    <?php
      $sql="SELECT * FROM menu where menuId=1";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_assoc($result);
       
              ?>
  <section class="about" style="margin-bottom:200px;">
  <div class="container">
    <div class="row" style="min-height: 320px;">
        <div class="card col-md-12 hello" style="margin-top: 100px;">
            <div class="card-header "><b><?php echo $row['menuHead'];?></div>
            <div class="card-body" style="height:200px;"> 
            <?php echo $row['menuDetail'];?>
    </div>
</div>
</section>









<?php
   include('include/footer.php');
   ?>