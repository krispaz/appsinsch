<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Vivienda */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vivienda-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, '_____agua_apta_para_consumo_hum')->checkbox() ?>

    <?= $form->field($model, '_____usa_alcant_pzo_sep_letr_ad')->checkbox() ?>

    <?= $form->field($model, '_____cocina_mejorada__r__o_en_c')->checkbox() ?>

    <?= $form->field($model, '_____no_animales_de_consumo_sue')->checkbox() ?>

    <?= $form->field($model, '_____no_animales_domesticos_sue')->checkbox() ?>

    <?= $form->field($model, '_____no_piso_de_tierra__')->checkbox() ?>

    <?= $form->field($model, '_____no_mat_prec__adobe_paja_ca')->checkbox() ?>

    <?= $form->field($model, '_____no_viven_mas_de_3_personas')->checkbox() ?>

    <?= $form->field($model, '_____no_higiene_buena_alrededor')->checkbox() ?>

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Ingresar Indicador 7') : Yii::t('app', 'Actualizar  Indicador 7'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
