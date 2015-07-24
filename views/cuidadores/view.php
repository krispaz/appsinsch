<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cuidadores */

$this->title = $model->id_cui;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cuidadores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuidadores-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_cui], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_cui], [
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
            'id_cui',
            '_____padre_estuvo_con_nino_ayer:boolean',
            '_____madre_dio_de_comer_al_nino:boolean',
            '______fue_su_madre_o_padre__:boolean',
            '______fue_mayor_de_edad__18____:boolean',
            '______lee_y_escribe_castellano_:boolean',
            '______asistio_a_sesion_demostra:boolean',
            '______recibio_capacitacion_en_e:boolean',
            '______recibio_consejeria_en_pla:boolean',
            '______conoce_lo_que_es_educacio:boolean',
            'pro_cui',
        ],
    ]) ?>

</div>
