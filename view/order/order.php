<main>
    <h1><?= $args['pageTitle'] ?></h1>
    <!-- Affichage des détails de la commande -->

    <h2>Details</h2>
    <div>Numero de commande: <?= $args['order']['reference'] ?></div>
    <div>Date de commande: <?= $args['order']['created_at'] ?></div>
    <div>Mode d'expédition: <?=  $args['order']['transportername'] ?></div>
    <div>Adresse de livraison: <?=  $args['order']['adresse_livraison'] ?></div>
    <div>Email: <?= $args['order']['email'] ?></div>

    <h2>Articles</h2>
    <table>
        <tr>
            <th>Nom d'article</th>
            <th>Prix unitaire</th>
            <th>Quantité</th>
            <th>Prix Total</th>
        </tr>
        <?php foreach ($args['orderDetails'] as $datisl): ?>
            <tr>
                <td><?= $datisl['product_name'] ?></td>
                <td><?= $datisl['product_price'] ?>€</td>
                <td><?= $datisl['product_quantity'] ?></td>
                <td><?= $datisl['product_price'] * $datisl['product_quantity'] ?>€</td>
            </tr>
        <?php endforeach; ?>
    </table>

</main>
