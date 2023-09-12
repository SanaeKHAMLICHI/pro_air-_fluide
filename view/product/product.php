<main>
    <article class="d-flex jc-center pt-150 mw-1400 m-auto wrap">
        <div class="picture4">
            <img src="<?= $args['product']['picture'] ?>" alt="">
        </div>
        <div class="mw-900 pl-4">
            <h2><?= $args['product']['label'] ?></h2>
            <div class="mt-2"><?= $args['product']['description'] ?></div>
            <div><?= $args['product']['prix'] ?></div>

            <div class="pt-2">
                <form action="/product/quantity" method="get">
                    <input type="hidden" name="add" value="<?= $args['product']['id'] ?>">
                    <label for="quantity">Quantité :</label>

                    <div class="form-type-number d-flex mt-10">
                        <div class="btn-minus c-white"><p>-</p></div>
                        <input class="ml-3" id="quantity" max="10" min="1" name="quantity" type="number" value="1" />
                        <div class="btn-plus c-white ml-3"><p>+</p></div>
                    </div>

                    <button class="btn2 c-white mt-10" type="submit">Ajouter au panier</button>

                </form>
                <!-- Des boutons concernent que le GESTIONNAIRE -->
                <?php if (isset($_SESSION['user']) && isset($_SESSION['codeRole']) && $_SESSION['codeRole'] === 'GEST') : ?>
                    <a href="/product/delete?id=<?= $args['product']['id'] ?>">delete</a>
                    <a href="/product/update-display?id=<?= $args['product']['id'] ?>">update</a>
                <?php endif; ?>
            </div>
        </div>
    </article>
</main>

<script src="/asset/js/quantity.js"></script>