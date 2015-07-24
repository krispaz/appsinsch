<?php

namespace app\controllers;

use Yii;
use app\models\Alimentacion;
use app\models\AlimentacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AlimentacionController implements the CRUD actions for Alimentacion model.
 */
class AlimentacionController extends Controller
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
     * Lists all Alimentacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlimentacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Alimentacion model.
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
     * Creates a new Alimentacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Alimentacion();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id_ali]);
             //Modificar con el ID del indicador en la encuesta
            $model_encuesta = \app\models\Factencuesta::findOne($id);
            $model_encuesta->id_ali = $model -> id_ali;
            $model_encuesta ->save();
            return $this->redirect(['salud/create', 'id' => $id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

 
     
    public function actionUpdate($id)
    {
         $model = new Alimentacion();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            $model_encuesta = \app\models\Factencuesta::findOne($id);
            $model_encuesta->id_ali = $model -> id_ali;
            $model_encuesta ->save();
            return $this->redirect(['salud/update', 'id' => $model_encuesta->id_sal]);
            //return $this->redirect(['view', 'id' => $model->id_ali]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Alimentacion model.
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
     * Finds the Alimentacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Alimentacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Alimentacion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
