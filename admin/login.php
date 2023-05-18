<?php include ('includes/connection.php'); ?>
<?php include ('includes/header.php'); ?>

<?php session_start(); 

// Code for login 
if(isset($_POST['login']))
{
$password=$_POST['password'];
$useremail=$_POST['email'];
$ret= mysqli_query($conn,"SELECT id,name FROM users WHERE email='$useremail' and password='$password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{

$_SESSION['id']=$num['id'];
$_SESSION['name']=$num['name'];
header("location:index.php");

}
else
{
echo "<script>alert('Invalid username or password');</script>";
}
}
?>

<h2 align="center">Registration and Login System</h2>
<hr />
    <h3 class="text-center font-weight-light my-4">User Login</h3></div>
                                    <div class="card-body">
                                        
                                        <form method="post">
                                            
<div class="form-floating mb-3">
<input class="form-control" name="email" type="email" placeholder="name@example.com" required/>
<label for="inputEmail">Email address</label>
</div>
                                            

<div class="form-floating mb-3">
<input class="form-control" name="password" type="password" placeholder="Password" required />
<label for="inputPassword">Password</label>
</div>


<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
<a class="small" href="password-recovery.php">Forgot Password?</a>
<button class="btn btn-primary" name="login" type="submit">Login</button>
</div>
</form>
</div>