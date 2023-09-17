<?php
$mysql_link = new mysqli('localhost', 'root', '', 'web2020');

if (mysqli_connect_error()) 
{
    die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
}
?>
