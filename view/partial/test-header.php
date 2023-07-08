<?php
session_start();
?>

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
        <div class="">
            <?php if (isset($_SESSION['user'])) : ?>
                <li class="nav-item"><a href="/ctrl/auth/logout.php" class="nav-link">Logout</a></li>

             
                <?php if (isset($_SESSION['user']) && isset($_SESSION['codeRole']) && $_SESSION['codeRole'] === 'GEST') : ?>
                    <a class="pl-4" href="/ctrl/user-list.php">Liste des utilisateurs</a>
                <?php endif; ?>

            <?php else : ?>
                <li class="nav-item"><a href="/ctrl/auth/login-display.php" class="nav-link">Login</a></li>
            <?php endif; ?>
        </div>
    </header>
</body>

</html>
