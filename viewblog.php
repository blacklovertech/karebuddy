<?php include ('includes/connection.php'); ?>
<?php include ('includes/header.php'); ?>
<?php 

$query = "SELECT * FROM blog where filename=$_GET[page] ";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
   
    $id = $row['id'];
    $name = $row['name'];
    $descri = $row['descri'];
    $filename = $row['filename'];
    $imgpath = $row['imgpath'];

   

}
}

    
    echo "$id";
    echo "$name";
    echo "$descri";
    echo "$imgpath";
    echo "$filename";
    

    ?>

    
<?php include ('includes/footer.php'); ?>