<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Socio */

?>
<div class="socio-create">
    <?= $this->render('_form_membresia', [
        'model' => $model,
        'membresias'=>$membresias,
        'modelSocio' => $modelSocio


    ]) ?>
</div>