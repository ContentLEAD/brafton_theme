Brafton.com Developer’s Guide - Winter 2014-15
By Michael DeWitt

The brafton wordpress theme may look a bit different that a typical theme.  It uses a couple of advanced features that may take a short bit of time and patience to learn, but will make life SO much easier for you as a developer…

Table of contents:

1.  Styles

2.  Functions.php

3.  Javascript

4.  Version control.

========================
1. Styles
========================

First off, this theme uses modular Sass to control the styles.  All the Sass files are located within the library/scss directory.  If you are not familiar with Sass, it is an awesome way to write clean and reproducible code using variables, functions, etc. just like you would in a programming language. The Bones theme which I based this all off has great commenting- open up a few of the Sass files and follow the links in the comments…

For a large project like this, the various stylesheets are broken up into several different folders and files:

-Breakpoints:  This contains the Sass for all the various device break points.  The important thing here is to think of the base.scss file as the core- these styles are loaded on all devices.  You want to keep this light though, and add design features as the viewport increases…

-Modules:  The Sass modules folder is pretty flexible…  You can add bits of Sass that you want to manage easily without getting lost in bigger files.  Just make sure to import them in the master style.scss file.

-Partials:  The main files you would want to edit in this folder are the functions.scss, mixins.scss, and variables.scss files.  Again, this guy who built the starter theme left a lot of great comments for learning about how all these things work.  It is a good idea to keep your mixins and variables here, then access them from your files in the breakpoints folder…
Finally, check out the style.scss file.  All of our smaller files are imported here.  No more super bloated files, yay!!!

COMPILING SASS===========

So, somehow all this Sass has to become CSS.  There are several different methods to do this, but currently a WordPress plugin titled “WP-SCSS” is compiling the Sass.  It watches your Sass files for changes, and then re-compiles when the page is visited.  Check out the plugin page on Wordpress.org for more info.  
The theme also comes with a Compass config file (config.rb in the scss directory…).  So, if you are more ambitious, you can use Compass from the command line to compile the Sass.

Everything in the library/scss directory is compiled into the library/css directory.  NEVER TOUCH THE library/css directory or the root style.css file.  IT’S ALL SASS BABY. 

HOW THE HELL DO I KNOW WHICH SASS FILE TO EDIT WHEN I NEED TO MAKE A CHANGE?? THERE ARE SO MANY!
This is one problem with using the plugin to compile- the Compass compiler will input specific file names and line numbers as comments to tell you where to go.  The best solution at this point is to start in base.scss and work upwards- paying attention to which breakpoint the CSS file is referencing.  I think also after spending time with the Sass directory it will be easier to infer where to make appropriate changes.  That is not a good solution- I will work to make finding things easier…

===================================
2. Functions.php
===================================

Like the root style.css file, the root functions.php file is very minimal and relies on a couple of imports:  the library/bones.php file and the library/brafton.php file.  

Enqueue all scripts within the bones.php file.  You can find the scripts/stylesheets I have enqueue’d starting at line 161 of bones.php 

The brafton.php file contains legacy code from the old site…

==================================
3. JavaScript
==================================

Please, please do not drop extended jQuery in the page templates.  Add all scripts to the library/js/scripts.js file, starting at line 127…

Any JS libraries (responsive nav, for example) live in the library/js/libs directory.  Enqueue any new libraries in the library/bones.php file.

==================================
4.  Version Control
==================================

The root theme directory is a git repository.  I highly reccomend documenting all changes...



