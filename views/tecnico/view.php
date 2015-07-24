<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tecnico */

$this->title = $model->id_tecn;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tecnicos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tecnico-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Atualizar Datos'), ['update', 'id' => $model->id_tecn], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'id' => $model->id_tecn], [
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
            'id_tecn',
            'id_cant',
            'ci_tecn',
            'nom_tecn',
            'ape_tecn',
            'obs_tecn',
            'num_viv_asig',
            'nombre_corto',
        ],
    ]) ?>

</div>
