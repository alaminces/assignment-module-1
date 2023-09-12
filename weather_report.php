<?php 

// Task 5 : Weather Report

$temperature = 65;

if ( $temperature <= 32 ) {
  echo "It's freezing!";
}elseif( $temperature <= 65 ) {
  echo "It's cool.";
}else {
  echo  "It's warm.";
}