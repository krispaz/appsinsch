<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cuidadores */

$this->title = Yii::t('app', 'Actualizar Datos {modelClass} Id: ', [
    'modelClass' => 'Cuidadores',
]) . ' ' . $model->id_cui;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cuidadores'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id_cui, 'url' => ['view', 'id' => $model->id_cui]];
//$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cuidadores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
