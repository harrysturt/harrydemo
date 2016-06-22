<?php

	class View{
	
	static public function renderNav($aGenres){

		$sHTML = '<ul class="pure-menu-list">';

		for($i=0;$i<count($aGenres);$i++){
	        
	        $oGenre = $aGenres[$i];
	        $sHTML .= '<li class="pure-menu-item"><a href="main.php?genreid='.$oGenre->iId.'" class="pure-menu-link">'.$oGenre->sGenreName.'</a></li>';

		}
	                
	    $sHTML .= '</ul>';

	    $sHTML .= '<li class="pure-menu-item"><a href="registration.php" class="pure-menu-link">Register</a></li>';

	    $sHTML .= '<li class="pure-menu-item"><a href="login.php" class="pure-menu-link">Login</a></li>';

	    $sHTML .= '<li class="pure-menu-item"><a href="userdeatails.php" class="pure-menu-link">User Deatails</a></li>';

	    $sHTML .= '<li class="pure-menu-item"><a href="logout.php" class="pure-menu-link">Log Out</a></li>';

	    $sHTML .= '<li class="pure-menu-item"><a href="newgenre.php" class="pure-menu-link">New Genre</a></li>';

	    return $sHTML;

	}

	
	static public function renderGenre($oGenre){
		
		$sHTML = '<div class="header">';
		
		$sHTML .= '<h1>'.$oGenre->sGenreName.'</h1>
				    <h2>'.$oGenre->sGenreDescription.'</h2>';

		$sHTML .= '<a href="editgenre.php?genreid='.$oGenre->iId.'">+ Edit Genre</a>';

		$sHTML .= '</div>';		
		$sHTML .= '<div class="content">';

		$aAlbums = $oGenre->aAlbums;

		
		for($i=0; $i<count($aAlbums); $i++){
			
			$oAlbum = $aAlbums[$i];
				
			$sHTML .= '<div class="description">';
			$sHTML .= '<img class="pure-img-responsive" src="'.$oAlbum->sPhoto.'" alt="">';
			$sHTML .= '<h2 class="content-subhead">'.$oAlbum->sName.'</h2>';
			$sHTML .= '<p>'.$oAlbum->sDescription.'</p>';
			$sHTML .= '<p>$'.$oAlbum->fPrice.'.00</p>';
			$sHTML .= '<a href="editalbum.php?albumid='.$oAlbum->iId.'">+ Edit Album</a>';
			$sHTML .= '</div>';			
		}
		
		$sHTML .= '<a href="newalbum.php">+ New Album</a>';
		$sHTML .= '</div>';

		return $sHTML;

	}


	static public function renderUserDeatails($oUser){
		$sHTML = '<div class="userdeatails">
					<h3>User Details</h3>
					<p>ID: '.$oUser->iId.'</p>
					<p>Username: '.$oUser->sUserName.'</p>
					<p>Password: '.$oUser->sPassword.'</p>
					<p>First Name: '.$oUser->sFirstName.'</p>
					<p>Last Name: '.$oUser->sLastName.'</p>
					<p>Address: '.$oUser->sAddress.'</p>
					<p>Telephone: '.$oUser->sTelephone.'</p>
					<p>Email: '.$oUser->sEmail.'</p>
					<p>Admin: '.$oUser->sAdmin.'</p>

					<a href="edituser.php">+ Edit deatails</a>
				</div>';

				

		return $sHTML;
	}
}
?>











		
        