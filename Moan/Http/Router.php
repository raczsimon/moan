<?php
namespace Moan\Http;
use Moan\Architecture;
use Moan\Exception;

/**
 * This is a default class for routing
 */
class Router implements IRouter
{
      /**
       * @var string URI
       * @access private
       */
      private $uri;

      /**
       * @var array Routes from configuration
       * @access private
       */
      private $routes;

      /**
       * @var array Variables from URI
       * @access private
       */
      private $variables;

      /**
       * @var string Name of the controller
       * @access private
       */
      private $controller;

      /**
       * @var string Name of the view
       * @access private
       */
      private $view;

      /**
       * @var Moan\Http\Route Route which maches
       * @access private
       */
      private $route;

      /**
       * Search for a route
       * @param array Routes from configuration
       * @param int How many requests should be ignored?
       * @access public
       * @return void
       */
      public function run (array $routes, int $ignore)
      {
            $this->uri = URL::getUri($ignore);

            foreach ($routes as $route) {
                  if (preg_match($route->getPattern(), $this->uri, $matches)) {
                        $this->route = $route;
                        $this->controller = $route->getController();
                        $this->view = $route->getView();
                  }
            }

            if (empty($this->route))
                  throw new Exception\RouteNotFoundException("This route was not not found. Perhaps you forgot to add it in the configuration file.");

            $this->setVariables();
      }

      /**
       * Parses the patterns to get the variables from URI
       * @access private
       * @return void
       */
      private function setVariables()
      {
            if (preg_match($this->route->getPattern(), $this->uri, $values)) {
                  preg_match($this->route->getPattern(), $this->route->getUrl(), $keys);

                  for ($i = 0; $i < sizeof($keys); $i++) {
                        if (!preg_match('/\//', $keys[$i]))
                              $keys[$i] = preg_replace('/\{(.*)\}/', '$1', $keys[$i]);
                        if ($i == 0)
                              $this->variables['path'] = $values[$i];
                        else
                              $this->variables[$keys[$i]] = $values[$i];
                  }
            }
      }

      /**
       * Get the URI variables array
       * @access public
       * @return array URI variables array
       */
       public function getVariables()
       {
             return $this->variables;
       }

       /**
        * Get the URI variables array
        * @access public
        * @return Moan\Http\Route Instance of the Route class
        */
        public function getRoute()
        {
              return $this->route;
        }

        /**
        * Get the view name
        * @access public
        * @return string View name
        */
        public function getView()
        {
              return $this->view;
        }

        /**
        * Get the controller name
        * @access public
        * @return string Controller name
        */
        public function getController()
        {
              return $this->controller;
        }
}
