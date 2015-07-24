<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Alimentacion */

$this->title = $model->id_ali;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Alimentacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alimentacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_ali], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_ali], [
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
            'id_ali',
            '_____recibio_lactancia_materna_:boolean',
            '_____recibio_supl__hierro__chis:boolean',
            '_____si_es_gestante__recibio_su:boolean',
            '_____estuvo_al_dia_con_suplemen:boolean',
            '_____no_recibio_algun_alimento_:boolean',
            '_____recibio_3_o_mas_comidas_es:boolean',
            'pro_ali',
        ],
    ]) ?>

</div>
