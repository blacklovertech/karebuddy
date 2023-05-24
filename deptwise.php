<main class="page projects-page">
    <section class="portfolio-block projects-cards">
        <div class="container">
            <div class="heading">
                <h2 style="color: var(--bs-indigo);">DEPARTMENT's</h2>
            </div>
            <div class="row">
                <?Php          // All database details will be included here 

require "includes/connection.php"; 
$page_name="index.php?page=deptwise&start="; //  If you use this code with a different page ( or file ) name then change this 
$start=$_GET['start'];
if(strlen($start) > 0 and !is_numeric($start)){
echo "Data Error";
exit;
}


$eu = ($start - 0); 
$limit = 6;                                 // No of records to be shown per page.
$this1 = $eu + $limit; 
$back = $eu - $limit; 
$next = $eu + $limit; 


/////////////// Total number of records in our table. We will use this to break the pages///////
$nume = $dbo->query("select count(deptid) from dept")->fetchColumn();
/////// The variable nume above will store the total number of records in the table////

/////////// Now let us print the table headers ////////////////

echo "<TABLE class='t1'>";

////////////// Now let us start executing the query with variables $eu and $limit  set at the top of the page///////////
$query=" SELECT * FROM dept  limit $eu, $limit ";

//////////////// Now we will display the returned records in side the rows of the table/////////
foreach ($dbo->query($query) as $row) {
?>
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0"><a href="deptwisedetail.php?deptid=<?php echo $course["deptid"];?>">

                            <div class="container"> <img class="card-img-top scale-on-hover"
                                    src="assets/img/<?php echo $row["imgpath"];?>" alt="Card Image">
                                <h2 class="h2"><?php echo $row["name"];?></h2>

                            </div>
                            <div class="card-body">
                                <h6><?php echo $row["name"];?>
                        </a></h6>
                        <p class="text-muted card-text"> <?php echo $row["descri"];?></p>
                    </div>
                </div>
            </div><?php
}
echo "</table>";
////////////////////////////// End of displaying the table with records ////////////////////////

/////////////////////////////// 
if($nume > $limit ){ // Let us display bottom links if sufficient records are there for paging
 echo"
 <style>
 
 #Pagination1
 {
    display: inline-block;
    list-style: none;
    padding: 0;
    border-radius: 4px;
    font-family: Arial;
    font-weight: normal;
    font-style: normal;
    font-size: 0;
    margin: 0;
 }
 #Pagination1 > li
 {
    display: inline;
    font-size: 13px;
 }
 #Pagination1 > li > a, #Pagination1 > li > span
 {
    position: relative;
    float: left;
    padding: 6px 12px 6px 12px;
    text-decoration: none;
    background-color: #0ea0ff;
    background-image: none;
    border: 1px solid #F8F9FA;
    color: #fff;
    margin-left: -1px;
 }
 #Pagination1 > li:first-child > a, #Pagination1 > li:first-child > span
 {
    margin-left: 0;
    border-bottom-left-radius: 4px;
    border-top-left-radius: 4px;
 }
 #Pagination1 > li:last-child > a, #Pagination1 > li:last-child > span
 {
    border-bottom-right-radius: 4px;
    border-top-right-radius: 4px;
 }
 #Pagination1 > li > a:hover, #Pagination1 > li > span:hover, #Pagination1 > li > a:focus, #Pagination1 > li > span:focus 
 {
    background-color: #0ea0ff;
    color: #fff;
 }
 #Pagination1 > .active > a, #Pagination1 > .active > span, #Pagination1 > .active > a:hover, #Pagination1 > .active > span:hover, #Pagination1 > .active > a:focus, #Pagination1 > .active > span:focus
 {
    z-index: 2;
    background-color: #0ea0ff;
    border-color: #F8F9FA;
    color: #fff;
    cursor: default;
 }
 #Pagination1 > .disabled > span, #Pagination1 > .disabled > span:hover, #Pagination1 > .disabled > span:focus, #Pagination1 > .disabled > a, #Pagination1 > .disabled > a:hover, #Pagination1 > .disabled > a:focus 
 {
    background-color: #0ea0ff;
    color: #fff;
    cursor: not-allowed;
 }
 
 
 </style><center>
  <ul id='Pagination1'>";
/////////////// Start the bottom links with Prev and next link with page numbers /////////////////
echo "<li   align='left' width='30%'>";
//// if our variable $back is equal to 0 or more then only we will display the link to move back ////////
if($back >=0) { 
print "<a href='$page_name$back'><font face='Verdana' size='2'>PREV</font></a>"; 
} 
//////////////// Let us display the page links at  center. We will not display the current page as a link ///////////
echo "</li> ";
$i=0;
$l=1;
for($i=0;$i < $nume;$i=$i+$limit){
if($i <> $eu){
echo "<li align='left' width='30%'><a href='$page_name$i'><font face='Verdana' size='2'>$l</font></a></i> ";
}
else { echo "<li align='left' width='30%'><a href='#'><font face='Verdana'>$l</font></a></li>";}        /// Current page is not displayed as link and given font color red
$l=$l+1;
}


echo "<li width='30%'>";
///////////// If we are not in the last page then Next link will be displayed. Here we check that /////
if($this1 < $nume) { 
print "<a href='$page_name$next'><font face='Verdana' size='2'>NEXT</font></a>";} 
echo "</li></ul>";

}// end of if checking sufficient records are there to display bottom navigational link. 
?>







        </div>
        </div>

        <div class="container">
            <div class="heading">
                <h2 style="margin: 30px;color: var(--bs-indigo);">Extra curricular</h2>
                <p style="font-weight: bold;font-size: 21px;">Manditory</p>
            </div>
            <div class="row">
                <?php
              $sql = "SELECT * FROM `extra`";
              $all_course = mysqli_query($conn,$sql);
              while ($course = mysqli_fetch_array($all_course,MYSQLI_ASSOC)):;
            ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0"><a href="index.php?page=<?php echo $course["name"];?>"><img
                                class="card-img-top scale-on-hover" src="./assets/img/<?php echo $course["imgpath"];?>"
                                alt="Card Image">
                            <div class="card-body">
                                <h6><?php echo $course["name"];?>
                        </a></h6>
                        <p class="text-muted card-text"> <?php echo $course["descri"];?></p>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
                // While loop must be terminated
            ?>


        </div>
        </div>
    </section>
</main>