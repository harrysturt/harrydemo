<?php
require_once('connection.php');

class Album{
	public $iId;
	public $sName;
	public $sDescription;
	public $sPhoto;
	public $fPrice;
	public $iGenreId;

	public function __construct(){
		$this->iId = 0;
		$this->sName = '';
		$this->sDescription = '';
		$this->sPhoto = '';
		$this->fPrice = 0;
		$this->iGenreId = 0;
	}

	public function load($iId){
		$oConnection = new Connection();

		$sSQL = 'SELECT id, name, description, photo, price, genre_id
				FROM albums
				WHERE id = '.$iId;

		$oResultSet = $oConnection->query($sSQL);

		$aRow = $oConnection->fetch($oResultSet);

		$this->iId = $aRow['id'];
		$this->sName = $aRow['name'];
		$this->sDescription = $aRow['description'];
		$this->sPhoto = $aRow['photo'];
		$this->fPrice = $aRow['price'];
		$this->iGenreId = $aRow['genre_id'];
	}
	
	public function save(){
		$oConnection = new Connection();

		if($this->iId == 0){
			
			$sSQL = "INSERT INTO albums (name, description, price, photo, genre_id) 
							VALUES ('".$this->sName."', '".$this->sDescription."', '".$this->fPrice."','".$this->sPhoto."','".$this->iGenreId."')";

			$oConnection->query($sSQL);

			if($bSuccess == true){
				$this->iId = $oConnection->getInsertId();
			}

		}else{

			$sSQL = "UPDATE albums SET name = '".$this->sName."', description = '".$this->sDescription."', price = '".$this->fPrice."', photo = '".$this->sPhoto."', genre_id = '".$this->iGenreId."' WHERE id = ".$this->iId;

			$oConnection->query($sSQL);
		}
		

	}
}

// $oAlbum = new Album();
// // $oAlbum->load(2);
// $oAlbum->sName = 'Harrys album';
// $oAlbum->sDescription = 'album';
// $oAlbum->sPhoto = 'Harrys album';
// $oAlbum->fPrice = 12;
// $oAlbum->iGenreId = 3;
// $oAlbum->save();
// echo '<pre>';
// print_r($oAlbum);
// echo '</pre>';
?>