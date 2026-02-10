<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("bank");
if(!$con)
{
die("no connection".mysql_error());
}
?>
