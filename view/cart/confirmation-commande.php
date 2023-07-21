
<div>
   
     
<h2>Votre Commande</h2>   
<!-- confirmation-commande.php -->



<!-- Afficher les détails de la commande -->
<form action="/ctrl/cart/confirmation-commande.php" method="post">

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


                <button type="submit" name="validate">Passer au paiement</button>

                       
                </form>              


 
</section>
