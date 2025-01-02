<?php

use app\core\form\TextareaField;
$form = \app\core\form\Form::begin('', 'post');

echo "<div class='col'>" . $form->field($model, 'subject') . "</div>";
echo "<div class='col'>" . $form->field($model, 'email') . "</div>";
echo "<div class='col'>" . new TextareaField($model, 'body') . "</div>"; ?>

<button type="submit" class="btn btn-primary">Submit</button>

<? \app\core\form\Form::end(); ?>