
<?php 
include('includes/header.php');

?>


<?php 
            $page = isset($_GET['page']) ? $_GET['page'] : 'home';
            if(!file_exists($page.".php")){
                include '404.html';
            }else{
            include $page.'.php';

            }
?>


<?php 
include('includes/footer.php'); 

?>