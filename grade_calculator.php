<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grade Calculator</title>
  <style>
    <?php include "style.css";?>
  </style>
</head>
<body>
  <div class="container">
    <h1>Grade Calculator</h1>
    <?php 

      $average = "";
      $grade = "";

      if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        $score1 = $_POST['score1'];
        $score2 = $_POST['score2'];
        $score3 = $_POST['score3'];

        $average = ($score1 + $score2 + $score3) / 3;

        if ( $average >= 90 ) {
          $grade = "A";
        }elseif( $average >= 80 ) {
          $grade = "B";
        }elseif( $average >= 70 ) {
          $grade = "C";
        }elseif( $average >= 60 ) {
          $grade = "D";
        }else {
          $grade = "F";
        }
      }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
        <label for="score1">Test Score 1:</label>
        <input type="number" name="score1" id="score1" required><br>
        <br>
        <label for="score2">Test Score 2:</label>
        <input type="number" name="score2" id="score2" required><br>
        <br>
        <label for="score3">Test Score 3:</label>
        <input type="number" name="score3" id="score3" required><br>
        <br>
        <input type="submit" value="Calculate">
    </form>
    <br>
    <?php 
      if ( !empty($average) && !empty($grade) ) {
        printf("<p class='result'>Average Score: %.2f</p>",$average);
        printf("<p class='result'>Latter Grade: %s</p>",$grade);
      }
    
    ?>
  </div>
</body>
</html>