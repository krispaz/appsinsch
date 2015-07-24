<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Alimentacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alimentacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, '_____recibio_lactancia_materna_')->checkbox() ?>

    <?= $form->field($model, '_____recibio_supl__hierro__chis')->checkbox() ?>

    <?= $form->field($model, '_____si_es_gestante__recibio_su')->checkbox() ?>

    <?= $form->field($model, '_____estuvo_al_dia_con_suplemen')->checkbox() ?>

    <?= $form->field($model, '_____no_recibio_algun_alimento_')->checkbox() ?>

    <?= $form->field($model, '_____recibio_3_o_mas_comidas_es')->checkbox() ?>

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Ingresar Indicador 3') : Yii::t('app', 'Actualizar  Indicador 3'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
