<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$this->title = 'Registro Usuarios';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="registro">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>completa los siguientes campos:</p>
<hr>
    <?php $form = ActiveForm::begin([
        'id' => 'registro-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($modelUsuario, 'Usuario')->textInput(['autofocus' => true]) ?>

        <?= $form->field($modelUsuario, 'Password')->passwordInput() ?>

        <?=$form->field($modelUsuario, 'Nombre')->dropDownList($roles, ['prompt'=>'-Elije un rol-']) ?>

        <?= $form->field($modelSocio, 'Nombre')->textInput(['autofocus' => true]) ?>

        <?= $form->field($modelSocio, 'Paterno')->textInput(['autofocus' => true]) ?>

        <?= $form->field($modelSocio, 'Materno')->textInput(['autofocus' => true]) ?>

        <?= $form->field($modelSocio, 'Telefono')->textInput(['autofocus' => true]) ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Registrar', ['class' => 'btn btn-primary', 'name' => 'registrar-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>


</div>
