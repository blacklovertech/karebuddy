<?php 

if (isset($_POST['upload'])) {
    
    $name = $_POST['name'];
    $descri = $_POST['descri'];
    
   $userid= $_SESSION['login_id'];
    $deptid = $_POST['deptid'];
    $yearid = $_POST['yearid'];
    $subjectid = $_POST['subjectid'];
    $imgpath = $_POST['imgpath'];
   
    $query = "INSERT INTO `subject`( `name`, `descri`, `deptid`, `yearid`, `subjectid`, `imgpath`)
    VALUES ('$name' , '$descri' , '$deptid','$yearid','$subjectid','$imgpath')";
     $structure = "../files/$deptid/$yearid/$subjectid";
     if (!mkdir($structure, 0, true)) {
     die('Failed to create folders...');
     }
   $result = mysqli_query($conn , $query) or die(mysqli_error($conn));

   if (mysqli_affected_rows($conn) > 0) {
       echo "<script> alert('Added successfully.It will be published ');
       window.location.href='index.php';</script>";
   }
   else {
       "<script> alert('Error while Adding ..try again');</script>";
   }

}
?>


<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <form action="" id="manage_user">
                <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
                <div class="row">
                    <div class="col-md-6 border-right">
                        <b class="text-muted">Personal Information</b>
                        <form role="form" action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="" class="control-label">First Name</label>
                                <input type="text" name="firstname" class="form-control form-control-sm" required
                                    value="<?php echo isset($firstname) ? $firstname : '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="post_title">Subject Name</label>
                                <input type="text" name="name" class="form-control" value="<?php if(isset($_POST['upload'])) {
                                             echo $name; } ?>" required="">
                            </div>
                            <div class="form-group">
                                <label for="post_tags">Short Description</label> <input type="text" name="descri"
                                    class="form-control" value="<?php if(isset($_POST['upload'])) {
                                       echo $descri;  } ?>" required="">
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <br>
                            <label for=" post_tags">DEPARTMENT ID</label>

                            <select class="custom-select custom-select-sm" name="deptid">
                                <?php
              $sql = "SELECT * FROM `dept`";
              $all_course = mysqli_query($conn,$sql);
              while ($course = mysqli_fetch_array($all_course,MYSQLI_ASSOC)):;
            ?>
                                <option class="form-control" value="<?php echo $course["deptid"];?>">
                                    <?php echo $course["deptid"] ,"-",$course["name"]; ?>
                                </option>
                                <?php endwhile;      ?>
                            </select>
                        </div>
                        <div class="form-group"><label for=" post_tags">Year ID</label> <select
                                class="custom-select custom-select-sm" name="yearid">
                                <?php
              $sql = "SELECT * FROM `year`";
              $all_course = mysqli_query($conn,$sql);
              while ($course = mysqli_fetch_array($all_course,MYSQLI_ASSOC)):;
            ?>
                                <option class="form-control" value="<?php echo $course["yearid"];?>">
                                    <?php echo $course["yearid"] ?>
                                </option>
                                <?php endwhile;      ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="post_tags">Subjectid</label>
                            <input type="text" name="subjectid" class="form-control" value="<?php if(isset($_POST['upload'])) {
                                       echo $subjectid;  } ?>" required="">

                        </div>
                        <div class="form-group">
                            <label for=" post_tags">image path</label></th>
                            <input type="text" name="imgpath" class="form-control" value="<?php if(isset($_POST['upload'])) {
                                       echo $imgpath;  } ?>" required="">
                        </div>






                    </div>

                </div>
                <hr>
                <div class="col-lg-12 text-right justify-content-center d-flex">
                    <button type="submit" name="upload" class="btn btn-primary mr-2">Upload
                        Subject</button>
                    <button class="btn btn-secondary" type="button"
                        onclick="location.href = 'index.php?page=subject_list'">Cancel</button>
                </div>

        </div>
    </div>
</div>
</div>