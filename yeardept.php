<?php 
include('includes/header.php');
?>
<main class="page projects-page">
<section class="portfolio-block projects-cards">
    <div class="container">
        <div class="heading">
            <h2 style="color: var(--bs-indigo);">Year's </h2>
        </div>
        <div class="row">
            <?php

        $sql = "SELECT dept.name, year.yearid , dept.imgpath FROM dept JOIN year ON dept.deptid = '$_GET[deptid]' ;";
        $all_course = mysqli_query($conn,$sql);

        while ($course = mysqli_fetch_array($all_course,MYSQLI_ASSOC)):;
        {
        ?>
        <div class="col-md-6 col-lg-4">
        <div class="card border-0"><a href="subjectyear.php?<?php echo"name=$course[name]&deptid=$_GET[deptid]&yearid=$course[yearid]"?>"><img class="card-img-top scale-on-hover" src="assets/img/dept/<?php echo $course['imgpath'];?>" alt="Card Image"></a>
                <div class="card-body">
                    <h6><a href="CSE/index.html"> <?php echo $course['yearid'];?></a></h6>
                    <p class="text-muted card-text"><?php echo $course['name'];?> </p>
                </div>
            </div>
        </div>
        <?php
              }
        endwhile;
       

?>