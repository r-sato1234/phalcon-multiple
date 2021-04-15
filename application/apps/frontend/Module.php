<?php

namespace Frontend;

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Di\DiInterface;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    /**
     * モジュール用に特定のオートローダを登録
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces(
            [
                "Frontend\\Controllers" => "../apps/frontend/controllers/",
                "Frontend\\Models"      => "../apps/frontend/models/",
            ]
        );

        $loader->register();
    }

    /**
     * モジュール用に特定のサービスを登録
     */
    public function registerServices(DiInterface $di)
    {
        // ディスパッチャを登録
        $di->set(
            "dispatcher",
            function () {
                $dispatcher = new Dispatcher();

                $dispatcher->setDefaultNamespace("Frontend\\Controllers");

                return $dispatcher;
            }
        );

        // view コンポーネントを登録
        $di->set(
            "view",
            function () {
                $view = new View();

                $view->setViewsDir("../apps/frontend/views/");

                return $view;
            }
        );
    }
}
