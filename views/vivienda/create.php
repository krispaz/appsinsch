<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Vivienda */

$this->title = Yii::t('app', 'Ingresar Datos Indicador Vivienda Saludable');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Viviendas'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vivienda-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
