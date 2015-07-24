<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Atencion */

$this->title = Yii::t('app', 'Actualizar Datos Atención Id: ', [
    'modelClass' => 'Atencion',
]) . ' ' . $model->id_ate;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Atencions'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id_ate, 'url' => ['view', 'id' => $model->id_ate]];
//$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="atencion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
