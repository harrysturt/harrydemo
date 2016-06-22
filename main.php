<?php 
require_once("includes/header.php");
require_once("includes/view.php");
require_once("includes/genremanager.php");

$iCurrentGenreId = 1;

if(isset($_GET['genreid']) == true){
    $iCurrentGenreId =$_GET['genreid'];
}

$oGenre = new Genre();
$oGenre->load($iCurrentGenreId);
echo View::renderGenre($oGenre); 

?>
        <!-- <div class="header">

            <h1>Genre</h1>
            <h2>description of genre</h2> 
            <img src="assets/images/headerimage.jpg">
        </div>

        <div class="content">
            <div class="description"> 
                <img class="pure-img-responsive" src="http://farm3.staticflickr.com/2813/9069585985_80da8db54f.jpg" alt="Train"> 
                <h2 class="content-subhead">the artist</h2>
                <p> 
                    description of the album, price, published year
                </p>
            </div>   
            <div class="description"> 
                <img class="pure-img-responsive" src="http://farm3.staticflickr.com/2813/9069585985_80da8db54f.jpg" alt="Train"> 
                <h2 class="content-subhead">the artist</h2>
                <p> 
                    description of the album, price, published year
                </p>
            </div>

            </div>  -->
<?php 
require_once('includes/footer.php');
?>