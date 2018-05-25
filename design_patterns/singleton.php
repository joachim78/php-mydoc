<?php
echo "<h1>Singleton</h1>";

/**
 * But: classe qui ne doit être instanciée qu'une seule fois
 * Risque: favoriser les dépendances entre classes
 */

class MonSingleton {
    private static $instance = null;

    private function __construct() {

    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}