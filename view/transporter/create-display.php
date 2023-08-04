<main><div class="cover d-flex ai-center jc-center">
        <h1><?= $args['pageTitle'] ?></h1>
    </div>
    <form  class="m-auto mb-10" method="post" action="/ctrl/transporter/create.php">

        <div>
       
        <div class="pt-2 ">
            <label for="name">Nom </label>
            <input id="name" type="text" name="name" >
            </div>
        <div class="pt-2 ">
            <label for="description">Description</label>
            <input id="description" type="text" name="description" >
            </div>
        <div class="pt-2 ">
            <label for="prix">Prix</label>
            <input id="prix" type="text" name="prix">
            </div>
        <div class="pt-2 ">
          

            <button class="btn1 c-white" type="submit">Submit</button>
        </div>
        </div>
    </form>
</main>