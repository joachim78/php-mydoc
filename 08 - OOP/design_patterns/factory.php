<?php
echo "<h1>Factory</h1>";

/**
 * But: fournir un objet prêt à l'emploi afin d'éviter de devoir instancier les objets directement dans le code.
 * De la sorte, on libère le code de toute responsabilité (configuration, ...)
 *
 * Ce pattern est utile ds les cas suivants:
 * - lorsque l'on a des objets respectant la même interface ou héritant de la même classe abstraite,
 * mais chacun adapté à un contexte différent (ex: interface DB avec 1 classe par DB: Mysql, Oracle, ...)
 * - Pr centraliser le code en charge de l'objet à créer
 */

class DBFactory {
    public static function load($db) {
        if (class_exists($db)) {
            return new $db;
        }
        throw new RuntimeException("La classe $db n'a pu être chargée");
    }
}

try {
    $mySql = DBFactory::load('MySql');
} catch (RuntimeException $e) {
    echo $e->getMessage() . "<br>";
}

/**
 * Autre exemple:
 */

interface AdapterInterface {}

class MySqlAdapter implements AdapterInterface {}

class Database {
    protected $adapter;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }
}


class MySqlFactory {
    public static function load() {
        return new Database(new MySqlAdapter());
    }
}

$mySql = MySqlFactory::load();
var_dump(get_class($mySql)); // Database