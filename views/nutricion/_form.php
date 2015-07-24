<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var app\models\Nutricion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nutricion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sub1_nut')->textInput() ?>

    <?= $form->field($model, 'peso_en_kg_con_un_decimal______')->textInput() ?>

    <?= $form->field($model, 'talla__cm_____')->textInput() ?>

    <?= $form->field($model, '_____no_tuvo_adelgazamiento__p_')->checkbox() ?>

    <?= $form->field($model, '_____no_tuvo_sobrepeso__p_t___')->checkbox() ?>

    <?= $form->field($model, '_____no_baja_ganancia_de_peso__')->checkbox() ?>

    <?= $form->field($model, '_____no_baja_ganancia_de_talla_')->checkbox() ?>
    
    

    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Ingresar Indicador 2') : Yii::t('app', 'Actualizar Indicador 2'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
