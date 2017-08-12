<?php
  // define content type for returning file
  header('Content-Type: text/css');

  // start a string buffer with the index.css file
  $buffer = file_get_contents("./index.css");

  // load the config file
  $config = parse_ini_file("../config.ini");

  // if minification is enabled, perform some minification functions and print the file
  if($config["minifycss"] == "true"){
    $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
    $buffer = str_replace(': ', ':', $buffer);
    $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
    die("/*Minified for production [index.css]*/\n" . $buffer);
  }else{
    die($buffer);
  }
?>