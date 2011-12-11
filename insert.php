<?php

$required = array('title', 'description', 'pubDate', 'link');

$error = false;

foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}

if ($error) {

sleep(9);
header( 'Location: http://api.inoads.com/snowstorm/' );

} else {

$con = mysql_connect("localhost","user","pw");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$title = mysql_real_escape_string ($_POST['title']); 
$description = mysql_real_escape_string ($_POST['description']); 
$pubDate = mysql_real_escape_string ($_POST['pubDate']); 
$link = mysql_real_escape_string ($_POST['link']); 

mysql_query('SET NAMES utf8', $con);
mysql_select_db("db_name", $con);

$sql="INSERT INTO table (title,description,pubDate,link) VALUES ('".htmlspecialchars($title)."', '".htmlspecialchars($description)."', '".htmlspecialchars($pubDate)."', '".htmlspecialchars($link)."')"; 

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
mysql_close($con);

header( 'Location: http://api.inoads.com/snowstorm/rss.php' );

}

?>