<?php
use app\models\Configuracion;

/* @var $this yii\web\View */
?>
<div class="panel panel-default">

  <div class="panel-heading"><?php echo Configuracion::findOne(1)->NombreGimnacio; ?></div>

  <div class="panel-body">
  		<h1><?php echo Configuracion::findOne(1)->NombreGimnacio; ?></h1>
  		<label><?php echo Configuracion::findOne(1)->Domicilio; ?></label>
  		<label><?php echo Configuracion::findOne(1)->Telefono; ?></label>
  		<label><?php echo Configuracion::findOne(1)->Mensaje; ?></label>

  </div>

</div>