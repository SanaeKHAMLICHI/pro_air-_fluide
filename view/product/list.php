

<main>
    <h1><?= $args['pageTitle'] ?></h1>
    <section>
        <h2>Liste des Produits</h2>

        <table>
            <?php foreach ($args['listProduct'] as $product) : ?>
                <tr>
                    <td><?= $product['label'] ?></td>
                    <td><?= $product['ref'] ?></td>
                    <td><?= $product['description'] ?></td>
                    <td><?= $product['prix'] ?></td>
                    <td><a href="/ctrl/user/get.php?id=<?= $product['id'] ?>">Détail</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
</main>
