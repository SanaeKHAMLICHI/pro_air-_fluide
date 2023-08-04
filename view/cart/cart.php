<main class=" mw-1300 m-auto">
    <section class="cart pb-100">
        <h1><?= $args['pageTitle'] ?></h1>

        <?php if (empty($args['addedProducts'])) : ?>
            <p>Votre panier est vide.</p>
        <?php else : ?>
            <div class="h-50 pt-2">
                <a class="btn_delete c-white" href="/ctrl/cart/clear.php">Supprimer Votre Panier</a>
            </div>

            <div>
                <table class="panier m-auto p-1">
                    <tr>
                        <th></th>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Supprimer</th>
                    </tr>

                    <?php foreach ($args['addedProducts'] as $productId => $quantity) : ?>
                        <?php $product = LibProduct::get($productId); ?>
                        <?php if ($product) : ?>
                            <tr>
                                <td><img src="<?= $product['picture'] ?>" alt="" width="100"></td>
                                <td><?= $product['label'] ?></td>
                                <td><?= $product['prix'] ?>€</td>
                                <td>
                                    <a href="/ctrl/cart/reduce.php?delete=<?= $product['id'] ?>">-</a>
                                    <?= $quantity ?>
                                    <a href="/ctrl/cart/add.php?add=<?= $product['id'] ?>">+</a>
                                </td>
                                <td><a href="/ctrl/cart/delete.php?del=<?= $product['id'] ?>"><i class="bi bi-trash3"></i></a></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    <?php if (!empty($args['fullCart']['data'])) : ?>
                        <tr>
                            <th colspan="3"></th>
                            <th>Panier Totaux</th>
                            <th></th>
                        </tr>

                        <tr>
                            <td colspan="3"></td>
                            <td>Panier Soustotal HT</td>
                            <td><?= $args['fullCart']['data']['total'] ?>€</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td>TVA (20%)</td>
                            <td><?= $args['fullCart']['data']['taxe'] ?>€</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td>Total TTC</td>
                            <td><?= $args['fullCart']['data']['TotalTTC'] ?>€</td>
                        </tr> 
                        <tr>
                            <td colspan="5" class="ta-right">
                                <a class="btn_valider c-white" href="/ctrl/cart/validation.php">Valider le panier</a>
                            </td>
                        </tr>
                    <?php endif; ?>

                </table>
            </div>

        <?php endif; ?>

    </section>
</main>
