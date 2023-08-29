<main class=" mw-1300 m-auto">

    <h1><?= $args['pageTitle'] ?></h1>
    <section>
  

     <table class="panier ">
        <tr>
            <th>Nom </th>
            <th>Description </th>
            <th>Prix  </th>
       
            <?php foreach ($args['listTransporter'] as $transporter) : ?>
              </tr>
                <td><?= $transporter['name'] ?></td>
                    <td><?= $transporter['description'] ?></td>
                    <td class="ta-center"><?= $transporter['prix'] ?> €</td>
             </tr>    

            <?php endforeach; ?>

        </table>       <a class="btn_delete c-white" href="/transporter/create-display">Nouveau transporteur</a>

       
    </section>
</main>
