<?php
require_once('includes/header.php');
if(isset($_SESSION['userid']) == false){
 	//rederiect to login
 	header('Location:login.php');

}

require_once('includes/header.php');
require_once('includes/user.php');

$iUserId= $_SESSION['userid'];
$oUser = new User();
$oUser->load($iUserId);

echo View::renderUserDeatails($oUser);

?>
	




<?php
require_once('includes/footer.php');
?>

