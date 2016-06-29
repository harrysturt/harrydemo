<?php
require_once('includes/form.php');
require_once('includes/genres.php');
require_once('includes/header.php');

$iCurrentGenreId = 1;

if(isset($_GET['genreid']) == true){
	$iCurrentGenreId = $_GET['genreid'];
}

$oGenre = new Genre();
$oGenre->load($iCurrentGenreId);

$aStickyData = [];
$aStickyData['genre_name'] = $oGenre->sGenreName;
$aStickyData['genre_description'] = $oGenre->sGenreDescription;

$oForm = new Form();
$oForm->aData = $aStickyData;

if(isset($_POST['submit']) == true){
	
	$oGenre->sGenreName = $_POST['genre_name'];
	$oGenre->sGenreDescription = $_POST['genre_description'];
	$oGenre->save();

	header('Location:main.php?genreid='.$oGenre->iId);
}

$oForm->open();
$oForm->makeTextInput('Genre Name', 'genre_name');
$oForm->makeTextInput('Genre Description', 'genre_description');
$oForm->makeSubmit('Submit', 'submit');
$oForm->close();
?>


<h4>Edit Genre</h4>
<?php echo $oForm->sHTML;?>


<?php
require_once('includes/footer.php');
?>