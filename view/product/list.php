<main>
    <section class="container d-flex wrap mw-1400 m-auto jc-sb pb-100 pt-100 ">
    <?php if (isset($_SESSION['user']) && isset($_SESSION['codeRole']) && $_SESSION['codeRole'] === 'GEST') : ?>
    <a href="/product/create-display"><i class="bi bi-plus-square xl"></i><a>                    
    <?php endif; ?>

        <?php foreach ($args['listProduct'] as $product) : ?>
            <article class="art m-15-t m-1">

                <header class="m-1 ">
                    <div class="ta-center">
                    <picture class="mt-1 ">
                        <img class="" src="<?= $product['picture'] ?>" alt="Lorem" width="200" />
                    </picture>
                    </div>
                    <div class="m-15-t m-10-l m-1">
                        <p><?= $product['label'] ?></p>
                    </div>
                </header>
                <div class="ml-3 ">
                    <p class="  "><b><?= $product['prix'] ?> € HT </b></p>
                </div>

                <footer class=" p-1 m-30-t m-1 ">
                    <a class="savoir p-1" href="/product/get?id=<?= $product['id'] ?>">En savoir plus</a>
                </footer>
            </article>
        <?php endforeach; ?>
    </section>

</main>