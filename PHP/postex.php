<html>
<head>
  <title>PHP POST METHOD</title>
</head>
<body>

  <h2>PHP POST METHOD</h2>
  <form method="post">
   <label for="name">enter your name</label>
   <input type="text" id="name" name="nm" required>
   <button type="submit" name="submit">submit</button>
  </form>

<?php
  if (isset($_POST['submit'])){
    $name=$_POST['nm'];
    echo "<p>hello,$name!</p>";
}
?>

</body>
</html>
