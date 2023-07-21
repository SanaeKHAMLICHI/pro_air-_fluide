
<main>
    <h1><?= $args['pageTitle'] ?></h1>
    <section>
  

<a href="/ctrl/transporter/create-display.php">creer un nouveau transporteur</a>
     
            <?php foreach ($args['listTransporter'] as $transporter) : ?>
                <tr>
                <div><?= $transporter['name'] ?></div>
                    <div><?= $transporter['description'] ?></div>
                    <div><?= $transporter['prix'] ?></div>
                

            <?php endforeach; ?>
       
    </section>
</main>
