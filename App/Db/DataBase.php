<?php


namespace Contact\Db;

require_once "vendor/autoload.php";

use \PDO;
use PDOException;
use PDOStatement;


class DataBase
{
    const HOST = 'localhost';
    const NAME ="contatos";
    const USER = "root";
    const PASSWORD = "390653@Mau";

    private string $table;
    private PDO $connection;

    public function __construct(string $table = null)
    {
        $this->table= $table;
        $this->setConnection();
    }

    private function setConnection()
    {
        try{
        $this -> connection = new PDO("mysql:host=" . self::HOST .";" . 'dbname=' . self::NAME .";",
                self::USER,
                self::PASSWORD
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){
            die('Error:' . $e -> getMessage());
        }
    }

    public function execute($query, $params = []): PDOStatement
    {
        try{
            $stmt = $this->connection->prepare($query);
            $stmt ->execute($params);
            return $stmt;

        }catch(PDOException $e){
            die('Error: '.$e->getMessage());
        }
    }

    /**
     * Método responsavel por inserir os dados no banco
     * @param array $values
     * @return int
     */
    public function insert(array $values): int
    {
        $fields = array_keys($values);
        $binds = array_pad([],count($fields), '?');
        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(",",$binds).');';

        $this->execute($query, array_values($values));

        return $this->connection->lastInsertId();
    }

    public function select($where = null, $order = null, $limit = null, $fields = "*"):PDOStatement
    {
        $where = strlen($where)?'WHERE '.$where:'';
        $order = strlen($order)?'ORDER BY '.$order:'';
        $limit = strlen($limit)?'LIMIT '.$limit:'';

        $query = 'SELECT '.$fields.' FROM ' .$this->table.' '.$where. ' '.$order. ' '.$limit.';';

        return $this->execute($query);
    }

    public function update($where, $values):bool
    {
        $fields = array_keys($values);

        $query = 'UPDATE '.$this->table.' SET ' .implode("=?,", $fields).'=? WHERE '.$where;

        $this->execute($query, array_values($values));

        return true;
    }

    public function delete($where)
    {
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

        $this->execute($query);
    }

}