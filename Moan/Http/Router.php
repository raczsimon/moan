<?php
namespace Moan\Http;
use Moan\Architecture;

/**
 * This is a default class for routing
 */
class Router implements IRouter
{
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
            $uri = URL::getUri($ignore);

            foreach ($routes as $route) {
                  if (preg_match($route->getPattern(), $uri, $matches)) {
                        $this->route = $route;
                        $this->controller = $route->getController();
                        $this->view = $route->getView();
                  }
            }
      }
}
