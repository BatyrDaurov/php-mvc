<?php /** @var $model \app\models\User */ ?>

<h1>Login</h1>
<?php
$form = \app\core\form\Form::begin('', 'post');

echo "<div class='col'>" . $form->field($model, 'email') . "</div>";
echo "<div class='col'>" . $form->field($model, 'password')->passwordField() . "</div>"; ?>

<button type="submit" class="btn btn-primary">Submit</button>

<? \app\core\form\Form::end(); ?>