<?php 
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

require_once('includes/user.php');
require_once('includes/form.php');
require_once('includes/header.php');


$oForm = new Form();

if(isset($_POST['submit']) == true){

	$oForm->aData = $_POST;//stick data for the form

	if($_POST['username'] == ''){
		$oForm->addError('username', 'Please fill in');
	}

	if($_POST['first_name'] == ''){
		$oForm->addError('first_name', 'Please fill in');
	}

	if(count($oForm->aErrors) == 0){
		$oUser = new User();
		$oUser->sUserName = $_POST['username'];
		$oUser->sPassword = $_POST['password'];
		$oUser->sFirstName = $_POST['first_name'];
		$oUser->sLastName = $_POST['last_name'];
		$oUser->sAddress = $_POST['address'];
		$oUser->sTelephone = $_POST['telephone'];
		$oUser->sEmail = $_POST['email'];

		$oUser->save();
		$_SESSION['userid'] = $oUser->iId;

		header('Location:success.php?pageid='.$oUser->iId);
	}

	
}

$oForm->open();
$oForm->makeTextInput('Enter username','username');
$oForm->makeTextInput('Enter password','password');
$oForm->makeTextInput('Enter First Name','first_name');
$oForm->makeTextInput('Enter Last Name','last_name');
$oForm->makeTextInput('Enter Address','address');
$oForm->makeTextInput('Enter Telephone Number','telephone');
$oForm->makeTextInput('Enter Email','email');
$oForm->makeSubmit('Submit','submit');
$oForm->close();
?>

<h4>Register user </h4>

<?php echo $oForm->sHTML;?>

<?php
require_once('includes/footer.php');
?>