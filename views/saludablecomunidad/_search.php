<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SaludablecomunidadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="saludablecomunidad-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_sal_com') ?>

    <?= $form->field($model, 'sub1_sal_com')->checkbox() ?>

    <?= $form->field($model, '_____madre_c_seg_salud_iess_cam')->checkbox() ?>

    <?= $form->field($model, '_____nino_con_numero_de_identif')->checkbox() ?>

    <?= $form->field($model, '______tiene_c_i___')->checkbox() ?>

    <?php // echo $form->field($model, '______tiene_educacion_primaria_')->checkbox() ?>

    <?php // echo $form->field($model, '_____no__tiene_mas_de_3_dependi')->checkbox() ?>

    <?php // echo $form->field($model, '______recibe_el_bdh__')->checkbox() ?>

    <?php // echo $form->field($model, '______recibe_incentivo_desnutri')->checkbox() ?>

    <?php // echo $form->field($model, '______participo_en_algun_proyec')->checkbox() ?>

    <?php // echo $form->field($model, '______recibio_estimulacion_temp')->checkbox() ?>

    <?php // echo $form->field($model, '______recibio_visita_domiciliar')->checkbox() ?>

    <?php // echo $form->field($model, '______hay_educacion_temprana__c')->checkbox() ?>

    <?php // echo $form->field($model, '______hay_produccion_de_algun_a')->checkbox() ?>

    <?php // echo $form->field($model, '_____atendio_ult_enf__en_1trd_2')->checkbox() ?>

    <?php // echo $form->field($model, 'pro_sal_com') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
