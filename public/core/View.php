<?php

namespace app\core;

class View
{
    public string $title = '';

    public function renderView($view, $params)
    {
        $viewContent = Application::$app->router->renderOnlyView($view, $params);
        $layoutContent = Application::$app->router->getLayoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }
}