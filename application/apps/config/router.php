<?php

$router = $di->getRouter();

// Define your routes here
$router->setDefaultModule("frontend");

$router->add(
    "/login",
    [
        "module"     => "backend",
        "controller" => "login",
        "action"     => "index",
    ]
);

$router->add(
    "/admin/items/:action",
    [
        "module"     => "backend",
        "controller" => "items",
        "action"     => 1,
    ]
);

$router->add(
    "/products/:action",
    [
        "controller" => "products",
        "action"     => 1,
    ]
);

$router->handle($_SERVER['REQUEST_URI']);
