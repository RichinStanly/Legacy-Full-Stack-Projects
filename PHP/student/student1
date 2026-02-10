<?php
include "config.php";
if(isset($_POST['submit']))
{

$sname = $_POST['sname'];
$rno=$_POST['rno'];
$adm=$_POST['adm'];
$phone=$_POST['phone'];
$dob=$_POST['dob'];

$sql = "INSERT INTO user (sname, rno, adm, dob, phone)
VALUES ('$sname', '$rno', '$adm', '$dob', '$phone')";

if (mysqli_query($conn, $sql)) 
{
echo "<script> alert('New record created succesfully'); </script>";
}
else
{
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
?>

<html> 
<head>
<title>form validation</title>
</head>

<form method="POST">

<label for="username">name:</label><br>
<input type="text" id="sname" name="sname" required><br>



<label for="rno">Roll No:</label><br>
<input type="text" id="rno" name="rno" required><br>

<label for="adm">Admission No:</label><br>
<input type="text" id="adm" name="adm" required><br>

<label for="phone">phone:</label><br>
<input type="text" id="phone" name="phone"  maxlength="10" minlength="10" required><br>

<label for="dob">DOB:</label><br>
<input type="date" id="dob" name="dob" required><br><br>


<button type="submit" name="submit">register</button>
</form>
</body>
</html>
