<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NutricionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Nutricions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nutricion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Nutricion'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_nut',
            //'sub1_nut',
            //'peso_en_kg_con_un_decimal______',
            //'talla__cm_____',
            '_____no_tuvo_adelgazamiento__p_:boolean',
             '_____no_tuvo_sobrepeso__p_t___:boolean',
             '_____no_baja_ganancia_de_peso__:boolean',
             '_____no_baja_ganancia_de_talla_:boolean',
            // 'pro_nut',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
