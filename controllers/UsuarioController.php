<?php

namespace app\controllers;

use Yii;
use app\models\Usuario;
use app\models\UsuarioSearch;
use app\models\User;
use app\models\Socio;
use app\models\Roles;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use \yii\web\Response;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\db\Expression;

/**
 * UsuarioController implements the CRUD actions for Usuario model.
 */
class UsuarioController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'activar', 'desactivar'],
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
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Usuario models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new UsuarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Usuario model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Usuario #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Cerrar',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Modificar',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new Usuario model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;

        $idUsuarioLogueado = Yii::$app->user->identity->id;
        $modelUsuario = new Usuario();
        $modelSocio = new Socio();
        $roles = ArrayHelper::map(Roles::find()->asArray()->all(), 'nombre', 'nombre');

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Registrar usuario",
                    'content'=>$this->renderAjax('create', [
                        'modelUsuario' => $modelUsuario, 
                        'modelSocio' => $modelSocio,
                        'roles' => $roles
                    ]),
                    'footer'=> Html::button('Cerrar',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Resgistrar',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($modelUsuario->load($request->post()) && $modelUsuario->validate()){
                
                if($modelSocio->load($request->post()) && $modelSocio->validate() ){

                    $modelUsuario->idEstado = 1;                    
                    $modelUsuario->fechaCreacion = new Expression('NOW()');
                    $modelUsuario->Password = sha1($modelUsuario->Password);
                    $modelUsuario->Token = sha1($modelUsuario->Usuario . $modelUsuario->Nombre);

                    if($modelUsuario->save()){

                        $modelSocio->idEstado = 1;    
                        $modelSocio->fechaCreacion = new Expression('NOW()');

                        $modelSocio->idUsuarioCreo = $idUsuarioLogueado;
                        $modelSocio->idUsuario = $modelUsuario->idUsuario;

                        if($modelSocio->save()){
                            return [
                            'forceReload'=>'#crud-datatable-pjax',
                            'title'=> "Crear usuario",
                            'content'=>'<span class="text-success">Usuario creado con éxito</span>',
                            'footer'=> Html::button('Cerrar',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                    Html::a('Registrar otro',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
                
                            ];  
                        }
                    
                    }                    
                    
                }
                       
            }else{           
                return [
                    'title'=> "Registrar usuario",
                    'content'=>$this->renderAjax('create', [
                        'modelUsuario' => $modelUsuario, 
                        'modelSocio' => $modelSocio,
                        'roles' => $roles
                    ]),
                    'footer'=> Html::button('Cerrar',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Registrar',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($modelUsuario->load($request->post()) && $modelUsuario->save()) {
                return $this->redirect(['view', 'id' => $modelUsuario->idUsuario]);
            } else {
                return $this->render('create', [
                    'modelUsuario' => $modelUsuario, 
                    'modelSocio' => $modelSocio,
                    'roles' => $roles
                ]);
            }
        }
       
    }

    /**
     * Updates an existing Usuario model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $modelUsuario = $this->findModel($id);       
        $modelSocio = $this->findModelSocio($modelUsuario->idUsuario);
        $roles = ArrayHelper::map(Roles::find()->asArray()->all(), 'nombre', 'nombre');

        $PasswordAnterior = $modelUsuario->Password;
        $modelUsuario->Password = "";

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Modificar usuario #".$id,
                    'content'=>$this->renderAjax('update', [
                        'modelUsuario' => $modelUsuario, 
                        'modelSocio' => $modelSocio,
                        'roles' => $roles
                    ]),
                    'footer'=> Html::button('Cerrar',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Modificar',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($modelUsuario->load($request->post()) && $modelUsuario->validate()){

                if($modelSocio->load($request->post()) && $modelSocio->validate() ){

                    $modelUsuario->Password = sha1($modelUsuario->Password);

                    if($modelUsuario->save() && $modelSocio->save() ){

                            return [
                            'forceReload'=>'#crud-datatable-pjax',
                            'title'=> "Usuario #".$id,
                            'content'=>'<span class="text-success">Usuario modificado con éxito</span>',
                            'footer'=> Html::button('Cerrar',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                    Html::a('Regresar a modificar',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                
                            ];  
                    
                    }                    
                    
                }
                // return [
                //     'forceReload'=>'#crud-datatable-pjax',
                //     'title'=> "Usuario #".$id,
                //     'content'=>$this->renderAjax('view', [
                //         'model' => $model,
                //     ]),
                //     'footer'=> Html::button('Cerrar',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                //             Html::a('Modificar',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                // ];    
            }else{
                 return [
                    'title'=> "Modificar Usuario #".$id,
                    'content'=>$this->renderAjax('update', [
                        'modelUsuario' => $modelUsuario, 
                        'modelSocio' => $modelSocio,
                        'roles' => $roles
                    ]),
                    'footer'=> Html::button('Cerrar',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Modificar',['class'=>'btn btn-primary','type'=>"submit"])
                ];        
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($modelUsuario->load($request->post()) && $modelUsuario->validate()) {

                if($modelSocio->load($request->post()) && $modelSocio->validate() ){

                    $modelUsuario->Password = sha1($modelUsuario->Password);

                    if($modelUsuario->save() && $modelSocio->save() ){

                        return $this->redirect(['view', 'id' => $modelUsuario->idUsuario]);                         
                    
                    }                    
                    
                }
            } else {
                return $this->render('update', [
                    'modelUsuario' => $modelUsuario, 
                        'modelSocio' => $modelSocio,
                        'roles' => $roles
                ]);
            }
        }
    }

    /**
     * Delete an existing Usuario model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        
        $modelUsuario = $this->findModel($id);
        $modelUsuario->idEstado = 3;
        $modelUsuario->save();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

     /**
     * Delete multiple existing Usuario model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete()
    {        
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
       
    }


        // $request = Yii::$app->request;
        
        // $modelUsuario = $this->findModel($id);
        // $modelUsuario->idEstado = 3;
        // $modelUsuario->save();

        // if($request->isAjax){
        //     /*
        //     *   Process for ajax request
        //     */
        //     Yii::$app->response->format = Response::FORMAT_JSON;
        //     return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        // }else{
        //     /*
        //     *   Process for non-ajax request
        //     */
        //     return $this->redirect(['index']);
        // }
    public function actionDesactivar($id)
    {
        $request = Yii::$app->request;

        $modelUsuario = $this->findModel($id);
        $modelUsuario->idEstado = 2;
        $modelUsuario->save();

        if($request->isAjax)
        {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        }else{
             Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
            // return $this->redirect(['index']);
        }

    }

    /**
     * Finds the Usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelSocio($idUsuario)
    {
        if (($model = Socio::find()->where(['idUsuario' => $idUsuario])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
