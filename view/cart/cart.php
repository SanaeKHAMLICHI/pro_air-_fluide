<section>
    <?php if (empty($args['addedProducts'])): ?>
        <p>Votre panier est vide.</p>
    <?php else: ?>
        <table>
            <tr>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                <!-- <th>Action</th> -->
            </tr>

            <?php foreach ($args['addedProducts'] as $productId => $quantity): ?>
                <?php $product = LibProduct::get($productId); ?>
                <?php if ($product): ?>
                    <tr>
                        <td><?= $product['label'] ?></td>
                        <td><?= $product['prix'] ?>€</td>

                        <td><a href="/ctrl/cart/cart.php?delete=<?= $product['id']?>"  value="-">-</a>
                            <?= $quantity ?>
                            <a href="/ctrl/cart/cart.php?add=<?= $product['id'] ?>"  value="+">+</a>
                        <td><a href="/ctrl/cart/cart.php?del=<?= $product['id'] ?>"> delet</a></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
            <a href="/ctrl/adress/form-display.php">valider le panier</a>

            <tr class="total">
                <th>Total : <?= $args['total'] ?>€</th>
            </tr>
        </table>
    <?php endif; ?>
</section>
