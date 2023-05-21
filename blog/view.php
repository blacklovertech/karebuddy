
<?php 
            $page = isset($_GET['page']) ? $_GET['page'] : '404';
            if(!file_exists($page.".html")){
                include '404.html';
            }else{
            include $page.'.html';

            }
?>


