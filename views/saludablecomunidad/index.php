<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SaludablecomunidadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Saludablecomunidads');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="saludablecomunidad-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Saludablecomunidad'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_sal_com',
            'sub1_sal_com:boolean',
            '_____madre_c_seg_salud_iess_cam:boolean',
            '_____nino_con_numero_de_identif:boolean',
            '______tiene_c_i___:boolean',
            // '______tiene_educacion_primaria_:boolean',
            // '_____no__tiene_mas_de_3_dependi:boolean',
            // '______recibe_el_bdh__:boolean',
            // '______recibe_incentivo_desnutri:boolean',
            // '______participo_en_algun_proyec:boolean',
            // '______recibio_estimulacion_temp:boolean',
            // '______recibio_visita_domiciliar:boolean',
            // '______hay_educacion_temprana__c:boolean',
            // '______hay_produccion_de_algun_a:boolean',
            // '_____atendio_ult_enf__en_1trd_2:boolean',
            // 'pro_sal_com',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
