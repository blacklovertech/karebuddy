<main class="page projects-page">
    <section class="portfolio-block projects-cards">
        <div class="container">
            <div class="heading">
                <h2 style="color: var(--bs-indigo);">Subjects List </h2>
            </div>
            <div class="row">
                <?php
            

    
    

        $sql = "SELECT * from subject ;";
        $all_course = mysqli_query($conn,$sql);
        while ($course = mysqli_fetch_array($all_course,MYSQLI_ASSOC)):;
        {
        ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0"><a
                            href="viewsubject.php?<?php echo"name=$course[name]&deptid=$course[deptid]&yearid=$course[yearid]&subjectid=$course[subjectid]"?>">
                            <img
                                class="card-img-top scale-on-hover" src="assets/img/<?php echo $course['imgpath'];?>"
                                alt="Card Image"></a>
                        <div class="card-body">
                            <h6><a href="CSE/index.html"><?php echo $course['subjectid'];?></a></h6>
                            <p class="text-muted card-text"> <?php echo $course['name'];?></p>
                        </div>
                    </div>
                </div>
                <?php
              }
        endwhile;



?>