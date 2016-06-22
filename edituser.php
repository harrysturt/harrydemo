<?php
require_once('includes/form.php');
require_once('includes/user.php');
require_once('includes/header.php');

if(isset($_SESSION['userid']) == false){
	header('Location: login.php');
}

$iUserId = $_SESSION['userid'];
$oUser = new User();
$oUser->load($iUserId);

$aStickyData = [];
$aStickyData['username'] = $oUser->sUserName;
$aStickyData['password'] = $oUser->sPassword;
$aStickyData['first_name'] = $oUser->sFirstName;
$aStickyData['last_name'] = $oUser->sLastName;
$aStickyData['address'] = $oUser->sAddress;
$aStickyData['telephone'] = $oUser->sTelephone;
$aStickyData['email'] = $oUser->sEmail;

$oForm = new Form();
$oForm->aData = $aStickyData;

if(isset($_POST['submit']) == true){
	$oUser->sUserName = $_POST['username'];
	$oUser->sPassword = $_POST['password'];
	$oUser->sFirstName = $_POST['first_name'];
	$oUser->sLastName = $_POST['last_name'];
	$oUser->sAddress = $_POST['address'];
	$oUser->sTelephone = $_POST['telephone'];
	$oUser->sEmail = $_POST['email'];

	$oUser->save();

	header('Location: userdeatails.php');
}

$oForm->open();
$oForm->makeTextInput('User Name', 'username');
$oForm->makeTextInput('Password' , 'password');
$oForm->makeTextInput('First Name', 'first_name');
$oForm->makeTextInput('Last Name', 'last_name');
$oForm->makeTextInput('Address', 'address');
$oForm->makeTextInput('Telephone', 'telephone');
$oForm->makeTextInput('Email', 'email');
$oForm->makeSubmit('Submit', 'submit');
$oForm->close();

?>


<?php echo $oForm->sHTML;?>


<?php
require_once('includes/footer.php');
?>