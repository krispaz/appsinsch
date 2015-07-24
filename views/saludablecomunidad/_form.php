<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Saludablecomunidad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="saludablecomunidad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sub1_sal_com')->checkbox() ?>

    <?= $form->field($model, '_____madre_c_seg_salud_iess_cam')->checkbox() ?>

    <?= $form->field($model, '_____nino_con_numero_de_identif')->checkbox() ?>

    <?= $form->field($model, '______tiene_c_i___')->checkbox() ?>

    <?= $form->field($model, '______tiene_educacion_primaria_')->checkbox() ?>

    <?= $form->field($model, '_____no__tiene_mas_de_3_dependi')->checkbox() ?>

    <?= $form->field($model, '______recibe_el_bdh__')->checkbox() ?>

    <?= $form->field($model, '______recibe_incentivo_desnutri')->checkbox() ?>

    <?= $form->field($model, '______participo_en_algun_proyec')->checkbox() ?>

    <?= $form->field($model, '______recibio_estimulacion_temp')->checkbox() ?>

    <?= $form->field($model, '______recibio_visita_domiciliar')->checkbox() ?>

    <?= $form->field($model, '______hay_educacion_temprana__c')->checkbox() ?>

    <?= $form->field($model, '______hay_produccion_de_algun_a')->checkbox() ?>

    <?= $form->field($model, '_____atendio_ult_enf__en_1trd_2')->checkbox() ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Guardar Datos') : Yii::t('app', 'Guardar Datos'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
