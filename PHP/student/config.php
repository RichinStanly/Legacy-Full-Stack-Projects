<?php
$conn = mysqli_connect("localhost","root","","BVM");
if(!$conn)
{
die("connection failed");
}
else
{
echo "connection established";
}
?>
