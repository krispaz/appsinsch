<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Alimentacion */

$this->title = Yii::t('app', 'Actualizar Datos Alimentación Id: ', [
    'modelClass' => 'Alimentacion',
]) . ' ' . $model->id_ali;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Alimentacions'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id_ali, 'url' => ['view', 'id' => $model->id_ali]];
//$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="alimentacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
