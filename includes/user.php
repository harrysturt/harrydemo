<?php
require_once('connection.php');

class User{
	public $iId;
	public $sUserName;
	public $sPassword;
	public $sFirstName;
	public $sLastName;
	public $sAddress;
	public $sTelephone;
	public $sEmail;
	public $sAdmin;

	public function __construct (){
		$this->iId = 0;
		$this->sUserName = '';
		$this->sPassword = '';
		$this->sFirstName= '';
		$this->sLastName = '';
		$this->sAddress = '';
		$this->sTelephone = '';
		$this->sEmail = '';
		$this->sAdmin = '';
	}

	public function load($iId){
		$oConnection = new Connection();

		$sSQL = 'SELECT id, username, password, first_name, last_name, address, telephone, email, admin
				FROM users
				WHERE id = '.$iId;

		$oResultSet = $oConnection->query($sSQL);

		$aRow = $oConnection->fetch($oResultSet);

		$this->iId = $aRow['id'];
		$this->sUserName = $aRow['username'];
		$this->sPassword = $aRow['password'];
		$this->sFirstName= $aRow['first_name'];
		$this->sLastName = $aRow['last_name'];
		$this->sAddress = $aRow['address'];
		$this->sTelephone = $aRow['telephone'];
		$this->sEmail = $aRow['email'];
		$this->sAdmin = $aRow['admin'];
	}

	
	public function loadByUsername($sUserName){
		$oConnection = new Connection();

		$sSQL = "SELECT id, username, password, first_name, last_name, address, telephone, email, admin
				FROM users
				WHERE username = '".$sUserName."'";

		$oResultSet = $oConnection->query($sSQL);

		$aRow = $oConnection->fetch($oResultSet);

		if($aRow == true){
			$this->iId = $aRow['id'];
			$this->sUserName = $aRow['username'];
			$this->sPassword = $aRow['password'];
			$this->sFirstName= $aRow['first_name'];
			$this->sLastName = $aRow['last_name'];
			$this->sAddress = $aRow['address'];
			$this->sTelephone = $aRow['telephone'];
			$this->sEmail = $aRow['email'];
			$this->sAdmin = $aRow['admin'];

			return true;

		}else{
			
			return false;
		}
	}


	public function save(){
		
		$oConnection = new Connection();

		if($this->iId == 0){

			$sSQL = "INSERT INTO users (username, password, first_name, last_name, address, telephone, email, admin) 
					VALUES ('".$this->sUserName."', '".$this->sPassword."', '".$this->sFirstName."', '".$this->sLastName."', '".$this->sAddress."', '".$this->sTelephone."', '".$this->sEmail."', '".$this->sAdmin."')";

			$bSuccess = $oConnection->query($sSQL);

			if($bSuccess == true){
			$this->iId = $oConnection->getInsertID();
			
			}

		}else{
			$sSQL = "UPDATE users SET username = '".$this->sUserName."', password = '".$this->sPassword."', first_name = '".$this->sFirstName."', last_name = '".$this->sLastName."', address = '".$this->sAddress."', telephone = '".$this->sTelephone."', email = '".$this->sEmail."' WHERE id = ".$this->iId;
			

			$oConnection->query($sSQL);
		}


		
	}
}




// $oUser = new User();
// $oUser->load(2);


// $oUser->iId = '2';
// $oUser->sUserName = 'James';
// $oUser->sPassword = '1';
// $oUser->sFirstName = 'Peter';
// $oUser->sLastName = 'Pan';
// $oUser->sAddress = '12 Neveland';
// $oUser->sTelephone = '3433323';
// $oUser->sEmail = 'peter.pan@gmail.com';
// $oUser->sAdmin = 'no';



// $oUser->save();
// echo '<pre>';
// print_r($oUser);
// echo '</pre>';
?>

























