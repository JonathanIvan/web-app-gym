<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */
?>
<div class="producto-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'idProducto',
            'Nombre',
            'Descripcion',
             [
            'label' => 'Estado',
            'value' => $model->idEstado0->Estado,
            ],
            'Precio',
            // 'idUsuarioCreo',
            'Costo',
            [
            'label' => 'Fecha creación',
            'value' => date('d/m/Y g:i a', strtotime($model->fechaCreacion)),
            ]
        ],
    ]) ?>

</div>
