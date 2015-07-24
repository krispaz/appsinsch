<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ViviendaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Viviendas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vivienda-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Vivienda'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_viv',
            '_____agua_apta_para_consumo_hum:boolean',
            '_____usa_alcant_pzo_sep_letr_ad:boolean',
            '_____cocina_mejorada__r__o_en_c:boolean',
            '_____no_animales_de_consumo_sue:boolean',
            // '_____no_animales_domesticos_sue:boolean',
            // '_____no_piso_de_tierra__:boolean',
            // '_____no_mat_prec__adobe_paja_ca:boolean',
            // '_____no_viven_mas_de_3_personas:boolean',
            // '_____no_higiene_buena_alrededor:boolean',
            // 'pro_viv',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
