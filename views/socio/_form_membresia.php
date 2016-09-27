<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Socio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="socio-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?=$form->field($model, 'idMembresia')->dropDownList($membresias, ['prompt'=>'-Elije una membresia-']) ?>

    <?php
       echo '<label class="control-label">Comienza</label>';
        echo DatePicker::widget([
            'name' => 'Sociomembresia[fechaInicioMembresia]',
            'type' => DatePicker::TYPE_COMPONENT_PREPEND,
            'value' => date('d/m/Y'),
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'dd/mm/yyyy'
            ]
        ]);
        ?>

     <?= $form->field($modelSocio, 'Observaciones')->textInput(['maxlength' => true]) ?>

     <?= $form->field($modelSocio, 'Nombre')->textInput(['maxlength' => true, 'readonly'=>true]) ?>

    <?= $form->field($modelSocio, 'Paterno')->textInput(['maxlength' => true, 'readonly'=>true]) ?>

    <?= $form->field($modelSocio, 'Materno')->textInput(['maxlength' => true, 'readonly'=>true]) ?>

    <?= $form->field($modelSocio, 'Telefono')->textInput(['maxlength' => true, 'readonly'=>true]) ?>




  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
