<?php
session_start();
include('include/conect.php');
include('include/header.php');
?>
<body>
                <!----------------------start slider------------------------------>
                <div class="slider">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <?php
                      $x=0;
                      $sql="SELECT * FROM `news` ORDER BY newsId DESC LIMIT 3";
                      $result=mysqli_query($conn,$sql);
                      $count=mysqli_num_rows($result);
                      while($row=mysqli_fetch_assoc($result)){
                      ?>
                      <!-- <div class="carousel-item active"> -->
                      <div class="carousel-item <?php echo($x==0 ? 'active' : '')?>">
                        <img class="d-block w-100" src="<?php echo $row['newsImage'] ;?>" alt="First slide" height="300px" >
                        <div class="carousel-caption d-none d-md-block" style="background:#dfe4ea;color:#1e90ff">
                          <h5><?php echo $row['newsTitle']; ?></h5>
                          <h5><p class="lead"><?php echo $row['newsDetail'];?></p></h5>
                      </div>

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                    <?php
                      $x++;}
                      ?>
                  </div>
            </div>

                <!-------------------------------------الاقسام----------------------------------------------->
    <div class="container-fluid">
        <div class="row bg-dark m-l-0 tit ">
            <h2 class ="col-9" style="text-align:right;"><b>اقسام ICTL</b></h2>
            <a href="newstudent.php" class="mt-1 col-3"><button class="btn btn-info">تسجيل طالب جديد</button></a>
            
            
                <?php 
                    $sql="SELECT * FROM `department`";
                    $re=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($re)){
                        ?>
                        <div class="col-sm-4 col-md-4 mb-5">
                        <div class="card" style=" width:18rem;max-height:400px;">
                        <img class="card-img-top" src="<?php echo $row['depimage'];?>" alt="Card image cap" style="height:200px;">
                        <div class="card-body">
                           <h5 class="card-title text-primary"><?php echo $row['depname'];?></h5>
                           <p class="card-text"><?php echo substr($row['depdetail'],0,150)."...";?></p>
                           <a href="dep2.php?id=<?php echo $row['depid'];?>" class="btn btn-primary">المزيد... </a>
                       </div>
                   </div>
                   </div> 
                <?php
                    }
                ?>
            <!---تقسيمة الكارد--->

        </div>
    </div>    




   <?php
   include('include/footer.php');
   ?>