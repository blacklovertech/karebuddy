<?php 
include('includes/header.php');

$directory="files/$_GET[deptid]/$_GET[yearid]/$_GET[subjectid]";


?>
<main class="page projects-page">

    <div class="container">
        <div class="heading">
            <center>
                <h2 style="color: var(--bs-indigo);"><?php echo $_GET['name'],"__", $_GET['subjectid'];?></h2>
            </center>
        </div>
        <form action="" method="post">
            <table id="table" class="table">


                <thead>

                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Type </th>
                        <th>Subject ID</th>
                        <th>View</th>
                        <th>Download</th>

                    </tr>

                </thead>
                <tbody>

                    <?php

$query = "SELECT * FROM uploads where subjectid='$_GET[subjectid]' ";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
    $file_id = $row['file_id'];
    $file_name = $row['file_name'];
    $file_description = $row['file_description'];
    $file_type = $row['file_type'];
    $file_date = $row['file_uploaded_on'];
    $file_uploader = $row['file_uploader'];
    $file_status = $row['status'];
    $file = $row['file'];
    $subjectid = $row['subjectid'];

    echo "<tr>";
    echo "<td>$file_name</td>";
    echo "<td>$file_description</td>";
    echo "<td>$file_type</td>";
    echo "<td>$subjectid</td>";
     echo "<td><a href='files/$file' target='_blank' style='color:green'>View </a></td>";
  echo " <td><a href='files/$file' target='_blank' style='color:green'>Download </a></td>
";
    echo "</tr>";

}
}
?>
                </tbody>
            </table>
        </form>