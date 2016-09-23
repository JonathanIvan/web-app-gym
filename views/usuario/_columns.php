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
        'attribute'=>'Usuario',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Nombre',
    ],
     [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'fechaCreacion',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Estado',
        'value' => function($modelUsuario){
            return Estado::findOne($modelUsuario->idEstado)->Estado;
        }
    ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'idEstado',
    //     'value' => function($modelUsuario){
    //         return Estado::findOne($modelUsuario->idEstado)->Estado;
    //     }
    // ],    
    
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'idEstado0',
    //     'value' => function($modelUsuario){
    //         return Estado::findOne($modelUsuario->idEstado)->Estado;
    //     }
    // ],
   
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'Password',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'Token',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'template'=>'{view}{update}{delete}{activar}',
        'buttons' => [
            'activar' => function ($url, $modelUsuario, $key) {
                
                 return $modelUsuario->idEstado == 1 ? 

                        Html::a(
                            '<span class="glyphicon glyphicon-remove"></span>',
                            ['desactivar', 'id' => $modelUsuario->idUsuario], 
                            [
                                'title' => 'Desactivar',
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
                            ['activar', 'id' => $modelUsuario->idUsuario], 
                            [
                                'title' => 'Activar',
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

        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        // 'activeOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   