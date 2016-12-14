<?php
namespace Moan\Autoload;

/**
 * Interface used for autoloading.
 */
interface IAutoload
{
      /**
       * Every Autoload class should implement a constructor with an
       * argument (class name)
       */
      public function __construct(string $classname);

      /**
       * Every Autoload class should implements a method run(), which is an
      * logic for including files of classes.
      */
      public function run();
}
