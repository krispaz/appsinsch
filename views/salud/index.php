<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SaludSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Saluds');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salud-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Salud'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_sal',
            '_____no_tuvo_fiebre__:boolean',
            '_____no_si_es_gestante__molesti:boolean',
            '_____no_si_es_gestante__dolor_d:boolean',
            '_____no_si_es_gestante__sangrad:boolean',
            // '_____no_tuvo_diarrea__:boolean',
            // '_____no_tuvo_tos_dol_garg_gripe:boolean',
            // '_____no_tuvo_vomito__:boolean',
            // 'pro_sal',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
