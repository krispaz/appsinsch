<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cuidadores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cuidadores-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, '_____padre_estuvo_con_nino_ayer')->checkbox() ?>

    <?= $form->field($model, '_____madre_dio_de_comer_al_nino')->checkbox() ?>

    <?= $form->field($model, '______fue_su_madre_o_padre__')->checkbox() ?>

    <?= $form->field($model, '______fue_mayor_de_edad__18____')->checkbox() ?>

    <?= $form->field($model, '______lee_y_escribe_castellano_')->checkbox() ?>

    <?= $form->field($model, '______asistio_a_sesion_demostra')->checkbox() ?>

    <?= $form->field($model, '______recibio_capacitacion_en_e')->checkbox() ?>

    <?= $form->field($model, '______recibio_consejeria_en_pla')->checkbox() ?>

    <?= $form->field($model, '______conoce_lo_que_es_educacio')->checkbox() ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Ingresar Indicador 6') : Yii::t('app', 'Actualizar  Indicador 6'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
