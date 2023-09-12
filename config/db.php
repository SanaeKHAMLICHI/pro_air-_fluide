<?php

/** Configuration de l'application. */
class Config
{
    /** Paramètres de connexion à la base de données. */
    const db= [
            'host' => '127.0.0.1',
            'port' => 3306,
            'dbname' => 'projet_stage_SKH',
            'user' => 'root',
            'password' => ''
        ];

    /** Configuration  Stripe  */
   const stripe=[
    'success_url' => 'http://localhost:9000/payment/success', 
    'cancel_url' => 'http://localhost:9000/ctrl/payment/cancel.php', 
   ];

}
