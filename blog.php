<main class="page projects-page">
    <section class="portfolio-block projects-cards">
        <div class="container">
            <div class="heading">
                <h2 style="color: var(--bs-indigo);">Blog Posts's</h2>
            </div>
            <div class="row">
                <?php
              $sql = "SELECT * FROM `blog`";
              $all_course = mysqli_query($conn,$sql);
              while ($course = mysqli_fetch_array($all_course,MYSQLI_ASSOC)):;
            ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0"><a href="blog/<?php echo $course["filename"];?>.html"><img
                                class="card-img-top scale-on-hover" src="assets/img/blog/<?php echo $course["imgpath"];?>"
                                alt="Card Image">
                            <div class="card-body">
                                <h6><?php echo $course["name"];?>
                        </a></h6>
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