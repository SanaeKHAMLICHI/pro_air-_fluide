<main>

    <h1><?= $args['pageTitle'] ?></h1>
    <!-- Affichage de details de produit -->
  

    <div> label : <?= $args['product']['label'] ?></div>
    <div> ref : <?=$args['product']['ref'] ?></div>
    <div> descreption :  <?=  $args['product']['description'] ?></div>
    <div>prix : <?=  $args['product']['prix'] ?></div>
   
    <div> picture :  <img  class= "" src="<?= $args['product']['picture'] ?>" alt="Lorem" width="100" /> </div>

    <!-- form pour l'ajout de Quantité de produit souhaité -->
    <form action="/ctrl/product/quantity.php" method="get"> 
        <input type="hidden" name="add" value="<?= $args['product']['id'] ?>">
        <label for="quantity">Quantité :</label>
        <input type="number" id="quantity" name="quantity" value="1" min="1">
        <button type="submit">Ajouter au panier</button>
    </form>

    <!-- Des bouttons concernes que le GESTIONNAIRE  -->
    <?php if (isset($_SESSION['user']) && isset($_SESSION['codeRole']) && $_SESSION['codeRole'] === 'GEST'): ?>
        <a href="/ctrl/product/delete.php?id=<?= $args['product']['id'] ?>">delete</a>
        <a href="/ctrl/product/update-display.php?id=<?= $args['product']['id'] ?>">update</a>
    <?php endif ;?>
</main>
