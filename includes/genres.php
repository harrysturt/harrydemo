<?php
require_once('connection.php');
require_once('albums.php');

class Genre{
	public $iId;
	public $sGenreName;
	public $sGenreDescription;
	public $aAlbums;

	public function __construct(){
		$this->iId = 0;
		$this->sGenreName = '';
		$this->sGenreDescription = '';
		$this->aAlbums = [];
	}

	public function load($iId){

		$oConnection = new Connection();

		$sSQL = 'SELECT id, genre_name, genre_description
				FROM genres
				WHERE id ='.$iId;

		$oResultSet = $oConnection->query($sSQL);

		$aRow = $oConnection->fetch($oResultSet);

		$this->iId = $aRow['id'];
		$this->sGenreName = $aRow['genre_name'];
		$this->sGenreDescription = $aRow['genre_description'];


		$sSQL = 'SELECT id
				FROM albums
				WHERE genre_id = '.$iId;

		$oResultSet = $oConnection->query($sSQL);

		while($aRow = $oConnection->fetch($oResultSet)){
			$iAlbumId = $aRow['id'];

			$oAlbum = new Album();
			$oAlbum->load($iAlbumId);
			$this->aAlbums[] = $oAlbum;
		}
	}

	public function save(){
		
		$oConnection = new Connection();

		if($this->iId == 0){
			$sSQL = "INSERT INTO genres (genre_name, genre_description) 
					VALUES ('".$this->sGenreName."', '".$this->sGenreDescription."')";

			$bSuccess = $oConnection->query($sSQL);

			if($bSuccess == true){
				$this->iId = $oConnection->getInsertId();
			}


		}else{

			$sSQL = "UPDATE genres SET genre_name = '".$this->sGenreName."', genre_description = '".$this->sGenreDescription."' WHERE id = ".$this->iId;

			$oConnection->query($sSQL);
		}

		
	}
}

// $oGenre = new Genre;
// $oGenre->load(4);
// echo '<pre>';
// print_r($oGenre);
// echo '</pre>';

?>