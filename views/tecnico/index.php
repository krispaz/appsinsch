<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TecnicoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tecnicos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tecnico-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Tecnico'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tecn',
            'id_cant',
            'ci_tecn',
            'nom_tecn',
            'ape_tecn',
            // 'obs_tecn',
            // 'num_viv_asig',
            // 'nombre_corto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
