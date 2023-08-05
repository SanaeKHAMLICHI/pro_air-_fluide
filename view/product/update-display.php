<main>
<div class="cover d-flex ai-center jc-center">
        <h1 class="fz-36"><?= $args['pageTitle'] ?></h1>
    </div>
    <form class="m-auto mb-10" method="post" action="/ctrl/product/update.php">

        <div>
        
        <div class="pt-2 ">

        <input id="id" type="hidden" name="id" value="<?= $args['product']['id'] ?>">
        </div>
        <div class="pt-2 ">        
        <label for="label">Nouveau Nom </label>

            <input id="label" type="text" name="label" value="<?= $args['product']['label'] ?>">
            </div>
        <div class="pt-2 ">
        <label for="ref">Nouvelle Reference  </label>

            <input id="ref" type="text" name="ref" value="<?= $args['product']['ref'] ?>" >
            </div>
        <div class="pt-2 ">
        <label for="desription">Nouvelle Description  </label>

            <input id="description" type="text" name="description" value="<?= $args['product']['description'] ?>" >
            </div>
        <div class="pt-2 ">
        <label for="prix">Nouveau Prix  </label>

            <input id="prix" type="text" name="prix" value="<?= $args['product']['prix'] ?>">
            </div>
        <div class="pt-2 ">
        <label for="picture">Nouvelle Photp  </label>

            <input id="prix" type="text" name="picture" value="<?= $args['product']['picture'] ?>">
            </div>
        <div class="pt-2 ">

            <button  class="btn1 c-white" type="submit">Submit</button></div>
        </div>
    </form>
</main>