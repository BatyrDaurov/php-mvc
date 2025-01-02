<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">PHP-MVC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Контакты</a>
                </li>
            </ul>
            <? if (\app\core\Application::isGuest()): ?>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Войти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Зарегистрироваться</a>
                    </li>
                </ul>
            <? else: ?>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/profile">Профиль</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Добро пожаловать
                            <?= \app\core\Application::$app->user->getDisplayName(); ?>
                            (Выйти)
                        </a>
                    </li>
                </ul>
            <? endif; ?>
        </div>
    </nav>
    <div class="container">
        <? if (\app\core\Application::$app->session->getFlash('success')): ?>
            <div class="alert alert-success">
                <?= \app\core\Application::$app->session->getFlash('success') ?>
            </div>
        <? endif; ?>
        {{content}}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>