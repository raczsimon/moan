# Moan
A PHP/JS framework for MVC applications based on module pinning.

## Jumping between production and development mode

*File: index.php*

```
$mode = App\Bootstrap::DEVELOPMENT_MODE;
$mode = App\Bootstrap::PRODUCTION_MODE;
$bootstrap->run( $mode );
```

## Editing the configuration file

*File: App/Config/General.php*

```
<?php

$config = [
      "database" => [
            "host" => "localhost",
            "username" => "root",
            "password" => ""
      ],

      "your own config" => [
            "key" => "value"
      ]
];

return $config;
```

You can also add your own configuration file and merge the array inputs. You can just add the require command in the head of the file.

```
$my_config = require("your_config.php");
```

And then merge the arrays before you return them.

```
$config = array_merge($config, $my_config);

return $config;
```
