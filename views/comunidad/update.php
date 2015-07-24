<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Comunidad */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Comunidad',
]) . ' ' . $model->id_comu;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comunidads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_comu, 'url' => ['view', 'id' => $model->id_comu]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="comunidad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
