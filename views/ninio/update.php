<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ninio */

$this->title = Yii::t('app', 'Actualizar Datos Niño Id: ', [
    'modelClass' => 'Ninio',
]) . ' ' . $model->id_nin;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ninios'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id_nin, 'url' => ['view', 'id' => $model->id_nin]];
//$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ninio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
