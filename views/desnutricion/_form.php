<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Desnutricion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="desnutricion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sub1_des')->textInput() ?>

    <?= $form->field($model, 'avance_total__')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
