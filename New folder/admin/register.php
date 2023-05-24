<?php session_start();
require_once('connection.php');
include('header.php');
//Code for Registration 
if(isset($_POST['submit']))
{
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $password= md5($_POST['password']);
    $contact=$_POST['contact'];
	
    $address=$_POST['address'];

$sql=mysqli_query($conn,"select id from users where email='$email'");
$row=mysqli_num_rows($sql);

if($row>0)
{
    echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
} else{
    $msg=mysqli_query($conn,"insert into users(firstname,lastname,email,password,contact,address,avatar) values('$firstname','$lastname','$email','$password','$contact','$address','$data')");

if($msg)
{
    echo "<script>alert('Registered successfully');</script>";
    echo "<script type='text/javascript'> document.location = ''; </script>";
}
}
}
?>
<script type="text/javascript">
function checkpass() {
    if (document.signup.password.value != document.signup.confirmpassword.value) {
        alert(' Password and Confirm Password field does not match');
        document.signup.confirmpassword.focus();
        return false;
    }
    return true;
}
</script>


<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h2 align="center" class="control-label text-dark">Registration and Login System
                                    </h2>
                                    <hr />
                                    <h3 class="control-label text-dark">Create Account</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post" name="signup" onsubmit="return checkpass();">

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="fname" name="firstname" type="text"
                                                        placeholder="Enter your first name" required />
                                                    <label class="control-label text-dark"
                                                        class="control-label text-dark" for="inputFirstName">First
                                                        name</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="lname" name="lastname" type="text"
                                                        placeholder="Enter your last name" required />
                                                    <label class="control-label text-dark" for="inputLastName">Last
                                                        name</label>
                                                </div>
                                            </div>
                                        </div>




                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="email" name="email" type="email"
                                                placeholder="phpgurukulteam@gmail.com" required />
                                            <label class="control-label text-dark" for="inputEmail">Email
                                                address</label>
                                        </div>


                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="contact" name="contact" type="text"
                                                placeholder="1234567890" maxlength="15" required />
                                            <label class="control-label text-dark" for="inputcontact">Contact
                                                Number</label>
                                        </div>



                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="password" name="password"
                                                        type="password" placeholder="Create a password"
                                                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                                                        title="at least one number and one uppercase and lowercase letter, and at least 6 or more characters"
                                                        required />
                                                    <label class="control-label text-dark"
                                                        for="inputPassword">Password</label>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="confirmpassword"
                                                        name="confirmpassword" type="password"
                                                        placeholder="Confirm password"
                                                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                                                        title="at least one number and one uppercase and lowercase letter, and at least 6 or more characters"
                                                        required />
                                                    <label class="control-label text-dark" for="inputPasswordConfirm"
                                                        class="control-label text-dark">Confirm Password</label>
                                                </div>
                                                <small id="pass_match" data-status=''></small>

                                            </div>
                                        </div>


                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><button type="submit" class="btn btn-primary btn-block"
                                                    name="submit">Create Account</button></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                    <div class="small"><a href="index.php">Back to Home</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <script>
        $('[name="password"],[name="confirmpassword"]').keyup(function() {
            var pass = $('[name="password"]').val()
            var cpass = $('[name="confirmpassword"]').val()
            if (cpass == '' || pass == '') {
                $('#pass_match').attr('data-status', '')
            } else {
                if (cpass == pass) {
                    $('#pass_match').attr('data-status', '1').html(
                        '<i class="text-success">Password Matched.</i>')
                } else {
                    $('#pass_match').attr('data-status', '2').html(
                        '<i class="text-danger">Password does not match.</i>')
                }
            }
        })

        function displayImg(input, _this) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#cimg').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        </script>