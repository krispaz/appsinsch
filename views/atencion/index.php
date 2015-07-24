<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AtencionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Atencions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atencion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Atencion'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_ate',
            '______ultimo_control_pre_nat_se',
            '______ha_tenido_algun_ex__lab__:boolean',
            '______ha_tenido_al_menos_una_ec:boolean',
            '_____tiene_sus_vacunas_al_dia_p:boolean',
            // '_____ha_tenido_su_ultimo_contro:boolean',
            // '_____recibio_consejeria_nutrici:boolean',
            // '_____nota_a_la_atencion_en_su_s:boolean',
            // '_____carne__1_ant_2_nue_3_hc_0_:boolean',
            // 'pro_ate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
