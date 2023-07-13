

<main>
    <h1><?= $args['pageTitle'] ?></h1>
    <section>
        <h2>Liste des Produits</h2>

        <table>
            <?php foreach ($args['listProduct'] as $product) : ?>
                <tr>
                <td><?= $product['picture'] ?></td>
                    <td><?= $product['label'] ?></td>
                    <td><?= $product['ref'] ?></td>
                    <td><a href="/ctrl/product/get.php?id=<?= $product['id'] ?>">Détail</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
</main>
