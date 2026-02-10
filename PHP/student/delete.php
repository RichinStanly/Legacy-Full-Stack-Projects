<?php
include "config.php";
if(isset($_GET['uid']))
{
$uid = $_GET['uid'];
$sql = "DELETE FROM user WHERE uid = '$uid'";
$result = mysqli_query($conn,$sql);
if($result) {
echo "<script> alert('Record deleted successfully');
window.location='display.php'; </script>";
}
else{
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
?>
  
