<?php
$base_url = 'http://localhost/chandra/';
$host = "localhost";
$username = "root";
$password = "";
$dbname = "chandra";

$conn = mysql_connect($host, $username, $password);
if ($conn == false) 
{
    die('Could not connect: ' . mysql_error());
} 
else
{
	mysql_select_db($dbname);
}
?>