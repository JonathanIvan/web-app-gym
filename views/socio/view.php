<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Socio */
?>
<div class="socio-view">
 <label>Datos del Socio</label>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [                      
                'label' => 'Número de Socio',
                'value' => $model->idSocio,
            ],
             [                      
                'label' => 'Nombre de Socio',
                'value' => $model->Nombre. " ".$model->Paterno." ".$model->Materno,
            ],

            'Telefono',
            'Observaciones',
        ],
    ]) 

    ?>
 <label>Datos de Membresias:</label><br>
    <?php
    foreach ($model->sociomembresias as $key => $value) {
        
        if($model->sociomembresias[$key]->idEstado != 3){
            echo $this->render('_view_membresias', [
                'model' => $model->sociomembresias[$key],
            ]);
        }
        
    }
      ?>

</div>
