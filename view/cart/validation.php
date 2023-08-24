<main class=" mw-1300 m-auto">
    <h1><?= $args['pageTitle'] ?></h1>
    <?php if (empty($args['addedProducts'])) : ?>
        <p>Votre panier est vide.</p>
    <?php else : ?>
        <div class="d-flex wrap mw-1300 m-auto pt-100 pb-100">
            <section class="pr-3">
                <form method="post" action="/ctrl/cart/traitement.php" onsubmit="return validateForm()">
                    <h2 class="pb-2">Vos Adresses De Livraison </h2>        
                    <?php if (empty($args['listAddress'])) : ?>
                    <?php else : ?>

                    <div class="form_adress">

                        <?php foreach ($args['listAddress'] as $address) : ?>
                            <div class="d-flex p-1">
                                <div class="pr-1"><input type="radio" name="adresse" value="<?= $address['id'] ?>"></div>
                                <div>
                                    <div><?= $address['fullname'] ?></div>
                                    <div><?= $address['adresse'] ?></div>
                                    <div><?= $address['complement'] ?></div>
                                    <div><?= $address['code_postale'] ?>, <?= $address['ville'] ?></div>
                                    <div><?= $address['pays'] ?></div>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach; ?>
                    </div>                    
                    <?php endif;?>

                    <a class="btn_adress c-white " href="/ctrl/address/address-display.php">Ajouter une nouvelle adresse</a>

                    <h2 class="pb-2 pt-20">Transporteurs </h2>
                    <div class="form_adress">
                        <?php foreach ($args['listTransporter'] as $transporter) : ?>
                            <div>
                                <input type="radio" name="transporter" value="<?= $transporter['id'] ?>">
                                <div><?= $transporter['name'] ?></div>
                                <div><?= $transporter['description'] ?></div>
                                <div><?= $transporter['prix'] ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- Bouton pour valider la commande -->
            </section>
            <section>
                <h2>Votre commande</h2>
                <table class="panier">
                    <tr>
                        <th>Produit</th>
                        <th>Total</th>
                    </tr>
                    <?php foreach ($args['addedProducts'] as $productId => $quantity) : ?>
                        <?php $product = LibProduct::get($productId); ?>
                        <?php if ($product) : ?>
                            <tr>
                                <td><?= $product['label'] ?></td>
                                <td class=" ta-center"><?= $product['prix'] ?>€ X <?= $quantity ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <tr class="total">
                        <td>Total</td>
                        <td class=" ta-center"><?= $args['total'] ?>€</td>
                    </tr>
                    <?php if (!empty($args['fullCart']['data'])) : ?>
                        <tr >
                            <td>TVA (20%)</td>
                            <td class=" ta-center"><?= $args['fullCart']['data']['taxe'] ?>€</td>
                        </tr>
                        <tr>
                            <td>Total TTC</td>
                            <td class=" ta-center"><?= $args['fullCart']['data']['TotalTTC'] ?>€</td>
                        </tr>
                    <?php endif; ?>
                </table>
                <button class="btn-validate c-white" type="submit" name="validate_order">Valider la commande</button>

            </section>
        </div>
    <?php endif; ?>
    </form>

</main>
<script>
    function validateForm() {
        const addressSelected = document.querySelector('input[name="adresse"]:checked');
        const transporterSelected = document.querySelector('input[name="transporter"]:checked');

        if (!addressSelected || !transporterSelected) {
            alert("Veuillez sélectionner une adresse et un transporteur avant de valider la commande.");
            return false; // Empêche la soumission du formulaire
        }

        return true; // Autorise la soumission du formulaire
    }
</script>
