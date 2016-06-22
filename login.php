<?php
require_once('includes/user.php');
require_once('includes/form.php');
require_once('includes/header.php');

$oForm = new Form();

if(isset($_POST['submit']) == true){
	$oUser = new User();
	$bSuccess = $oUser->loadByUsername($_POST['username']);

	if($bSuccess == true){

		if($oUser->sPassword == ($_POST['password'])){
			$_SESSION['userid'] = $oUser->iId;
			header('Location:userdeatails.php');
		}
	}


}

$oForm->open();
$oForm->makeTextInput('User Name','username');
$oForm->makeTextInput('Password','password');
$oForm->makeSubmit('Login','submit');
$oForm->close();


?>

<h4>Log In</h4>

<?php echo $oForm->sHTML;?>

<?php
require_once('includes/footer.php');
?>