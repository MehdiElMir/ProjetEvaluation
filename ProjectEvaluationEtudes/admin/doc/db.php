<?php
class Database
{
    public $host = 'localhost';
    public $username = 'root';
    public $password = '';
    public $database = 'projet_evaluation';
    public $conn;


    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function select($table, $where = [])
    {
        $sql = "SELECT * FROM $table";
        if (count($where) > 0) {
            $sql .= " WHERE ";
            $i = 0;
            foreach ($where as $key => $value) {
                $i++;
                $sql .= "$key = :$key";
                if ($i < count($where)) {
                    $sql .= " AND ";
                }
            }
        }
        $stmt = $this->conn->prepare($sql);
        foreach ($where as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($table, $data)
    {
        $keys = array_keys($data);
        $values = ":" . implode(', :', $keys);
        $sql = "INSERT INTO $table (" . implode(', ', $keys) . ") VALUES ($values)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
        return $this->conn->lastInsertId();
    }
    public function update($table, $data, $where)
    {
        $update_parts = array();
        $where_parts = array();
        $params = array();

        foreach ($data as $column => $value) {
            $update_parts[] = "$column = :set_$column";
            $params[":set_$column"] = $value;
        }

        foreach ($where as $column => $value) {
            $where_parts[] = "$column = :where_$column";
            $params[":where_$column"] = $value;
        }

        $update_parts = implode(", ", $update_parts);
        $where_parts = implode(" AND ", $where_parts);

        $query = "UPDATE $table SET $update_parts WHERE $where_parts";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);

        return $stmt->rowCount();
    }

    public function delete($table, $where)
    {
        $where_parts = array();
        $params = array();

        foreach ($where as $column => $value) {
            $where_parts[] = "$column = :where_$column";
            $params[":where_$column"] = $value;
        }

        $where_parts = implode(" AND ", $where_parts);
        $query = "DELETE FROM $table WHERE $where_parts";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt->rowCount();
    }


    public function getConnection()
    {
        return $this->conn;
    }
}
