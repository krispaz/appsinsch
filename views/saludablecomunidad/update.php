<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Saludablecomunidad */

$this->title = Yii::t('app', 'Actualizar Datos Comunidad Saludable Id: ', [
    'modelClass' => 'Saludablecomunidad',
]) . ' ' . $model->id_sal_com;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Saludablecomunidads'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id_sal_com, 'url' => ['view', 'id' => $model->id_sal_com]];
//$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="saludablecomunidad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
