<?php
require("connectiondb.php");
$id1=$_POST["cid"];
$n1=$_POST["cname"];
$m1=$_POST["camount"];
$query="insert into customer values($id1,'$n1',$m1)";
$result=mysql_query($query);
if($result)
{
echo"data inserted";
}
echo"error in data insertion";
?>
