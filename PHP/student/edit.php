<?php
include "config.php";
if(isset($_POST['submit']))
{
$uid=$_GET['uid'];
$sname = $_POST['sname'];
$rno=$_POST['rno'];
$adm=$_POST['adm'];
$phone=$_POST['phone'];
$dob=$_POST['dob'];

$sql = "UPDATE user SET  sname='$sname',  rno='$rno', adm='$adm', dob='$dob', phone='$phone' WHERE uid='$uid'";
if (mysqli_query($conn, $sql)) 
{
echo "<script> alert('Record edited succesfully'); </script>;
window.location='display.php'; </script>";
exit();
}
else
{
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
if(isset($_GET['uid'])) {
$uid = $_GET['uid'];
$sql ="SELECT * FROM user WHERE uid = '$uid'";
$result = mysqli_query ($conn, $sql);
if($result) {
$row = mysqli_fetch_assoc($result);
?>
<html>
<head>
<title>Edit Form</title>
</head>
<body>
<form method ="POST">
Name:<br>
<input type="text" id="sname" name="sname" value="<?php echo $row['sname']; ?>" required><br>
Roll No:<br>
<input type="text" id="rno" name="rno" value="<?php echo $row['rno']; ?>" required><br>
Admission No:<br>
<input type="text" id="adm" name="adm" value="<?php echo $row['adm']; ?>" required><br>
Phone:<br>
<input type="text" id="phone" name="phone" value="<?php echo $row['phone']; ?>" maxlength="10" minlength="10" required><br>
DOB:<br>
<input type="date" id="dob" name="dob" value="<?php echo $row['dob']; ?>" required><br><br>
<button type="submit" name="submit">register</button>
</form>
</body>
</html>
<?php
}
}
?>
