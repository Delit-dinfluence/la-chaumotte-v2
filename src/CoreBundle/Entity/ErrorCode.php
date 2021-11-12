<?php

namespace Core\Entity;

use Core\Entity\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Enumération des types d'actions
 */
abstract class ErrorCode extends Enum
{

    const USER_DOES_NOT_EXIST = 10000;
    const USER_ALREADY_EXIST = 10001;
    const USER_CREATED = 10002;
    const USER_LOGGED = 10003;
    const USER_LOGOUT = 10004;
    const USER_NOT_OWNER = 10005;

    const FORM_INVALID = 20001;
    const FORM_SAVED = 20002;
    const FORM_SENT = 20003;

    const FORM_INVALID_EMAIL_CONFIRMATION = 20100;
    const FORM_INVALID_PASSWORD_CONFIRMATION = 20101;
    const FORM_INVALID_TOKEN_CONFIRMATION = 20102;
    const FORM_INVALID_PASSWORD_CHECK = 20103;

    const ENTITY_ALREADY_EXIST = 30001;
    const ENTITY_NOT_FOUND = 30002;
    const ENTITY_CREATED = 30003;
    const ENTITY_UPDATED = 30004;
    const ENTITY_REMOVED = 30005;

    const TEMPLATE_RETURNED = 40001;

    const MESSAGE_SENT = 50001;
    const MESSAGE_NOT_SENT = 50002;

    const TIMEOUT_EXCEEDED = 60001;

    const SUCCESS = 70001;
    const ERROR = 70002;

    const PRODUCT_NOT_FOUND = 80002;
    const PRODUCT_ALREADY_EXIST = 80013;
    const PRODUCT_CREATED = 80014;
    const PRODUCT_UPDATED = 80015;
    const PRODUCT_REMOVED = 80016;

    const SHOPPING_CART_PRODUCT_ADDED = 80001;
    const SHOPPING_CART_PRODUCT_UPDATED = 80003;
    const SHOPPING_CART_PRODUCT_REMOVED = 80004;

    const SHOPPING_CONFIGURATION_PAYMENT_FAILED = 80005;
    const SHOPPING_CONFIGURATION_DELIVERY_FAILED = 80012;

    const SHOPPING_ORDER_ALREADY_VALIDATED = 80006;
    const SHOPPING_ORDER_ALREADY_CANCELLED = 80007;
    const SHOPPING_ORDER_UPDATED = 80008;
    const SHOPPING_ORDER_VALIDATED = 80009;
    const SHOPPING_ORDER_CANCELLED = 80010;
    const SHOPPING_ORDER_CREATED = 80011;

    /**
     * Nom d'affichage
     */
    protected static $typeName = [

        self::USER_DOES_NOT_EXIST => "L'utilisateur n'existe pas.",
        self::USER_ALREADY_EXIST => "L'utilisateur existe déjà.",
        self::USER_CREATED => "L'utilisateur a bien été créé.",
        self::USER_LOGGED => 'Connexion réussi.',
        self::USER_LOGOUT => 'Déconnexion réussi.',
        self::USER_NOT_OWNER => "L'utilisateur est incorrecte.",

        self::FORM_INVALID => 'Les données du formulaire ne sont pas valides.',
        self::FORM_SAVED => 'Le formulaire à bien été enregistré.',
        self::FORM_SENT => 'Le formulaire à bien été envoyé.',
        self::FORM_INVALID_EMAIL_CONFIRMATION => 'Les adresses e-mails ne sont pas identiques.',
        self::FORM_INVALID_PASSWORD_CONFIRMATION => 'Les mots de passe ne sont pas identiques.',
        self::FORM_INVALID_TOKEN_CONFIRMATION => "Le token de vérification n'est pas valide.",
        self::FORM_INVALID_PASSWORD_CHECK => "Le mot de passe est incorrecte.",

        self::ENTITY_ALREADY_EXIST => "l'entité existe déjà.",
        self::ENTITY_NOT_FOUND => "L'entité n'existe pas.",
        self::ENTITY_CREATED => "L'entité a été créée.",
        self::ENTITY_UPDATED => "L'entité a été mise à jour.",
        self::ENTITY_REMOVED => "L'entité a été supprimée.",

        self::TEMPLATE_RETURNED => 'Le template a bien été généré',

        self::MESSAGE_SENT => 'Le ou les messages ont bien été envoyés.',
        self::MESSAGE_NOT_SENT => "Au moins un des messages n'a pas été envoyé.",

        self::TIMEOUT_EXCEEDED => 'Le temps alloué a été dépassé',

        self::SUCCESS => "L'action a été menée à bien.",
        self::ERROR => "L'action a été menée à échouée.",

        self::PRODUCT_ALREADY_EXIST => "Le produit existe déjà.",
        self::PRODUCT_NOT_FOUND => "Le produit n'existe pas",
        self::PRODUCT_CREATED => "Le produit a été créé.",
        self::PRODUCT_UPDATED => "Le produit a été mis à jour.",
        self::PRODUCT_REMOVED => "Le produit a été supprimé.",

        self::SHOPPING_CART_PRODUCT_ADDED => 'Le produit a été ajouté dans le panier.',
        self::SHOPPING_CART_PRODUCT_UPDATED => 'Le produit a été mis à jours dans le panier.',
        self::SHOPPING_CART_PRODUCT_REMOVED => 'Le produit a été supprimé du panier.',

        self::SHOPPING_CONFIGURATION_PAYMENT_FAILED => 'La configuration du moyen de paiement a échouée.',
        self::SHOPPING_CONFIGURATION_DELIVERY_FAILED => 'La configuration du moyen de livraison a échouée.',

        self::SHOPPING_ORDER_CREATED => 'La commande a été créée.',
        self::SHOPPING_ORDER_UPDATED => 'La commande a été mise à jour.',
        self::SHOPPING_ORDER_VALIDATED => 'La commande a été validée.',
        self::SHOPPING_ORDER_CANCELLED => 'La commande a été annulée.',
        self::SHOPPING_ORDER_ALREADY_VALIDATED => 'La commande a déjà été validée.',
        self::SHOPPING_ORDER_ALREADY_CANCELLED => 'La commande a déjà été annulée.',

    ];

}
