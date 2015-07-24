<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TecnicoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tecnico-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_tecn') ?>

    <?= $form->field($model, 'id_cant') ?>

    <?= $form->field($model, 'ci_tecn') ?>

    <?= $form->field($model, 'nom_tecn') ?>

    <?= $form->field($model, 'ape_tecn') ?>

    <?php // echo $form->field($model, 'obs_tecn') ?>

    <?php // echo $form->field($model, 'num_viv_asig') ?>

    <?php // echo $form->field($model, 'nombre_corto') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
