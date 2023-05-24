<?php 
include('includes/header.php');

$directory="files/book";


$sql = "SELECT * from book where bookid=$_GET[bookid];";
        $all_course = mysqli_query($conn,$sql);
        while ($course = mysqli_fetch_array($all_course,MYSQLI_ASSOC)):;
        {
        ?><br><br>
<center>

   <img class="card scale-on-hover" height="800px" width="800px" src="assets/img/<?php echo $course['imgpath']?>"
        alt="Card Image">
   
       
  


    <h6><?php echo $course['name'],'-', $course['description'];?></a></h6>
    <a href="files/books/<?=$course['file']?>" target="_blank" style="color:green">View </a><br>

    <a href="files/books/<?=$course['file']?>" style="color:green" Download>Download </a><br>

    <iframer src="files/books/<?=$course['file']?>" height="300px">

        <?php }
        endwhile;?><br><br>
        <?php include('includes/footer.php')?>
        
        