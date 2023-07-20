<section>
<a href="/ctrl/cart/clear.php">Vider le panier</a>

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
            <h2>panier totaux</h2>

              
        </table>
        <table>
        <?php if (!empty($args['fullCart']['data'])): ?>
          <tr>
          <td>HT </td>
                <td> <?= $args['fullCart']['data']['total'] ?>€</td>
                </tr><tr>
                <td>TVA (20%) </td>
                <td> <?= $args['fullCart']['data']['taxe'] ?>€</td>
               </tr> 
               <tr>
                <td>Total TTC </td>
                <td> <?= $args['fullCart']['data']['TotalTTC'] ?>€</td>
            </tr>
        <?php endif; ?>
           
        </table>

        
    <?php endif; ?>

    <a href="/ctrl/cart/cart-validation.php">Valider le panier</a>
</section>
