<?php
echo "<h1>Injection de dépendances</h1>";

/**
 * Consiste à créer dynamiquement (injecter) les dépendances entre différentes classes, sur base d'un fichier de config ou de manière programmatique.
 * Les dépendances ne seront plus exprimées dans le code de manière statique, mais déterminées dyanmiquement à l'exécution.
 */


/**
 * Concept de base
 * ---------------
 *
 * Classe Database qui a besoin d'un adapteur pour communiquer avec la base de données.
 * Celui-ci est instancié dans le constructeur => dépendance => réutilisation du code et tests compliqués
 *
 */

class MySqlAdapter {} // DAO (Data Access Object)

class Database {
    protected $adapter;

    public function __construct()
    {
        $this->adapter = new MySqlAdapter();
    }
}

/**
 * Première solution simple: fournir la dépendance (l'adapteur) en argument du constructeur:
 */

class Database2 {
    protected $adapter;

    public function __construct(MySqlAdapter $adapter)
    {
        $this->adapter = $adapter;
    }
}

/**
 * Solution plus complexe: Principe d'Inversion des Dépendances (Dependency Inversion Principle)
 * Les dépendances doivent se faire sur des interfaces/classes abstraites plutôt que sur des classes concrètes.
 *
 * Avantages:
 * - code plus facilement évolutif (scalable): si on veut migrer de base de données, il suffira de réécrire l'adapter
 * - si l'adapteur est créé par qqn d'autre, on ne doit plus attendre qu'il ait terminé; il suffit de créer un objet
 * factice implémentant l'interface.
 */

interface AdapterInterface {}

class MySqliAdapter implements AdapterInterface {}

class Database3 {
    protected $adapter;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }
}

$db = new Database3(new MySqliAdapter());