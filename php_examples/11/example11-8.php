<?php
  require_once 'login.php';
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  if ($connection->connect_error) die($connection->connect_error);

  $statement = $connection->prepare('INSERT INTO classics VALUES(?,?,?,?,?)');
  $statement->bind_param('sssss', $author, $title, $category, $year, $isbn);

  $author   = 'Emily Brontë';
  $title    = 'Wuthering Heights';
  $category = 'Classic Fiction';
  $year     = '1847';
  $isbn     = '9780553212587';

  $statement->execute();
  printf("%d Row inserted.\n", $statement->affected_rows);
  $statement->close();
  $connection->close();
?>
