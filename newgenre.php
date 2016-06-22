<?php
require_once('includes/form.php');
require_once('includes/genres.php');
require_once('includes/header.php');

$oForm = new Form();

if(isset($_POST['submit']) == true){
	$oGenre = new Genre();
	$oGenre->sGenreName = $_POST['genre_name'];
	$oGenre->sGenreDescription = $_POST['genre_description'];
	$oGenre->save();

	header('Location:main.php?genreid='.$oGenre->iGenreId);
}

$oForm->open();
$oForm->makeTextInput('Genre Name', 'genre_name');
$oForm->makeTextInput('Genre Description', 'genre_description');
$oForm->makeSubmit('Submit', 'submit');
$oForm->close();

?>

<h4>New Genre</h4>
<?php echo $oForm->sHTML;?>


<?php
require_once('includes/footer.php');
?>