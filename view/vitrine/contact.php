<?php include('../vitrine/_partial/header.php')?>

    <main>
        <!-- COVER -->
        <div class="cover d-flex ai-center jc-center">
            <h1>Contact</h1>
        </div>
        <div class="d-flex f-1-300 jc-sb mw-1100 m-auto pt-3 pb-100 wrap">
            <div class="contact  c-white">
                <h1 class="c-white">Nos contacts </h1>
                <p class="pt-2">Pour obtenir un devis ou des informations supplémentaires, n'hésitez pas à nous
                    contacter par e-mail,
                    téléphone ou en remplissant notre formulaire de contact.</p>
                <div class="pt-3 d-flex ">
                    <i class="fa-solid fa-phone fa-xl c-aqua"></i>
                    <div class="pl-3">
                        <p class="c-aqua pb-1">Notre téléphone</p>
                        <p> +33-6-32-16-07-66</p>
                    </div>
                </div>
                <div class="pt-2 d-flex">
                    <i class="fa-solid fa-location-dot fa-xl c-aqua"></i>
                    <div class="pl-3">
                        <p class="c-aqua pb-1">Notre adresse</p>
                        <p class="pb-1">150bis, Rue Henri Dunant</p> <p>92700 Colombes</p>

                    </div>
                </div>

                <div class="pt-2 d-flex">
                    <i class="fa-solid fa-envelope fa-xl ai-center c-aqua"></i>
                    <div class="pl-3">
                        <p class="c-aqua pb-1">Notre mail</p>
                        <p> prohairfluide@outlook.fr</p>

                    </div>
                </div>

            </div>
            <div class=" form ">
                <form class=" ta-center " method="POST" action="/ctrl/contact/traitement-formulaire.php">
                    <h1>Prêt à passer à l'action ?</h1>
                    <?php
    if (isset($_GET['success']) && $_GET['success'] == 'true') {
        echo '';
    }
?>
<span id="notification">Message envoyer avec succès</span>
                  
                    <div class="pt-2">
                        <input class="p-1" type="text" name="name" placeholder="Nom Complet">
                    </div>
                    <div class="pt-2">
                        <input class="p-1" type="text" name="subject" placeholder="Sujet">
                    </div>
                    <div class="pt-2">
                        <input class="p-1" type="email" name="email" placeholder="Email">
                    </div>
                    <div class=" pt-2">
                        <input class="p-1 besoin " type="text" name="message" placeholder="Votre besoin">
                    </div>
                    <div class="pt-2 ta-center">
                        <button class="btn1  c-white" type="submit">Envoyer</a></button>
                    </div>



                </form>
            </div>
        </div>  <div class="vector pt-2 pt-15">
            <img src="/asset/image/vitrine/map.svg" alt="">
        </div>

    </main>
    <?php include('../vitrine/_partial/footer.php')?>
