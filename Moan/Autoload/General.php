<?php
namespace Moan\Autoload;

/**
 * Default implementing of Autoload class
 */
class General implements IAutoload
{
      /**
       * @var string Class name
       */
      private $classname;

      /**
       * Initialization
       * @param string Class name which we use to load the class file
       * @return void
       */
      public function __construct (string $classname)
      {
            $this->classname = $classname;
      }

      /**
       * Implementation itself
       * Loading class file
       * @return void
       */
      public function run()
      {
            $classname = str_replace('\\', '/', $this->classname);
            require($classname . '.php');
      }
}
