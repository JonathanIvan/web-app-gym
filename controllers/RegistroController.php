<?php

namespace app\controllers;

use Yii;
use app\models\Usuario;
use app\models\Socio;
use app\models\User;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\Roles;

class RegistroController extends Controller
{
	/**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            $valid_roles = ["admin"];
                            return User::roleInArray($valid_roles) && User::isActive();
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
    	$modelUsuario = new Usuario();
    	$modelSocio = new Socio();
		$roles = ArrayHelper::map(Roles::find()->asArray()->all(), 'nombre', 'nombre');


    	if($modelUsuario->load(Yii::$app->request->post()) && $modelUsuario->validate() ){
    		if($modelUsuario->load(Yii::$app->request->post()) && $modelUsuario->validate() ){

    			echo $modelUsuario->Nombre;

    			return;
    		}
    		
    	}

        return $this->render('index', [
        	'modelUsuario' => $modelUsuario, 
        	'modelSocio' => $modelSocio,
        	'roles' => $roles
        	]);
    }

}
