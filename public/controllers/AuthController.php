<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\User;
use app\core\Application;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $registerModel = new User();

        if ($request->isPost()) {
            $registerModel->loadData($request->getBody());
            if ($registerModel->validate() && $registerModel->save()) {
                return 'Success';
            }

            return $this->render('login', [
                'model' => $registerModel
            ]);
        }

        return $this->render('login', [
            'model' => $registerModel
        ]);
    }
    public function register(Request $request)
    {
        $user = new User();

        if ($request->isPost()) {
            $user->loadData($request->getBody());
            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Вы зарегистрировались!');
                Application::$app->response->redirect('/');
            }

            return $this->render('register', [
                'model' => $user
            ]);
        }

        return $this->render('register', [
            'model' => $user
        ]);
    }
}