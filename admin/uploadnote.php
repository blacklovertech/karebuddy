<?php 
define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);
    ?>

<?php

if (isset($_POST['upload'])) {
    
    $file_title = $_POST['title'];
    $file_description = $_POST['description'];
    
    $deptid = $_POST['deptid'];
    $yearid = $_POST['yearid'];
    $subjectid = $_POST['subjectid'];

if (isset($_SESSION['id'])) {

        $file_uploader = $_SESSION['name'];        
     
    }

    $file = $_FILES['file']['name'];
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    $validExt = array ('pdf', 'txt', 'doc', 'docx', 'ppt' , 'zip','xls');
    if (empty($file)) {
echo "<script>alert('Attach a file');</script>";
    }
    else if ($_FILES['file']['size'] <= 0*KB || $_FILES['file']['size']  >  40*MB )
    {
echo "<script>alert('file size is not proper');</script>";
    }
    else if (!in_array($ext, $validExt)){
        echo "<script>alert('Not a valid file');</script>";

    }
    else {
         
        $folder  = "../files/$deptid/$yearid/$subjectid/";
        $fileext = strtolower(pathinfo($file, PATHINFO_EXTENSION) );
        $notefile = rand(1000 , 1000000) .'.'.$fileext;
        
        if(move_uploaded_file($_FILES['file']['tmp_name'], $folder.$notefile)) {
            $query = "INSERT INTO `uploads`( `file_name`, `file_description`, `file_type`, `file_uploader`, `deptid`, `yearid`, `subjectid`, `file`)
             VALUES ('$file_title' , '$file_description' , '$fileext' , 'admin' ,'$deptid','$yearid','$subjectid','$notefile')";
            $result = mysqli_query($conn , $query) or die(mysqli_error($conn));
            if (mysqli_affected_rows($conn) > 0) {
                echo "<script> alert('file uploaded successfully.It will be published after admin approves it');
                window.location.href='index.php?page=notes';</script>";
            }
            else {
                "<script> alert('Error while uploading..try again');</script>";
            }
        }
    }
}
?>
<font color="brown"> (allowed file type: 'pdf','doc','ppt','txt','zip' | allowed maximum size: 30 mb ) </font>

<div id="wrapper">
    <div id="page-wrapper">

        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">

                        <form role="form" action="" method="POST" enctype="multipart/form-data">
                            <table class="table table-bordered table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <th><label for="post_title" >Note Title</label></th>
                                        <th> <input type="text"  name="title" class="form-control" value="<?php if(isset($_POST['upload'])) {
                                             echo $file_title; } ?>" required="">
                                        </th>

                                    </tr>
                                    <tr>
                                        <th><label for="post_tags">Short Note Description</label></th>
                                        <th> <input type="text" name="description" class="form-control" value="<?php if(isset($_POST['upload'])) {
                                       echo $file_description;  } ?>" ></th>
                                    </tr>
                                    <tr>
                                        <th><label for=" post_tags">DEPARTMENT ID</label> </th>
                                        <th> <select cclass=" form-control" name="deptid">
                                                <?php
              $sql = "SELECT * FROM `subject`";
              $all_course = mysqli_query($conn,$sql);
              while ($course = mysqli_fetch_array($all_course,MYSQLI_ASSOC)):;
            ?>
                                                <option class="form-control" value="<?php echo $course["deptid"];?>">
                                                    <?php echo $course["deptid"] ,'-'  ;                           
              $sql = "SELECT * FROM `dept` where deptid =$course[deptid] ";
              
              $all_course = mysqli_query($conn,$sql);
              while ($course = mysqli_fetch_array($all_course,MYSQLI_ASSOC)):;
            
                         echo $course["name"];
                            endwhile;  
              
                               
                                                     ?>
                                                </option>
                                                <?php endwhile;      ?>
                                            </select></th>

                                    <tr>
                                         <tr>

                                        <th><label for=" post_tags">Year ID</label></th>
                                        <th> <select cclass=" form-control" name="yearid">
                                                <?php
              $sql = "SELECT * FROM `subject`";
              $all_course = mysqli_query($conn,$sql);
              while ($course = mysqli_fetch_array($all_course,MYSQLI_ASSOC)):;
            ?>
                                                <option class="form-control" value="<?php echo $course["yearid"];?>">
                                                    <?php echo $course["yearid"] ?>
                                                </option>
                                                <?php endwhile;      ?>
                                            </select></th>
                                    </tr>
                                    <th><label for=" post_tags">Course Name</label></th>
                                    <th> <select cclass=" form-control" name="subjectid">
                                            <?php
              $sql = "SELECT * FROM `subject`";
              $all_course = mysqli_query($conn,$sql);
              while ($course = mysqli_fetch_array($all_course,MYSQLI_ASSOC)):;
            ?>
                                            <option class="form-control" value="<?php echo $course["subjectid"];?>">
                                                <?php echo $course["subjectid"] ,"-",$course["name"]; ?>
                                            </option>
                                            <?php endwhile;      ?>
                                        </select></th>
                                    </tr>
                                    <tr>

                                        <th><label for=" post_image">Select File</label></th>
                                        <th><input type="file" name="file" id="file">
                                        </th>
                                    </tr>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<button type="submit" name="upload" class="btn btn-primary" value="Upload Note">Upload Note</button>

</tbody>
</table>
</form>
