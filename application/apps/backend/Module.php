<?php

namespace Backend;

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Di\DiInterface;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;

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
                "Backend\\Controllers" => "../apps/backend/controllers/",
                "Backend\\Models"      => "../apps/backend/models/",
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

                $dispatcher->setDefaultNamespace("Backend\\Controllers");

                return $dispatcher;
            }
        );

        // view コンポーネントを登録
        $di->set(
            "view",
            function () {
                $view = new View();

                $view->setViewsDir("../apps/backend/views/");

                $view->registerEngines([
                    '.volt' => function ($view) {
                        $config = $this->getConfig();

                        $volt = new VoltEngine($view, $this);

                        $volt->setOptions([
                            'path' => $config->application->cacheDir,
                            'separator' => '_'
                        ]);

                        return $volt;
                    },
                    '.phtml' => PhpEngine::class

                ]);

                return $view;
            }
        );
    }
}
