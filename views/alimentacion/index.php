<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AlimentacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Alimentacions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alimentacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Alimentacion'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_ali',
            '_____recibio_lactancia_materna_:boolean',
            '_____recibio_supl__hierro__chis:boolean',
            '_____si_es_gestante__recibio_su:boolean',
            '_____estuvo_al_dia_con_suplemen:boolean',
            // '_____no_recibio_algun_alimento_:boolean',
            // '_____recibio_3_o_mas_comidas_es:boolean',
            // 'pro_ali',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
