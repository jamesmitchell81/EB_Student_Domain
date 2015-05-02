<?php

include 'DatabaseConnection.php';

/**
 * PDO Database abstraction.
 * Simplifying Database Interaction
 */
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

  /**
   * Prepare the SQL Statement
   * Binding any parameters.
   */
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

  /**
   * Creates the connection, Prepares and exectures the Statement.
   * Revision required due to too many responsibilities.
   * prevents making best use of prepared statements.
   */
  private function query($sql)
  {
    $this->connection = $this->db->connect();
    $this->statement = $this->prepare_statement($sql);
    $success = $this->statement->execute();
    return $success;
  }

  /**
   * Sets a parameter with all required values.
   * Should be made private to prevent use of
   * PDO constants outside of class and simplify API.
   */
  public function set($name, $value, $type = PDO::PARAM_STR)
  {
    $this->parameters[] = [
      'name'  => $name,
      'value' => $value,
      'type'  => $type
    ];
    return $this;
  }

  /**
   * Sets and Integer Parameter.
   */
  public function setInt($name, $value)
  {
    $this->set($name, $value, PDO::PARAM_INT);
    return $this;
  }

  /**
   * Sets a String Parameter
   */
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

  public function update($sql)
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

