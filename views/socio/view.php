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
            // 'idSocio',
            [                      
                'label' => 'Número de Socio',
                'value' => $model->idSocio,
            ],
             [                      
                'label' => 'Nombre de Socio',
                'value' => $model->Nombre. " ".$model->Paterno." ".$model->Materno,
            ],
            // [                      // the owner name of the model
            //     'label' => 'Estado',
            //     'value' => $model->idEstado0->Estado,
            // ],
            //  [                      // the owner name of the model
            //     'label' => 'Membresia',
            //     'value' => $model->sociomembresias[0]->idMembresia,
            // ],
            // 'idEstado',
            // 'fechaCreacion',
            // 'Nombre',
            // 'Paterno',
            // 'Materno',
            'Telefono',
            'Observaciones',
            // 'idUsuarioCreo',
            // 'foto',
            // 'idUsuario',
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
