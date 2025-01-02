<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\form\Form;
use app\core\Request;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => 'PHP-MVC'
        ];
        return $this->render('home', $params);
    }
    public function contact(Request $request)
    {
        $form = new ContactForm();

        if ($request->isPost()) {
            $form->loadData($request->getBody());
            if ($form->validate() && $form->send()) {
                Application::$app->session->setFlash('success', 'Мы вас услышали!');
                Application::$app->response->redirect('/contact');
            }

            return $this->render('contact', [
                'model' => $form
            ]);
        }
        return $this->render('contact', ['model' => $form]);
    }
}