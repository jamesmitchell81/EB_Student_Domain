<?php

include 'DatabaseConnection.php';

class DatabaseQuery
{
  private $db;
  private $statement;
  private $connection;
  private $parameters = [];
  private $fetchMode = PDO::FETCH_ASSOC;

  public function __construct()
  {
    $this->db = new DatabaseConnection();
    $this->parameters = [];
  }

  public function __destruct()
  {
    $this->db->closeConnection();
  }

  private function prepare_statement($sql)
  {
    $this->statement = $this->connection->prepare($sql);
    $this->statement->setFetchMode($this->fetchMode);

    foreach ($this->parameters as $parameter) {
      $name = $parameter['name'];
      $value = &$parameter['value'];
      $type = $parameter['type'];

      $this->statement->bindParam($name, $value, $type);
    }
    return $this->statement;
  }

  private function query($sql)
  {
    $this->connection = $this->db->connect();
    $this->statement = $this->prepare_statement($sql);
    $success = $this->statement->execute();
    return $success;
  }

  public function set($name, $value, $type = PDO::PARAM_STR)
  {
    $this->parameters[] = [
      'name'  => $name,
      'value' => $value,
      'type'  => $type
    ];
    return $this;
  }

  public function setInt($name, $value)
  {
    $this->set($name, $value, PDO::PARAM_INT);
    return $this;
  }

  public function setStr($name, $value)
  {
    $this->set($name, $value, PDO::PARAM_STR);
    return $this;
  }

  public function setFetchMode($fetchMode)
  {
    $this->fetchMode = $fetchMode;
    return $this;
  }

  public function select($sql)
  {
    $this->query($sql);
    return $this;
  }

  public function first()
  {
    return $this->statement->fetch();
  }

  public function all()
  {
    return $this->statement->fetchAll();
  }

  public function insert($sql)
  {
    return $this->query($sql);
  }

  public function delete($sql)
  {
    return $this->query($sql);
  }

  public function getLastID()
  {
    return $this->connection->lastInsertId();
  }
}

