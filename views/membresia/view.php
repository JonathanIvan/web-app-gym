<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Membresia */

$this->title = $model->idMembresia;
$this->params['breadcrumbs'][] = ['label' => 'Membresias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="membresia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idMembresia], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idMembresia], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

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
