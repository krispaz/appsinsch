<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CuidadoresSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cuidadores-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cui') ?>

    <?= $form->field($model, '_____padre_estuvo_con_nino_ayer')->checkbox() ?>

    <?= $form->field($model, '_____madre_dio_de_comer_al_nino')->checkbox() ?>

    <?= $form->field($model, '______fue_su_madre_o_padre__')->checkbox() ?>

    <?= $form->field($model, '______fue_mayor_de_edad__18____')->checkbox() ?>

    <?php // echo $form->field($model, '______lee_y_escribe_castellano_')->checkbox() ?>

    <?php // echo $form->field($model, '______asistio_a_sesion_demostra')->checkbox() ?>

    <?php // echo $form->field($model, '______recibio_capacitacion_en_e')->checkbox() ?>

    <?php // echo $form->field($model, '______recibio_consejeria_en_pla')->checkbox() ?>

    <?php // echo $form->field($model, '______conoce_lo_que_es_educacio')->checkbox() ?>

    <?php // echo $form->field($model, 'pro_cui') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
