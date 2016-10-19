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
            'fechaCreacion',
        ],
    ]) ?>

</div>
