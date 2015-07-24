<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Atencion */

$this->title = Yii::t('app', 'Ingresar Datos Indicador Atención');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Atencions'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atencion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
