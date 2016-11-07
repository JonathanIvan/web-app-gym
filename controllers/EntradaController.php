<?php

namespace app\controllers;

class EntradaController extends \yii\web\Controller
{
	public $layout = "entrada";
	
    public function actionIndex()
    {
        return $this->render('index');
    }

}
