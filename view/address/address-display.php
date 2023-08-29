<main>
    
<div class="cover d-flex ai-center jc-center">
        <h1 class="fz-36"><?= $args['pageTitle'] ?></h1>
    </div>
<form class="m-auto mb-10" id="form-adress" method="post" action="/address/address">

<div> 
        <div class="pt-2 ">
    <label for="fullname">Nom Complet </label>
    <input id="fullname" type="text" name="fullname">
    </div>
        <div class="pt-2 ">
    <label for="adresse"> Adresse</label>
    <input id="adresse" type="text" name="adresse">
    </div>
        <div class="pt-2 ">
    <label for="complement">Complement d'Adresse</label>
    <input id="complement" type="text" name="complement" >
    </div>
        <div class="pt-2 ">
    <label for="ville">Ville</label>
    <input id="ville" type="text" name="ville">
    </div>
        <div class="pt-2 ">
    <label for="code_postale">Code Postale</label>
    <input id="code_postale" type="text" name="code_postale">
    </div>
        <div class="pt-2 ">
    <label for="pays">Pays</label>
    <input id="pays" type="text" name="pays">
    </div>
        <div class="pt-2 ">
    <label for="telephone">Telephone</label>
    <input id="telephone" type="text" name="telephone">
        </div>
        <div class="pt-2">

    <button class="btn1 c-white" type="submit">Submit</button></div>
</div>
</form>
</main>
