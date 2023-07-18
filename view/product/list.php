
<main>
    <h1><?= $args['pageTitle'] ?></h1>
    <section>
  

        <h2>Liste des Produits</h2>
       
        <!-- Afficher la valeur du panier -->
</div>
        <table>
            <?php foreach ($args['listProduct'] as $product) : ?>
                <tr>
                <td><?= $product['picture'] ?></td>
                    <td><?= $product['label'] ?></td>
                    <td><?= $product['ref'] ?></td>
                    <td><a href="/ctrl/product/get.php?id=<?= $product['id'] ?>">Détail</a></td>
                
                <td><a href="/ctrl/cart/add.php?id=<?= $product['id']?>" class="">Ajouter au panier</a></td>
</tr>
            <?php endforeach; ?>
        </table>
    </section>
</main>
