<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Saludablecomunidad */

$this->title = Yii::t('app', 'Ingresar Datos Indicador Comunidad saludable');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Saludablecomunidads'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="saludablecomunidad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
