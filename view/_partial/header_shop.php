<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/asset/css/style.css">
    <link rel="stylesheet" href="/asset/css/skin.css">
    <link rel="stylesheet" href="/asset/css/mediaqueries.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="/node_modules/bootstrap-icons/font/bootstrap-icons.min.css">


    <title> Boutique</title>
</head>

<body>

    <header>
        <nav class="nav1 d-flex mw-1700 m-auto f-1-300 wrap js-sb">
            <div class="d-flex ai-center wrap">
                <div>
                    <img src="/asset/image/logo-bleu.svg" alt="" class="logo">
                </div>
                <div class="link d-flex ">
                <ul><li><a class="pl-4" href="/view/vitrine/accueil.php">Accueil</a></li>
                    <li><a class="pl-4" href="/product/list">Produits</a></li></ul>  

                </div>
            </div>
            <div class="d-flex ai-center wrap">
                <div class="link d-flex wrap">
                    <ul>
                    


                        <?php if (isset($_SESSION['user'])) : ?>
                            <?php if (isset($_SESSION['user']) && isset($_SESSION['codeRole']) && $_SESSION['codeRole'] === 'MEMB') : ?>

                            <li class="nav-item"><a href="/order/list" class="pl-4"><i class="bi bi-person-fill"></i></a></li>
                            <?php endif; ?>

                            <li class="nav-item"><a href="/auth/logout" class="pl-4">Logout</a></li>
                        <?php else : ?>
                            <li class="nav-item"><a href="/auth/login-display" class="pl-4">Login</a></li>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['user']) && isset($_SESSION['codeRole']) && $_SESSION['codeRole'] === 'GEST') : ?>
                            <li><a class="pl-4" href="/transporter/list">Transporteur</a></li>
                        <?php endif; ?>
                        <li>
                            <div class="pl-4 d-flex"> 
                                <div class="">     
                                   <a href="/cart/cart"> <i class="bi bi-cart3">
                                    <sup>
                                        <?= array_sum($_SESSION['cart']) ?>
                                    </sup>
                                    </i></a>
                                </div>
                            </div> 
                        </li>
                    </ul>
                </div>
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
                    
                    <li><a href="/product/list">Boutique</a></li>
                    <li><a href="/cart/cart">Panier</a></li>

                    <li><a href="/view/vitrine/contact.php">Contact</a></li>
                </ul>
            </div>
        </nav>
    </header>

