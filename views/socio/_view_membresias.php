<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Socio */
?>
<div class="socio-view1">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'idSocio',
            // [                      
            //     'label' => 'Número de Membresia',
            //     'value' => $model->idSocioMembresia,
            // ],
            
             [                      // the owner name of the model
                'label' => 'Membresia',
                'value' => $model->idMembresia0->Nombre,
            ],
            [                      // the owner name of the model
                'label' => 'Precio',
                'value' => $model->idMembresia0->Precio,
            ],
            [                      // the owner name of the model
                'label' => 'Fecha de Membresia',
                'value' => date('d/m/Y', strtotime($model->fechaInicioMembresia)),
            ],
             [                      // the owner name of the model
                'label' => 'Fecha de Vencimiento',
                'value' => date('d/m/Y', strtotime(''.$model->idMembresia0->meses.' month', strtotime($model->fechaInicioMembresia) )),
            ],
            [                      // the owner name of the model
                'label' => 'Estado',
                'value' => $model->idEstado0->Estado,
            ],
            // 'idEstado',
            // 'fechaCreacion',
            // 'Nombre',
            // 'Paterno',
            // 'Materno',
            // 'Telefono',
            // 'Observaciones',
            // 'idUsuarioCreo',
            // 'foto',
            // 'idUsuario',
        ],
    ]) 

    ?>

</div>