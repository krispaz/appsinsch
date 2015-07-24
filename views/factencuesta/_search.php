<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FactencuestaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="factencuesta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_enc') ?>

    <?= $form->field($model, 'id_tecn') ?>

    <?= $form->field($model, 'id_comu') ?>

    <?= $form->field($model, 'id_nin') ?>

    <?= $form->field($model, 'id_ali') ?>

    <?php // echo $form->field($model, 'id_nut') ?>

    <?php // echo $form->field($model, 'id_sal') ?>

    <?php // echo $form->field($model, 'id_ate') ?>

    <?php // echo $form->field($model, 'id_des') ?>

    <?php // echo $form->field($model, 'id_cui') ?>

    <?php // echo $form->field($model, 'id_viv') ?>

    <?php // echo $form->field($model, 'id_sal_com') ?>

    <?php // echo $form->field($model, 'num_tom') ?>

    <?php // echo $form->field($model, 'fec_enc') ?>

    <?php // echo $form->field($model, 'dir_cas') ?>

    <?php // echo $form->field($model, 'fec_ini_tom') ?>

    <?php // echo $form->field($model, 'fec_fin_tom') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
