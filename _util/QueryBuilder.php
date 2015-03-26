<?php

class QueryBuilder
{
  private $table = "";
  private $tokens = [];
  private $columns = [];

  public function insert($table, $tokens, $columns)
  {
    $str = "INSERT INTO {$table} (";
    $str .= join(", ", $columns);
    $str .= ") VALUES (";
    $str .= join(", ", $tokens) . ")";
    return $str;
  }

  public function update($table, $tokens, $columns, $conditions)
  {
    $str = "UPDATE {$table} SET ";
    // concat columns to be updated with update values
    for ( $i = 0; $i < count($columns); $i++ )
    {
      $str .= "{$columns[$i]} = {$tokens[$i]}, ";
    }
    // remove last right comma.
    $str = substr($str, 0, strlen($str) - 2);

    // concat any conditions.
    $str .= " WHERE {$conditions[0]}";
    for ( $j = 1; $j < count($conditions); $j++ ) {
      $str .= " AND {$conditions[$j]} ";
    }
    return $str . ";";
  }
}