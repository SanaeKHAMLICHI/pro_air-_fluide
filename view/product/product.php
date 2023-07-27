<main>
    <article class="d-flex jc-center pt-150 mw-1400 m-auto">
        <div class="picture4">
            <img src="<?= $args['product']['picture'] ?>" alt="">
        </div>
        <div class="mw-900 pl-4">
            <h2><?= $args['product']['label'] ?></h2>
            <div><?= $args['product']['description'] ?></div>
            <div><?= $args['product']['prix'] ?></div>

            <div class="pt-2">
                <form action="/ctrl/product/quantity.php" method="get">
                    <input type="hidden" name="add" value="<?= $args['product']['id'] ?>">
                    <label for="quantity">Quantité :</label>

                    <div class="form-type-number d-flex">
                         <div class="btn-minus c-white">-</div><input id="quantity" max="10" min="1" name="quantity" type="number" value="1" />
                       
                        <div class="btn-plus c-white">+</div>
                    </div>

                    <button class="btn2 c-white" type="submit">Ajouter au panier</button>

                </form>
                <!-- Des boutons concernent que le GESTIONNAIRE -->
                <?php if (isset($_SESSION['user']) && isset($_SESSION['codeRole']) && $_SESSION['codeRole'] === 'GEST'): ?>
                    <a href="/ctrl/product/delete.php?id=<?= $args['product']['id'] ?>">delete</a>
                    <a href="/ctrl/product/update-display.php?id=<?= $args['product']['id'] ?>">update</a>
                <?php endif; ?>
            </div>
        </div>
    </article>
</main>

<script>
    const quantityInput = document.getElementById('quantity');
    const btnMinus = document.querySelector('.btn-minus');
    const btnPlus = document.querySelector('.btn-plus');

    btnMinus.addEventListener('click', function () {
        if (quantityInput.value > quantityInput.min) {
            quantityInput.stepDown();
        }
    });

    btnPlus.addEventListener('click', function () {
        const currentValue = parseInt(quantityInput.value);
        const maxValue = parseInt(quantityInput.max);
        if (currentValue < maxValue) {
            quantityInput.value = currentValue + 1;
        }
    });
</script>
