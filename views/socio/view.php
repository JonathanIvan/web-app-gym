<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Socio */
?>
<div class="socio-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idSocio',
            'idEstado',
            'fechaCreacion',
            'Nombre',
            'Paterno',
            'Materno',
            'Telefono',
            'Observaciones',
            'idUsuarioCreo',
            'foto',
            'idUsuario',
        ],
    ]) ?>

</div>
