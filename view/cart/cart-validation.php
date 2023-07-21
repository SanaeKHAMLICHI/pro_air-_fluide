<section>
    <div>
        <?php if (empty($args['addedProducts'])): ?>
            <p>Votre panier est vide.</p>
        <?php else: ?>
            <h2>Votre commande</h2>
            <table>
                <tr>
                    <th>Produit</th>
                    <th>Total</th>
                </tr>

                <?php foreach ($args['addedProducts'] as $productId => $quantity): ?>
                    <?php $product = LibProduct::get($productId); ?>
                    <?php if ($product): ?>
                        <tr>
                            <td><?= $product['label'] ?></td>
                            <td><?= $product['prix'] ?>X<?= $quantity ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>

                <tr class="total">
                    <td>Total</td>
                    <td><?= $args['total'] ?>€</td>
                    
                </tr>
                <?php if (!empty($args['fullCart']['data'])): ?>
          <tr>
                <td>TVA (20%) </td>
                <td> <?= $args['fullCart']['data']['taxe'] ?>€</td>
               </tr> 
               <tr>
                <td>Total TTC </td>
                <td> <?= $args['fullCart']['data']['TotalTTC'] ?>€</td>
            </tr>
        <?php endif; ?>
            </table>
        </div>

        <div>
            <h2>Votre adresse</h2>
            
            <?php foreach ($args['listAddress'] as $address): ?>
                <input type="radio" name="adresse">
                <div><?= $address['fullname'] ?></div>
                <div><?= $address['adresse'] ?></div>
                <div><?= $address['complement'] ?></div>
                <div><?= $address['code_postale'] ?> , <?= $address['ville'] ?></div>
                <div><?= $address['pays'] ?></div>
            <?php endforeach; ?>
       

        

    <?php endif; ?>

    <a href="/ctrl/address/address-display.php">Ajoutez une nouvelle adresse</a> </div>
    <div>
    <h2>Transporteur</h2>

    <?php foreach ($args['listTransporter'] as $transporter) : ?>
        <input type="radio" name="trasporter">

                <div><?= $transporter['name'] ?></div>
                    <div><?= $transporter['description'] ?></div>
                    <div><?= $transporter['prix'] ?></div>
                

            <?php endforeach; ?>
     </div>
</section>
