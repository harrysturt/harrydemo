<?php
require_once('connection.php');
require_once('genres.php');

class GenreManager{
	public function getGenres(){

		$aGenres = [];

		$oConnection = new Connection();

		$sSQL = 'SELECT id
				FROM genres';

		$oResultSet = $oConnection->query($sSQL);

		while($aRow = $oConnection->fetch($oResultSet)){
			$iGenreId = $aRow['id'];

			$oGenre = new Genre();
			$oGenre->load($iGenreId);
			$aGenres[] = $oGenre;
		}

		return $aGenres;

	}
}

// echo '<pre>';
// print_r(GenreManager::getGenres());
// echo '</pre>';


?>