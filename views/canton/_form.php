<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Canton */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="canton-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_cant')->textInput() ?>

    <?= $form->field($model, 'id_prov')->textInput() ?>

    <?= $form->field($model, 'nom_cant')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'desc_cant')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
