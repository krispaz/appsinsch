<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Canton */

$this->title = $model->id_cant;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cantons'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="canton-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_cant], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_cant], [
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
            'id_cant',
            'id_prov',
            'nom_cant',
            'desc_cant',
        ],
    ]) ?>

</div>
