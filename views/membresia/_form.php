<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Membresia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="membresia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idEstado')->textInput() ?>

    <?= $form->field($model, 'fechaCreacion')->textInput() ?>

    <?= $form->field($model, 'Precio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idUsuarioCreo')->textInput() ?>

    <?= $form->field($model, 'meses')->textInput() ?>

    <?= $form->field($model, 'horaInicio')->textInput() ?>

    <?= $form->field($model, 'horaFinal')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
