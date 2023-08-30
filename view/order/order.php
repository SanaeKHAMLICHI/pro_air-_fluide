<main>
    <h1><?= $args['pageTitle'] ?></h1>
    <!-- Affichage des détails de la commande -->

    <h2>Details</h2>
    <div>Numero de commande: <?= $args['order']['reference'] ?></div>
    <div>Date de commande: <?= $args['order']['created_at'] ?></div>
    <div>Mode d'expédition: <?=  $args['order']['name'] ?></div>
    <div>Adresse de livraison: <?= $args['order']['adresse'] ?>, <?= $args['order']['code_postale'] ?> <?= $args['order']['ville'] ?>, <?= $args['order']['pays'] ?>, Tél: <?= $args['order']['telephone'] ?></div>
    <div>Email: <?= $args['order']['email'] ?></div>

    <h2>Articles</h2>
    <table>
        <tr>
            <th>Nom d'article</th>
            <th>Prix unitaire</th>
            <th>Quantité</th>
            <th>Prix Total</th>
        </tr>
        <?php foreach ($args['orderDetails'] as $detail): ?>
            <tr>
                <td><?= $detail['product_name'] ?></td>
                <td><?= $detail['product_price'] ?>€</td>
                <td><?= $detail['product_quantity'] ?></td>
                <td><?= $detail['product_price'] * $detail['product_quantity'] ?>€</td>
            </tr>
        <?php endforeach; ?>
    </table>

</main>
