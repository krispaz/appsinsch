<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AtencionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="atencion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_ate') ?>

    <?= $form->field($model, '______ultimo_control_pre_nat_se') ?>

    <?= $form->field($model, '______ha_tenido_algun_ex__lab__')->checkbox() ?>

    <?= $form->field($model, '______ha_tenido_al_menos_una_ec')->checkbox() ?>

    <?= $form->field($model, '_____tiene_sus_vacunas_al_dia_p')->checkbox() ?>

    <?php // echo $form->field($model, '_____ha_tenido_su_ultimo_contro')->checkbox() ?>

    <?php // echo $form->field($model, '_____recibio_consejeria_nutrici')->checkbox() ?>

    <?php // echo $form->field($model, '_____nota_a_la_atencion_en_su_s')->checkbox() ?>

    <?php // echo $form->field($model, '_____carne__1_ant_2_nue_3_hc_0_')->checkbox() ?>

    <?php // echo $form->field($model, 'pro_ate') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
