<?php
require '../../vendor/autoload.php';

// Check if the total_amount key is present in the $_POST array
if (isset($_POST['total_amount'])) {
    // Get the total amount from the form
    $total = $_POST['total_amount'];
    $name = $_POST['name'];


    // Convert the amount to the smallest currency unit (e.g., cents for EUR)
    $amount_in_cents = round($total * 100); // Round to the nearest integer

    $stripe = new \Stripe\StripeClient('sk_test_51NWQfIJXM3nDZ9ijmJAOqDwyhrRwl6rAm818xLibqwSlwK6Lbn8SuWIqcsEqh04kqGMLBhX8qhheBsbmPyCdS6Tk00yOrYNJuE');

    $checkout_session = $stripe->checkout->sessions->create([
        'line_items' => [[
            'price_data' => [
                'currency' => 'eur',
                'product_data' => [
                    'name' => $name,
                ],
                'unit_amount' => $amount_in_cents,
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => 'http://localhost:9000/view/payment/success.php',
        'cancel_url' => 'http://localhost:9000/view/payment/cancel.php',
    ]);

    header("HTTP/1.1 303 See Other");
    header("Location: " . $checkout_session->url);
} else {
    // Handle the case when "total_amount" is not defined
    echo "Error: Total amount is missing.";
}
?>
