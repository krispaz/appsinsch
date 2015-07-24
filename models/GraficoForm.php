<?php

namespace app\models;

use yii\base\Model;

class GraficoForm extends Model
{
    public $num_tom;
    public $canton;
  // Indicador 1 
    public $adelgazmiento;
    public $sobrepeso;
    public $ganancia_peso;
    public $ganancia_talla;
    public $nutricion;
    // Indicador 2 
    public $lactancia;
    public $suplementos;
    public $acido_f;
    public $vitamina_a;
    public $alimento_distinto;
    public $alimentado;
   // Indicador 3 
    public $fiebre;
    public $urinarias;
    public $mareo;
    public $sangrado;
    public $diarrea;
    public $salud; 
   // Indicador 4 
    public $examen;
    public $ecografia;
    public $vacunas;
    public $control;
    public $consejeria_nut;
    public $atencion; 
    // Indicador 5 
    public $est_pad;
    public $com_aye;
    public $fue_mad;
    public $may_eda;
    public $castellano;
    public $cuidador;

     // Indicador 6 
    public $agu_apt;
    public $alcantarillado;
    public $cocina;
    public $ani_con;
    public $ani_dom;
    public $vivienda;
    
    // Indicador 7 
    public $seguridad;
    public $car_mad;
    public $nin_ced;
    public $cedula;
    public $edu_prim;
    public $com_sal;
    
    public function rules()
    {
        return [
            [['num_tom', 'canton'], 'required',],
           // ['canton', 'email'],
        ];
    }
}
