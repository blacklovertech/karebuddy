<?php 

if (isset($_POST['upload'])) {
    
    $name = $_POST['name'];
    $descri = $_POST['descri'];
   $userid= $_SESSION['login_id'];
    $imgpath = $_POST['imgpath'];
   
    $query = "INSERT INTO `dept`( `name`, `descri`,  `link`, `imgpath`)
    VALUES ('$name' , '$descri' , '$deptid','$link','$imgpath')";
     $structure = "../files/$deptid/";
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

                                <label for="post_title">Subject Name</label> <input type="text" name="name"
                                    class="form-control" value="<?php if(isset($_POST['upload'])) {
                                             echo $name; } ?>" required="">
                            </div>

                    </div>



                    <div class="col-md-6"><br>
                        <div class="form-group"> <label for="post_title">Subject Name</label> <input type="text"
                                name="name" class="form-control" value="<?php if(isset($_POST['upload'])) {
                                             echo $name; } ?>" required=""></div>

                    </div>



                    <hr>
                    <div class="col-lg-12 text-right justify-content-center d-flex">

                        <button type=" submit" name="upload" class="btn btn-primary mr-2" value="Upload Note">Upload
                            Subject</button>

                        <button class="btn btn-secondary" type="button"
                            onclick="location.href = 'index.php?page=subject_list'">Cancel</button>
                    </div>
            </form>