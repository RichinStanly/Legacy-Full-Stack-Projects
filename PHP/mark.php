<html>
<head>
  <title>PHP GET METHOD</title>
</head>
<body>

  <h2>PHP GET METHOD</h2>
<form method="post" action="result.php">
<label for="name"> student name</label>
<input type="text" id="name" name="name" required><br><br>

<label for="roll">roll number</label>
<input type="text" id="roll" name="roll" required><br><br>

<h2>enter marks of 6 subjects</h2>

<label for="subject1">subject1</label>
<input type="number" id="subject1" name="subject1" min="0" max="100" required><br><br>

<label for="subject2">subject2</label>
<input type="number" id="subject2" name="subject2" min="0" max="100" required><br><br>

<label for="subject3">subject3</label>
<input type="number" id="subject3" name="subject3" min="0" max="100" required><br><br>

<label for="subject4">subject4</label>
<input type="number" id="subject4" name="subject4" min="0" max="100" required><br><br>

<label for="subject5">subject5</label>
<input type="number" id="subject5" name="subject5" min="0" max="100" required><br><br>

<label for="subject6">subject6</label>
<input type="number" id="subject6" name="subject6" min="0" max="100" required><br><br>

<button type="submit" name="submit">submit</button>
<input type="reset" value="Reset">
</form>
</body>
</html>
