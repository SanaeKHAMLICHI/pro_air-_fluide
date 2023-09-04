<main>
<section class="container wrap mw-1400 m-auto jc-sb pb-100 pt-100 ">

    <h1><?= $args['pageTitle'] ?></h1>

    <table  class="panier">
        <tr>
            <th>N° de commande</th>
            <th>date </th>
            <th>quantity</th>
            <th>total </th>
            <th>details </th>
        </tr>
        <?php foreach ($args['listOrder'] as $order) : ?>
            <tr>
                <td class=" ta-center"><?= $order['reference'] ?></td>
                <td class=" ta-center"><?= $order['created_at'] ?></td>
                <td class=" ta-center"><?= $order['quantity'] ?></td>
                <td class=" ta-center"><?= $order['total'] ?></td>

                <td  class=" ta-center"><a href="/order/get?id=<?= $order['id'] ?>">Plus de détails</a></td>

            </tr>
        <?php endforeach; ?>
    </table>
</section>
</main>