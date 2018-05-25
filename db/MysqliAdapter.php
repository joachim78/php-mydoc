<?php
namespace db;
require_once 'DbAdapterAbstract.php';
/**
 * Created by PhpStorm.
 * User: antidot
 * Date: 15/05/18
 * Time: 15:09
 * @property \mysqli $connection
 */
class MysqliAdapter extends DbAdapterAbstract
{
    public function connect()
    {
        echo "get MySQL connection...<br>";
        $this->connection = new \mysqli(
            $this->config['host'],
            $this->config['user'],
            $this->config['password'],
            $this->config['database']
        );
    }

    /**
     * @param string $query
     * @return bool|\mysqli_result
     */
    public function query(string $query)
    {
        return $this->connection->query($query);
    }

    /**
     * @param \mysqli_result $result
     * @return object|\stdClass
     */
    public function fetchObject(\mysqli_result $result)
    {
        return $result->fetch_object();
    }
}