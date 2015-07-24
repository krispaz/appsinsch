<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ninio */

$this->title = Yii::t('app', 'Datos Niño');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ninios'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ninio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
