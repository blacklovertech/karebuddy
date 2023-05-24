<?php

if (isset($_POST['upload'])) {
    
    $file_title = $_POST['title'];
    $file_description = $_POST['description'];
    
   $userid= $_SESSION['login_id'];
    $deptid = $_POST['deptid'];
    $yearid = $_POST['yearid'];
    $subjectid = $_POST['subjectid'];

if (isset($_SESSION['id'])) {

        $file_uploader = $_SESSION['firstname'];        
     
    }

    $file = $_FILES['file']['name'];
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    $validExt = array ('pdf', 'txt', 'doc', 'docx', 'ppt' ,'xls','pptx','jpg','png');
    if (empty($file)) {
echo "<script>alert('Attach a file');</script>";
    }
    else if ($_FILES['file']['size'] <= 0 || $_FILES['file']['size']  > 46080000 )
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
            $query = "INSERT INTO `uploads`( `file_name`, `file_description`, `file_type`, `deptid`, `yearid`, `subjectid`, `file`,`user_id`)
             VALUES ('$file_title' , '$file_description' , '$fileext'  ,'$deptid','$yearid','$subjectid','$notefile','$userid')";
            $result = mysqli_query($conn , $query) or die(mysqli_error($conn));
            if (mysqli_affected_rows($conn) > 0) {
                echo "<script> alert('file uploaded successfully.It will be published after admin approves it');
                window.location.href='index.php?page=document_list';</script>";
            }
            else {
                "<script> alert('Error while uploading..try again');</script>";
            }
        }
    }
}

?>

<center>
<font color="brown"> (allowed file type: 'pdf','doc','ppt','txt','zip' | allowed maximum size: 30 mb ) </font><br>
<font color="red">Only Added Subject are Available in DropDown </font>
</center>          
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
                                        <th><label for="post_title">Note Title/File Name</label></th>
                                        <td> <input type="text" name="title" class="form-control" value="<?php if(isset($_POST['upload'])) {
                                             echo $file_title; } ?>" required="">
                                        </td>

                                    </tr>
                                    <tr>
                                        <th><label for="post_tags">Short Note Description</label></th>
                                        <td> <input type="text" name="description" class="form-control" value="<?php if(isset($_POST['upload'])) {
                                       echo $file_description;  } ?>"></td>
                                    </tr>
                                    <tr>
                                        <th><label for=" post_tags">DEPARTMENT ID</label> </th>
                                        <td> <select class=" form-control" name="deptid">
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
                                            </select></td>

                                    <tr>
                                    <tr>

                                        <th><label for=" post_tags">Year ID</label></th>
                                        <td> <select class=" form-control" name="yearid">
                                                <?php
              $sql = "SELECT * FROM `subject`";
              $all_course = mysqli_query($conn,$sql);
              while ($course = mysqli_fetch_array($all_course,MYSQLI_ASSOC)):;
            ?>
                                                <option class="form-control" value="<?php echo $course["yearid"];?>">
                                                    <?php echo $course["yearid"] ?>
                                                </option>
                                                <?php endwhile;      ?>
                                            </select></td>
                                    </tr>
                                    <th><label for=" post_tags">Course Name</label></th>
                                    <td> <select class=" form-control" name="subjectid">
                                            <?php
              $sql = "SELECT * FROM `subject`";
              $all_course = mysqli_query($conn,$sql);
              while ($course = mysqli_fetch_array($all_course,MYSQLI_ASSOC)):;
            ?>
                                            <option class="form-control" value="<?php echo $course["subjectid"];?>">
                                                <?php echo $course["subjectid"] ,"-",$course["name"]; ?>
                                            </option>
                                            <?php endwhile;      ?>
                                        </select></td>
                                    </tr>
                                    <tr>

                                        <th><label for=" post_image">Select File</label></th>
                                        <td><input type="file" name="file" id="file">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>


                                            <button type="submit" name="upload" class="btn btn-primary"
                                                value="Upload Note">Upload Note</button>

                                        </td>

                                    </tr>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</tbody>
</table>
</form>