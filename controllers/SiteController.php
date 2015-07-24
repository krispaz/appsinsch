<?php
namespace app\controllers;

use Yii;
use app\models\LoginForm;
use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;
use app\models\SignupForm;
use app\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\User;
use app\models\Factencuesta;

use app\models\EntryForm;
use app\models\GraficoForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
  
     * 
     * 
     *    */
    // PRUEBA DE CREACION NUEVO FORM
   public function actionEntry()
    {
               $model = new EntryForm();
   // CONEXION A LA BASE DE DATOS PARA REALIZAR CONSULTAS VIA SQL EN LA DB    
        $db = new \yii\db\Connection([
                 'dsn' => 'pgsql:host=localhost;port=5432;dbname=db_sinsch',
                'username' => 'nuestroswawas',
                'password' => '4358',
        ]);
    $db->open();
       
        
   
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // CONSULTA EL TOTAL DE ENCUESTAS HECHAS EN UNA TOMA Y EN UN CANTON
                        $total = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta 
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton ',[':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])     
              ->queryScalar();
            
          //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador no_tuvo_adelgazamiento Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
            $aux = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.nutricion
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_nut = nutricion.id_nut AND
                                                  nutricion._____no_tuvo_adelgazamiento__p_ = false;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
            
            // calculo del porcentaje del indicador No; tuvo adelgazamiento (P/T)  
            $por = $aux * 100 / $total;
            $model -> adelgazmiento= $por;
            
        //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador No:tuvo sobrepeso (P/T) Y DONDE SU VALOR SEA FALSO PARA CALCULOS 
             $aux1 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.nutricion
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_nut = nutricion.id_nut AND
                                                  nutricion._____no_tuvo_sobrepeso__p_t___  = false;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
             // calculo del porcentaje del indicador No:tuvo sobrepeso (P/T)  
            $por1 = $aux1 * 100 / $total;
            $model -> sobrepeso= $por1;
            
        //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador  Índice No:baja ganancia de peso Y DONDE SU VALOR SEA FALSO PARA CALCULOS     
           $aux2 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.nutricion
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_nut = nutricion.id_nut AND
                                                  nutricion. _____no_baja_ganancia_de_peso__ = false;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
            
                          ->queryScalar();                        
            // calculo del porcentaje del indicador Índice Talla-Edad z OMS 2006 OK  
            $por2 = $aux2 * 100 / $total;
            $model -> ganancia_peso = $por2;
            
        //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador  No:baja ganancia de talla Y DONDE SU VALOR SEA FALSO PARA CALCULOS    
            
             $aux3 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.nutricion
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_nut = nutricion.id_nut AND
                                                  nutricion. _____no_baja_ganancia_de_talla_ = false;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
            
                          ->queryScalar(); 
             
             // calculo del porcentaje del indicador Índice Talla-Edad z OMS 2006 OK  
            $por3 = $aux3 * 100 / $total;
            $model -> ganancia_talla = $por3;
            
            // calculo porcentaje total indicador 1
            $nutricion= ($por + $por1 + $por2 +$por3) /4 ;
            $model -> nutricion = $nutricion; 
            
            
     // Calculo de subindicadores indicador 2
  //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador Recibió lactancia materna Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
            $auxali = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.alimentacion
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_ali = alimentacion.id_ali AND
                                                  alimentacion._____recibio_lactancia_materna_= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porali = $auxali * 100 / $total;
            $model -> lactancia= $porali;  
            
     //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador  _____recibio_supl__hierro__chis Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
         $auxali1 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.alimentacion
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_ali = alimentacion.id_ali AND
                                                  alimentacion._____recibio_supl__hierro__chis= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
            
              
            $porali1 = $auxali1 * 100 / $total;
            $model -> suplementos= $porali1;    
       
//---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador  _____si_es_gestante__recibio_sua Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
         $auxali2 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.alimentacion
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_ali = alimentacion.id_ali AND
                                                  alimentacion._____si_es_gestante__recibio_su= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
            
              
            $porali2 = $auxali2 * 100 / $total;
            $model -> acido_f= $porali2;       
     
    //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador  _____estuvo_al_dia_con_suplemen Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
         $auxali3 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.alimentacion
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_nut = alimentacion.id_ali AND
                                                  alimentacion._____estuvo_al_dia_con_suplemen= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
            
              
            $porali3 = $auxali3 * 100 / $total;
            $model -> vitamina_a= $porali3;       
            
        //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____no_recibio_algun_alimento_ Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
         $auxali4 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.alimentacion
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_ali = alimentacion.id_ali AND
                                                  alimentacion._____no_recibio_algun_alimento_= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
            
              
            $porali4 = $auxali4 * 100 / $total;
            $model -> alimento_distinto= $porali4;        
            
            // calculo porcentaje total indicador 2
            $alimentacion= ($porali + $porali1 + $porali2 +$porali3 + $porali4) /5 ;
            $model -> alimentado = $alimentacion;  
      
    // Calculo de subindicadores indicador 3        
        
       //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador No tuvo fiebre Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
            $auxsal = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.salud
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_sal = salud.id_sal AND
                                                  salud. _____no_tuvo_fiebre__= false;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porsal = $auxsal * 100 / $total;
            $model -> fiebre= $porsal;        
           
              //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____no_si_es_gestante__molesti Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
            $auxsal1 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.salud
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_sal = salud.id_sal AND
                                                  salud._____no_si_es_gestante__molesti= false;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porsal1 = $auxsal1 * 100 / $total;
            $model -> urinarias= $porsal1;
            
              //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____no_si_es_gestante__dolor_d  Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
            $auxsal2 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.salud
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_sal = salud.id_sal AND
                                                  salud._____no_si_es_gestante__dolor_d= false;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porsal2 = $auxsal2 * 100 / $total;
            $model -> mareo= $porsal2;
            
              //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____no_si_es_gestante__sangrad  Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
            $auxsal3 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.salud
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_sal = salud.id_sal AND
                                                  salud._____no_si_es_gestante__sangrad= false;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porsal3 = $auxsal3 * 100 / $total;
            $model -> sangrado= $porsal3;
            
             //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____no_tuvo_diarrea__  Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
            $auxsal4 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.salud
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_sal = salud.id_sal AND
                                                  salud._____no_tuvo_diarrea__= false;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porsal4 = $auxsal4 * 100 / $total;
            $model -> diarrea= $porsal4;
            
           // calculo porcentaje total indicador 3
            $salud= ($porsal + $porsal1 + $porsal2 +$porsal3 + $porsal4) /5 ;
            $model -> salud = $salud;    
        
            
            
        // Calculo de subindicadores indicador 4        
        
       //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador ______ha_tenido_algun_ex__lab__ Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
            $auxate = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.atencion
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_ate = atencion.id_ate AND
                                                  atencion.______ha_tenido_algun_ex__lab__= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porate = $auxate * 100 / $total;
            $model -> examen= $porate; 
            
        //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador ______ha_tenido_al_menos_una_ec Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
            $auxate1 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.atencion
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_ate = atencion.id_ate AND
                                                  atencion.______ha_tenido_al_menos_una_ec= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porate1 = $auxate1 * 100 / $total;
            $model -> ecografia= $porate1;     
            
          //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____tiene_sus_vacunas_al_dia_p Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
            $auxate2 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.atencion
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_ate = atencion.id_ate AND
                                                  atencion._____tiene_sus_vacunas_al_dia_p= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porate2 = $auxate2 * 100 / $total;
            $model -> vacunas= $porate2;  
            
        //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____ha_tenido_su_ultimo_contro Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
            $auxate3 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.atencion
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_ate = atencion.id_ate AND
                                                  atencion._____ha_tenido_su_ultimo_contro= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porate3 = $auxate3 * 100 / $total;
            $model -> control= $porate3;
            
        //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____recibio_consejeria_nutrici Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
            $auxate4 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.atencion
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_ate = atencion.id_ate AND
                                                  atencion._____recibio_consejeria_nutrici= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porate4 = $auxate4 * 100 / $total;
            $model -> consejeria_nut= $porate4;   
            
            // calculo porcentaje total indicador 4
            $atencion= ($porate + $porate1 + $porate2 +$porate3 + $porate4) /5 ;
            $model -> atencion = $atencion;
            
      
     // Calculo de subindicadores indicador 5
            //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____padre_estuvo_con_nino_ayer Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxcui = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.cuidadores
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_cui = cuidadores.id_cui AND
                                                  cuidadores._____padre_estuvo_con_nino_ayer= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porcui = $auxcui * 100 / $total;
            $model -> est_pad= $porcui;   
            
            //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____madre_dio_de_comer_al_nino Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxcui1 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.cuidadores
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_cui = cuidadores.id_cui AND
                                                  cuidadores._____madre_dio_de_comer_al_nino= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porcui1 = $auxcui1 * 100 / $total;
            $model -> com_aye = $porcui1;  
            
            //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador ______fue_su_madre_o_padre__ Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxcui2 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.cuidadores
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_cui = cuidadores.id_cui AND
                                                  cuidadores.______fue_su_madre_o_padre__= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porcui2 = $auxcui2 * 100 / $total;
            $model -> fue_mad = $porcui2; 
            
            //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador ______fue_mayor_de_edad__18____ Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxcui3 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.cuidadores
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_cui = cuidadores.id_cui AND
                                                  cuidadores.______fue_mayor_de_edad__18____= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porcui3 = $auxcui3 * 100 / $total;
            $model -> may_eda = $porcui3; 
            
             //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador ______lee_y_escribe_castellano_Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxcui4 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.cuidadores
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_cui = cuidadores.id_cui AND
                                                  cuidadores.______lee_y_escribe_castellano_= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porcui4 = $auxcui4 * 100 / $total;
            $model -> castellano = $porcui4;
            
            // calculo porcentaje total indicador 5
            $cuidador= ($porcui + $porcui1 + $porcui2 +$porcui3 + $porcui4) /5 ;
            $model -> cuidador = $cuidador;
            
            
            // Calculo de subindicadores indicador 6
            //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____agua_apta_para_consumo_hum Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxviv = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.vivienda
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_viv = vivienda.id_viv AND
                                                  vivienda._____agua_apta_para_consumo_hum= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porviv = $auxviv * 100 / $total;
            $model -> agu_apt= $porviv;   
            
            //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____usa_alcant_pzo_sep_letr_ad Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxviv1 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.vivienda
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_viv = vivienda.id_viv AND
                                                  vivienda._____usa_alcant_pzo_sep_letr_ad= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porviv1 = $auxviv1 * 100 / $total;
            $model -> alcantarillado= $porviv1;
            
            //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____cocina_mejorada__r__o_en_c Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxviv2 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.vivienda
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_viv = vivienda.id_viv AND
                                                  vivienda._____cocina_mejorada__r__o_en_c= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porviv2 = $auxviv2 * 100 / $total;
            $model -> cocina= $porviv2;
            
            //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____no_animales_de_consumo_sue Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxviv3 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.vivienda
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_viv = vivienda.id_viv AND
                                                  vivienda._____no_animales_de_consumo_sue= false;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porviv3 = $auxviv3 * 100 / $total;
            $model -> ani_con= $porviv3;
            
            //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____no_animales_domesticos_sue Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxviv4 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.vivienda
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_viv = vivienda.id_viv AND
                                                  vivienda._____no_animales_domesticos_sue= false;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porviv4 = $auxviv4 * 100 / $total;
            $model -> ani_dom= $porviv4;
            
            // calculo porcentaje total indicador 6
            $vivienda= ($porviv + $porviv1 + $porviv2 +$porviv3 + $porviv4) /5 ;
            $model -> vivienda = $vivienda;
            
            // Calculo de subindicadores indicador 7
    //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador sub1_sal_com Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxsalcomu = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.saludablecomunidad
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_sal_com = saludablecomunidad.id_sal_com AND
                                                  saludablecomunidad.sub1_sal_com= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porsalcomu = $auxsalcomu * 100 / $total;
            $model -> seguridad= $porsalcomu; 
            
    //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____madre_c_seg_salud_iess_cam Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxsalcomu1 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.saludablecomunidad
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_sal_com = saludablecomunidad.id_sal_com AND
                                                  saludablecomunidad._____madre_c_seg_salud_iess_cam= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porsalcomu1 = $auxsalcomu1 * 100 / $total;
            $model -> car_mad= $porsalcomu1; 
            
          //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____nino_con_numero_de_identif Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxsalcomu2 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.saludablecomunidad
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_sal_com = saludablecomunidad.id_sal_com AND
                                                  saludablecomunidad._____nino_con_numero_de_identif= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porsalcomu2 = $auxsalcomu2 * 100 / $total;
            $model -> nin_ced= $porsalcomu2;    
            
           
       
             //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador ______tiene_c_i___ Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxsalcomu3 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.saludablecomunidad
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_sal_com = saludablecomunidad.id_sal_com AND
                                                  saludablecomunidad.______tiene_c_i___= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porsalcomu3 = $auxsalcomu3 * 100 / $total;
            $model -> cedula= $porsalcomu3;    
         
           //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador ______tiene_educacion_primaria_ Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxsalcomu4 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.saludablecomunidad
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_sal_com = saludablecomunidad.id_sal_com AND
                                                  saludablecomunidad.______tiene_educacion_primaria_= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porsalcomu4 = $auxsalcomu4 * 100 / $total;
            $model -> edu_prim= $porsalcomu4;    
            
            // calculo porcentaje total indicador 7
            $com_sal= ($porsalcomu + $porsalcomu1 + $porsalcomu2 +$porsalcomu3 + $porsalcomu4) /5 ;
            $model -> com_sal = $com_sal;
            
          return $this->render('entry', ['model' => $model]);
           // return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // la página es mostrada inicialmente o hay algún error de validación
            return $this->render('entry', ['model' => $model]);
        }
    }
 
     
    
    
    
 public function behaviors()
{
    return [
        'access' => [
            'class' => AccessControl::className(),
            'only' => ['signup','create'],  // bloqueo a usuarios sin logearse
            'rules' => [
                [
                    'actions' => ['login', 'error','index'],  // permite sin logearse 
                    'allow' => true,
                    'roles' => ['?'],
                ],
                [
                    'actions' => [ 'index'],
                    'allow' => true,
                    'roles' => ['@'],
                ],
                [
                    'actions' => ['about', 'index','signup'],
                    'allow' => true,
                    'roles' => ['@'],
                    'matchCallback' => function ($rule, $action) {
                        $valid_roles = [User::ROLE_ADMIN, User::ROLE_SUPERUSER];
                        return User::roleInArray($valid_roles) && User::isActive();
                    }
                ],
            ],
        ],
        'verbs' => [
            'class' => VerbFilter::className(),
            'actions' => [
                'logout' => ['post'],
            ],
        ],
    ];
}
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        
        
         //return $this->render('about');
        
        return $this->render('grafico');
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    
  
    public function actionGrafico()
    {
               $model = new GraficoForm();
   // CONEXION A LA BASE DE DATOS PARA REALIZAR CONSULTAS VIA SQL EN LA DB    
        $db = new \yii\db\Connection([
                 'dsn' => 'pgsql:host=localhost;port=5432;dbname=db_sinsch',
                'username' => 'nuestroswawas',
                'password' => '4358',
        ]);
    $db->open();
       
        
   
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // CONSULTA EL TOTAL DE ENCUESTAS HECHAS EN UNA TOMA Y EN UN CANTON
                        $total = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta 
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton ',[':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])     
              ->queryScalar();
            
          //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador no_tuvo_adelgazamiento Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
            $aux = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.nutricion
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_nut = nutricion.id_nut AND
                                                  nutricion._____no_tuvo_adelgazamiento__p_ = false;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
            
            // calculo del porcentaje del indicador No; tuvo adelgazamiento (P/T)  
            $por = $aux * 100 / $total;
            $model -> adelgazmiento= $por;
            
        //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador No:tuvo sobrepeso (P/T) Y DONDE SU VALOR SEA FALSO PARA CALCULOS 
             $aux1 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.nutricion
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_nut = nutricion.id_nut AND
                                                  nutricion._____no_tuvo_sobrepeso__p_t___  = false;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
             // calculo del porcentaje del indicador No:tuvo sobrepeso (P/T)  
            $por1 = $aux1 * 100 / $total;
            $model -> sobrepeso= $por1;
            
        //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador  Índice No:baja ganancia de peso Y DONDE SU VALOR SEA FALSO PARA CALCULOS     
           $aux2 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.nutricion
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_nut = nutricion.id_nut AND
                                                  nutricion. _____no_baja_ganancia_de_peso__ = false;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
            
                          ->queryScalar();                        
            // calculo del porcentaje del indicador Índice Talla-Edad z OMS 2006 OK  
            $por2 = $aux2 * 100 / $total;
            $model -> ganancia_peso = $por2;
            
        //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador  No:baja ganancia de talla Y DONDE SU VALOR SEA FALSO PARA CALCULOS    
            
             $aux3 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.nutricion
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_nut = nutricion.id_nut AND
                                                  nutricion. _____no_baja_ganancia_de_talla_ = false;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
            
                          ->queryScalar(); 
             
             // calculo del porcentaje del indicador Índice Talla-Edad z OMS 2006 OK  
            $por3 = $aux3 * 100 / $total;
            $model -> ganancia_talla = $por3;
            
            // calculo porcentaje total indicador 1
            $nutricion= ($por + $por1 + $por2 +$por3) /4 ;
            $model -> nutricion = $nutricion; 
            
            
     // Calculo de subindicadores indicador 2
  //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador Recibió lactancia materna Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
            $auxali = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.alimentacion
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_ali = alimentacion.id_ali AND
                                                  alimentacion._____recibio_lactancia_materna_= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porali = $auxali * 100 / $total;
            $model -> lactancia= $porali;  
            
     //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador  _____recibio_supl__hierro__chis Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
         $auxali1 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.alimentacion
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_ali = alimentacion.id_ali AND
                                                  alimentacion._____recibio_supl__hierro__chis= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
            
              
            $porali1 = $auxali1 * 100 / $total;
            $model -> suplementos= $porali1;    
       
//---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador  _____si_es_gestante__recibio_sua Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
         $auxali2 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.alimentacion
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_ali = alimentacion.id_ali AND
                                                  alimentacion._____si_es_gestante__recibio_su= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
            
              
            $porali2 = $auxali2 * 100 / $total;
            $model -> acido_f= $porali2;       
     
    //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador  _____estuvo_al_dia_con_suplemen Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
         $auxali3 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.alimentacion
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_nut = alimentacion.id_ali AND
                                                  alimentacion._____estuvo_al_dia_con_suplemen= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
            
              
            $porali3 = $auxali3 * 100 / $total;
            $model -> vitamina_a= $porali3;       
            
        //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____no_recibio_algun_alimento_ Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
         $auxali4 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.alimentacion
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_ali = alimentacion.id_ali AND
                                                  alimentacion._____no_recibio_algun_alimento_= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
            
              
            $porali4 = $auxali4 * 100 / $total;
            $model -> alimento_distinto= $porali4;        
            
            // calculo porcentaje total indicador 2
            $alimentacion= ($porali + $porali1 + $porali2 +$porali3 + $porali4) /5 ;
            $model -> alimentado = $alimentacion;  
      
    // Calculo de subindicadores indicador 3        
        
       //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador No tuvo fiebre Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
            $auxsal = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.salud
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_sal = salud.id_sal AND
                                                  salud. _____no_tuvo_fiebre__= false;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porsal = $auxsal * 100 / $total;
            $model -> fiebre= $porsal;        
           
              //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____no_si_es_gestante__molesti Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
            $auxsal1 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.salud
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_sal = salud.id_sal AND
                                                  salud._____no_si_es_gestante__molesti= false;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porsal1 = $auxsal1 * 100 / $total;
            $model -> urinarias= $porsal1;
            
              //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____no_si_es_gestante__dolor_d  Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
            $auxsal2 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.salud
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_sal = salud.id_sal AND
                                                  salud._____no_si_es_gestante__dolor_d= false;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porsal2 = $auxsal2 * 100 / $total;
            $model -> mareo= $porsal2;
            
              //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____no_si_es_gestante__sangrad  Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
            $auxsal3 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.salud
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_sal = salud.id_sal AND
                                                  salud._____no_si_es_gestante__sangrad= false;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porsal3 = $auxsal3 * 100 / $total;
            $model -> sangrado= $porsal3;
            
             //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____no_tuvo_diarrea__  Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
            $auxsal4 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.salud
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_sal = salud.id_sal AND
                                                  salud._____no_tuvo_diarrea__= false;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porsal4 = $auxsal4 * 100 / $total;
            $model -> diarrea= $porsal4;
            
           // calculo porcentaje total indicador 3
            $salud= ($porsal + $porsal1 + $porsal2 +$porsal3 + $porsal4) /5 ;
            $model -> salud = $salud;    
        
            
            
        // Calculo de subindicadores indicador 4        
        
       //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador ______ha_tenido_algun_ex__lab__ Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
            $auxate = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.atencion
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_ate = atencion.id_ate AND
                                                  atencion.______ha_tenido_algun_ex__lab__= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porate = $auxate * 100 / $total;
            $model -> examen= $porate; 
            
        //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador ______ha_tenido_al_menos_una_ec Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
            $auxate1 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.atencion
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_ate = atencion.id_ate AND
                                                  atencion.______ha_tenido_al_menos_una_ec= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porate1 = $auxate1 * 100 / $total;
            $model -> ecografia= $porate1;     
            
          //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____tiene_sus_vacunas_al_dia_p Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
            $auxate2 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.atencion
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_ate = atencion.id_ate AND
                                                  atencion._____tiene_sus_vacunas_al_dia_p= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porate2 = $auxate2 * 100 / $total;
            $model -> vacunas= $porate2;  
            
        //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____ha_tenido_su_ultimo_contro Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
            $auxate3 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.atencion
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_ate = atencion.id_ate AND
                                                  atencion._____ha_tenido_su_ultimo_contro= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porate3 = $auxate3 * 100 / $total;
            $model -> control= $porate3;
            
        //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____recibio_consejeria_nutrici Y DONDE SU VALOR SEA FALSO PARA CALCULOS         
            $auxate4 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.atencion
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_ate = atencion.id_ate AND
                                                  atencion._____recibio_consejeria_nutrici= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porate4 = $auxate4 * 100 / $total;
            $model -> consejeria_nut= $porate4;   
            
            // calculo porcentaje total indicador 4
            $atencion= ($porate + $porate1 + $porate2 +$porate3 + $porate4) /5 ;
            $model -> atencion = $atencion;
            
      
     // Calculo de subindicadores indicador 5
            //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____padre_estuvo_con_nino_ayer Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxcui = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.cuidadores
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_cui = cuidadores.id_cui AND
                                                  cuidadores._____padre_estuvo_con_nino_ayer= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porcui = $auxcui * 100 / $total;
            $model -> est_pad= $porcui;   
            
            //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____madre_dio_de_comer_al_nino Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxcui1 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.cuidadores
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_cui = cuidadores.id_cui AND
                                                  cuidadores._____madre_dio_de_comer_al_nino= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porcui1 = $auxcui1 * 100 / $total;
            $model -> com_aye = $porcui1;  
            
            //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador ______fue_su_madre_o_padre__ Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxcui2 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.cuidadores
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_cui = cuidadores.id_cui AND
                                                  cuidadores.______fue_su_madre_o_padre__= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porcui2 = $auxcui2 * 100 / $total;
            $model -> fue_mad = $porcui2; 
            
            //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador ______fue_mayor_de_edad__18____ Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxcui3 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.cuidadores
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_cui = cuidadores.id_cui AND
                                                  cuidadores.______fue_mayor_de_edad__18____= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porcui3 = $auxcui3 * 100 / $total;
            $model -> may_eda = $porcui3; 
            
             //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador ______lee_y_escribe_castellano_Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxcui4 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.cuidadores
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_cui = cuidadores.id_cui AND
                                                  cuidadores.______lee_y_escribe_castellano_= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porcui4 = $auxcui4 * 100 / $total;
            $model -> castellano = $porcui4;
            
            // calculo porcentaje total indicador 5
            $cuidador= ($porcui + $porcui1 + $porcui2 +$porcui3 + $porcui4) /5 ;
            $model -> cuidador = $cuidador;
            
            
            // Calculo de subindicadores indicador 6
            //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____agua_apta_para_consumo_hum Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxviv = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.vivienda
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_viv = vivienda.id_viv AND
                                                  vivienda._____agua_apta_para_consumo_hum= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porviv = $auxviv * 100 / $total;
            $model -> agu_apt= $porviv;   
            
            //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____usa_alcant_pzo_sep_letr_ad Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxviv1 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.vivienda
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_viv = vivienda.id_viv AND
                                                  vivienda._____usa_alcant_pzo_sep_letr_ad= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porviv1 = $auxviv1 * 100 / $total;
            $model -> alcantarillado= $porviv1;
            
            //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____cocina_mejorada__r__o_en_c Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxviv2 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.vivienda
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_viv = vivienda.id_viv AND
                                                  vivienda._____cocina_mejorada__r__o_en_c= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porviv2 = $auxviv2 * 100 / $total;
            $model -> cocina= $porviv2;
            
            //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____no_animales_de_consumo_sue Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxviv3 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.vivienda
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_viv = vivienda.id_viv AND
                                                  vivienda._____no_animales_de_consumo_sue= false;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porviv3 = $auxviv3 * 100 / $total;
            $model -> ani_con= $porviv3;
            
            //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____no_animales_domesticos_sue Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxviv4 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.vivienda
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_viv = vivienda.id_viv AND
                                                  vivienda._____no_animales_domesticos_sue= false;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porviv4 = $auxviv4 * 100 / $total;
            $model -> ani_dom= $porviv4;
            
            // calculo porcentaje total indicador 6
            $vivienda= ($porviv + $porviv1 + $porviv2 +$porviv3 + $porviv4) /5 ;
            $model -> vivienda = $vivienda;
            
            // Calculo de subindicadores indicador 7
    //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador sub1_sal_com Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxsalcomu = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.saludablecomunidad
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_sal_com = saludablecomunidad.id_sal_com AND
                                                  saludablecomunidad.sub1_sal_com= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porsalcomu = $auxsalcomu * 100 / $total;
            $model -> seguridad= $porsalcomu; 
            
    //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____madre_c_seg_salud_iess_cam Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxsalcomu1 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.saludablecomunidad
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_sal_com = saludablecomunidad.id_sal_com AND
                                                  saludablecomunidad._____madre_c_seg_salud_iess_cam= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porsalcomu1 = $auxsalcomu1 * 100 / $total;
            $model -> car_mad= $porsalcomu1; 
            
          //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador _____nino_con_numero_de_identif Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxsalcomu2 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.saludablecomunidad
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_sal_com = saludablecomunidad.id_sal_com AND
                                                  saludablecomunidad._____nino_con_numero_de_identif= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porsalcomu2 = $auxsalcomu2 * 100 / $total;
            $model -> nin_ced= $porsalcomu2;    
            
           
       
             //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador ______tiene_c_i___ Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxsalcomu3 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.saludablecomunidad
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_sal_com = saludablecomunidad.id_sal_com AND
                                                  saludablecomunidad.______tiene_c_i___= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porsalcomu3 = $auxsalcomu3 * 100 / $total;
            $model -> cedula= $porsalcomu3;    
         
           //---******* CONSULTA ENCUENSTAS HECHAS EN UNA TOMA, CANTON e indicador ______tiene_educacion_primaria_ Y DONDE SU VALOR SEA FALSO PARA CALCULOS  
             $auxsalcomu4 = $db->createCommand('SELECT COUNT (*)
                                                FROM 
                                                  public.factencuesta, 
                                                  public.saludablecomunidad
                                                WHERE 
                                                  factencuesta.num_tom = :num_tom AND 
                                                  factencuesta.id_tecn = :canton AND
                                                  factencuesta.id_sal_com = saludablecomunidad.id_sal_com AND
                                                  saludablecomunidad.______tiene_educacion_primaria_= true;', [':num_tom'=>$model->num_tom, ':canton'=> $model->canton ])
                         ->queryScalar();   
  
            $porsalcomu4 = $auxsalcomu4 * 100 / $total;
            $model -> edu_prim= $porsalcomu4;    
            
            // calculo porcentaje total indicador 7
            $com_sal= ($porsalcomu + $porsalcomu1 + $porsalcomu2 +$porsalcomu3 + $porsalcomu4) /5 ;
            $model -> com_sal = $com_sal;
            
          return $this->render('grafico', ['model' => $model]);
           // return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // la página es mostrada inicialmente o hay algún error de validación
            return $this->render('grafico', ['model' => $model]);
        }
    }
 
    
    
    
}
