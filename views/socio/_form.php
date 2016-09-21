<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Socio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="socio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idEstado')->textInput() ?>

    <?= $form->field($model, 'fechaCreacion')->textInput() ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Paterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Materno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Observaciones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idUsuarioCreo')->textInput() ?>

    <?= $form->field($model, 'foto')->textInput() ?>

    <?= $form->field($model, 'idUsuario')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
