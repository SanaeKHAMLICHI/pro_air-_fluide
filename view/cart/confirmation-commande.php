<?php var_dump(  $_SESSION['cart_total'])?>
full cart
<?php var_dump( $_SESSION['fullCart']['data'])?>

<?php var_dump( $_SESSION['fullCart']['product'][0]['product']['label'])?>
<?php var_dump( $_SESSION['fullCart']['product'])?>

<div>
   
     
<h2>Votre Commande</h2>   
<!-- confirmation-commande.php -->



<!-- Afficher les détails de la commande -->
<form action="/ctrl/payment/payment.php" method="post">

<table>
    <thead>
        <tr>
            <th>Produit</th>
            <th>Quantité</th>
            <th>Prix unitaire</th>
            <th>Sous-total</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($_SESSION['fullCart']['product'] as $item): ?>
            <tr>
                <td><?= $item['product']['label'] ?></td>
                <td><?= $item['quantity'] ?></td>
                <td><?= $item['product']['prix'] ?></td>
                <td><?= $item['quantity'] * $item['product']['prix'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Afficher le total de la commande -->
<p>Total TTC : <?= $_SESSION['fullCart']['data']['TotalTTC'] ?></p>

<h2>Votre adresse</h2>   
<div><?= $args['selectedAddress']['fullname'] ?></div>
                <div><?= $args['selectedAddress']['adresse'] ?><div>
                <div><?= $args['selectedAddress']['code_postale'] ?><div>
                <div><?= $args['selectedAddress']['ville'] ?><div>
                <div><?= $args['selectedAddress']['pays'] ?><div>


<h2>transporteur selection'</h2>
                <div><?= $args['selectedTransporter']['name'] ?></div>
                <div><?= $args['selectedTransporter']['description'] ?><div>
                <div><?= $args['selectedTransporter']['prix'] ?><div>

                <input type="hidden" name="total_amount" value="<?= $_SESSION['fullCart']['data']['TotalTTC'] ?>">
                <input type="hidden" name="name" value="<?= $item['product']['label'] ?>">
                <input type="hidden" name="total_amount" value="<?= $_SESSION['fullCart']['data']['TotalTTC'] ?>">

                <button type="submit">Checkout</button>

                       
                </form>              


 
</section>
