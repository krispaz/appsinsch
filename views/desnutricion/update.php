<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Desnutricion */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Desnutricion',
]) . ' ' . $model->id_des;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Desnutricions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_des, 'url' => ['view', 'id' => $model->id_des]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="desnutricion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
