<?php
use Moan\Http\Route;
use Moan\Architecture\Config;

$config = [
      'default_router' => 'Moan\Http\Router', // A default Router
      'ignore' => 2, // How many requests do you want to ignore? (user(1)/profile(2)/19218(3))

      'routes' => [ // Set Routes
            new Route('', ['Homepage', 'default'])
      ],

      'database' => [ // Set database access data
            'host' => 'localhost',
            'username' => 'root',
            'password' => ''
      ]
];

return $config;
