<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MembresiaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Membresias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="membresia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Membresia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idMembresia',
            'Nombre',
            'idEstado',
            'fechaCreacion',
            'Precio',
            // 'idUsuarioCreo',
            // 'meses',
            // 'horaInicio',
            // 'horaFinal',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
