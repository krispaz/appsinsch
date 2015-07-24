<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Comunidad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comunidad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_comu')->textInput() ?>

    <?= $form->field($model, 'id_cant')->textInput() ?>

    <?= $form->field($model, 'nom_comu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'des_comu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num_vivi')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
