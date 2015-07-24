<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FactencuestaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Factencuestas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factencuesta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Factencuesta'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_enc',
            'id_tecn',
            'id_comu',
            'id_nin',
            'id_ali',
             'id_nut',
            // 'id_sal',
            // 'id_ate',
            // 'id_des',
            // 'id_cui',
            // 'id_viv',
            // 'id_sal_com',
             'num_tom',
            // 'fec_enc',
            // 'dir_cas',
            // 'fec_ini_tom',
            // 'fec_fin_tom',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
