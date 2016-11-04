<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Membresia */
/* @var $form yii\widgets\ActiveForm */
$horarios = [
            '06:00:00' => '6:00 am', 
            '06:30:00' => '6:30 am', 
            '07:00:00' => '7:00 am', 
            '07:30:00' => '7:30 am', 
            '08:00:00' => '8:00 am', 
            '08:30:00' => '8:30 am', 
            '09:00:00' => '9:00 am', 
            '09:30:00' => '9:30 am', 
            '10:00:00' => '10:00 am', 
            '10:30:00' => '10:30 am', 
            '11:00:00' => '11:00 am', 
            '11:30:00' => '11:30 am', 
            '12:00:00' => '12:00 am', 
            '12:30:00' => '12:30 am', 
            '13:00:00' => '1:00 pm',
            '13:30:00' => '1:30 pm',
            '14:00:00' => '2:00 pm',
            '14:30:00' => '2:30 pm',
            '15:00:00' => '3:00 pm',
            '15:30:00' => '3:30 pm',
            '16:00:00' => '4:00 pm',
            '16:30:00' => '4:30 pm',
            '17:00:00' => '5:00 pm',
            '17:30:00' => '5:30 pm',
            '18:00:00' => '6:00 pm',
            '18:30:00' => '6:30 pm',
            '19:00:00' => '7:00 pm',
            '19:30:00' => '7:30 pm',
            '20:00:00' => '8:00 pm',
            '20:30:00' => '8:30 pm',
            '21:00:00' => '9:00 pm',
            '21:30:00' => '9:30 pm',
            '22:00:00' => '10:00 pm',  
            '22:30:00' => '10:30 pm',
            '23:00:00' => '11:00 pm',  
            ]
?>

<div class="membresia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true, 'placeholder' => 'ej. 3 meses']) ?>

    <?= $form->field($model, 'Precio')->textInput(['maxlength' => true, 'placeholder' => 'ej. 300']) ?>

    <?= $form->field($model, 'meses')->textInput(['placeholder' => 'ej. 3']) ?>

    <?= $form->field($model, 'horaInicio')->dropDownList($horarios, ['prompt'=>'-Elije hora de inicio-']) ?>

    <?= $form->field($model, 'horaFinal')->dropDownList($horarios, ['prompt'=>'-Elije hora final-']) ?>


  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
