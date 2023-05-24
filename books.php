<main class="page projects-page">
    <section class="portfolio-block projects-cards">
        <div class="container">
            <div class="heading">
                <h2 style="color: var(--bs-indigo);">Books List </h2>
            </div>
            <div class="row">
                <?php
            

    
    

        $sql = "SELECT * from book ;";
        $all_course = mysqli_query($conn,$sql);
        while ($course = mysqli_fetch_array($all_course,MYSQLI_ASSOC)):;
        {
        ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0"><a
                            href="viewbook.php?<?php echo"name=$course[name]&bookid=$course[bookid]"?>">
                            <div class="container">
                                <img class="card-img-top scale-on-hover"
                                    src="assets/img/<?php echo $course['imgpath']?>" alt="Card Image">
                                <h2 class="h2"><?php echo $course["name"]?></h2>
                            </div>
                            <div class="card-body">
                                <h6><?php echo $course['name'];?>
                        </a></h6>
                        <p class="text-muted card-text"> <?php echo $course['description'];?></p>

                    </div>
                </div>

                <?php
              }
        endwhile;



?>
            </div>
        </div>
    </section>
</main>