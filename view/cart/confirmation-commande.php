<main class=" mw-1300 m-auto">
    <h2>Votre Commande</h2>
    <!-- confirmation-commande -->

    <!-- Afficher les détails de la commande -->
    <form action="/payment/payment" method="post">

        <!-- Afficher le total de la commande -->
        <div class="d-flex wrap mw-1300 m-auto pt-100 pb-100">
            <section class="pr-3">
                <h2 class="pb-2">Vos Adresses De Livraison </h2>
                <div class="form_adress">

                    <div><?= $args['selectedAddress']['fullname'] ?></div>
                    <div><?= $args['selectedAddress']['rue'] ?></div>
                    <div><?= $args['selectedAddress']['code_postale'] ?></div>
                    <div><?= $args['selectedAddress']['ville'] ?></div>
                    <div><?= $args['selectedAddress']['pays'] ?></div>
                </div>
                <h2>Transporteur sélectionné</h2>
                <div class="form_adress">

                    <div><?= $args['selectedTransporter']['name'] ?></div>
                    <div><?= $args['selectedTransporter']['description'] ?></div>
                    <div><?= $args['selectedTransporter']['prix'] ?></div>
                </div>
                <!-- Champs cachés pour le formulaire de paiement -->
                <input type="hidden" name="total_amount" value="<?= $_SESSION['fullCart']['data']['TotalTTC'] ?>">
                <?php foreach ($_SESSION['fullCart']['product'] as $item) : ?>
                    <input type="hidden" name="name[]" value="<?= $item['product']['label'] ?>">
                <?php endforeach; ?>
            </section>
            <section>
                <table class="panier">
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['fullCart']['product'] as $item) : ?>
                            <tr>
                                <td><?= $item['product']['label'] ?></td>
                                <td><?= $item['product']['prix'] ?>€ x<?= $item['quantity'] ?></td>

                            </tr>
                        <?php endforeach; ?>
                        <tr class="total">
                            <td>Sous Total HT</td>
                            <td class=" ta-center"><?= $item['quantity'] * $item['product']['prix'] ?>
                                €</td>
                        </tr>
                        <tr>
                            <td>TVA (20%)</td>
                            <td class=" ta-center"><?= $_SESSION['fullCart']['data']['taxe'] ?>€</td>
                        </tr>
                        <tr>
                            <td>Total TTC</td>
                            <td class=" ta-center"><?= $_SESSION['fullCart']['data']['TotalTTC'] ?>€</td>
                        </tr>
                        <tr>
                            <td>FRAIS Transport</td>
                            <td class=" ta-center"><?= $args['selectedTransporter']['prix'] ?>€</td>
                        </tr>
                        <tr>
                            <td>Total </td>
                            <td class=" ta-center"><?= $_SESSION['TOTAL'] ?>€</td>
                        </tr>

                    </tbody>
                </table> <button class="btn-validate c-white" type="submit">Paiement</button>

            </section>

    </form>
</main>