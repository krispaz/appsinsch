<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vivienda */

$this->title = Yii::t('app', 'Actualizar Datos {modelClass} Id: ', [
    'modelClass' => 'Vivienda',
]) . ' ' . $model->id_viv;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Viviendas'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id_viv, 'url' => ['view', 'id' => $model->id_viv]];
//$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="vivienda-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
