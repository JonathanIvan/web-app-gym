<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
?>
<div class="usuario-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idUsuario',
            [
            'label' => 'Estado',
            'value' => $model->idEstado0->Estado,
            ],
            [
            'label' => 'Numero de Socio',
            'value' => $model->socios0[0]->idSocio,
            ],
            'Usuario',
            'Nombre',
            'fechaCreacion',
            'Password',
            'Token',
        ],
    ]) ?>

</div>
