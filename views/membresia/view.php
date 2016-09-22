<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Membresia */
?>
<div class="membresia-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idMembresia',
            'Nombre',
            'idEstado',
            'fechaCreacion',
            'Precio',
            'idUsuarioCreo',
            'meses',
            'horaInicio',
            'horaFinal',
        ],
    ]) ?>

</div>
