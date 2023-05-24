<div class="col-lg-12">
    <div class="card card-outline card-success">
        <div class="card-header">
            <div class="card-tools">
                <a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="./index.php?page=new_user"><i
                        class="fa fa-plus"></i> Add New User</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table tabe-hover table-bordered" id="list">
                <thead>

                    <th>Name</th>
                    <th>Description</th>
                    <th>Type </th>

                    <th>Uploaded BY</th>
                    <th>Uploaded on</th>
                    <th>Status</th>
                    <th>Action</th>

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
    $deptid = $row['deptid'];
    $yearid = $row['yearid'];
    $subjectid = $row['subjectid'];
$userid =$row['user_id'];
    echo "<tr>";
    echo "<td>$file_name</td>";
    echo "<td>$file_description</td>";
    echo "<td>$file_type</td><td>";
    
       $sql = "SELECT * FROM `users` where id= $userid";

                    $all_course = mysqli_query($conn,$sql);
                    while ($course = mysqli_fetch_array($all_course,MYSQLI_ASSOC)):;

                    echo $course["firstname"];
                    endwhile;



                    echo " </td><td>$file_date</td>";
                    echo "<td>$file_status</td>";
                    ?>
                    <td class="text-center">
                        <button type="button"
                            class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle"
                            data-toggle="dropdown" aria-expanded="true">
                            Action
                        </button>
                        <div class="dropdown-menu" style="">
                            <a class="dropdown-item view_user" href='../files/<?php echo "$deptid/$yearid/$subjectid/$file"?>' target='_blank'
                                style='color:green'><i class='fa fa-eye' style='color: black;'></i> View </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item view_user" onClick="javascript: return confirm('Are you sure you want to approve this
                            note?')" href='index.php?page=approve_document&approve=<?php echo$file_id?>'><i class='fa fa-check' style='color:Green;'></i>
                                Approve</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item view_user"
                                onClick="javascript: return confirm('Are you sure you want to delete this post?')"
                                href='<?php echo "index.php?page=approve_document&del=$file_id"?>'><i class='fa fa-times' style='color: red;'></i> Delete</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item view_user" href='../files/<?php echo "$deptid/$yearid/$subjectid/$file"?>'
                                target='_blank' download><i class='fa fa-download' style='color: black;'></i> Download</a>
                        </div>
                    </td>
                    </tr>
                    <?php   

}
}
?>



                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#list').dataTable()
    
    $('.delete_user').click(function() {
        _conf("Are you sure to delete this user?", "delete_user", [$(this).attr('data-id')])
    })
})
</script>
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