

 
            
 
<div class="col-lg-12">
	<div class="card card-outline card-success">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="./index.php?page=new_department"><i class="fa fa-plus"></i> Add New Department</a>
			</div>
		</div>
		<div class="card-body"> <form action="" method="post">
			<table class="table tabe-hover table-bordered" id="list">
				<thead>
					
                    <tr>
                    <tr>
                        <th>Year ID</th>
                        <th>Description</th>
                        <th>Image Path </th>
                        <th>Name</th>
                        <th>Delete</th>
                        
                    </tr>
                </thead>
                <tbody>

                 <?php

$query = "SELECT * FROM year ";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
    $yearid = $row['yearid'];
    $desci = $row['desci'];
    $imgpath= $row['imgpath'];
    $name = $row['name'];

    echo "<tr>";
    echo "<td>$yearid</td>";
    echo "<td>$desci</td>";
    echo "<td>$imgpath</td>";
    echo "<td>$name</td>";
    


?> <td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Action
		                    </button>
		                    <div class="dropdown-menu" style="">
		                      <a class="dropdown-item view_user"href="./index.php?page=view_subject.php?id=<?php echo $row['id'] ?>">View</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item" href="./index.php?page=view_subject.php?id=<?php echo $row['id'] ?>">Edit</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item delete_user" onClick="javascript: return confirm('Are you sure you want to delete this post?')" href='?del=<?php echo $row['id'] ?>'>Delete</a>
		                    </div>
						</td><?php
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
       
        $del_query = "DELETE FROM mail where id='$id'";
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
	
	})

   
	
</script>
