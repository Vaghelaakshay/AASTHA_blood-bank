<?php
class database
{
  private $db_host = "localhost";
  private $db_user = "root";
  private $db_pass = "";
  private $db_nm = "fnl_db";
  private $conn = false;
  private $mysqli;
  private $result = array();

  public function __construct()
  {
    if (!$this->conn) {
      $this->conn = true;
      $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_nm);
      if ($this->mysqli->connect_error) {
        array_push($this->result, $this->mysqli->connect_error);
      }
    }
  }
  public function insert($table, $param = array())
  {
    if ($this->tableExist($table)) {
      $columns = implode(', ', array_keys($param));
      $ans = implode("', '", $param);
      $sql = "insert into $table ($columns) values('$ans') ";
      if ($this->mysqli->query($sql)) {
        array_push($this->result, $this->mysqli->insert_id);
        return true;
      } else {
        array_push($this->result, $this->mysqli->error);
        return false;
      }
    }
  }
  public function update($table, $param = array(), $where)
  {
    if ($this->tableExist($table)) {
      $args = array();
      foreach ($param as $key => $value) {
        $args[] = "$key = '$value'";
      }

      $sql = "UPDATE `$table` SET " . implode(', ', $args) . " WHERE $where";
      if ($this->mysqli->query($sql)) {
        array_push($this->result, $this->mysqli->affected_rows);
        return true;
      } else {
        array_push($this->result, $this->mysqli->error);
        return false;
      }
    }
  }
  public function delete($table, $where)
  {
    if ($this->tableExist($table)) {
      $sql = "DELETE FROM `$table` WHERE $where";
      if ($this->mysqli->query($sql)) {
        array_push($this->result, $this->mysqli->insert_id);
        // return true;
      } else {
        array_push($this->result, $this->mysqli->error);
        // return false;
      }
    }
  }
  public function select($table, $rows = "*", $join = null, $where = null, $order = null, $limit = null)
  {
    if ($this->tableExist($table)) {
      $sql = "SELECT $rows FROM  $table";
      if ($join != null) {
        $sql .= " JOIN $join";
      }
      if ($where != null) {
        $sql .= " WHERE $where";
      }
      if ($order != null) {
        $sql .= " ORDER BY $order";
      }
      if ($limit != null) {
        if (isset($_GET['page'])) {
          $page = $_GET['page'];
        } else {
          $page = 1;
        }
        $start = ($page - 1) * $limit;
        $sql .= " LIMIT $start,$limit";
      }
      //  echo $sql;
      $query = $this->mysqli->query($sql);
      if ($query) {
        $this->result = $query->fetch_all(MYSQLI_ASSOC);
        // return true;
      } else {
        array_push($this->result, $this->mysqli->error);
        // return false;
      }
    }
  }
  public function pagination($table, $join = null, $where = null, $limit = 5)
  {
      if ($this->tableExist($table)) {
          if ($limit > 0) {
              $sql = "SELECT COUNT(*) FROM `$table`";
  
              if ($join != null) {
                  $sql .= " JOIN $join";
              }
  
              if ($where != null) {
                  $sql .= " WHERE $where";
              }
  
              $query = $this->mysqli->query($sql);
              $total_record = $query->fetch_array()[0];
              $total_pages = ceil($total_record / $limit);
  
              $page = 1;
              if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                  $page = intval($_GET['page']);
                  if ($page < 1) $page = 1;
                  if ($page > $total_pages) $page = $total_pages;
              }
  
              return [
                  'current_page' => $page,
                  'total_pages' => $total_pages,
                  'total_record' => $total_record,
                  'limit' => $limit,
                  'offset' => ($page - 1) * $limit
              ];
          } else {
              return false;
          }
      } else {
          return false;
      }
  }
  
  public function sql($sql)
  {
    $query = $this->mysqli->query($sql);
    if ($query) {
      if (stripos($sql, 'SELECT') === 0) {
        // For SELECT queries, fetch results
        $this->result = $query->fetch_all(MYSQLI_ASSOC);
    } else {
        // For other queries (UPDATE, INSERT, DELETE), just indicate success
        $this->result = true;
    }
    } else {
      array_push($this->result, $this->mysqli->error);
      return false;
    }
  }
  private function tableExist($table)
  {
    $sql = "SHOW TABLES FROM $this->db_nm  LIKE '$table'";
    $tableInDb = $this->mysqli->query($sql);
    if ($tableInDb) {
      if ($tableInDb->num_rows == 1) {
        return true;
      } else {
        echo "record not found";
        return false;
      }
    }
  }
  public function getResult()
  {
    $val = $this->result;
    $this->result = array();
    return $val;
  }
  public function __destruct()
  {
    if ($this->conn) {
      if ($this->mysqli->close()) {
        $this->conn = false;
      }
    }
  }
}
