<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Configuracion */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="configuracion-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
    <img alt="105x105" style="height: 200px" class="img-responsive" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(). $model->Logo ?>"/>
    
    <?= $form->field($model, 'NombreGimnacio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Domicilio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Telefono')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'Logo')->textInput() ?> -->
    <?= $form->field($model, 'Logo')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>
    

    <!-- <?= $form->field($model, 'fechaModificacion')->textInput() ?> -->

    <!-- <?= $form->field($model, 'idUsuarioModifico')->textInput() ?> -->

    <?= $form->field($model, 'mensajeVencimiento')->textInput() ?> 

    <?= $form->field($model, 'RFC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Mensaje')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
