<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NinioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ninio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_nin') ?>

    <?= $form->field($model, 'ci_nin') ?>

    <?= $form->field($model, 'nom_nin') ?>

    <?= $form->field($model, 'ape_nin') ?>

    <?= $form->field($model, 'edad_meses') ?>

    <?php // echo $form->field($model, 'gestante')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
