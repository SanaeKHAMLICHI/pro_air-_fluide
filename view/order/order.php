<style>
    div p {
        margin: 20px;
    }
    main{
        padding: 3% 6%;
    }
</style>
<main>
    <!-- Affichage des détails de la commande -->
    <section class="  ">
        <h1><?= $args['pageTitle'] ?></h1>
        <h3>Details</h3>
        <div>
    <p>Numero de commande: <?= $args['order']['reference'] ?></p>
    <p>Date de commande: <?= $args['order']['created_at'] ?></p>
    <p>Mode d'expédition: <?= $args['order']['name'] ?></p>
</div>
<div>
    <h4>Adresse de livraison:</h4>
    <p><?= $args['order']['rue'] ?></p>
    <p><?= $args['order']['code_postale'] ?>, <?= $args['order']['ville'] ?></p>
    <p><?= $args['order']['pays'] ?></p>
</div>
<div>
<h4>Tél:</h4>
<p> <?= $args['order']['telephone'] ?></p>
</div>
<div>
<h4>Email:</h4>
    <p> <?= $args['order']['email'] ?></p>
</div>


        <h3>Articles</h3>
        <div  class="table-responsive" >
        <table class="panier">
            <tr>
                <th>Nom d'article</th>
                <th>Prix unitaire</th>
                <th>Quantité</th>
                <th>Prix Total</th>
            </tr>
            <?php foreach ($args['orderDetails'] as $detail) : ?>
                <tr>
                    <td class=" ta-center"><?= $detail['product_name'] ?></td>
                    <td class=" ta-center"><?= $detail['product_price'] ?>€</td>
                    <td class=" ta-center"><?= $detail['product_quantity'] ?></td>
                    <td class=" ta-center"><?= $detail['product_price'] * $detail['product_quantity'] ?>€</td>
                </tr>
            <?php endforeach; ?>
        </table>
        </div>
    </section>

</main>