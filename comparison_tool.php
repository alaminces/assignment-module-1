<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comparison Tool</title>
  <style>
    <?php include "style.css";?>
  </style>
</head>
<body>
  <div class="container">
    <h1>Comparison Tool</h1>
    <?php 
      $result = "";
      $first_number = "";
      $second_number = "";
      if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        $first_number = $_POST['first_number'];
        $second_number = $_POST['second_number'];

        $result = ($first_number == $second_number) ? "Both numbers are equal" : (($first_number > $second_number) ? $first_number : $second_number);

        //$result = ($first_number > $second_number) ? $first_number : $second_number;
      }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
      <input type="number" name="first_number" placeholder="Enter the First Number" value="<?php echo $first_number;?>" required>
      <input type="number" name="second_number" placeholder="Enter the Second Number" value="<?php echo $second_number;?>" required>
      <input type="submit" value="Check">
    </form>

    <?php 
      if (!empty($result)) {
        echo "<p class='result'>The larger number is : $result</p>";
      }
    ?>
  </div>
</body>
</html>