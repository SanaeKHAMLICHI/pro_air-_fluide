
<main>
    <h1><?= $args['pageTitle'] ?></h1>
   
  

            <?php foreach ($args['listProduct'] as $product) : ?>
                
                
        <article class="art f-1-300  m-15-t">

        <header class="">
            <picture class="">
                
            <img  class= "picture m-auto" src="<?= $product['picture'] ?>" alt="Lorem" width="300" /> </picture>
            <div class="m-15-t m-10-l">
                <h2><?=$product['label'] ?></h2>
            </div>
        </header>
        <div class="art__summary m-10-l  ">
            <p class="m-15-t  m-10-l"><?= $product['prix'] ?></p>
        </div>

        <footer class=" p-1 m-30-t ">
        <a class="savoir p-1"  href="/ctrl/product/get.php?id=<?= $product['id'] ?>">En savoir plus</a>

           
        </footer>
    </article>
            <?php endforeach; ?>
  
            
</main>
