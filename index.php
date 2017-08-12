<!DOCTYPE html>
<?php

  /**
   * Tudedude's Frost Portal
   * Copyright 2017 Carson Faatz/Tudedude
   *
   * Licensed under the Apache License, Version 2.0 (the "License")
   * you may not use this file except in compliance with the License.
   * You may obtain a copy of the License at
   *
   * http://www.apache.org/licenses/LICENSE-2.0
   * 
   * @author    Tudedude <me@tudedude.me>
   * @license   http://www.apache.org/licenses/LICENSE-2.0
   * @version   2.0
   *
   */

  // autoload classes from directory tree
  spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
  });

  // load config and some placeholder values
  $config = parse_ini_file("./config.ini");
  $serverName = $config["servername"];

  include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'MinecraftServerStatus.php';


  // define some placeholders to use - revamp later maybe
  $ph = array();
  $ph["name"] = $serverName;
  $ph["year"] = date('Y');


  /**
   * Processes a string and replaces it with
   * precomputed placeholders, then returns the
   * resulting string.
   *
   * @param string $str
   * @param array  $placeholders
   */
  function processPlaceholders($str, $placeholders){
    foreach($placeholders as $prop=>$val){
      $str = str_replace('%' . $prop . '%', $val, $str);
    }
    return $str;
  }
?>
<html>
  <head>
    <title><?= htmlentities(processPlaceholders($config["title"], $ph)) ?></title>
    <link href="./css/css.php" rel="stylesheet" type="text/css" />
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta property="og:title" content="Tudedude's Frost Portal" />
    <meta name="description" content="A minimalistic web portal built for Minecraft servers." />
    <meta property="og:description" content="A minimalistic web portal built for Minecraft servers." />
    <meta property="og:type" content="website" />
  </head>
  <body>
    <div class="background"><img src="<?= $config["background"] ?>"></div>
    <div class="overlay"></div>
    <div class="wrapper">
      <div class="logo-container"><img src="<?= $config["logo"] ?>" class="logo"/></div>
      <?php 
        // if the server ip panel is enabled in config, display it with specified info
        if(isset($config['ippanel']) && $config['ippanel'] == true): ?>
      <div class="ip-center">
        <div class="ip-panel">
          <div class="server-name"><?php echo $config['servername']; ?></div>
          <div class="server-ip"><?php echo $config['serverip'] . ((isset($config['serverport']) && $config['serverport'] != 25565) ? ':' . $config['serverport'] : ''); ?></div>
          <?php 
            // if server ping is enabled in config, execute ping and display it
            if(isset($config['pingserver']) && $config['pingserver'] == true): ?>
            <?php
              // Ping the specified server and port
              $pingResponse = MinecraftServerStatus::query($config['serverip'], intval($config['serverport']));
            ?>
            <div class="players">
              <?php 
                // Output the online players/max players or offline if ping fails
                if(!$pingResponse){
                  echo 'Offline';
                }else{
                  printf('%s/%s', $pingResponse['players'], $pingResponse['max_players']); 
                }
              ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <?php endif; ?>
      <div class="links-container">
        <?php
          $count = 0;
          foreach($config["links"] as $name=>$link){
            /**
             * Load all links and images specified in the .ini file.
             * If an image is not set for a link or if the file is not
             * found, load the specified missing image instead.
             */
            echo
                '<a href="' . $link . '" class="link-' . ($count++) . '">' .
                  '<div class="link">' .
                    '<div class="link-image">' . 
                      '<img src="' . (isset($config["images"][$name]) && file_exists($config["images"][$name]) ? $config["images"][$name] : $config["missing"]) . '"/>' .
                    '</div>' . 
                    '<div class="link-text">' . $name . '</div>' .
                  '</div>' . 
                '</a>';
          }
        ?>
      </div>
    </div>
  </body>
</html>