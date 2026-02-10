<html>
<head>
  <title>PHP GET METHOD</title>
</head>
<body>

  <h2>PHP GET METHOD</h2>
  <form method="get">
   <label for="name">enter your name</label>
   <input type="text" id="name" name="nm" required>
   <button type="submit" name="submit">submit</button>
  </form>

<?php
  if (isset($_GET['nm'])){
    $name=$_GET['nm'];
    echo "<p>hello,$name!</p>";
}
?>

</body>
</html>
