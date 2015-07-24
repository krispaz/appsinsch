<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Nutricion */

$this->title = $model->id_nut;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nutricions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nutricion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_nut], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_nut], [
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
            'id_nut',
            'sub1_nut',
            'peso_en_kg_con_un_decimal______',
            'talla__cm_____',
            '_____no_tuvo_adelgazamiento__p_:boolean',
            '_____no_tuvo_sobrepeso__p_t___:boolean',
            '_____no_baja_ganancia_de_peso__:boolean',
            '_____no_baja_ganancia_de_talla_:boolean',
            'pro_nut',
        ],
    ]) ?>

</div>
