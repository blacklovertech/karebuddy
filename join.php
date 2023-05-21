<section class="py-5 my-5">
 
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2 class="display-6 fw-bold mb-4">Got any <span class="underline">questions</span>?</h2>
                <p class="text-muted">Our team is always here to help. You can also Join By filling the form</p>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div>
                    <form class="p-3 p-xl-4" action="" method="post">
                        <!-- Start: Success Example -->
                        <div class="mb-3"><input class="shadow form-control" type="text" id="name" name="name"
                                placeholder="Name"></div><!-- End: Success Example -->
                        <!-- Start: Error Example -->
                        <div class="mb-3"><input class="shadow form-control" type="email" id="email" name="email"
                                placeholder="Email"></div><!-- End: Error Example -->
                        <div class="mb-3"><input class="shadow form-control" type="text" id="subject" name="subject"
                                placeholder="subject"></div><!-- End: Error Example -->

                        <div class="mb-3"><textarea class="shadow form-control" id="message" name="message" rows="6"
                                placeholder="Message"></textarea></div>
                        <div><button class="btn btn-primary shadow d-block w-100" name ="submit"type="submit">Send </button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<?php 
if (isset($_POST['submit'])) {
    
                $name = $_POST['name'];
                $message= $_POST['message'];
                
                $email = $_POST['email'];
                $subject = $_POST['subject'];
            
           $query = "INSERT INTO `help`( `name`, `message`,  `subject`, `email`)
             VALUES ('$name' , '$message','$subject','$email')";
               $result = mysqli_query($conn , $query) or die(mysqli_error($conn));
               if (mysqli_affected_rows($conn) > 0) {
                   echo "<script> alert('Complainted successfully.');
                   window.location.href='index.php';</script>";
               }
               else {
                   "<script> alert('Error while uploading..try again');</script>";
               }
           } else {
                "<script> alert('Error submitting');</script>";
            } 
           
           ?>