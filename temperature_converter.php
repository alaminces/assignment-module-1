<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Temperature Converter</title>
  <style>
    <?php include "style.css";?>
  </style>
</head>
<body>
  <div class="container">
    <h1>Temperature Converter</h1>
    <?php 
      $temperature = "";
      $converted_temperature = "";
      if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        $temperature = $_POST['temperature'];
        $conversion_type = $_POST['conversion-type'] ?? "";

        if ( !empty($temperature) ) {
          if ( "celsius_to_fahrenheit" == $conversion_type ) {
            $converted_temperature = ($temperature * 9/5) + 32;
            $converted_temperature = sprintf("%.0f%s",$converted_temperature,"°F");

          }elseif( "fahrenheit_to_celsius" == $conversion_type ) {
            $converted_temperature = ($temperature - 32) * 5/9 . "°C";
            $converted_temperature = sprintf("%.0f%s",$converted_temperature,"°C");
          }

        }
      }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
      <input type="number" name="temperature" placeholder="Enter Temperature" required="1" value="<?php echo $temperature;?>">
      <select name="conversion-type">
        <option disabled="" selected>Select One Conversion Type</option>
        <option value="celsius_to_fahrenheit">Celsius to Fahrenheit</option>
        <option value="fahrenheit_to_celsius">Fahrenheit to Celsius</option>
      </select>
      <input type="submit" value="Convert">
    </form>
    <?php 
      
      if ( !empty($converted_temperature) ) {
        echo "<p class='result'>Converted Temperature: $converted_temperature</p>";
       }
    ?>
   
  </div>
</body>
</html>