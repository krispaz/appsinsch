<?php
use yii\helpers\Html;
use app\models\EntryForm;
$model = new EntryForm();
?>
<p>You have entered the following information:</p>


<ul>
    <li><label>Name</label>: <?= Html::encode($model->num_tom) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->canton) ?></li>
    <li><label> EL NIÑO ESTA BIEN NUTRIDO <label>: <?= Html::encode($model->nutricion) ?> </li>
</ul>


           

<div class="col-sm-5">
            <?php
            use scotthuangzl\googlechart\GoogleChart;
 
            echo GoogleChart::widget(array('visualization' => 'ColumnChart',
                'data' => array(
                    array('Task', 'Hours per Day'),
                    array('Work', $model->nutricion),
                    array('Eat', 2),
                    array('Commute', 2),
                    array('Watch TV', 2),
                    array('Sleep', 7)
                ),
                'options' => array('title' => 'My Daily Activity')));
            
               ?>
        </div>
    
  
<div class="col-sm-5">
            <?php
 echo GoogleChart::widget( array('visualization' => 'Map',
                'packages'=>'map',//default is corechart
                'loadVersion'=>1,//default is 1.  As for Calendar, you need change to 1.1
                'data' => array(
                    ['Country', 'Population'],
                    ['China', 'China: 1,363,800,000'],
                    ['India', 'India: 1,242,620,000'],
                    ['US', 'US: 317,842,000'],
                    ['Indonesia', 'Indonesia: 247,424,598'],
                    ['Brazil', 'Brazil: 201,032,714'],
                    ['Pakistan', 'Pakistan: 186,134,000'],
                    ['Nigeria', 'Nigeria: 173,615,000'],
                    ['Bangladesh', 'Bangladesh: 152,518,015'],
                    ['Russia', 'Russia: 146,019,512'],
                    ['Japan', 'Japan: 127,120,000']
                ),
                'options' => array('title' => 'My Daily Activity',
                    'showTip'=>true,
                )));
            ?>
        </div>