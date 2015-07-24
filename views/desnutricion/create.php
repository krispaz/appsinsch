<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Desnutricion */

$this->title = Yii::t('app', 'Create Desnutricion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Desnutricions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="desnutricion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
