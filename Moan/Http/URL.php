<?php
namespace Moan\Http;

/**
 * A library for manipulation with URL
 */
class URL
{
      /**
       * Get full URL address
       * @access public
       * @return string URL adress
       */
      public static function getFull()
      {
            return 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
      }

      /**
       * Get URI address and ignore first few requests
       * @access public
       * @return string URI
       */
      public static function getUri($ignore = 0)
      {
            $uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

            for ($i = 0; $i < $ignore; $i++) {
                  unset($uri[$i]);
            }

            return implode('/', $uri);
      }
}
