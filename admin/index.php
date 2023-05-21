
<?php 
            $page = isset($_GET['page']) ? $_GET['page'] : 'home';
            if(!file_exists($page.".php")){
                include '404.html';
            }else{
                include('includes/header.php');
                include $page.'.php';
                include('includes/footer.php'); 
            
            
            }
?>
