<?php
namespace app\core;

use stdClass;

/*
 * Class Application
 */
class Application
{
    public static Application $app;
    public static string $ROOT_DIR;
    public string $userClass;
    public string $layout = "main";
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public ?DbModel $user;
    public ?Controller $controller = null;
    public Database $db;
    public function __construct($rootPath, array $config)
    {
        $this->userClass = $config['userClass'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);

        $this->db = new Database($config['db']);
        $pv = $this->session->get('user');
        if ($pv) {
            $tempUser = new $this->userClass();
            $pk = $tempUser->primaryKey();
            $this->user = $tempUser->findOne([$pk => $pv]);
        } else {
            $this->user = null;
        }
    }
    public function run()
    {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            $this->response->setStatusCode($e->getCode());
            echo $this->router->renderView('_error', [
                'exception' => $e
            ]);
        }
    }

    public function getController(Controller $controller)
    {
        return $this->controller;
    }
    public function setController(Controller $controller)
    {
        $this->controller = $controller;
    }
    public function login(DbModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
        return true;
    }
    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }
    public static function isGuest()
    {
        return !self::$app->user;
    }

}