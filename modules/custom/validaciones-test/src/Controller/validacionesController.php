<?php

namespace Drupal\validaciones\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal;

class validacionesController extends ControllerBase{

    function ValidarCorreo($valor){

        $patron='/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
        if (preg_match($patron, $valor)) {
            return true;
        }
        else
            return false;
    }

    function SoloLetrasCaracteres($valor){

        $patron = "/^[\D]+$/";
        if (preg_match($patron, $valor)) {
            return true;
        }
        else
            return false;
    }
    function LetrasGuion($valor){

        $patron = "/^[a-zA-Z\s\-(),ÁÍÉÓÚáíéóúñ]+$/";
        if (preg_match($patron, $valor)) {
            return true;
        }
        else
            return false;
    }
    function LetrasGuionParentesis($valor){

        $patron = "/^[a-zA-Z\-() ÁÍÉÓÚáíéóúñ]+$/";
        if (preg_match($patron, $valor)) {
            return true;
        }
        else
            return false;
    }
  function LetrasNumerosGuionParentesis($valor){

    $patron = "/^[a-zA-Z0-9\-() ÁÍÉÓÚáíéóúñ]+$/";
    if (preg_match($patron, $valor)) {
      return true;
    }
    else
      return false;
  }
    public function CampoUnico($tipo,$campo,$valor,$nid,$cliente,$oport){
        
        $query = Drupal::entityQuery('node')->accessCheck(FALSE)->condition('type',$tipo)
                ->condition($campo,$valor);
        if($nid){
            $query ->condition('nid',$nid,'<>');            
        }
        if($cliente){
            $query ->condition('field_tipo_de_clientes',$cliente);
        }
        if($oport){
            $query ->condition('field_tipo_servoportunidades',$oport);
        }

        $count = $query->count()->execute();
      
        return $count;
    }

    function resumir($texto, $limite, $car=" ", $final=".")
    {
        if(strlen($texto) <= $limite) return $texto;
        if(false !== ($breakpoint = strpos($texto, $car, $limite)))
        {
            $val=strlen($texto)-1;
            if( $breakpoint < $val)
            {
                $texto= substr($texto, 0, $breakpoint) . $final;
            }
        }

        return $texto;
    }
    function eliminar_tildes($cadena) {
        $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
        $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
        $texto = str_replace($no_permitidas, $permitidas ,$cadena);
        return $texto;
    }
    function Mes($mes){

        if ($mes=="January") $mes="Enero";
        if ($mes=="February") $mes="Febrero";
        if ($mes=="March") $mes="Marzo";
        if ($mes=="April") $mes="Abril";
        if ($mes=="May") $mes="Mayo";
        if ($mes=="June") $mes="Junio";
        if ($mes=="July") $mes="Julio";
        if ($mes=="August") $mes="Agosto";
        if ($mes=="September") $mes="Septiembre";
        if ($mes=="October") $mes="Octubre";
        if ($mes=="November") $mes="Noviembre";
        if ($mes=="December") $mes="Diciembre";

        return $mes;
    }

    public function Cant_cartFlotantes($nid,$cliente){

        $query = \Drupal::entityQuery('node')->accessCheck(FALSE);
        $query->condition('type', 'cart_flotante');
        $query->condition('field_tipo_de_clientes',$cliente);
        if($nid){
            $query->condition('nid',$nid,'<>');
        }
        $count=$query->count()->execute();
       
        return $count;
    }

}


