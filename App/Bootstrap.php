<?php
namespace App;
use Moan\Http;
use Moan\Architecture;

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
      public function run (bool $type)
      {
            $this->configuration = (new Architecture\Config())->get();
            $this->routing();
      }

      /**
       * Set up routing
       * @access private
       * @return void
       */
      private function routing()
      {
            /**
             * Calling default Router, you can set your own Router in
             * configuration "default_router"
             */
            $routerName = $this->configuration['default_router'];

            $router = new $routerName();

            $router->run(
                  $this->configuration['routes'],
                  $this->configuration['ignore']
            );
      }
}
