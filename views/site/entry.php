
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Canton;
use yii\helpers\ArrayHelper;
?>

<p>Seleccione Número de toma y Cantón del que desea revisar los Porcentajes de los Indicadores </p>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'num_tom')
        ->dropDownList(array('prompt'=>'--select--', '1'=>1,'2'=>2,'3'=>3, '4'=>4,'5'=>5))?>

  <?=
$form->field($model, 'canton')
     ->dropDownList( ArrayHelper::map(Canton::find()->all(), 'id_cant', 'nom_cant')
            )
?>
 

 

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>


<p><li> PORCENTAJE INDICADORES NUTRICIONALES:<li></p>



<ul>
    <li><label> EL NIÑO ESTA BIEN NUTRIDO <label>: <?= Html::encode($model->nutricion) ?> </li>
    <li><label>     No:tuvo adelgazamiento(P/T)</label>: <?= Html::encode($model->adelgazmiento) ?></li>
    <li><label>     No:tuvo sobrepeso (P/T)</label>: <?= Html::encode($model->sobrepeso) ?></li>
    <li><label>     No:baja ganancia de peso</label>: <?= Html::encode($model->ganancia_peso) ?></li>
    <li><label>     No:baja ganancia de talla </label>: <?= Html::encode($model->ganancia_talla) ?></li>
</ul>

<ul>
    <li><label> EL NIÑO ESTA BIEN ALIMENTADO <label>: <?= Html::encode($model->alimentado) ?> </li>
    <li><label>          Recibió lactancia materna </label>: <?= Html::encode($model->lactancia) ?></li>
    <li><label>          Recibió supl. Hierro, Chispaz</label>: <?= Html::encode($model->suplementos) ?></li>
    <li><label>          Si es gestante, recibió supl. Ac. Fólico </label>: <?= Html::encode($model->acido_f) ?></li>
    <li><label>          Estuvo al dia con suplemento VA </label>: <?= Html::encode($model->vitamina_a) ?></li>
    <li><label>          No:recibió algún alimento distinto de leche materna </label>: <?= Html::encode($model->alimento_distinto) ?></li>
</ul>

<ul>
    <li><label> EL NIÑO ESTA BIEN DE SALUD <label>: <?= Html::encode($model->alimentado) ?> </li>
    <li><label>               No:tuvo fiebre </label>: <?= Html::encode($model->fiebre) ?></li>
    <li><label>               No:si es gestante, molestias urinarias</label>: <?= Html::encode($model->urinarias) ?></li>
    <li><label>               No:si es gestante, dolor de cabeza o mareos </label>: <?= Html::encode($model->mareo) ?></li>
    <li><label>               No:si es gestante, sangrado o hemorragia </label>: <?= Html::encode($model->sangrado) ?></li>
    <li><label>               No:tuvo diarrea </label>: <?= Html::encode($model->diarrea) ?></li>
</ul>

<ul>
    <li><label> EL NIÑO ESTA BIEN ATENDIDO <label>: <?= Html::encode($model->atencion) ?> </li>
    <li><label>             .ha tenido algún ex. lab. (Hb y Orina) </label>: <?= Html::encode($model->examen) ?></li>
    <li><label>             .ha tenido al menos una ecografía     </label>: <?= Html::encode($model->ecografia) ?></li>
    <li><label>             tiene sus vacunas al dia para su edad </label>: <?= Html::encode($model->vacunas) ?></li>
    <li><label>             ha tenido su último control de niño según edad </label>: <?= Html::encode($model->diarrea) ?></li>
    <li><label>            recibió consejería nutricional último C.N.Sano  </label>: <?= Html::encode($model->consejeria_nut) ?></li>
</ul>

   
<ul>
    <li><label> EL NIÑO TIENE CUIDADORES PREPARADOS <label>: <?= Html::encode($model->cuidador) ?> </li>
    <li><label>                  Padre estuvo con niño ayer </label>: <?= Html::encode($model->est_pad) ?></li>
    <li><label>                  Madre dió de comer al niño ayer </label>: <?= Html::encode($model->com_aye ) ?></li>
    <li><label>                  .fué su madre o padre </label>: <?= Html::encode($model->fue_mad) ?></li>
    <li><label>                  .fué mayor de edad (18+) </label>: <?= Html::encode($model->may_eda) ?></li>
    <li><label>                 .lee y escribe castellano  </label>: <?= Html::encode($model->castellano) ?></li>
</ul>


<ul>
    <li><label> EL NIÑO RESIDE EN UNA VIVIENDA SALUDABLE <label>: <?= Html::encode($model->vivienda) ?> </li>
    <li><label>                       agua apta para consumo humano </label>: <?= Html::encode($model->agu_apt) ?></li>
    <li><label>                       usa alcant/pzo.sép/letr.adec. </label>: <?= Html::encode($model->alcantarillado ) ?></li>
    <li><label>                       cocina mejorada (R) o en cuarto separado </label>: <?= Html::encode($model->cocina) ?></li>
    <li><label>                       No:animales de consumo sueltos dentro de casa </label>: <?= Html::encode($model->ani_con) ?></li>
    <li><label>                      No:animales domésticos sueltos dentro de casa </label>: <?= Html::encode($model->ani_dom) ?></li>
</ul>


<ul>
    <li><label> EL NIÑO RESIDE EN UNA COMUNIDAD SALUDABLE <label>: <?= Html::encode($model->vivienda) ?> </li>
    <li><label>                            niño c/seg.salud(IESS,Campes.,Gen.l,Ot.) </label>: <?= Html::encode($model->seguridad) ?></li>
    <li><label>                            madre c/seg.salud(IESS,Campes.,Gen.,Ot.) </label>: <?= Html::encode($model->car_mad ) ?></li>
    <li><label>                            niño con número de identificación (C.I.) </label>: <?= Html::encode($model->nin_ced) ?></li>
    <li><label>                            .tiene C.I. </label>: <?= Html::encode($model->cedula) ?></li>
    <li><label>                           .tiene educación primaria completa </label>: <?= Html::encode($model->edu_prim) ?></li>
</ul>


