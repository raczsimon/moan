<?php
// Some basic PHP settings
session_start();
mb_internal_encoding('utf-8');

/**
 * AUTOLOADING START
 */

/**
 * Do not remove this interface.
 * It is used for autoload classes.
 */
require('Moan/Autoload/IAutoload.php');

/**
 * You can add here your own implementations
 * of autoloading. Should implement
 * the interface Moan\Autoload\IAutoload.
 */
require('Moan/Autoload/General.php');
// require('App\Other\Autoload\YourOwnAutoloadClass.php');

function autoloading ($classname)
{
      $autoload = new Moan\Autoload\General($classname); // Or your own class
      $autoload->run();
}

spl_autoload_register('autoloading');

/**
 * / AUTOLOADING END
 */

// Initialization of the application
$bootstrap = new App\Bootstrap();
$bootstrap->run(App\Bootstrap::DEVELOPMENT_MODE);
