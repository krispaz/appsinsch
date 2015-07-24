<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ninio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ninio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ci_nin')->textInput() ?>

    <?= $form->field($model, 'nom_nin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ape_nin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edad_meses')->textInput() ?>

    <?= $form->field($model, 'gestante')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Ingresar Indicador 1') : Yii::t('app', 'Actualizar Datos Indicador 1'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
