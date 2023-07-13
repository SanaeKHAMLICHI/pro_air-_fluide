<main>
    <h1><?= $args['pageTitle'] ?></h1>

    <div> label : <?= $args['product']['label'] ?></div>
    <div>ref : <?=$args['product']['ref'] ?></div>
    <div> descreption :  <?=  $args['product']['description'] ?></div>
    <div>prix : <?=  $args['product']['prix'] ?></div>
    <div> picture : <?= $args['product']['picture'] ?></div>
    <a href="/ctrl/product/delete.php?id=<?= $args['product']['id'] ?>">delete</a>

</main>