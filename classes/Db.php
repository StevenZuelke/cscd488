<?php
  // Singleton
  // Manages all connections to and from the database

  class Db {

    private static $dbfile   = "/var/www/db/main.db";
    private static $conn     = null;
    private static $instance = null;

    private function __construct() {
      self::$conn = new SQLite3(self::$dbfile);
    }

    public function __destruct() {
      self::$conn->close();
    }

    public static function getInstance() {
      if (is_null(self::$instance)) {
        self::$instance = new Db;
      }
      return self::$instance;
    }

    public function get_config($key) {
      $stmt = self::$conn->prepare('SELECT value FROM config WHERE name=:key');
      $stmt->bindValue(':key', $key, SQLITE3_TEXT);
      $result = $stmt->execute();
      if ($row = $result->fetchArray()) {
        return $row[0];
      } else {
        return null;
      }
    }

    public function set_config($key, $value) {
      if ( is_null(self::get_config($key)) ) {
        $stmt = self::$conn->prepare('INSERT INTO config (name, value) VALUES (:key, :val)');
      } else {
        $stmt = self::$conn->prepare('UPDATE config SET value = :val WHERE name = :key');
      }
      $stmt->bindValue(':val', $value, SQLITE3_TEXT);
      $stmt->bindValue(':key', $key,   SQLITE3_TEXT);
      $stmt->execute();
    }

  }
?>
