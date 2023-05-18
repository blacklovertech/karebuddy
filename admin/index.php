
<?php 
include ('includes/header.php');
include ('includes/connection.php');

if (strlen($_SESSION['id']==0)) {
  header('location:login.php');
  } else{
    
    ?>
    
 <div id="wrapper">
       
        <div id="page-wrapper">

            <div class="container-fluid">

                
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome 
                            <small><?php echo($_SESSION['name']) ;?></small>
                        </h1>
<div class="row">
<div class="col-lg-12">
        <div class="table-responsive">

<form action="" method="post">
            <table id="table" class="table">


            <thead>
               
                    <tr >
                        <th>Name</th>
                        <th >Description</th>
                        <th >Type </th>
                        <th >Uploaded on</th>
                        <th >Uploaded by </th>
                        <th >Status</th>
                        <th >View</th>
                        <th >Approve</th>
                        <th >Delete</th>
                        <th >Download</th>
                       
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
    $file_uploader = $row['file_uploader'];
    $file_status = $row['status'];
    $file = $row['file'];

    echo "<tr>";
    echo "<td>$file_name</td>";
    echo "<td>$file_description</td>";
    echo "<td>$file_type</td>";
    echo "<td>$file_date</td>";
    echo "<td><a href='viewprofile.php?name=$file_uploader' target='_blank'> $file_uploader </a></td>";
    echo "<td>$file_status</td>";
    echo "<td><a href='../files/$file' target='_blank' style='color:green'>View </a></td>";
    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to approve this note?')\"href='?approve=$file_id'><i class='fa fa-times' style='color: red;'></i>Approve</a></td>";

    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete this post?')\" href='?del=$file_id'><i class='fa fa-times' style='color: red;'></i>delete</a></td>";
echo " <td><a href='../files/$file' target='_blank' style='color:green'>Download </a></td>
";
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
        $file_uploader = $_SESSION['username'];
        $del_query = "DELETE FROM uploads WHERE file_id='$note_del'";
        $run_del_query = mysqli_query($conn, $del_query) or die (mysqli_error($conn));
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>alert('note deleted successfully');
            window.location.href='index.php';</script>";
        }
        else {
         echo "<script>alert('error occured.try again!');</script>";   
        }
        } 

         if (isset($_GET['approve'])) {
        $note_approve = mysqli_real_escape_string($conn,$_GET['approve']);
        $approve_query = "UPDATE uploads SET status='approved' WHERE file_id='$note_approve'";
        $run_approve_query = mysqli_query($conn, $approve_query) or die (mysqli_error($conn));
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>alert('note approved successfully');
            window.location.href='index.php';</script>";
        }
        else {
         echo "<script>alert('error occured.try again! or Approved already !!');</script>";   
        }
        }
       

?>


<script src="js/jquery.js"></script>

  
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php } ?>

