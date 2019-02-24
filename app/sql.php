<?php
$dsn = 'pgsql:dbname=TEST;host=pgsql;port=5432';
$user = 'postgres';
$pass = 'example';

try{
 //db connect
 $dbh = new PDO($dsn, $user, $pass, array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        ));
 
 /*query実行部*/
 //SELECT
 $sth = $dbh->prepare('INSERT INTO test_comments (name, text) VALUES (?, ?)');
 $query_result = $dbh->query('SELECT * FROM test_comments');
 $sth_select = $dbh->prepare('SELECT * FROM test_comments WHERE name = ?');
 
 
 //db disconnect
 $dbh = null;
} catch (PDOException $e){
 print "DB ERROR:" . $e->getMessage();
 die();
}

foreach($query_result as $row){
 print $row["name"]. ":". $row["text"] . "<br/>";
}


echo "<p>-----------------------------------------</p>";

$name = "John";
$text = "build and scrap";
$sth->execute(array($name, $text));

$name = "John";
$sth_select->execute(array($name));
$prepare_result = $sth_select->fetchAll();
foreach($prepare_result as $row) {
  print $row["name"] . ": " . $row["text"] . "<br/>";
}
$sth_select->execute(array($name));

?>