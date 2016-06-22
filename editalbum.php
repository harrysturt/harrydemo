<?php
require_once('includes/form.php');
require_once('includes/albums.php');
require_once('includes/header.php');

$iCurrentAlbumId = 1;

if(isset($_GET['albumid']) == true){
	$iCurrentAlbumId = $_GET['albumid'];
}

$oAlbum = new Album();
$oAlbum->load($iCurrentAlbumId);

$aStickyData = [];
$aStickyData['name'] = $oAlbum->sName;
$aStickyData['description'] = $oAlbum->sDescription;
$aStickyData['price'] = $oAlbum->fPrice;
$aStickyData['photo'] = $oAlbum->sPhoto;
$aStickyData['genre_id'] = $oAlbum->iGenreId;

$oForm = new Form();
$oForm->aData = $aStickyData;

if(isset($_POST['submit']) == true){
	$oAlbum->sName = $_POST['name'];
	$oAlbum->sDescription = $_POST['description'];
	$oAlbum->fPrice = $_POST['price'];
	$oAlbum->sPhoto = $_POST['photo'];
	$oAlbum->iGenreId = $_POST['genre_id'];

	$oAlbum->save();
	header('Location:main.php?genreid='.$oAlbum->iGenreId);
}


$oForm->open();
$oForm->makeTextInput('Album Name','name');
$oForm->makeTextInput('Album Description','description');
$oForm->makeTextInput('Price','price');
$oForm->makeTextInput('Photo','photo');
$oForm->makeTextInput('Genre Id','genre_id');
$oForm->makeSubmit('Submit','submit');
$oForm->close();

?>

<h4>Edit Album</h4>
<?php echo $oForm->sHTML;?>

<?php
require_once('includes/footer.php');
?>