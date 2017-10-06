<?php // sqltest.php
require_once 'login.php';

var_dump($_POST);
$db_server = mysqli_connect($db_hostname, $db_username, $db_password,$db_database);

if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));
//mysqli_set_charset($db_server,"utf8");
echo "Debug 1<br>";
// mysqli_select_db($db_database, $db_server)
// or die("Unable to select database: " . mysqli_error());

if (isset($_POST['delete']) && isset($_POST['isbn']))
{
    $isbn  = get_post($db_server,'isbn');
    $query = "DELETE FROM classics WHERE isbn='$isbn'";
    echo "Debug 1_1 $query <br>";
    echo "Debug 1_2 ".$_POST['isbn']." <br>";
    echo "Debug 1_3 ".get_post($db_server, $_POST['isbn'])." <br>";
    echo "Debug 1_4 $isbn <br>";
    if (!mysqli_real_query($db_server, $query))
        echo "DELETE failed: $query<br>" . mysqli_error($db_server) . "<br><br>";
}
echo "Debug 2<br>";
if (isset($_POST['author']) &&
    isset($_POST['title']) &&
    isset($_POST['category']) &&
    isset($_POST['year']) &&
    isset($_POST['isbn']))
{
    $author   = get_post($db_server, 'author');
    $title    = get_post($db_server, 'title');
    $category = get_post($db_server, 'category');
    $year     = get_post($db_server, 'year');
    $isbn     = get_post($db_server, 'isbn');

    $query = "INSERT INTO classics VALUES" .
        "('$author', '$title', '$category', '$year', '$isbn')";
    echo "Debug 2_1 $query <br>";
    if (!mysqli_real_query($db_server, $query ))
        echo "INSERT failed: $query<br>" .
            mysqli_error($db_server) . "<br><br>";
}
echo "Debug 3<br>";
echo <<<_END
  <form action="sqltest.php" method="post"><pre>
    Author <input type="text" name="author">
     Title <input type="text" name="title">
  Category <input type="text" name="category">
      Year <input type="text" name="year">
      ISBN <input type="text" name="isbn">
           <input type="submit" value="ADD RECORD">
  </pre></form>
_END;

$query  = "SELECT * FROM classics";
$result = mysqli_query($db_server, $query);

if (!$result) die ("Database access failed: " . mysqli_error($db_server));
$rows = mysqli_num_rows($result);

for ($j = 0 ; $j < $rows ; ++$j)
{
    $row = mysqli_fetch_row($result);
    echo <<<_END
  <pre>
    Author $row[0]
     Title $row[1]
  Category $row[2]
      Year $row[3]
      ISBN $row[4]
  </pre>
  <form action="sqltest.php" method="post">
  <input type="hidden" name="delete" value="yes">
  <input type="hidden" name="isbn" value="$row[4]">
  <input type="submit" value="DELETE RECORD"></form>
_END;
}

mysqli_close($db_server);

function get_post($server_db,$var)
{
    echo "Debug get_post. var = $var POSTvar = $_POST[$var]";
    return mysqli_real_escape_string($server_db, $_POST[$var]);
}
?>
