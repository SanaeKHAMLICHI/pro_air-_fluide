

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/skin.css">

    <link rel="stylesheet" href="/css/mediaqueries.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <title>Quizz</title>
</head>

<body>
    <header>
        <nav>
            <ul><li><a class="pl-4" href="/ctrl/product/list.php">Liste des Produits</a></li>

                <?php if (isset($_SESSION['user'])) : ?>
                    <li class="nav-item"><a href="/ctrl/auth/logout.php" class="nav-link">Logout</a></li>
                <?php else : ?> 
                    <li class="nav-item"><a href="/ctrl/auth/login-display.php" class="nav-link">Login</a></li>
                <?php endif; ?>
                
                
                <?php if (isset($_SESSION['user']) && isset($_SESSION['codeRole']) && $_SESSION['codeRole'] === 'GEST') : ?>
                        <li><a class="pl-4" href="/ctrl/product/list.php">Liste des utilisateurs</a></li>
                    <?php endif; ?>
            </ul>
        </nav>
    </header>
</body>

</html>
