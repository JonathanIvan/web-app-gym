<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
?>
<div class="usuario-update">

    <?= $this->render('_form', [
        'modelUsuario' => $modelUsuario, 
        'modelSocio' => $modelSocio,
        'roles' => $roles
    ]) ?>

</div>
