<?php

use yii\helpers\Html;
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

            // id de socio Membresia
            $idSM = $model->sociomembresias[$key]->idSocioMembresia;

            echo Html::a(
                        '<span class="glyphicon glyphicon-remove"></span>',
                        ['eliminar', 'id' => $idSM], 
                        [
                            'title' => 'Eliminar membresia',
                            "class"=>"right btn btn-circle-micro btn-danger",
                            'role'=>'modal-remote',
                            'data-confirm'=>false, 'data-method'=>false,
                            'data-request-method'=>'post',
                            'data-confirm-title'=>'Eliminar Membresia',
                            'data-confirm-message'=>'¿Estás seguro de esliminar ésta mebresia?',
                            'data-pjax' => '1',
                        ]
                    );

            echo $this->render('_view_membresias', [
                'model' => $model->sociomembresias[$key],
            ]);
        }
        
    }
      ?>

</div>
