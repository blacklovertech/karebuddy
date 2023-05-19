<?php include 'includes/connection.php';?>

<?php 


//Code for Registration 
if(isset($_POST['submit']))
{
  $name = $_POST['name']; 
  $username=$_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $role = $_POST['role'];
  $course = $_POST['course'];
  $gender = $_POST['gender'];
  $joindate = date("F j, Y");
  
$sql=mysqli_query($conn,"select id from users where email='$email'");
$row=mysqli_num_rows($sql);
if($row>0)
{
    echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
} else{
    $msg=mysqli_query($conn,"INSERT INTO users(username,name,email,password,role,course,gender,joindate,token) VALUES ('$username' , '$name' , '$email', '$password' , '$role', '$course', '$gender' , '$joindate' , '' )");
 

if($msg)
{
    echo "<script>alert('Registered successfully');</script>";
    echo "<script type='text/javascript'> document.location = 'users.php'; </script>";
}
}
}
?> <script type="text/javascript">
function checkpass() {
    if (document.signup.password.value != document.signup.confirmpassword.value) {
        alert(' Password and Confirm Password field does not match');
        document.signup.confirmpassword.focus();
        return false;
    }
    return true;
}
</script>
<form method="post" name="signup" onsubmit="return checkpass();">

    <table>
        <tr>
            <td>
                <h3>Create Account</h3>
            </td>
        </tr>
        <tr>
            <td><label for="inputFirstName">Name</label></td>
            <td><input id="name" name="name" type="text" placeholder="Enter your first name" required /></td>
        </tr>
        <tr>
            <td><label for="inputLastName">username</label> </td>
            <td><input id="username" name="username" type="text" placeholder="username" required /></td>
        </tr>
        <tr>

            <td><label for="input">Gender</label></td>
            <td><select name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select></td>

        </tr>
        <tr>
            <td>
                <label for="input">role</label>
            </td>
            <td>
                <select name="role">
                    <option value="teacher">Teacher</option>
                    <option value="student">Student</option>
                </select>
            </td>
        </tr>
        <tr>
            <td> <label for="inputcontact">DEPT</label>
            </td>
            <td> <select name="course">
                    <option value="Computer Science">Computer Sc Engineering</option>
                    <option value="Electrical">Electrical Engineering</option>
                    <option value="Mechanical">Mechanical Engineering</option>
                </select></td>
        </tr>
        <tr>
            <td><label for="inputEmail">Email address</label></td>
            <td><input id="email" name="email" type="email" placeholder="phpgurukulteam@gmail.com" required />

            </td>
        </tr>

        <tr>
            <td><label for="inputPassword">Password</label></td>
            <td><input id="password" name="password" type="password" placeholder="Create a password"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                    title="at least one number and one uppercase and lowercase letter, and at least 6 or more characters"
                    required /></td>
        </tr>


        <tr>
            <td> <label for="inputPasswordConfirm">Confirm Password</label>
            </td>
            <td> <input id="confirmpassword" name="confirmpassword" type="password" placeholder="Confirm password"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                    title="at least one number and one uppercase and lowercase letter, and at least 6 or more characters"
                    required /></td>
        </tr>

        <tr>
            <td><button type="submit" class="btn" name="submit">Create Account</button>
            </td>
        </tr>
    </table>
</form>

</body>

</html>