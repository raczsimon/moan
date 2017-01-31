<?php
namespace Moan\Http;

/**
 * Describes how to implement routers
 */
interface IRouter
{
      /**
       * The algorithm of the router
       */
      public function run ($routes, $ignore);

      /**
       * Get the controller name
       */
      public function getController ();

      /**
       * Get the view name
       */
      public function getView ();

      /**
       * Get the route
       */
      public function getRoute ();
}
