<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Atencion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="atencion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, '______ultimo_control_pre_nat_se')-> widget(DatePicker::className(),[
        'dateFormat' => 'yyyy-MM-dd',
       'language' => 'es',
        'clientOptions' => [
            'yearRange' => '-115:+0',
            'changeYear' => true,
                      ]
    ]) ?>

    <?= $form->field($model, '______ha_tenido_algun_ex__lab__')->checkbox() ?>

    <?= $form->field($model, '______ha_tenido_al_menos_una_ec')->checkbox() ?>

    <?= $form->field($model, '_____tiene_sus_vacunas_al_dia_p')->checkbox() ?>

    <?= $form->field($model, '_____ha_tenido_su_ultimo_contro')->checkbox() ?>

    <?= $form->field($model, '_____recibio_consejeria_nutrici')->checkbox() ?>

    <?= $form->field($model, '_____nota_a_la_atencion_en_su_s')->checkbox() ?>

    <?= $form->field($model, '_____carne__1_ant_2_nue_3_hc_0_')->checkbox() ?>

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Ingresar Indicador 5') : Yii::t('app', 'Actualizar  Indicador 5'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
