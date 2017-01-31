<?php
namespace Moan\Http;

class Route
{
      /**
       * @var string The URL the route points to
       * @access private
       */
      private $url;

      /**
      * @var array Path to the controller and the view; controller(0), view(1)
      * @access private
      */
      private $path;

      /**
       * Initiliaze the route
       * @param string The URL the route points to
       * @var array Path to the controller and the view; controller(0), view(1)
       * @access public
       * @return void
       */
      public function __construct($url, $path)
      {
            $this->url = $url;
            $this->path = $path;
      }

      /**
       * Get pattern for regular expression
       * @access public
       * @return string Pattern
       */
      public function getPattern()
      {
            $url = preg_replace('/\{([a-zA-Z0-9]+)\}/', '(.*)', $this->url, -1);
            return '/^' . str_replace('/', '\/', $url) . '$/';
      }

      /** /// GETTERS /// */

      /**
       * Get the URL the route points to
       * @access public
       * @return string
       */
      public function getUrl()
      {
            return $this->url;
      }

      /**
       * Get the name of the controller
       * @access public
       * @return string
       */
      public function getController()
      {
            return $this->path[0];
      }

      /**
       * Get the name of the view
       * @access public
       * @return string
       */
      public function getView()
      {
            return $this->path[1];
      }
}
