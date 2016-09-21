<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MembresiaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="membresia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idMembresia') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'idEstado') ?>

    <?= $form->field($model, 'fechaCreacion') ?>

    <?= $form->field($model, 'Precio') ?>

    <?php // echo $form->field($model, 'idUsuarioCreo') ?>

    <?php // echo $form->field($model, 'meses') ?>

    <?php // echo $form->field($model, 'horaInicio') ?>

    <?php // echo $form->field($model, 'horaFinal') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
