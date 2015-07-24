<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tecnico */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tecnico-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_cant')->textInput() ?>

    <?= $form->field($model, 'ci_tecn')->textInput() ?>

    <?= $form->field($model, 'nom_tecn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ape_tecn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'obs_tecn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num_viv_asig')->textInput() ?>

    <?= $form->field($model, 'nombre_corto')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Guardar') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
