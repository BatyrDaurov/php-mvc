<?php

namespace app\core;

class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];
    public function __construct(Request $request, Response $response)
    {
        $this->response = $response;
        $this->request = $request;
    }
    public function get(string $path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }
    public function post(string $path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            $this->response->setStatusCode(404);
            return $this->renderView("_404");
        }
        if (is_string($callback)) {
            return $this->renderView($callback);
        }
        if (is_array($callback)) {
            Application::$app->controller = new $callback[0];
            $callback[0] = Application::$app->controller;
        }
        return call_user_func($callback, $this->request);
    }
    public function renderView($view, $params = [])
    {
        $layoutContent = $this->getLayoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }
    public function renderContent($view)
    {
        $layoutContent = $this->getLayoutContent();
        return str_replace('{{content}}', $view, $layoutContent);
    }
    protected function renderOnlyView($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }
    protected function getLayoutContent()
    {
        $layout = Application::$app->controller->layout;
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
        return ob_get_clean();
    }
}