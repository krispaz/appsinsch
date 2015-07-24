<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SaludSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="salud-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_sal') ?>

    <?= $form->field($model, '_____no_tuvo_fiebre__')->checkbox() ?>

    <?= $form->field($model, '_____no_si_es_gestante__molesti')->checkbox() ?>

    <?= $form->field($model, '_____no_si_es_gestante__dolor_d')->checkbox() ?>

    <?= $form->field($model, '_____no_si_es_gestante__sangrad')->checkbox() ?>

    <?php // echo $form->field($model, '_____no_tuvo_diarrea__')->checkbox() ?>

    <?php // echo $form->field($model, '_____no_tuvo_tos_dol_garg_gripe')->checkbox() ?>

    <?php // echo $form->field($model, '_____no_tuvo_vomito__')->checkbox() ?>

    <?php // echo $form->field($model, 'pro_sal') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
