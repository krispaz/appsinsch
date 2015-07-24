<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tecnico */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Tecnico',
]) . ' ' . $model->id_tecn;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tecnicos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tecn, 'url' => ['view', 'id' => $model->id_tecn]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tecnico-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
