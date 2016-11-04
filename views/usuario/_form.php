<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($modelUsuario, 'Usuario')->textInput(['maxlength' => true, 'placeholder' => 'ej. fmarquez'], ['autofocus' => true]) ?>

    <?= $form->field($modelUsuario, 'Password')->passwordInput(['maxlength' => true, 'placeholder' => 'ej. ********']) ?>

    <?=$form->field($modelUsuario, 'Nombre')->dropDownList($roles, ['prompt'=>'-Elije un rol-']) ?>

    <?= $form->field($modelSocio, 'Nombre')->textInput(['autofocus' => true, 'placeholder' => 'ej. Federico Roberto']) ?>

    <?= $form->field($modelSocio, 'Paterno')->textInput(['autofocus' => true, 'placeholder' => 'ej. Márquez']) ?>

    <?= $form->field($modelSocio, 'Materno')->textInput(['autofocus' => true, 'placeholder' => 'ej. Pérez']) ?>

    <?= $form->field($modelSocio, 'Telefono')->textInput(['autofocus' => true, 'placeholder' => 'ej. 3311121314 (10 dígitos)']) ?>



  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Registrar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
