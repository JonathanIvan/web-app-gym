<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Membresia */

$this->title = 'Update Membresia: ' . $model->idMembresia;
$this->params['breadcrumbs'][] = ['label' => 'Membresias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idMembresia, 'url' => ['view', 'id' => $model->idMembresia]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="membresia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
