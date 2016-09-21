<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($modelUsuario, 'Usuario')->textInput(['maxlength' => true], ['autofocus' => true]) ?>

    <?= $form->field($modelUsuario, 'Password')->passwordInput(['maxlength' => true]) ?>

    <?=$form->field($modelUsuario, 'Nombre')->dropDownList($roles, ['prompt'=>'-Elije un rol-']) ?>

    <?= $form->field($modelSocio, 'Nombre')->textInput(['autofocus' => true]) ?>

    <?= $form->field($modelSocio, 'Paterno')->textInput(['autofocus' => true]) ?>

    <?= $form->field($modelSocio, 'Materno')->textInput(['autofocus' => true]) ?>

    <?= $form->field($modelSocio, 'Telefono')->textInput(['autofocus' => true]) ?>



  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Registrar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
