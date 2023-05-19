<?php session_start();
include ('includes/header.php');
include ('includes/connection.php');



if (isset($_POST['upload'])) {
    
    $name = $_POST['name'];
    $descri = $_POST['descri'];
    
    $deptid = $_POST['deptid'];
    $yearid = $_POST['yearid'];
    $subjectid = $_POST['subjectid'];
    $imgpath = $_POST['imgpath'];

    $query = "INSERT INTO `subject`( `name`, `descri`, `deptid`, `yearid`, `subjectid`, `imgpath`)
    VALUES ('$name' , '$descri' , '$deptid','$yearid','$subjectid','$imgpath')";
   $result = mysqli_query($conn , $query) or die(mysqli_error($conn));

   if (mysqli_affected_rows($conn) > 0) {
       echo "<script> alert('Added successfully.It will be published ');
       window.location.href='notes.php';</script>";
   }
   else {
       "<script> alert('Error while Adding ..try again');</script>";
   }

}
?>
<font color="brown"> (allowed file type: 'pdf','doc','ppt','txt','zip' | allowed maximum size: 30 mb ) </font>

<div id="wrapper">
    <div id="page-wrapper">

        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="table">

                        <form role="form" action="" method="POST" enctype="multipart/form-data">
                            <table class="table table-bordered table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <th><label for="post_title">Subject Name</label></th>
                                        <th> <input type="text" name="name" class="form-control" value="<?php if(isset($_POST['upload'])) {
                                             echo $name; } ?>" required="">
                                        </th>
                                        <th><label for="post_tags">Short Description</label></th>
                                        <th> <input type="text" name="descri" class="form-control" value="<?php if(isset($_POST['upload'])) {
                                       echo $descri;  } ?>" required="" "></th>
                                    </tr>
                                    <tr>
                                        <th><label for=" post_tags">DEPARTMENT ID</label> </th>
                                        <th> <select cclass=" form-control" name="deptid">
                                                <?php
              $sql = "SELECT * FROM `dept`";
              $all_course = mysqli_query($conn,$sql);
              while ($course = mysqli_fetch_array($all_course,MYSQLI_ASSOC)):;
            ?>
                                                <option class="form-control" value="<?php echo $course["deptid"];?>">
                                                    <?php echo $course["deptid"] ,"-",$course["name"]; ?>
                                                </option>
                                                <?php endwhile;      ?>
                                            </select></th>
                                            <th><label for=" post_tags">Year ID</label></th>
                                        <th> <select cclass=" form-control" name="yearid">
                                                <?php
              $sql = "SELECT * FROM `year`";
              $all_course = mysqli_query($conn,$sql);
              while ($course = mysqli_fetch_array($all_course,MYSQLI_ASSOC)):;
            ?>
                                                <option class="form-control" value="<?php echo $course["yearid"];?>">
                                                    <?php echo $course["yearid"] ?>
                                                </option>
                                                <?php endwhile;      ?>
                                            </select></th>
                                   <tr>
                                 
                                        <th><label for="post_tags">Subjectid</label></th>
                                    <th> <input type="text" name="subjectid" class="form-control" value="<?php if(isset($_POST['upload'])) {
                                       echo $subjectid;  } ?>" required="" ">
                                           </th>
                                    </tr>
                                    <tr>
                                    <th><label for="post_tags">image path</label></th>
                                    <th> <input type="text" name="imgpath" class="form-control" value="<?php if(isset($_POST['upload'])) {
                                       echo $imgpath;  } ?>" required="" ">
                                           </th>
                                       
                                    </tr>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<button type="submit" name="upload" class="btn btn-primary" value="Upload Note">Upload Subject</button>

</tbody>
</table>
</form>








