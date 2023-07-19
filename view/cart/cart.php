<section>
    <?php if (empty($args['addedProducts'])): ?>
        <p>Votre panier est vide.</p>
    <?php else: ?>
        <table>
            <tr>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Action</th>
            </tr>

            <?php foreach ($args['addedProducts'] as $productId => $quantity): ?>
                <?php $product = LibProduct::get($productId); ?>
                <?php if ($product): ?>
                    <tr>
                        <td><?= $product['label'] ?></td>
                        <td><?= $product['prix'] ?>€</td>
                        <td>
                            <a href="/ctrl/cart/cart.php?delete=<?= $product['id'] ?>">-</a>
                            <?= $quantity ?>
                            <a href="/ctrl/cart/cart.php?add=<?= $product['id'] ?>">+</a>
                        </td>
                        <td><a href="/ctrl/cart/cart.php?del=<?= $product['id'] ?>">Supprimer</a></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>

            <tr class="total">
                <th>Total : <?= $args['total'] ?>€</th>
            </tr>
        </table>

        <div>
            <?php foreach ($args['listAddress'] as $address): ?>
                <div><?= $address['fullname'] ?></div>
                <div><?= $address['adresse'] ?></div>
                <div><?= $address['complement'] ?></div>
                <div><?= $address['code_postale'] ?></div>
                <div><?= $address['ville'] ?></div>
                <div><?= $address['pays'] ?></div>
                <div><?= $address['telephone'] ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <a href="/ctrl/address/address-display.php">Valider le panier</a>
</section>
