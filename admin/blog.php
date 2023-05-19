<?php include ('includes/connection.php'); ?>
<?php include ('includes/header.php'); ?>


 <div id="wrapper">
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Blog
                       
                        <div class="col-xs-4">
            <a href="addblog.php" class="btn btn-primary">Add Blog</a> </h1>
            </div>
                       
                         
<div class="row">
<div class="col-lg-12">
        <div class="table-responsive">

<form action="" method="post">
            <table class="table table-bordered table-striped table-hover">


            <thead>
                    <tr>
                        
                    <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image Path </th>
                        <th>File Name</th>
                        <th>Delete</th>
                        
                    </tr>
                </thead>
                <tbody>

                 <?php

$query = "SELECT * FROM blog ";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
   
    $id = $row['id'];
    $name = $row['name'];
    $descri = $row['descri'];
    $filename = $row['filename'];
    $imgpath = $row['imgpath'];

    echo "<tr>";
    
    echo "<td>$id</td>";
    echo "<td>$name</td>";
    echo "<td>$descri</td>";
    echo "<td>$imgpath</td>";
    echo "<td>$filename</td>";
    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete this post?')\" href='?del=$id'><i class='fa fa-times' style='color: red;'></i>delete</a></td>";

    echo "</tr>";

}
}
?>


                </tbody>
            </table>
</form>
</div>
</div>
</div>
 <?php
 
    if (isset($_GET['del'])) {
        $note_del = mysqli_real_escape_string($conn, $_GET['del']);
       
        $del_query = "DELETE FROM blog where id='$id'";
        $run_del_query = mysqli_query($conn, $del_query) or die (mysqli_error($conn));
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>alert('year deleted successfully');
            window.location.href='year.php';</script>";
        }
        else {
         echo "<script>alert('error occured.try again!');</script>";   
        }
        }
   ?>    


 <script src="js/jquery.js"></script>

    
    <script src="js/bootstrap.min.js"></script>

</body>

</html
