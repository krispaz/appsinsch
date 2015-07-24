<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Salud */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="salud-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, '_____no_tuvo_fiebre__')->checkbox() ?>

    <?= $form->field($model, '_____no_si_es_gestante__molesti')->checkbox() ?>

    <?= $form->field($model, '_____no_si_es_gestante__dolor_d')->checkbox() ?>

    <?= $form->field($model, '_____no_si_es_gestante__sangrad')->checkbox() ?>

    <?= $form->field($model, '_____no_tuvo_diarrea__')->checkbox() ?>

    <?= $form->field($model, '_____no_tuvo_tos_dol_garg_gripe')->checkbox() ?>

    <?= $form->field($model, '_____no_tuvo_vomito__')->checkbox() ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Ingresar Indicador 4') : Yii::t('app', 'Actualizar  Indicador 4'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
