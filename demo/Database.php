<?php
//this class is to 'configure' ask and send info from database 
class Database
{
    public $connection;
    public $statement;


    function __construct($config)
    {

        $connecUrl = 'mysql:' . http_build_query($config, '', ';');
        $this->connection = new PDO($connecUrl, "ddp", 'pwd1234D', [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }



     public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($params);

        return $this;
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }
    public function findOrFail()
    {
        $result = $this->find();

        if (!$result) {
            abort();
        }

        return $result;
    }
}
