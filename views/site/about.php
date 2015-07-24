<?php
use yii\helpers\Html;
use app\models\EntryForm;
$model = new EntryForm();
/* @var $this yii\web\View */
$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
</div>



<ul>
    <li><label>Name</label>: <?= Html::encode($model->num_tom) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->canton) ?></li>
    <li><label> EL NIÑO ESTA BIEN NUTRIDO <label>: <?= Html::encode($model->nutricion) ?> </li>
</ul>


           

<div class="col-sm-5">
            <?php
            $model = new EntryForm();
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