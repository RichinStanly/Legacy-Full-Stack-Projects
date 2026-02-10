<?php
include "config.php";
$sql = "SELECT * FROM user";
$result = mysqli_query($conn,$sql);
if (!$result) {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
} else {
echo "<h2>User Data</h2>";
echo "<table border='1'>";
echo "<tr> <th>Name</th> <th>Roll No</th> <th>Admission No</th> 
<th>DOB</th> <th>	Phone</th> <th>Edit</th> <th>Delete</th></tr>";
if(mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<td>" . $row['sname'] . "</td>";
echo "<td>" . $row['rno'] . "</td>";
echo "<td>" . $row['adm'] . "</td>";
echo "<td>" . $row['dob'] . "</td>";
echo "<td>" . $row['phone'] . "</td>";
echo "</tr>";
}
echo "</table>";
}
else{
echo "No record found!";
}
}
?>
