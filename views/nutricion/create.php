<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Nutricion */

$this->title = Yii::t('app', 'Ingresar datos Indicador Nutrición');

//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nutricions'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nutricion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
