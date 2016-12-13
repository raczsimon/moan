<?php
namespace App;

/**
 * Everything is happening here
 */
class Bootstrap
{
      /**
       * @var array[string => string] Configuration array
       * @access private
       */
      private $configuration;

      const DEVELOPMENT_MODE = true;
      const PRODUCTION_MODE = false;

      /**
       * Run configuration a routing
       * @param bool App status (DEVELOPMENT_MODE x PRODUCTION_MODE)
       * @access public
       * @return void
       */
      public function run ($type)
      {
            $this->configuration = $this->configuration ($type);
            $this->routing();
      }

      /**
       * Get configuration array
       * @access private
       * @return array[string => string] Configuration array
       */
      private function configuration ()
      {
            return require('App/Config/General.php');
      }

      /**
       * Set up routing
       * @access private
       * @return void
       */
      private function routing()
      {
            print_r($this->configuration);
      }
}
