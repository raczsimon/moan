<?php
namespace Moan\Architecture;

/**
 * Configuration class
 */
class Config
{
      /**
      * Get configuration array
      * @access public
      * @return array Configuration array
      */
      public function get()
      {
            return require_once('App/Config/General.php');
      }
}
