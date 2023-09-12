<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Even-Odd Checker</title>
  <style>
    <?php include "style.css";?>
  </style>
</head>
<body>
    <div class="container">
      <h1>Even & Odd Checker in PHP</h1>
      <?php
        $result = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $number = $_POST["number"];

            if ($number % 2 == 0) {
                $result = "Even";
            } else {
                $result = "Odd";
            }
        }
      ?>

      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <input type="number" name="number" placeholder="Enter a Number" required><br>
          <input type="submit" value="Check">
      </form>

      <?php
        if (!empty($result)) {
            echo "<p class='result'>The number $number is $result.</p>";
        }
      ?>
    </div>
</body>
</html>