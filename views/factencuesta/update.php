<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Factencuesta */

$this->title = Yii::t('app', 'Actualizar Datos Encuesta Num: ', [
    'modelClass' => 'Factencuesta',
]) . ' ' . $model->id_enc;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Factencuestas'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id_enc, 'url' => ['view', 'id' => $model->id_enc]];
//$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="factencuesta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
