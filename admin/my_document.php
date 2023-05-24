<div class="col-lg-12">
    <div class="card card-outline card-success">
        <div class="card-header">
            
        </div>
        <div class="card-body">
            <table class="table tabe-hover table-bordered" id="list">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Type </th>
                        <th>Uploaded on</th>
                        <th>Status</th>
                        <th>Dept id</th>
                        <th>year</th>
                        <th>Subjectid</th>
                        <th>View</th><?php if($_SESSION['login_type'] == 1):?>
                        <th>Delete</th>
                        <?php endif; ?>


                    </tr>
                </thead>
                <tbody>

                    <?php
                  $id= $_SESSION['login_id'];
$query = "SELECT * FROM uploads where user_id= $id";
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
$userid=$row['user_id'];
    if ($file_status=='approved') {
    echo "<tr>";
    echo "<td>$file_name</td>";
    echo "<td>$file_description</td>";
    echo "<td>$file_type</td>";
    echo "<td>$file_date</td>";
    echo "<td>$file_status</td>";
    echo "<td>$deptid-";$sql = "SELECT * FROM `dept` where deptid =$deptid ";
  
    $all_course = mysqli_query($conn,$sql);
    while ($course = mysqli_fetch_array($all_course,MYSQLI_ASSOC)):;
  
               echo $course["name"];
                  endwhile;  
    
    echo "</td><td>$yearid</td>";
    
                    
    echo "<td>$subjectid</td>";

    echo "<td><a href='../files/$deptid/$yearid/$subjectid/$file' target='_blank' style='color:green'>View </a></td>";

    if($_SESSION['login_type'] == 1):
   echo " <td><a onClick=\"javascript: return confirm('Are you sure you want to delete this post?')\" href='index.php?page=document_list&del=$file_id'><i class='fa fa-times' style='color: red;'></i>delete</a></td>";
    endif; 
    echo "</tr>";}

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
        $del_query = "DELETE FROM uploads WHERE file_id='$note_del' ";
        $run_del_query = mysqli_query($conn, $del_query) or die (mysqli_error($conn));
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>alert('note deleted successfully');
            window.location.href='index.php?page=document_list';</script>";
        }
        else {
         echo "<script>alert('error occured.try again!');</script>";   
        }
        }
   ?>



<script>
$(document).ready(function() {
    $('#list').dataTable()

    $('.delete_user').click(function() {
        _conf("Are you sure to delete this user?", "delete_user", [$(this).attr('data-id')])
    })
})
</script>