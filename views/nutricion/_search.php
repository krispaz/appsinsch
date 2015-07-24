<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NutricionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nutricion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_nut') ?>

    <?= $form->field($model, 'sub1_nut') ?>

    <?= $form->field($model, 'peso_en_kg_con_un_decimal______') ?>

    <?= $form->field($model, 'talla__cm_____') ?>

    <?= $form->field($model, '_____no_tuvo_adelgazamiento__p_')->checkbox() ?>

    <?php // echo $form->field($model, '_____no_tuvo_sobrepeso__p_t___')->checkbox() ?>

    <?php // echo $form->field($model, '_____no_baja_ganancia_de_peso__')->checkbox() ?>

    <?php // echo $form->field($model, '_____no_baja_ganancia_de_talla_')->checkbox() ?>

    <?php // echo $form->field($model, 'pro_nut') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
