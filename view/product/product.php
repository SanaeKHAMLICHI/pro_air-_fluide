<main>
    <h1><?= $args['pageTitle'] ?></h1>
    <?php var_dump($_SESSION['user']['id']);?>
    <a href="panier.php" class="link">Panier<span><?=array_sum($_SESSION['cart'])?></span></a>

    <div> id : <?= $args['product']['id'] ?></div>

    <div> label : <?= $args['product']['label'] ?></div>
    <div>ref : <?=$args['product']['ref'] ?></div>
    <div> descreption :  <?=  $args['product']['description'] ?></div>
    <div>prix : <?=  $args['product']['prix'] ?></div>
    <div> picture : <?= $args['product']['picture'] ?></div>

    <div><a href="/ctrl/cart/add.php?id=<?=$args['product']['id']?>" class="id_product">Ajouter au panier</a></div>

    <?php if (isset($_SESSION['user']) && isset($_SESSION['codeRole']) && $_SESSION['codeRole'] === 'GEST') : ?>

    <a href="/ctrl/product/delete.php?id=<?= $args['product']['id'] ?>">delete</a>
    <a href="/ctrl/product/update-display.php?id=<?= $args['product']['id'] ?>">update</a>
<?php endif ;?>

</main>