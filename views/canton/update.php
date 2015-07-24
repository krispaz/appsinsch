<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Canton */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Canton',
]) . ' ' . $model->id_cant;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cantons'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cant, 'url' => ['view', 'id' => $model->id_cant]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="canton-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
