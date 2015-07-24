<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ninio */

$this->title = $model->id_nin;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ninios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ninio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_nin], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_nin], [
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
            'id_nin',
            'ci_nin',
            'nom_nin',
            'ape_nin',
            'edad_meses',
            'gestante:boolean',
        ],
    ]) ?>

</div>
