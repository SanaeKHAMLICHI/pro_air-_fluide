<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/asset/css/style.css">
    <link rel="stylesheet" href="/asset/css/skin.css">

    <link rel="stylesheet" href="/css/mediaqueries.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />


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
                <ul><li><a class="pl-4" href="/view/vitrine/accueil.html">Accueil</a></li></ul>
                </div>
            </div>
            <div class="d-flex ai-center wrap">
                <div class="link d-flex wrap">
                    <ul>
                    

                        <li><a class="pl-4" href="/ctrl/product/list.php">Liste des Produits</a></li>

                        <?php if (isset($_SESSION['user'])) : ?>
                            <li class="nav-item"><a href="/ctrl/order/list.php" class="pl-4">Mes commandes</a></li>
                            <li class="nav-item"><a href="/ctrl/auth/logout.php" class="pl-4">Logout</a></li>
                        <?php else : ?>
                            <li class="nav-item"><a href="/ctrl/auth/login-display.php" class="pl-4">Login</a></li>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['user']) && isset($_SESSION['codeRole']) && $_SESSION['codeRole'] === 'GEST') : ?>
                            <li><a class="pl-4" href="/ctrl/transporter/list.php">Transporteur</a></li>
                        <?php endif; ?>
                        <li>
                            <div class="pl-4 d-flex"> 
                                <div class="">     
                                   <a href="/ctrl/cart/cart.php"> <i class="bi bi-cart3">
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
    </header>

