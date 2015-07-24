<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Atencion */

$this->title = $model->id_ate;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Atencions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atencion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_ate], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_ate], [
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
            'id_ate',
            '______ultimo_control_pre_nat_se',
            '______ha_tenido_algun_ex__lab__:boolean',
            '______ha_tenido_al_menos_una_ec:boolean',
            '_____tiene_sus_vacunas_al_dia_p:boolean',
            '_____ha_tenido_su_ultimo_contro:boolean',
            '_____recibio_consejeria_nutrici:boolean',
            '_____nota_a_la_atencion_en_su_s:boolean',
            '_____carne__1_ant_2_nue_3_hc_0_:boolean',
            'pro_ate',
        ],
    ]) ?>

</div>
