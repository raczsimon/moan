<?php
namespace Moan\Architecture;

/**
 * The class that allows controllers and modules to make use of services
 * defined in the configuration file or added other way.
 */
class DIContainer
{
      /**
       * @var array Dependencies
       * @access private
       */
      private $dependencies;

      /**
       * Add a dependency to the array
       * @param string A key
       * @param object A reference the service points to
       * @access public
       * @return void
       */
      public function addDependency($key, $reference)
      {
            $this->dependencies[$key] = $reference;
      }

      /**
       * Check if the object depends on some service. If the second paramenter
       * is set to true (it is by default), than the service is going to be
       * put to the attribute of the same name as the key.
       * @param object The object you want to check
       * @param bool Do you want to put the services into the object?
       * @access public
       * @return void
       */
      public function check($object, $add = true)
      {
            foreach ($this->dependencies as $key => $reference) {
                  if (property_exists($object, $key))
                        $object->$key = $reference;
            }
      }
}
