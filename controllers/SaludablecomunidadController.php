<?php

namespace app\controllers;

use Yii;
use app\models\Saludablecomunidad;
use app\models\SaludablecomunidadSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SaludablecomunidadController implements the CRUD actions for Saludablecomunidad model.
 */
class SaludablecomunidadController extends Controller
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
     * Lists all Saludablecomunidad models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SaludablecomunidadSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Saludablecomunidad model.
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
     * Creates a new Saludablecomunidad model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Saludablecomunidad();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id_sal_com]);
            //Modificar con el ID del indicador en la encuesta
            $model_encuesta = \app\models\Factencuesta::findOne($id);
            $model_encuesta->id_sal_com = $model -> id_sal_com;
            $model_encuesta ->save();
            return $this->redirect(['factencuesta/view', 'id' => $id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             $model_encuesta = \app\models\Factencuesta::findOne($id);
            $model_encuesta->id_sal_com = $model -> id_sal_com;
            $model_encuesta ->save();
            return $this->redirect(['factencuesta/view', 'id' => $model_encuesta->id_enc]);
            //return $this->redirect(['view', 'id' => $model->id_sal_com]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Saludablecomunidad model.
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
     * Finds the Saludablecomunidad model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Saludablecomunidad the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Saludablecomunidad::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
