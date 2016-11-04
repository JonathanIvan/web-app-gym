<?php
use yii\helpers\Url;
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
    //     [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'idMembresia',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Nombre',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Precio',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'meses',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'horaInicio',
        'value' => function($model){
            return date('g:i a', strtotime($model->horaInicio));
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'horaFinal',
        'value' => function($model){
            return date('g:i a', strtotime($model->horaFinal));
        }
    ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'fechaCreacion',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Estado',
        'value' => function($model){
            return Estado::findOne($model->idEstado)->Estado;
        }
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'idUsuarioCreo',
    // ],
   
  
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   