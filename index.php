<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>The Queue - A curated reading list</title>
                     
                <link rel="stylesheet" href="style.css">
    </head>
    <body>
    
<div id="content" style="width: 480px; margin: 30px auto 60px auto;">    
<hr color="#999" size="1px" width="90%" align="left">
<h1>The Queue</h1>
<div style="margin: -20px auto 20px auto;">Curated reading list &bull; <a href="http://api.inoads.com/snowstorm/feed.xml">Suscribe</a></div>
<hr color="#999" size="1px" width="90%" align="left">

<?php
$insideitem = false;
$tag = "";
$title = "";
$description = "";
$link = "";
function startElement($parser, $name, $attrs) {
 global $insideitem, $tag, $title, $description, $link;
 if ($insideitem) {
  $tag = $name;
 } elseif ($name == "ITEM") {
  $insideitem = true;
 }
}
function endElement($parser, $name) {
 global $insideitem, $tag, $title, $description, $link;
 if ($name == "ITEM") {
  printf("<dt><b><a href='%s'>%s</a></b></dt>",
  trim($link),htmlspecialchars(trim($title)));
  printf("<dt>%s</dt><br><br>",htmlspecialchars(trim($description)));
  $title = "";
  $description = "";
  $link = "";
  $insideitem = false;
 }
}
function characterData($parser, $data) {
 global $insideitem, $tag, $title, $description, $link;
 if ($insideitem) {
 switch ($tag) {
  case "TITLE":
  $title .= $data;
  break;
  break;
  case "DESCRIPTION":
  $description .= $data;
  break;
  case "LINK":
  $link .= $data;
  break;
 }
 }
}
$xml_parser = xml_parser_create();
xml_set_element_handler($xml_parser, "startElement", "endElement");
xml_set_character_data_handler($xml_parser, "characterData");
$fp = fopen("http://api.inoads.com/snowstorm/feed.xml","r")
 or die("Error reading RSS data.");
while ($data = fread($fp, 4096))
 xml_parse($xml_parser, $data, feof($fp))
  or die('<META HTTP-EQUIV="Refresh" CONTENT="0;URL=http://api.inoads.com/snowstorm/rss.php">');
fclose($fp);
xml_parser_free($xml_parser);
?>

<hr color="#999" size="1px" align="left">
<div><a href="http://api.inoads.com/snowstorm/edit.php">Post</a>  &bull; <a href="http://api.inoads.com/snowstorm/rss.php">Renew Cache</a>  &bull;  Project by <a href="http://twitter.com/mmackh">@mmackh</a>
<br>
<br>
  </div>
    </body>
</html>


