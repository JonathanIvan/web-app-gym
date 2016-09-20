<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelUsuario, 'Usuario')->textInput(['autofocus' => true]) ?>

    <?= $form->field($modelUsuario, 'Password')->passwordInput() ?>

    <?=$form->field($modelUsuario, 'Nombre')->dropDownList($roles, ['prompt'=>'-Elije un rol-']) ?>

    <?= $form->field($modelSocio, 'Nombre')->textInput(['autofocus' => true]) ?>

    <?= $form->field($modelSocio, 'Paterno')->textInput(['autofocus' => true]) ?>

    <?= $form->field($modelSocio, 'Materno')->textInput(['autofocus' => true]) ?>

    <?= $form->field($modelSocio, 'Telefono')->textInput(['autofocus' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($modelUsuario->isNewRecord ? 'Registrar' : 'Actualizar', ['class' => $modelUsuario->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
