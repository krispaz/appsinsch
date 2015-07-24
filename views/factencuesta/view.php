<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Factencuesta */

$this->title = $model->id_enc;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Factencuestas'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factencuesta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Actualizar Datos'), ['update', 'id' => $model->id_enc], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_enc], [
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
             'num_tom',
            'fec_enc',
            'dir_cas',
            'fec_ini_tom',
            'fec_fin_tom',
            'id_enc',
            //'id_tecn','nom_tecn'
           // 'id_tecn.nom_tecn'
           // 'id_comu',
            //'id_nin',
            //'id_ali',
            //'id_nut',
            //'id_sal',
            //'id_ate',
            //'id_des',
            //'id_cui',
            //'id_viv',
            //'id_sal_com',
           
            
        ],
    ]) ?>

</div>
