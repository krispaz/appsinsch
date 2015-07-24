<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Comunidad */

$this->title = $model->id_comu;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comunidads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comunidad-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_comu], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_comu], [
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
            'id_comu',
            'id_cant',
            'nom_comu',
            'des_comu',
            'num_vivi',
        ],
    ]) ?>

</div>
