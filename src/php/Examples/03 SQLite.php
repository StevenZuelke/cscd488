<!DOCTYPE html>
<html>
  <head>
    <title>SQLite Example</title>
  </head>
  <body>

<?php

  $dbfile = "/tmp/data.db";

  if (file_exists($dbfile)) {
    print("<p>Removing previous database...</p>");
    unlink($dbfile);
  }

  $db = new SQLite3($dbfile);
  $db->exec("CREATE TABLE cars(id INTEGER PRIMARY KEY, name TEXT, price INT)");
  $db->exec("INSERT INTO cars(name, price) VALUES('Audi', 52642)");
  $db->exec("INSERT INTO cars(name, price) VALUES('Mercedes', 57127)");
  $db->exec("INSERT INTO cars(name, price) VALUES('Skoda', 9000)");
  $db->exec("INSERT INTO cars(name, price) VALUES('Volvo', 29000)");
  $db->exec("INSERT INTO cars(name, price) VALUES('Bentley', 350000)");
  $db->exec("INSERT INTO cars(name, price) VALUES('Citroen', 21000)");
  $db->exec("INSERT INTO cars(name, price) VALUES('Hummer', 41400)");
  $db->exec("INSERT INTO cars(name, price) VALUES('Volkswagen', 21600)");

?>

    <table border=3>
      <tr>
        <td width=30>id</td>
        <td width=100>Make</td>
        <td width=100>Price</td>
      </tr>

<?php

      $res = $db->query('SELECT * FROM cars');

      while ($row = $res->fetchArray()) {
?>
      <tr>
        <td><b><?php print $row['id'] ?></b></td>
        <td><?php print $row['name'] ?></td>
        <td>$ <?php print $row['price'] ?> USD</td>
      </tr>
<?php

      }

?>
    </table>
  </body>
</html>
