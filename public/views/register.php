<h1>Create account</h1>

<?php
$form = \app\core\form\Form::begin('', 'post');

echo "<div class='col'>" . $form->field($model, 'firstname') . "</div>";
echo "<div class='col'>" . $form->field($model, 'lastname') . "</div>";
echo "<div class='col'>" . $form->field($model, 'email') . "</div>";
echo "<div class='col'>" . $form->field($model, 'password')->passwordField() . "</div>";
echo "<div class='col'>" . $form->field($model, 'passwordConfirm')->passwordField() . "</div>"; ?>

<button type="submit" class="btn btn-primary">Submit</button>

<? \app\core\form\Form::end(); ?>