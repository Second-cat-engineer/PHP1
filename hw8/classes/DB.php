<?php


class DB
{
    protected $dbh;
    protected $result;

    public function __construct()
    {
        $config = include __DIR__ . '/../config.php';
        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'];
        $this->dbh = new PDO ($dsn, $config['user'], $config['password']);
    }

    public function execute(string $sql)
    {
        $sth = $this->dbh->prepare($sql);
        return $this->result = $sth->execute();
    }

    public function query(string $sql, array $data)
    {
        if (false === $this->result) {
            return false;
        }
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        return $sth->fetchAll(PDO::FETCH_OBJ);
    }
}
