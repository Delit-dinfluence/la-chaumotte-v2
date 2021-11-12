<?php

namespace Core\Service\FileReaderWriter;


class FileMessages
{

    /**
     *    1xx - Information
     *    2xx - Succès
     *    4xx - Erreur du client web / utilisateur
     *    5xx - Erreur du serveur
     */
    private $messages = [

        'CONNECT_BACKOFFICE_SUCCESS' => ['code' => '200', 'message' => 'Connexion à l\'espace d\'administration'],
        'DISCONNECT_BACKOFFICE_SUCCESS' => ['code' => '200', 'message' => 'Déconnexion de l\'espace d\'administration'],



        'CONNECT_BACKOFFICE_FAILED' => ['code' => '400', 'message' => 'Echec de connexion à l\'espace d\'administration'],

        'CONNECT_DATABASE_FAILED' => ['code' => '400', 'message' => 'Echec de connexion à la base de donnée'],
        'ERROR_ACCES_DENIED' => ['code' => '400', 'message' => 'Accès refusé'],

        'ERROR_PAGE_NOT_FOUND' => ['code' => '404', 'message' => 'La page demandée n\'a pas été trouvée'],
        'ERROR_UNKNOWN' => ['code' => '500 - ERROR_CODE', 'message' => 'Une erreur inconnue est survenue'],
    ];


    public function __construct()
    {

    }

    public function get($key)
    {
        if (array_key_exists($key, $this->messages)) {
            return $this->messages[$key];
        }
        return false;
    }
}
