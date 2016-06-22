<?php
require_once('includes/form.php');
require_once('includes/albums.php');
require_once('includes/header.php');

$oForm = new Form();

if(isset($_POST['submit']) == true){
	$oAlbum = new Album();
	$oAlbum->sName = $_POST['name'];
	$oAlbum->sDescription = $_POST['description'];
	$oAlbum->sPhoto = $_POST['photo'];
	$oAlbum->fPrice = $_POST['price'];
	$oAlbum->iGenreId = $_POST['genre_id'];
	$oAlbum->save();

	header('Location:main.php?genreid='.$oAlbum->iGenreId);
}

$oForm->open();
$oForm->makeTextInput('Album Name','name');
$oForm->makeTextInput('Album Description','description');
$oForm->makeTextInput('Photo','photo');
$oForm->makeTextInput('Price','price');
$oForm->makeTextInput('Genre Id','genre_id');
$oForm->makeSubmit('Add Album','submit');
$oForm->close();

?>

<h4>New Album</h4>
<?php echo $oForm->sHTML;?>


<?php
require_once('includes/footer.php');
?>