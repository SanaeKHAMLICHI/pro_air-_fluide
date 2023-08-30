<main>
    <h1><?= $args['pageTitle'] ?></h1>

    <table>
        <tr>
            <th>numero de commande</th>
            <th>date </th>
            <th>quantity</th>
            <th>total </th>
            <th>details </th>
        </tr>
        <?php foreach ($args['listOrder'] as $order) : ?>
            <tr>
                <td><?= $order['reference'] ?></td>
                <td><?= $order['created_at'] ?></td>
                <td><?= $order['quantity'] ?></td>
                <td><?= $order['total'] ?></td>

                <td><a href="/order/get?id=<?= $order['id'] ?>">Plus de détails</a></td>

            </tr>
        <?php endforeach; ?>
    </table>
</main>