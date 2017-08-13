# FrostPortal
## A lightweight, simple, and beautiful Minecraft portal website.

![Frost Preview](https://proxy.spigotmc.org/530c46cae569fcd856d75108a473d7fb631a82b7?url=https%3A%2F%2Fi.gyazo.com%2F872c153be46da4d54d51a5f58258b876.png)

Frost is a very easy-to-use web portal built for Minecraft servers, with quick installation, easy configuration, and a beautiful, minimalist design. This web portal will make your server instantly look more professional with very little work. Developed entirely with HTML, CSS, and PHP, it is lightning-fast and highly-compatible.

This software is released under the Apache 2.0 license, and is developed in its entirety by myself, in addition to usage of [Julian Spravil's PHP Minecraft Server Query classes](https://github.com/FunnyItsElmo/PHP-Minecraft-Server-Status-Query/).

[Working Demo](https://tudedude.me/demos/frostPortal/)

SHA1 Checksum: 43D086939805ACF4E7B35956EA35A444

#### Default Image Credits:

* [missing.png](https://cdn.pixabay.com/photo/2016/10/18/18/19/question-mark-1750942_960_720.png)
* [default link images](http://minecraft.gamepedia.com)
* [background](http://static.fjcdn.com/pictures/Aeries+minecraft+server+spawn+built+on+the+aeries+minecraft+server+mcmcaeriescom_11f117_4527838.png)
* [forums.png](http://minecraftenchantmentcalculator.com/shared/logo.png)

### Installation
To install, simply follow these steps.

#### Requirements:
Web server with PHP
Access to server
#### Instructions
Un-zip the file. You will see the file structure (4 files and 2 folders).
Upload the files to server's web root (generally "public_html" or "www" with shared hosting)
Replace the default images with your own in the "assets" folder, or use the defaults. Filenames should be kept the same, or any changes reflected in the config.ini.
Configure website following built-in instructions or the tutorial below.
Configuration
This portal stores its settings in the config.ini stored in the main project folder. This configuration file is meant to be easy to work with, however the link structure may be confusing to some. A quick tutorial is provided below the default configuration.

### Default Configuration File
```
<?php
; <?php
;   die();
; /*
;-----------------------------------------------------------------;
;                    Frost Portal by Tudedude                     ;
;                          Configuration                          ;
;-----------------------------------------------------------------;
;                                                                 ;
; Copyright 2017 Carson Faatz/Tudedude                            ;
;                                                                 ;
; Licensed under the Apache License, Version 2.0 (the "License"); ;
; you may not use this file except in compliance with the License.;
; You may obtain a copy of the License at                         ;
;                                                                 ;
; http://www.apache.org/licenses/LICENSE-2.0                      ;
;                                                                 ;
;-----------------------------------------------------------------;
; This configuration can be used to alter file paths, link paths, ;
; and any text string used on the page.                           ;
;-----------------------------------------------------------------;


;---------------------------;
; DEFAULT TEXT PLACEHOLDERS ;
;---------------------------;
; %name% - the value of the ;
; servername variable; the  ;
; name of the server        ;
;                           ;
; %year% - the current year ;
;---------------------------;

; Whether or not to show the panel with the server IP
ippanel = true

; Whether or not to show the player count of the server
; Will not show if ippanel is set to false.
pingserver = true

; The name of the server.
servername = "Tudedude's Frost Portal"

; The IP or domain of the server.
serverip = "mc.hypixel.net"

; The port of the server
; This value must still be set if it is 25565.
serverport = 25565

; This section defines what links should appear on the page.
; These should be defined in the following format:
; links[NAME] = "LINK"
; where NAME is the title for the link, and LINK is the link
; to visit.
links[Store] = "https://tudedude.me"
links[Vote] = "https://tudedude.me"
links[Forums] = "https://tudedude.me"
links[Staff] = "https://tudedude.me"

; This section defines the images that should be associated
; with the links on the page. The name _must_ be the same
; as the name specified in the links entry. 
images[Store] = "./assets/store.png"
images[Vote] = "./assets/vote.png"
images[Forums] = "./assets/forums.png"
images[Staff] = "./assets/staff.png"

; This is the path to be used if an image is not defined
; (or not defined correctly) for a link.
missing = "./assets/missing.png"

; This defines the title of the website
title = "%name% | Home"

; This is the path to the background that should be used
background = "./assets/background.png"

; This is the path to the logo that should be used
logo = "./assets/logo.png"

; This setting controls whether or not CSS should be minified
; Minification will result in reduced CSS filesize by removing
; unnecessary characters such as spaces and comments. This will
; not affect the original file, just how it is served to the
; browser.
minifycss = "true"

; */
; ?>
```

### Creating Links
The links section holds all the destinations for the links that should appear on the main page. To define a new link, use the format as follows:
links[name] = "https://example.com"

The name will appear under the link's on the portal, and must be the same name used when defining images. To define an image, use the format as follows:
images[name] = "./assets/image.png"

If the name is not the same between the link and image definition, the image will not show up, and be replaced by the image specified by the missing option. All image links should either be relative paths or direct links.
