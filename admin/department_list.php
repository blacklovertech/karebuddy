
            
 
    <div class="col-lg-12">
	<div class="card card-outline card-success">
		<div class="card-header">
		<?php if($_SESSION['login_type'] == 1):?>
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="./index.php?page=new_department"><i class="fa fa-plus"></i> Add New Department</a>
			</div>
			<?php endif; ?>
		</div>
		<div class="card-body"> <form action="" method="post">
			<table class="table tabe-hover table-bordered" id="list">
				<thead>
					<tr>
                               
                 
						<th>No</th>
						<th>NAME</th>
						<th>Description</th>
						<th>Contact #</th>
						<?php if($_SESSION['login_type'] == 1):?><th>Action</th><?php endif; ?>
						
					</tr>
				</thead>
                                        <tbody>

                                            <?php


$query = "SELECT * FROM dept ";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
    $deptid = $row['deptid'];
    $descri = $row['descri'];
    $imgpath= $row['imgpath'];
    $name = $row['name'];

    echo "<tr>";
    echo "<td>$deptid</td>";
    echo "<td>$name</td>";
    echo "<td>$descri</td>";
    echo "<td>$imgpath</td>";


   ?><?php if($_SESSION['login_type'] == 1):?>
   <td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Action
		                    </button>
		                    <div class="dropdown-menu" style="">
		                      <a class="dropdown-item view_user" href="javascript:void(0)" data-id="<?php echo $row['deptid'] ?>">View</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item" href="./index.php?page=edit_department&id=<?php echo $row['deptid'] ?>">Edit</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item delete_user" href="javascript:void(0)" data-id="<?php echo $row['deptid'] ?>">Delete</a>
		                    </div>
						</td><?php endif; ?><?php
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
       
        $del_query = "DELETE FROM dept where deptid='$deptid'";
        $run_del_query = mysqli_query($conn, $del_query) or die (mysqli_error($conn));
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>alert('Subject deleted successfully');
            window.location.href='index.php';</script>";
        }
        else {
         echo "<script>alert('error occured.try again!');</script>";   
        }
        }
   ?>
   
<script>
	$(document).ready(function(){
		$('#list').dataTable()
	$('.view_user').click(function(){
		uni_modal("<i class='fa fa-id-card'></i> User Details","view_subject.php?id="+$(this).attr('data-id'))
	})
	$('.delete_user').click(function(){
	_conf("Are you sure to delete this user?","delete_user",[$(this).attr('data-id')])
	})
	})

   
	
</script>