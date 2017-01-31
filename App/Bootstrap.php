<?php
namespace App;

use Moan\Http;
use Moan\Architecture;
use Moan\Exception;
use mheinzerling\commons\StringUtils;

/**
 * Everything is happening here
 */
class Bootstrap
{
      /**
       * @var array Configuration array
       * @access private
       */
      private $configuration;

      /**
       * @var array Services array
       * @access private
       */
      private $services;

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
            $this->configuration = (new Architecture\Config())->get();
            $this->services = require_once('App/Config/Services.php');
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
      private function callController($controller, $view)
      {
            $controller = new $controller();

            // Push services
            $diContainer = $this->diContainerFactory();
            $diContainer->check($controller);


            $render = 'render' . StringUtils::firstCharToUpper($view);
            $action = 'action' . StringUtils::firstCharToUpper($view);

            if (method_exists($controller, 'begin'))
                  $controller->begin();
            if (method_exists($controller, $action))
                  $controller->$action();
            if (method_exists($controller, $render)) {
                  $controller->$render();

                  extract((array)$controller->template);

                  require('App/Controller/templates/' .
                        str_replace('App\\Controller\\', '', get_class($controller))
                  . '/' . $view . '.phtml'
                  );
            }
            if (method_exists($controller, 'end'))
               $controller->end();
      }

      /**
       * Make an instance of DIContainer
       * @access private
       * @return Moan\Architecture\DIContainer DIContainer instance
       */
      private function diContainerFactory()
      {
            $diContainer = new Architecture\DIContainer();

            foreach ($this->services as $key => $service) {
                  $diContainer->addDependency($key, $service);
            }

            return $diContainer;
      }
}
