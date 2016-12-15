<?php
namespace App;

use Moan\Http;
use Moan\Architecture;
use Moan\Utils\StringUtils;

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

            $this->callController(
                  'App\\Controller\\' . $router->getController(),
                  $router->getView()
            );
      }

      /**
       * Calls a controller, it's methods and pass the dependencies
       * @param string Controller name
       * @param string View name
       * @access private
       * @return void
       */
      private function callController(string $controller, string $view)
      {
            $controller = new $controller();
            $render = 'render' . StringUtils::firstLetterToCapital($view);
            $action = 'action' . StringUtils::firstLetterToCapital($view);

            if (method_exists($controller, 'begin'))
                  $controller->begin();
            if (method_exists($controller, $action))
                  $controller->$action();
            if (method_exists($controller, $render))
                  $controller->$render();
            if (method_exists($controller, 'end'))
                  $controller->end();
      }
}
