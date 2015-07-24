<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Vivienda */

$this->title = $model->id_viv;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Viviendas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vivienda-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_viv], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_viv], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_viv',
            '_____agua_apta_para_consumo_hum:boolean',
            '_____usa_alcant_pzo_sep_letr_ad:boolean',
            '_____cocina_mejorada__r__o_en_c:boolean',
            '_____no_animales_de_consumo_sue:boolean',
            '_____no_animales_domesticos_sue:boolean',
            '_____no_piso_de_tierra__:boolean',
            '_____no_mat_prec__adobe_paja_ca:boolean',
            '_____no_viven_mas_de_3_personas:boolean',
            '_____no_higiene_buena_alrededor:boolean',
            'pro_viv',
        ],
    ]) ?>

</div>
