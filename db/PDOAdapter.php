<?php
namespace db;
require_once 'DbAdapterAbstract.php';
/**
 * Created by PhpStorm.
 * User: antidot
 * Date: 15/05/18
 * Time: 15:55
 * @property \PDO $connection
 */
class PDOAdapter extends DbAdapterAbstract
{
    public function connect()
    {
        echo "get PDO connection...<br>";
        try {
            $this->connection = new \PDO(
                'mysql:host=' . $this->config['host'] . ';dbname=' . $this->config['database'],
                $this->config['user'],
                $this->config['password']
            );
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

    }

    /**
     * Runs an insert, update or delete query
     *
     * @param string $query
     * @return int
     */
    public function query(string $query) {
        return $this->connection->exec($query);
    }

    public function fetchObject($result) {

    }
}