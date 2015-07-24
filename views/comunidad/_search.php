<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ComunidadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comunidad-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_comu') ?>

    <?= $form->field($model, 'id_cant') ?>

    <?= $form->field($model, 'nom_comu') ?>

    <?= $form->field($model, 'des_comu') ?>

    <?= $form->field($model, 'num_vivi') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
