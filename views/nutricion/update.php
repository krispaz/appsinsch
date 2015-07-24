<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Nutricion */

$this->title = Yii::t('app', 'Actualizar Datos Indicador  {modelClass} Id: ', [
    'modelClass' => 'Nutricion',
]) . ' ' . $model->id_nut;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nutricions'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id_nut, 'url' => ['view', 'id' => $model->id_nut]];
//$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="nutricion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
