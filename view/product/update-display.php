<main>

    <form method="post" action="/ctrl/product/update.php">

        <div>
        <input id="id" type="hidden" name="id" value="<?= $args['product']['id'] ?>">

            <input id="label" type="text" name="label" value="<?= $args['product']['label'] ?>">
           
            <input id="ref" type="text" name="ref" value="<?= $args['product']['ref'] ?>" >
           
            <input id="description" type="text" name="description" value="<?= $args['product']['description'] ?>" >
           
            <input id="prix" type="text" name="prix" value="<?= $args['product']['prix'] ?>">

            <input id="prix" type="text" name="picture" value="<?= $args['product']['picture'] ?>">


            <button type="submit">Submit</button>
        </div>
    </form>
</main>