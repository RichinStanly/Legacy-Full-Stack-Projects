<html>
<head>
  <title>php function wwith returnvalue</title>
</head>
<body>

  <h2>php function with return value</h2>

<?php
function square($num){
  $result = $num * $num;
  return $result;
}
$square1=square(2);
$square2=square(5);
echo "the square is $square1.<br>";
echo "the square is $square2.<br>";
?>
</body>
</html>
