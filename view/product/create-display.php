<main>
<div class="cover d-flex ai-center jc-center">
        <h1 class="fz-36"><?= $args['pageTitle'] ?></h1>
    </div>
    <form class="m-auto mb-10" method="post" action="/product/create">

        <div>
        <div class="pt-2 ">

        <div class="pb-2"><label for="label">Nom de Produit</label></div>
            <input id="label" type="text" name="label" >
        </div>
        <div class="pt-2 ">

            <div class="pb-2"><label for="ref">Reference de produit</label></div>
            <input id="ref" type="text" name="ref" >
        </div>
        <div class="pt-2 ">

            <div class="pb-2"> <label for="description">Description de Produit</label></div>
            <input id="description" type="text" name="description" >
            </div>
        <div class="pt-2 ">
            <div class="pb-2"><label for="prix">Prix HT de Produit </label></div>
            <input id="prix" type="text" name="prix">
        </div>
        <div class="pt-2 ">
            <div class="pb-2"><label for="picture">Photo de Produit </label></div>
            <input id="picture" type="text" name="picture">
        </div>

          
        <div class="pt-2">
            <button class="btn1 c-white"  type="submit">Publier</button>
        </div>
        </div>
    </form>
</main>