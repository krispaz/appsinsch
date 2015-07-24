<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cuidadores */

$this->title = Yii::t('app', 'Ingresar Datos Indicador Cuidadores Preparados');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cuidadores'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuidadores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
