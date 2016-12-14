<?php
namespace Moan\Http;

/**
 * Describes how to implement routers
 */
interface IRouter
{
      /**
       * The algorithm of router
       */
      public function run (array $routes, int $ignore);
}
