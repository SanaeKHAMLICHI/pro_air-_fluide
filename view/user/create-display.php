<main>
    <div class="cover d-flex ai-center jc-center">
        <h1 class="fz-36"><?= $args['pageTitle'] ?></h1>
    </div>

    <form class="m-auto mb-10" method="post" action="/user/create">
        <div class="pt-2">
            <div class="pb-2"><label  for="username ">Votre Nom</label></div>
            <input class="p-1" type="text" name="username" placeholder="Nom">
        </div>

        <div class="pt-2 ">
        <div class="pb-2"><label for="email pb-2">Votre Email </label></div>
            <input class="p-1 " type="email" name="email" placeholder="Email">
        </div>

        <div class=" pt-2">
        <div class="pb-2"><label for="password">Votre Mot de passe</label></div>

            <input class="p-1 " type="password" name="password" placeholder="Mot de Passe">
        </div>
        
        <div class="pt-2">
            <button class="btn1 c-white" type="submit"> Insciption </button>
        </div>



    </form>
</main>