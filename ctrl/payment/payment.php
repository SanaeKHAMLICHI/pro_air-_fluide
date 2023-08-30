<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/log.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/product/product.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/address/address.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/transporter/transporter.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/cart/cart.php');

// Démarrer la session (si ce n'est pas déjà fait)
session_start();

// Vérifier si la clé "cart_total" est présente dans le tableau $_SESSION
if (isset($_SESSION['cart_total'])) {
    // Obtenir le montant total depuis le formulaire
    
    $products = $_SESSION['fullCart']['product'];
    $id_panier = $_SESSION['commande_id'];
    $transportName = $_SESSION['transporter']['name'];
    $transportPrice = round($_SESSION['transporter']['prix'] * 100);

    // Créer un tableau pour stocker les éléments de ligne (line items)
    $lineItems = [];

    // Calculer le montant total de la TVA pour tous les produits
    $taxAmount = round( $_SESSION['fullCart']['data']['taxe'] * 100); // Remplacer 0.2 par le taux de TVA approprié (par exemple, 0.2 pour 20%)

    // Parcourir les produits pour créer les éléments de ligne (line items)
    foreach ($products as $item) {
        $productName = $item['product']['label'];
        $quantity = (int)$item['quantity'];
        $unitAmount = round($item['product']['prix'] * 100);

        // Créer un élément de ligne pour chaque produit
        $lineItems[] = [
            'price_data' => [
                'currency' => 'eur',
                'product_data' => [
                    'name' => $productName,
                ],
                'unit_amount' => $unitAmount,
            ],
            'quantity' => $quantity,
        ];
    }

    // Ajouter l'élément de ligne pour le transport
    $lineItems[] = [
        'price_data' => [
            'currency' => 'eur',
            'unit_amount' => $transportPrice,
            'product_data' => [
                'name' => 'Transport (' . $transportName . ')',
            ],
        ],
        'quantity' => 1,
    ];

    // Ajouter l'élément de ligne pour la taxe
    $lineItems[] = [
        'price_data' => [
            'currency' => 'eur',
            'unit_amount' => $taxAmount,
            'product_data' => [
                'name' => 'TVA (20%)', // Remplacer par le libellé approprié de la taxe
            ],
        ],
        'quantity' => 1,
    ];

    
    
    

    $stripe = new \Stripe\StripeClient('sk_test_51NWQfIJXM3nDZ9ijmJAOqDwyhrRwl6rAm818xLibqwSlwK6Lbn8SuWIqcsEqh04kqGMLBhX8qhheBsbmPyCdS6Tk00yOrYNJuE');

    $checkout_session = $stripe->checkout->sessions->create([
        'line_items' => $lineItems, // Utiliser le tableau contenant les éléments de ligne (line items)
        'mode' => 'payment',
        'success_url' => 'http://localhost:9000/ctrl/payment/success.php', // Modifier l'URL de succès en conséquence
        'cancel_url' => 'http://localhost:9000/ctrl/payment/cancel.php', // Modifier l'URL d'annulation en conséquence
    ]);

    // Stocker l'ID de la session de paiement dans une variable $session_id
    $session_id = $checkout_session->id;
    $_SESSION['id_checkout'] = $session_id;
    $_SESSION['cart_total']=[];

    // Mettre à jour l'état du paiement et l'ID de session de paiement dans la table "panier" pour la commande spécifiée par $commande_id
    // LibCart::updatePaymentStatus($id_panier, $session_id, 1);

    // Redirection vers l'URL de paiement Stripe
    header("HTTP/1.1 303 See Other");
    header("Location: " . $checkout_session->url);
    exit; // Assurez-vous de quitter après la redirection pour éviter l'exécution de code supplémentaire
} else {
    // Si l'ID de la commande n'est pas valide, afficher un message d'erreur ou rediriger vers une page d'erreur
    echo "Erreur : ID de commande invalide.";
}
?>
