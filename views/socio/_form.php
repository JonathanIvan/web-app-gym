<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Socio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="socio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true, 'placeholder' => 'ej. Roberto Carlos']) ?>

    <?= $form->field($model, 'Paterno')->textInput(['maxlength' => true, 'placeholder' => 'ej. Di Maria']) ?>

    <?= $form->field($model, 'Materno')->textInput(['maxlength' => true, 'placeholder' => 'ej. Vitolo']) ?>

    <?= $form->field($model, 'Telefono')->textInput(['maxlength' => true, 'placeholder' => 'ej. 3312141516']) ?>

    <?= $form->field($model, 'Observaciones')->textInput(['maxlength' => true, 'placeholder' => '....']) ?>



  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
