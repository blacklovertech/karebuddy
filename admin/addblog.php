<?php session_start();
include ('includes/header.php');
include ('includes/connection.php');



if (isset($_POST['upload'])) {
    $file = $_FILES['file']['name'];
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    $validExt = array ('pdf', 'txt', 'doc', 'docx', 'ppt' , 'zip','xls');
    $folder  = "../blog/";
    $fileext = strtolower(pathinfo($file, PATHINFO_EXTENSION) );
    
    $notefile = $filename .'.'.$fileext;

    $name = $_POST['name'];
    $descri = $_POST['descri'];
    $filename = $_POST['filename'];
    $imgpath = $_POST['imgpath'];

    $query = "INSERT INTO `blog`( `name`, `descri`,  `filename`, `imgpath`)
    VALUES ('$name' , '$descri' ,'$filename','$imgpath')";
   $result = mysqli_query($conn , $query) or die(mysqli_error($conn));

   if (mysqli_affected_rows($conn) > 0) {
       echo "<script> alert('Added successfully.It will be published ');
       window.location.href='blog.php';</script>";
   }
   else {
       "<script> alert('Error while Adding ..try again');</script>";
   }

}
?>
<font color="brown"> (allowed file type: 'html' | allowed maximum size: 30 mb ) </font>

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
                                        <th><label for="post_title">Blog Name</label></th>
                                        <th> <input type="text" name="name" class="form-control" value="<?php if(isset($_POST['upload'])) {
                                             echo $name; } ?>" required="">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th><label for="post_tags">Blog Description</label></th>
                                        <th> <input type="text" name="descri" class="form-control" value="<?php if(isset($_POST['upload'])) {
                                       echo $descri;  } ?>" required="" "></th>
                                   
                                    </tr>
                                    <tr>
                                        <th><label for=" post_tags">File Name</label></th>
                                        <th> <input type="text" name="filename" class="form-control" value="<?php if(isset($_POST['upload'])) {
                                       echo $filename;  } ?>" required="" ">
                                           </th>
                                    </tr>
                                    <tr>
                                    <th><label for=" post_tags">image path</label></th>
                                        <th> <input type="text" name="imgpath" class="form-control" value="<?php if(isset($_POST['upload'])) {
                                       echo $imgpath;  } ?>" required="" ">
                                           </th>
                                       
                                    </tr>
                                    <tr>

                            <th><label for="post_image">Select File</label></th>
                                        <th><input type="file" name="file" id="file">
                                        </th>
                                    </tr>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<button type=" submit" name="upload" class="btn btn-primary" value="Upload Note">Upload Blog</button>

</tbody>
</table>
</form>