<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Factencuesta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="factencuesta-form">

    <?php $form = ActiveForm::begin(); ?>
    
     <?= $form->field($model, 'num_tom')->textInput(['readonly' => true]) ?>
   
     <?= $form->field($model, 'id_tecn')->textInput(['readonly' => true]) ?>
          
     <?= $form->field($model, 'fec_ini_tom')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'fec_fin_tom')->textInput(['readonly' => true]) ?>
    
   <?= $form->field($model, 'fec_enc')-> widget(DatePicker::className(),[
        'dateFormat' => 'yyyy-MM-dd',
       'language' => 'es',
        'clientOptions' => [
            'yearRange' => '-115:+0',
            'changeYear' => true,
                      ]
    ]) ?>
     
    <?= $form->field($model, 'dir_cas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_comu')->dropDownList($model->comboComunidad,['prompt'=>'---Escoja Comunidad---'] )?>


    
    


      

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Ingresar Datos NIño') : Yii::t('app', 'Actualizar Datos NIño'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
