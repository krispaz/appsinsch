<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Saludablecomunidad */

$this->title = $model->id_sal_com;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Saludablecomunidads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="saludablecomunidad-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_sal_com], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_sal_com], [
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
            'id_sal_com',
            'sub1_sal_com:boolean',
            '_____madre_c_seg_salud_iess_cam:boolean',
            '_____nino_con_numero_de_identif:boolean',
            '______tiene_c_i___:boolean',
            '______tiene_educacion_primaria_:boolean',
            '_____no__tiene_mas_de_3_dependi:boolean',
            '______recibe_el_bdh__:boolean',
            '______recibe_incentivo_desnutri:boolean',
            '______participo_en_algun_proyec:boolean',
            '______recibio_estimulacion_temp:boolean',
            '______recibio_visita_domiciliar:boolean',
            '______hay_educacion_temprana__c:boolean',
            '______hay_produccion_de_algun_a:boolean',
            '_____atendio_ult_enf__en_1trd_2:boolean',
            'pro_sal_com',
        ],
    ]) ?>

</div>
