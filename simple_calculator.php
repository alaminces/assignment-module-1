<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Calculator</title>
  <style>
    <?php include "style.css";?>
  </style>
</head>
<body>
  <div class="container">
    <h1>A Simple Calculator</h1>
    <?php 
      $result = "";
      $number1 = "";
      $number2 = "";

      if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        $number1 = $_POST['number1'];
        $number2 = $_POST['number2'];
        $operation = $_POST['operations'] ?? "";

        switch($operation) {
          case "+" :
            $result = "The Sum is : " . ($number1 + $number2);
            break;
          case "-" :
            $result = "The Subtraction is : " . ($number1 - $number2); 
            break;
          case "*" :
            $result = "The Multiplication is : " . ($number1 * $number2); 
            break;
          case "/" :
            if ( $number2 == 0 ) {
              $result = "<span style='color:#d33838'>Cann't be divided by zero</span>";
            }else {
              $result = "The Division is : " . ($number1 / $number2);
            } 
            break;
            default:
              $result = "Please Select any operation";
          }
       }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
      <input type="number" name="number1" placeholder="Enter First Number" value="<?php echo $number1;?>" required>
      <input type="number" name="number2" placeholder="Enter Second Number" value="<?php echo $number2;?>" required>
      <select name="operations">
        <option disabled="" selected>Select One Operation</option>
        <option value="+">Addition</option>
        <option value="-">Subtraction</option>
        <option value="*">Multiplication</option>
        <option value="/">Division</option>
      </select>
      <input type="submit" value="Calculate">
    </form>

    <?php 
      if ( !empty($result) ) {
        echo "<p class='result'>{$result}</p>";
      }
    ?>
  </div>
</body>
</html>