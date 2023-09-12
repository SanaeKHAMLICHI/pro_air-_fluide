<style>
    div p {
        margin: 20px;
    }
    main{
        padding: 3% 6%;
    }
</style>
<main>
<section class="container wrap mw-1400 m-auto jc-sb  ">

    <h1><?= $args['pageTitle'] ?></h1>
<div class="table-responsive">
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
</div>
</section>
</main>