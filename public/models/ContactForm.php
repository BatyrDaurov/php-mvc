<?php

namespace app\models;

use app\core\Application;
use app\core\Model;

class ContactForm extends Model
{
    public string $subject = '';
    public string $email = '';
    public string $body = '';
    public function rules(): array
    {
        return [
            'subject' => [self::RULE_REQUIRED],
            'body' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL]
        ];
    }
    public function labels(): array
    {
        return ['email' => 'Почта', 'body' => 'Сообщение', 'subject' => 'Тема сообщения'];
    }
    public function send()
    {
        return true;
    }
}