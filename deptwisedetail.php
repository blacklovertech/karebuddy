<?php 
include('includes/header.php');
?>
<main class="page projects-page">
    <section class="portfolio-block projects-cards">
        <div class="container">
            <div class="heading">
                <h2 style="color: var(--bs-indigo);"><?php
            $sql = "SELECT * FROM dept where  deptid = $_GET[deptid]";
            
            $all_course = mysqli_query($conn,$sql);
            $course = mysqli_fetch_array($all_course,MYSQLI_ASSOC);
            echo $course['descri'];
            ?>
                </h2>
            </div>
            <center>
                <div class="row">
                    <?php

        $sql = "SELECT dept.name, year.yearid , year.imgpath FROM dept JOIN year ON dept.deptid = '$_GET[deptid]' ;";
        $all_course = mysqli_query($conn,$sql);
        

        while ($course = mysqli_fetch_array($all_course,MYSQLI_ASSOC)):;
        {
        ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0"><a
                                href="subjectyearwise.php?<?php echo"name=$course[name]&deptid=$_GET[deptid]&yearid=$course[yearid]"?>">

                                <div class="container"> <img class="card-img-top scale-on-hover"
                                        src="assets/img/<?php echo $course["imgpath"];?>" alt="Card Image">
                                    <h2 class="h2"><?php echo $course["name"]?></h2>

                                </div>
                                <div class="card-body">
                                    <h6><?php echo $course['yearid'];?>
                            </a></h6>
                            <p class="text-muted card-text"><?php echo $course['name'];?> </p>
                        </div>
                    </div>
                </div>
                <?php
              }
        endwhile;
       

?>