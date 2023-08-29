<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <link rel="stylesheet" href="/asset/css/vitrine/style.css">
    <link rel="stylesheet" href="/asset/css/vitrine/skin.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/asset/css/vitrine/mediaqueries.css">
    <link rel="stylesheet" href="/asset/css/vitrine/carosel.css">
    <link rel="stylesheet" href="/node_modules/flickity/dist/flickity.min.css">
</head>

<body>
    <header>
        <nav class="nav1 d-flex mw-1700 m-auto f-1-300 wrap js-sb">
            <div class="d-flex ai-center">
                <div class="img1">
                    <img src="/asset/image/vitrine/logo-bleu.svg" alt="" class="logo">
                </div>
            </div>
            <div class="conx d-flex ai-center wrap">
                <div class="link d-flex wrap">
                    <ul>
                        <li><a class="pl-4" href="/view/vitrine/accueil.php">Accueil</a></li>
                        <li class="pl-4">
                            <input type="checkbox" id="toggle" />
                            <label for="toggle">Services <span class="fleche"></span></label>
                            <ul class="submenu">
                                <li><a href="/view/vitrine/service1.php">Climatisation</a></li>
                                <li><a href="/view/vitrine/service2.php">Matériels aéraulique frigorifique</a></li>
                                <li><a href="/view/vitrine/service3.php">Equipements industriels</a></li>
                                <li><a href="/view/vitrine/service4.php">Création salle de bain et Rénovation intérieure</a></li>
                            </ul>
                        </li>
                        <li><a class="pl-4" href="/ctrl/product/list.php">Boutique</a></li>
                    </ul>
                </div>
                <button class="btn1 m-1"><a class="c-white" href="/view/vitrine/contact.php">Demander un devis</a></button>
            </div>
        </nav>
        <nav class="nav2 d-flex js-sb">
            <div>
                <img src="/asset/image/vitrine/logo-bleu.svg" alt="" width="170" class="p-1">
            </div>
            <div class="menuburger">
                <input class="input" type="checkbox" role="button" aria-label="Ouvrir le menu" aria-expanded="false" aria-controls="menu">
                <ul id="menu">
                    <li><a class="" href="/view/vitrine/accueil.php">Accueil</a></li>
                    <li><a href="/view/vitrine/service1.php">Climatisation</a></li>
                    <li><a href="/view/vitrine/service2.php">Matériels aéraulique frigorifique</a></li>
                    <li><a href="/view/vitrine/service3.php">Equipements industriels</a></li>
                    <li><a href="/view/vitrine/service4.php">Création salle de bain et Rénovation intérieure</a></li>
                    <li><a href="/ctrl/product/list.php">Boutique</a></li>
                    <li><a href="/view/vitrine/contact.php">Contact</a></li>
                </ul>
            </div>
        </nav>
    </header>

