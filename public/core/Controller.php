<?php

namespace app\core;

use app\core\middlewares\BaseMiddleware;

class Controller
{
    public array $middlewares = [];
    public string $action = '';
    public string $layout = 'main';
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }
    public function render($view, $params = [])
    {
        return Application::$app->view->renderView($view, $params);
    }
    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }
    public function getMiddlewares()
    {
        return $this->middlewares;
    }

}