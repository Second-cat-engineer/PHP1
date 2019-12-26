<?php


class DB
{
    protected $dbh;

    public function __construct()
    {
        $config = include __DIR__ . '/../config.php';
        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'];
        $this->dbh = new PDO ($dsn, $config['user'], $config['password']);
    }

    public function execute(string $sql, array $data = [])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($data);
    }

    public function query(string $sql, array $data = [])
    {
        $sth = $this->dbh->prepare($sql);
        if (false === $sth->execute($data)) {
            return false;
        }
        return $sth->fetchAll();
    }
}

/*
$news = new DB();
$data = $news->query('SELECT * FROM news ORDER BY date');
var_dump($data);
*/
