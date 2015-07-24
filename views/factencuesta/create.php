<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Factencuesta */

$this->title = Yii::t('app', 'Ingreso Datos Encuesta');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Datos_Enc'), 'url' => ['Inicio']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factencuesta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
