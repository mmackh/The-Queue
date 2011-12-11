<?php

$database =  'dbname';
$dbconnect = mysql_pconnect('localhost', 'user', 'pw');
mysql_select_db($database, $dbconnect);

$query = "SELECT * FROM table WHERE id LIKE '%'    ORDER BY id DESC LIMIT 25";
$result = mysql_query($query, $dbconnect);
mysql_query('SET NAMES utf8', $dbconnect);

while ($line = mysql_fetch_assoc($result))
        {
            $return[] = $line;
        }

$now = date("D, d M Y H:i:s T");

$output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
            <rss version=\"2.0\">
                <channel>
                    <title>The Queue</title>
                    <link>http://readapp.net</link>
                    <description>A curated reading list.</description>
                    <language>en-us</language>
                    <pubDate>$now</pubDate>
                    <lastBuildDate>$now</lastBuildDate>
            ";
            
foreach ($return as $line)
{
    $output .= "<item><title>".htmlspecialchars($line['title'])."</title>
    <description>".htmlspecialchars($line['description'])."</description>
                    <link>".htmlspecialchars($line['link'])."</link>
                    <pubDate>".htmlspecialchars($line['pubDate'])."</pubDate>
                </item>";
}
$output .= "</channel>
</rss>";

header('Content-Type: text/xml, charset=UTF-8');

$id = fopen('feed.xml', 'w');
fwrite($id, $output);

sleep(1);

header( 'Location: http://api.inoads.com/snowstorm/' );

?>