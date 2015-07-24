
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Canton;
use yii\helpers\ArrayHelper;
use scotthuangzl\googlechart\GoogleChart;
//use app\models\GraficoForm;
//$model = new GraficoForm();

?>

<p>
        Seleccione los datos para el Gráfico
    </p>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'num_tom')
        ->dropDownList(array('prompt'=>'--select--', '1'=>1,'2'=>2,'3'=>3, '4'=>4,'5'=>5))?>

  <?=
$form->field($model, 'canton')
     ->dropDownList( ArrayHelper::map(Canton::find()->all(), 'id_cant', 'nom_cant')
            )
        
        
?>

    <div class="form-group">
        <?= Html::submitButton('Graficar', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

<div class="col-sm-5">
            
  </div>

<p><li>GRAFICO Y UBICACION CANTON<li></p>

<div class="col-sm-50">
            <?php
            
 
            echo GoogleChart::widget(array('visualization' => 'ColumnChart',
                'data' => array(
                    array('Task', 'Toma- Canton'),
                    array('BIEN NUTRIDO', $model->nutricion),
                    array('BIEN ALIMENTADO', $model->alimentado),
                    array('BIEN DE SALUD', $model->salud),
                    array('BIEN ATENDIDO', $model->atencion),
                    array('CUIDADORES PREPARADOS', $model->cuidador),
                    array('VIVIENDA SALUDABLE',$model->vivienda),
                    array('COMUNIDAD SALUDABLE', $model->com_sal),
                    array('Media', 50)
                    
                ),
                'options' => array('title' => 'Indicadores')));
            
               ?>
    
    
    <?php
        
    
            echo GoogleChart::widget( array('visualization' => 'Map',
                'packages'=>'map',//default is corechart
                'loadVersion'=>1,//default is 1.  As for Calendar, you need change to 1.1
                'data' => array(
                    ['Country', 'Population'],
                    
                    ['Riobamba', 'Riobamba: 1,363,800,000'],
                    ['Guano', 'Guano: 1,242,620,000'],
                    ['Alausi', 'Alausi: 317,842,000'],
                    ['Chambo', 'Chambo: 247,424,598'],
                    ['Chunchi', 'Chunchi: 201,032,714'],
                    ['Colta', 'Colta: 186,134,000'],
                    ['Cumanda', 'Cumanda: 173,615,000'],
                    ['Guamote', 'Guamote: 152,518,015'],
                    ['Pallatanga', 'Pallatanga: 146,019,512'],
                    ['Penipe', 'Penipe: 127,120,000']
                ),
                'options' => array('title' => 'My Daily Activity',
                    'showTip'=>true,
                )));
            ?>
    
    
        </div>

<ul>
    <li><label> EL NIÑO ESTA BIEN NUTRIDO <label>: <?= Html::encode($model->nutricion) ?> </li>
    <li><label> EL NIÑO ESTA BIEN ALIMENTADO <label>: <?= Html::encode($model->alimentado) ?> </li>
    <li><label> EL NIÑO ESTA BIEN DE SALUD <label>: <?= Html::encode($model->salud) ?> </li>
   <li><label> EL NIÑO ESTA BIEN ATENDIDO <label>: <?= Html::encode($model->atencion) ?> </li>
   <li><label> EL NIÑO TIENE CUIDADORES PREPARADOS <label>: <?= Html::encode($model->cuidador) ?> </li>
   <li><label> EL NIÑO RESIDE EN UNA VIVIENDA SALUDABLE <label>: <?= Html::encode($model->vivienda) ?> </li>
   <li><label> EL NIÑO RESIDE EN UNA COMUNIDAD SALUDABLE <label>: <?= Html::encode($model->com_sal) ?> </li>
</ul>