<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CuidadoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cuidadores');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuidadores-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Cuidadores'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_cui',
            '_____padre_estuvo_con_nino_ayer:boolean',
            '_____madre_dio_de_comer_al_nino:boolean',
            '______fue_su_madre_o_padre__:boolean',
            '______fue_mayor_de_edad__18____:boolean',
            // '______lee_y_escribe_castellano_:boolean',
            // '______asistio_a_sesion_demostra:boolean',
            // '______recibio_capacitacion_en_e:boolean',
            // '______recibio_consejeria_en_pla:boolean',
            // '______conoce_lo_que_es_educacio:boolean',
            // 'pro_cui',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
