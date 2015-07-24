<?php

namespace app\controllers;

use Yii;
use app\models\Nutricion;
use app\models\NutricionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NutricionController implements the CRUD actions for Nutricion model.
 */
class NutricionController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Nutricion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NutricionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Nutricion model.
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
     * Creates a new Nutricion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Nutricion();

if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id_nut]);
            //Modificar con el ID del indicador en la encuesta
            $model_encuesta = \app\models\Factencuesta::findOne($id);
            $model_encuesta->id_nut = $model -> id_nut;
            $model_encuesta ->save();
            return $this->redirect(['alimentacion/create', 'id' => $id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Nutricion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
         $model = new Nutricion();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
             $model_encuesta = \app\models\Factencuesta::findOne($id);
            $model_encuesta->id_nut = $model -> id_nut;
            $model_encuesta ->save();
            return $this->redirect(['alimentacion/update', 'id' => $model_encuesta->id_ali ]);
            //return $this->redirect(['view', 'id' => $model->id_nut]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Nutricion model.
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
     * Finds the Nutricion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Nutricion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Nutricion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        }
        
        
        public function actionPromedio($sum1 = 27 , $sum2 = 30)
        {
          
             //$model = new Nutricion();
            $prom = $sum1 + $sum2;
           return $this->redirect(['nutricion/create', 'prom' => $prom]);        
            
        }
}

