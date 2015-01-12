<?php

return array(

    "login" => [
        "title" => "Connection",
        "header" => "Connection",
        "submit" => "Connection",
        "autologin" => "Rester connecté",
        "logout" => "Déconnection",
        "error" => "Le nom d'utilisateur ou le mot de passe est incorrect",
        "no_active" => "le compte n'a pas été activé. Veuillez activer le compte pour pouvoir vous connecter",
        "success" => "Vous êtes maintenant connecté"
    ],
    "inscription" => [
        "title" => "Inscription",
        "submit" => "Créer un compte", 
        "success" => "Votre compte à bien été crée, vous allez recevoir un code d'activation à l'adresse email :email"     
    ],
    "validation" => [
        "title" => "Validation",
        "header" => "Validation du compte",
        "link" => "Validation du compte",
        "submit" => "Valider", 
        "code" => "Code de validation",
        "error" => "Le nom d'utilisateur ou le code de validation est incorrect",
        "success" => "Votre compte à été validé, vous pouvez maintenant vous connecter",
    ],
    "forget" => [
        "title" => "Renvoi du mot de passe",
        "header" => "Mot de passe oublié ?",
        "link" => "Mot de passe oublié ?",
        "submit" => "renvoyer le mot de passe",
        "reset" => [
            "title" => "Nouveau mot de passe",
            "header" => "Nouveau mot de passe",
            "submit" => "Valider",

        ],
    ],
    "manage" => [
        "title" => "Compte",
    ],
    "email" => "Votre adresse email",
    "email_again" => "Votre adresse email (vérification)",
    "email_placeholder" => "Adresse email",
    "username" => "Votre nom d'utilisateur",
    "username_placeholder" => "Nom d'utilisateur",
    "password" => "Votre mot de passe",
    "password_again" => "Votre mot de passe (vérification)",

    "welcome_email" => [
        "subject" => "Code de validation de votre compte",
        "message" => "Votre compte :username est bien enregistré<br />Il ne vous reste plus qu'à le valider<br />code de validation: :hash",
    ]
);