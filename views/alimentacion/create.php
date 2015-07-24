<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Alimentacion */

$this->title = Yii::t('app', 'Ingresar Datos Indicador Alimentación');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Alimentacions'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alimentacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
