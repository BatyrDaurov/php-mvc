<?php

namespace app\core\form;

use app\core\Model;

abstract class BaseField
{

    public Model $model;
    public string $attribute;

    public function __construct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }

    abstract public function renderInput(): string;
}