<?php
namespace db;
/**
 * Created by PhpStorm.
 * User: antidot
 * Date: 15/05/18
 * Time: 15:05
 */
abstract class DbAdapterAbstract
{
    /**
     * @var array
     */
    protected $config;

    /**
     * @var object|resource|null
     */
    protected $connection;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    abstract public function connect();
    abstract public function query(string $query);
}