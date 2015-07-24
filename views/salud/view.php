<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Salud */

$this->title = $model->id_sal;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Saluds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salud-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_sal], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_sal], [
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
            'id_sal',
            '_____no_tuvo_fiebre__:boolean',
            '_____no_si_es_gestante__molesti:boolean',
            '_____no_si_es_gestante__dolor_d:boolean',
            '_____no_si_es_gestante__sangrad:boolean',
            '_____no_tuvo_diarrea__:boolean',
            '_____no_tuvo_tos_dol_garg_gripe:boolean',
            '_____no_tuvo_vomito__:boolean',
            'pro_sal',
        ],
    ]) ?>

</div>
