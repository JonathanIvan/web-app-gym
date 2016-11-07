<?php

use yii\widgets\DetailView;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Configuracion */
?>
<div class="configuracion-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'idConfiguracion',
            'NombreGimnacio',
            'Domicilio',
            'Telefono',
            // 'Logo:image',
            [
            'label' => 'Logo',
            'value' => Yii::$app->getUrlManager()->getBaseUrl().$model->Logo,
            'format' => ['image',['width'=>'100','height'=>'100']],
            ],
            // 'fechaModificacion',
            // 'idUsuarioModifico',
            'mensajeVencimiento',
            'RFC',
            'Mensaje',
        ],
    ]) ?>

</div>
