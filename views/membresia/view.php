<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Membresia */
?>
<div class="membresia-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Nombre',
            'Precio',
            'meses',
            [
            'label' => 'Hora entrada',
            'value' => date('g:i a', strtotime($model->horaInicio)),
            ],
            [
            'label' => 'Hora salida',
            'value' => date('g:i a', strtotime($model->horaFinal)),
            ],
        ],
    ]) ?>

</div>
