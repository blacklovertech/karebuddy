<?php include ('includes/connection.php'); ?>







    

<div id="wrapper">
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">

                        Latest Uploaded</h1>


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">

                                <form action="" method="post">
                                    <table class="table table-bordered table-striped table-hover">


                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Type </th>
                                                <th>View</th>
                                                <th>Download</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

$query = "SELECT * FROM uploads ORDER BY file_uploaded_on DESC";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
    $file_id = $row['file_id'];
    $file_name = $row['file_name'];
    $file_description = $row['file_description'];
    $file_type = $row['file_type'];
    $file_date = $row['file_uploaded_on'];
    $file_status = $row['status'];
    $file = $row['file'];

    echo "<tr>";
    echo "<td>$file_name</td>";
    echo "<td>$file_description</td>";
    echo "<td>$file_type</td>";
    echo "<td><a href='files/$file' target='_blank' style='color:green'>View </a></td>";
    echo "<td><a href='files/$file' target='_blank' style='color:green' download>Download </a></td>";
   
    echo "</tr>";

}
}
else {
    echo "<script>alert('Not notes yet! Start uploading now');
    window.location.href= 'uploadnote.php';</script>";
}
?>


                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>


                    <script src="js/jquery.js"></script>


                    <script src="js/bootstrap.min.js"></script>


                    <?php } ?>
