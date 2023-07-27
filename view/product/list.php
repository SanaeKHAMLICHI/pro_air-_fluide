
<main>
   
  
<section class="container d-flex wrap mw-1400 m-auto jc-sb ">
            <?php foreach ($args['listProduct'] as $product) : ?>
                
                
        <article class="art m-15-t">

        <header class="">
            <picture class="">
            <img  class= "" src="<?= $product['picture'] ?>" alt="Lorem" width="300" />
         </picture>
            <div class="m-15-t m-10-l">
                <p><?=$product['label'] ?></p>
            </div>
        </header>
        <div class=" m-10-l  ">
            <p class="m-15-t  m-10-l"><?= $product['prix'] ?></p>
        </div>

        <footer class=" p-1 m-30-t ">
        <a class="savoir p-1"  href="/ctrl/product/get.php?id=<?= $product['id'] ?>">En savoir plus</a>

           
        </footer>
    </article>
            <?php endforeach; ?>
            </section>
  
            
</main>
