<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Estado;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'idSocio',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Nombre',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Paterno',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Materno',
    ],
      [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Telefono',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'fechaCreacion',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Estado',
        'value' => function($modelSocio){
            return Estado::findOne($modelSocio->idEstado)->Estado;
        }
    ],
    
    [
        'class' => 'kartik\grid\ActionColumn',
        'template'=>'{view}{update}{delete}{membresia}{activar}',
        'buttons' => [
            'membresia' => function($url, $model, $key){
                return Html::a(
                            '<span class="glyphicon glyphicon-credit-card"></span>',
                            ['membresia', 'idSocio' => $model->idSocio], 
                            [
                                'title' => 'Agregar Membresia',
                                'role'=>'modal-remote',
                                'data-toggle'=>'tooltip',
                                'data-pjax' => '1',
                            ]
                        );
            },
            'activar' => function ($url, $model, $key) {
                
                 return $model->idEstado == 1 ? 

                        Html::a(
                            '<span class="glyphicon glyphicon-remove"></span>',
                            ['desactivar', 'id' => $model->idSocio], 
                            [
                                'title' => 'Dar de baja al socio',
                                "class"=>"btn btn-circle-micro btn-danger",
                                'role'=>'modal-remote',
                                'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                'data-request-method'=>'post',
                                'data-confirm-title'=>'Desactivar',
                                'data-confirm-message'=>'¿Estás seguro de desactivar al usuario?',
                                'data-pjax' => '1',
                            ]
                        )

                        :

                        Html::a(
                            '<span class="glyphicon glyphicon-ok"></span>',
                            ['activar', 'id' => $model->idSocio], 
                            [
                                'title' => 'Dar de alta al socio',
                                "class"=>"btn btn-circle-micro btn-success",
                                'role'=>'modal-remote',
                                'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                'data-request-method'=>'post',
                                'data-confirm-title'=>'Activar',
                                'data-confirm-message'=>'¿Estás seguro de activar al usuario?',
                                'data-pjax' => '1',
                            ]
                        )

                        ;
            },
        ],
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'Detalles con membresias','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Modificar', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Eliminar', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   