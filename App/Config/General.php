<?php
use Moan\Http\Route;

$config = [
      'default_router' => 'Moan\Http\Router', // A default Router
      'ignore' => 1, // How many requests do you want to ignore? (user(1)/profile(2)/19218(3))

      'routes' => [ // Set Routes
            new Route('', ['Homepage', 'default'])
      ],

      'database' => [ // Set database access data
            'host' => 'localhost',
            'username' => 'root',
            'password' => ''
      ],

      'services' => [ // Set services for DI container
            'config' => 'Moan\Architecture\Config'
      ],
];

return $config;
