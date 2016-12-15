<?php
namespace Moan\Utils;

/**
 * Some methods for string manipulation
 */
class StringUtils
{
      /**
       * Set the first letter capital
       * @access public
       * @return string A string with the first letter capital
       */
      public static function firstLetterToCapital(string $string)
      {
            return ucfirst($string);
      }
}
