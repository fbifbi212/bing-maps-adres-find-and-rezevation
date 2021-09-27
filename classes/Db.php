<?php
trait DbRef {

    public function __db_instance_ref() {
        global $db;
        $this->db =& $db; // db reference
    }

}
class Db
{


    private $DbHost = DB_HOST;
    private $DbName = DB_NAME;
    private $DbUser = DB_USER;
    private $DbPass = DB_PASS;
    private $table;
    public function __construct($DbHost=DB_HOST, $DbName=DB_NAME, $DbUser=DB_USER, $DbPass=DB_PASS) {

        try {

            if ($DbName && $DbUser) {
                $this->pdo = new PDO("mysql:host=$DbHost;dbname=$DbName", $DbUser, $DbPass);
                $this->database_type = 'MYSQL';
            } else {
                $this->pdo = new PDO("sqlite:$DbHost");
                $this->database_type = 'SQLITE';
            }

            $this->server_name = $DbHost;
            $this->db_name = $DbName;
            $this->db_user = $DbUser;
            $this->db_password = $DbPass;

            // set the PDO error mode to exception
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            // Connection failed
            die($e->getMessage());
        }
    }
    public function close() {
        $this->db->pdo = NULL;
    }
    public function bind($deger,$id){
        return $this->pdo->bindValue(':'.$deger, $id);
    }
    public function row_count() {
        return $this->pdo->rowCount();
    }
    public function lastInsertId() {
        return $this->pdo->lastInsertId();
    }
    public function error_info() {
        return $this->pdo->errorinfo();
    }
    public function insert($values = array(),$table)
    {

        $this->table =$table;


        foreach ($values as $field => $v)
            $ins[] = ':' . $field;

        $ins = implode(',', $ins);
        $fields = implode(',', array_keys($values));
        $sql = "INSERT INTO $this->table ($fields) VALUES ($ins)";


        $this->stmt = $this->pdo->prepare($sql);
        foreach ($values as $f => $v)
        {
            $this->stmt->bindValue(':' . $f, $v);
        }
        $this->stmt->execute();

        return $this->pdo->lastInsertId();

    }
    public function query($query, $params = [])
    {
        $this->query = $this->pdo->prepare($query);
        if (empty($params))
        {
            $res = $this->query->execute();
        }
        else
        {
            $res = $this->query->execute($params);
        }
        if ($res !== false)
        {
            return $this->query->fetchAll();
        }

        return $this->query;
    }


}