

 <div id="wrapper">
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        <div class="col-xs-4">
            <a href="index.php?page=addsubject" class="btn btn-primary">Add New subject</a>
            </div>
                        Subject
                        </h1>
                         
<div class="row">
<div class="col-lg-12">
        <div class="table">

<form action="" method="post">
            <table class="table table-bordered table-striped table-hover">


            <thead>
                    <tr>
                        <th>Subject ID</th>
                        <th>Description</th>
                        <th>Image Path </th>
                        <th>Name</th>
                        <th>Delete</th>
                        
                    </tr>
                </thead>
                <tbody>

                 <?php

$query = "SELECT * FROM subject ";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
    $subjectid = $row['subjectid'];
    $desci = $row['descri'];
    $imgpath= $row['imgpath'];
    $name = $row['name'];

    echo "<tr>";
    echo "<td>$subjectid</td>";
    echo "<td>$desci</td>";
    echo "<td>$imgpath</td>";
    echo "<td>$name</td>";
    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete this post?')\" href='?del=$subjectid'><i class='fa fa-times' style='color: red;'></i>delete</a></td>";

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
       
        $del_query = "DELETE FROM subject where subjectid='$subjectid'";
        $run_del_query = mysqli_query($conn, $del_query) or die (mysqli_error($conn));
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>alert('Subject deleted successfully');
            window.location.href='subject.php';</script>";
        }
        else {
         echo "<script>alert('error occured.try again!');</script>";   
        }
        }
   ?>    