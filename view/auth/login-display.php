
<main>
    <div class="cover d-flex ai-center jc-center">
        <h1><?= $args['pageTitle'] ?></h1>
    </div>

    <form class="m-auto mb-10" id="form-login" method="post" action="/ctrl/auth/login.php">
     

        <div class="pt-2  ">
            <div class="pb-2"><label for="email pb-2">Votre Email </label></div>
           <div class="ta-center"> <input class="p-1 " type="email" name="email" placeholder="Email" autofocu></div>
        </div>

        <div class=" pt-2">
            <div class="pb-2"><label for="password">Votre Mot de passe</label></div>

            <input class="p-1 " type="password" name="password" placeholder="Mot de Passe">
        </div>
        <div class="ta-center">
        <p class=" p-1">Vous n'avez pas de compte? <span><a
          href="/ctrl/user/create-display.php">inscrivez-vous!</a></span></p>
            <button class="btn1 c-white" type="submit"> Connexion </button>
        </div>



    </form>
</main>