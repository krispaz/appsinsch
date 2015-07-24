<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ViviendaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vivienda-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_viv') ?>

    <?= $form->field($model, '_____agua_apta_para_consumo_hum')->checkbox() ?>

    <?= $form->field($model, '_____usa_alcant_pzo_sep_letr_ad')->checkbox() ?>

    <?= $form->field($model, '_____cocina_mejorada__r__o_en_c')->checkbox() ?>

    <?= $form->field($model, '_____no_animales_de_consumo_sue')->checkbox() ?>

    <?php // echo $form->field($model, '_____no_animales_domesticos_sue')->checkbox() ?>

    <?php // echo $form->field($model, '_____no_piso_de_tierra__')->checkbox() ?>

    <?php // echo $form->field($model, '_____no_mat_prec__adobe_paja_ca')->checkbox() ?>

    <?php // echo $form->field($model, '_____no_viven_mas_de_3_personas')->checkbox() ?>

    <?php // echo $form->field($model, '_____no_higiene_buena_alrededor')->checkbox() ?>

    <?php // echo $form->field($model, 'pro_viv') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
