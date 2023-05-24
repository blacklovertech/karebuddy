<?php
if(isset($_POST["SubmitBtn"])){

$to = "jkjanarthanan007gmail.com";
$subject = "Subscription letter";
$from=$_POST["email"];
$headers = "From: $from";

mail($to,$subject,$headers);
echo "Email successfully sent.";
}
?>
<footer class="page-footer">
        <div class="container">
            <div class="social-icons">
                <section class="py-4 py-xl-5">
                    <div class="container">
                        <div class="bg-light border rounded border-0 border-light d-flex flex-column justify-content-between align-items-center flex-lg-row p-4 p-lg-5">
                            <div class="text-center text-lg-start py-3 py-lg-1">
                                <h2 class="fw-bold mb-2"><strong>Subscribe to our newsletter</strong></h2>
                                <p class="mb-0">Get newer update , faster and soon after we published !!</p>
                            </div>
                            <form class="d-flex justify-content-center flex-wrap my-2" method="post">
                                <div class="my-2"><input class="form-control" type="email" name="email" placeholder="Your Email" style="width: 264.8px;"></div>
                                <div class="my-2"><button class="btn btn-primary ms-sm-2" name="SubmitBtn" type="submit">Subscribe </button></div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
            <div class="links">
                <a href="index.php?page=about">About Us</a>
                <a href="index.php?page=help">Help Us</a>
                <a href="https://github.com/blacklovertech/karebuddy/"><em>Developed By Retro Tech</em></a> </div>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/pikaday.min.js"></script>
    <script src="assets/js/theme.js"></script>
    
 
</body>

</html>
