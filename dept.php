    <main class="page projects-page">
        <section class="portfolio-block projects-cards">
            <div class="container">
                <div class="heading">
                    <h2 style="color: var(--bs-indigo);">DEPARTMENT's</h2>
                </div>
                <div class="row">
                <?php
              $sql = "SELECT * FROM `dept`";
              $all_course = mysqli_query($conn,$sql);
              while ($course = mysqli_fetch_array($all_course,MYSQLI_ASSOC)):;
            ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0"><a href="yeardept.php?deptid=<?php echo $course["deptid"];?>"><img class="card-img-top scale-on-hover" src="assets/img/dept/<?php echo $course["imgpath"];?>" alt="Card Image">
                            <div class="card-body">
                                <h6><?php echo $course["name"];?></a></h6>
                                <p class="text-muted card-text"> <?php echo $course["descri"];?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                // While loop must be terminated
            ?>

                   
                      
                    
               
            </div>
            </div>
               
            <div class="container">
                <div class="heading">
                    <h2 style="margin: 30px;color: var(--bs-indigo);">Extra curricular</h2>
                    <p style="font-weight: bold;font-size: 21px;">Manditory</p>
                </div>
                <div class="row">
                <?php
              $sql = "SELECT * FROM `extra`";
              $all_course = mysqli_query($conn,$sql);
              while ($course = mysqli_fetch_array($all_course,MYSQLI_ASSOC)):;
            ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0"><a href="index.php?page=<?php echo $course["name"];?>"><img class="card-img-top scale-on-hover" src="./assets/img/<?php echo $course["imgpath"];?>" alt="Card Image">
                            <div class="card-body">
                                <h6><?php echo $course["name"];?></a></h6>
                                <p class="text-muted card-text"> <?php echo $course["descri"];?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                // While loop must be terminated
            ?>


                </div>
            </div>
        </section>
    </main>  