<?php

namespace app\core\exceptions;

class ForbiddenException extends \Exception
{
    protected $code = 403;
    protected $message = 'У вас нет доступа к этой странице';

}