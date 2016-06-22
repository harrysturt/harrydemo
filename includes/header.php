<?php
session_start();
require_once('view.php');
require_once('genremanager.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">

    <title>Responsive Side Menu &ndash; Layout Examples &ndash; Pure</title>

    


<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">



  
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/layouts/side-menu-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="assets/side-menu.css">
    <!--<![endif]-->
  

</head>
<body>






<div id="layout"> 
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id="menu">
        <div class="pure-menu">
            <a class="pure-menu-heading" href="#">Real Groovy</a>

            <?php
            $aGenres = GenreManager::getGenres();

            echo View::renderNav($aGenres); 
            ?>

            <!-- ul class="pure-menu-list">
                <li class="pure-menu-item"><a href="#" class="pure-menu-link">Rock</a></li>
                <li class="pure-menu-item"><a href="#" class="pure-menu-link">K-pop</a></li>

                <li class="pure-menu-item" class="menu-item-divided pure-menu-selected">
                    <a href="#" class="pure-menu-link">Reggae</a>
                </li>

                <li class="pure-menu-item"><a href="#" class="pure-menu-link">Hip-hop & RnB</a></li>
            </ul> -->
        </div>
    </div>

    <div id="main">
    <div class="header">
    <img src="assets/images/headerimage.jpg">
</div>