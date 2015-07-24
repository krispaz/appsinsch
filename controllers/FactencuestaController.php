<?php

namespace app\controllers;

use Yii;
use app\models\Factencuesta;
use app\models\FactencuestaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * FactencuestaController implements the CRUD actions for Factencuesta model.
 */
class FactencuestaController extends Controller
{
    public function behaviors()
    {
        return [
        'access' => [
            'class' => AccessControl::className(),
            'only' => ['create','index'],
            'rules' => [
                [
                    'actions' => [ 'error'],  // permite sin logearse
                    'allow' => true,
                    'roles' => ['10'],
                ],
                [
                    'actions' => ['logout','create','index'], // permite con usuario 10
                    'allow' => true,
                    'roles' => ['@'],
                ],
                [
                    'actions' => ['about'],
                    'allow' => true,
                    'roles' => ['@'],
                    'matchCallback' => function ($rule, $action) {
                        $valid_roles = [User::ROLE_ADMIN, User::ROLE_SUPERUSER];
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

    /**
     * Lists all Factencuesta models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FactencuestaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Factencuesta model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Factencuesta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        // CONEXION A LA BASE DE DATOS PARA REALIZAR CONSULTAS VIA SQL EN LA DB    
        $db = new \yii\db\Connection([
                 'dsn' => 'pgsql:host=localhost;port=5432;dbname=db_sinsch',
                'username' => 'nuestroswawas',
                'password' => '4358',
        ]);
    $db->open();
    
     $nom_tec =   Yii::$app->user->identity-> username;
    $tecnico = $db->createCommand('SELECT 
                                        tecnico.id_tecn
                                      FROM 
                                        public."user", 
                                        public.tecnico
                                      WHERE 
                                        "user".username = tecnico.nombre_corto AND 
                                        tecnico.nombre_corto = :nom_tec', [':nom_tec'=>$nom_tec])     
                                  ->queryScalar();
    
       $model = new Factencuesta();
       $model->num_tom = 2 ;
            
       $model -> fec_ini_tom = '23-07-2015';
       $model -> fec_fin_tom = '23-08-2015';
   $model -> id_tecn = $tecnico;
  //  $model -> id_tecn = $nom_tec;
       
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           
            return $this->redirect(['ninio/create', 'id' => $model->id_enc]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Factencuesta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id_enc]);
            return $this->redirect(['ninio/update', 'id' => $model->id_nin]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Factencuesta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Factencuesta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Factencuesta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Factencuesta::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
  
    
    
}
