<?php 

// WRAPERR DATABASE, BISA DIGUNAKAN DI TABLE MANAPUN
class Database  
{
  // mengambil data dari database, yang ada di config
  private $host = DB_HOST;
  private $user = DB_USER;
  private $pass = DB_PASS;
  private $db_name = DB_NAME;

  private $dbh; // database handler
  private $stmt; // statment

  public function __construct()
  {
    // data source name
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

    // untuk mengoptimasi koneksi ke db
    $option = [
      PDO::ATTR_PERSISTENT => true, //membuat koneksi database terjaga terus
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // mode errornya tampilkan exception
    ];

    // check apakah koneksi ke database berhasil atau tidak
    try {
       $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
    } catch ( PDOException $e) {
      die($e->getMessage());
    }
  }


  // function untuk menjalankan query
  public function query($query)
  {
    // menyiapkan query nya terlebih dahulu, agar tau user maunya apa
    $this->stmt = $this->dbh->prepare($query);
  }

  public function bind($param, $value, $type = null)
  {
    if (is_null($type)) {
      switch (true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
          break;
      }
    }
    $this->stmt->bindValue($param, $value, $type);
  }

  public function execute()
  {
    $this->stmt->execute();
  }

  // kalau mau ambil data banyak
  public function resultSet()
  {
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // kalau mau ambil data satu
  public function single()
  {
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_ASSOC);
  }

  // untuk menghitung berapa baris yang baru berubah di dalam table
  public function rowCount()
  {
    return $this->stmt->rowCount();      
  }

}
