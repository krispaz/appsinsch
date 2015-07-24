<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Salud */

$this->title = Yii::t('app', 'Actualizar Datos {modelClass} Id: ', [
    'modelClass' => 'Salud',
]) . ' ' . $model->id_sal;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Saluds'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id_sal, 'url' => ['view', 'id' => $model->id_sal]];
//$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="salud-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
