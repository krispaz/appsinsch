<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AlimentacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alimentacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_ali') ?>

    <?= $form->field($model, '_____recibio_lactancia_materna_')->checkbox() ?>

    <?= $form->field($model, '_____recibio_supl__hierro__chis')->checkbox() ?>

    <?= $form->field($model, '_____si_es_gestante__recibio_su')->checkbox() ?>

    <?= $form->field($model, '_____estuvo_al_dia_con_suplemen')->checkbox() ?>

    <?php // echo $form->field($model, '_____no_recibio_algun_alimento_')->checkbox() ?>

    <?php // echo $form->field($model, '_____recibio_3_o_mas_comidas_es')->checkbox() ?>

    <?php // echo $form->field($model, 'pro_ali') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
