<?php
namespace App\Models;

/**
 * Classe technique permettant de gérer les sessions
 */
abstract class Session {
    
    /**
     * Initialise une session avec un ID utilisateur
     * 
     * @param int $idUser Id de l'utilisateur
     * @return void
     */
    public static function initSession($idUser) {
        session()->set("idUser", $idUser);
    }
    
    /**
     * Détruit la session
     * 
     * @return void
     */
    public static function destructSession() {
        session()->destroy();
    }

    /**
     * Vérifie si la session est valide
     * 
     * @return bool 
     * - false si la session n'existe pas ou n'a pas d'idUser
     * - true si la session est valide
     */
    public static function verifySession(): bool {
        return session()->has('idUser');
    }

    /**
     * Récupère une donnée de session
     * 
     * @param string $idChamp Clé de session
     * @return mixed Valeur stockée en session
     */
    public static function getSessionData($idChamp = '') {
        return session()->get($idChamp);
    }
      
    /**
     * Ajoute une donnée à la session
     * 
     * @param string|array $idChamp Clé ou tableau de données
     * @param mixed $value Valeur à stocker
     * @return bool False en cas d'erreur
     */
    public static function setSessionData($idChamp, $value = "") {
        if (is_array($idChamp)) {
            session()->set($idChamp);
        } elseif (!empty($value)) {
            session()->set($idChamp, $value);
        } else {
            return false;
        }
    }
    
    /**
     * Supprime une donnée de session
     * 
     * @param string $idChamp Clé à supprimer
     * @return bool False si l'entrée n'existe pas
     */
    public static function removeSessionData($idChamp) {
        if (session()->has($idChamp)) {
            session()->remove($idChamp);
        } else {
            return false;
        }
    }
}
