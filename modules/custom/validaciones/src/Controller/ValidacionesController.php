<?php

namespace Drupal\validaciones\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Validation helpers for custom forms and nodes.
 */
class ValidacionesController extends ControllerBase {

  /**
   * Runs preg_match safely for PHP 8+ (non-null string subject).
   */
  protected function matchesPattern(string $pattern, $value): bool {
    if ($value === NULL || $value === '') {
      return FALSE;
    }
    return (bool) preg_match($pattern, (string) $value);
  }

  /**
   * Validates email format.
   */
  public function ValidarCorreo($valor) {
    $patron = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
    return $this->matchesPattern($patron, $valor);
  }

  /**
   * Validates non-digit-only strings.
   */
  public function SoloLetrasCaracteres($valor) {
    $patron = "/^[\D]+$/";
    return $this->matchesPattern($patron, $valor);
  }

  /**
   * Validates letters, spaces, hyphens, parentheses.
   */
  public function LetrasGuion($valor) {
    $patron = "/^[a-zA-Z\s\-(),ÁÍÉÓÚáíéóúñ]+$/";
    return $this->matchesPattern($patron, $valor);
  }

  /**
   * Validates letters with hyphen and parentheses.
   */
  public function LetrasGuionParentesis($valor) {
    $patron = "/^[a-zA-Z\-() ÁÍÉÓÚáíéóúñ]+$/";
    return $this->matchesPattern($patron, $valor);
  }

  /**
   * Validates letters, numbers, hyphen and parentheses.
   */
  public function LetrasNumerosGuionParentesis($valor) {
    $patron = "/^[a-zA-Z0-9\-() ÁÍÉÓÚáíéóúñ]+$/";
    return $this->matchesPattern($patron, $valor);
  }

  /**
   * Counts nodes with the same field value (uniqueness check).
   */
  public function CampoUnico($tipo, $campo, $valor, $nid, $cliente, $oport) {
    $query = \Drupal::entityQuery('node')->accessCheck(FALSE)->condition('type', $tipo)
      ->condition($campo, $valor);
    if ($nid) {
      $query->condition('nid', $nid, '<>');
    }
    if ($cliente) {
      $query->condition('field_tipo_de_clientes', $cliente);
    }
    if ($oport) {
      $query->condition('field_tipo_servoportunidades', $oport);
    }

    return $query->count()->execute();
  }

  /**
   * Truncates text at a word boundary.
   */
  public function resumir($texto, $limite, $car = " ", $final = ".") {
    if (strlen($texto) <= $limite) {
      return $texto;
    }
    if (FALSE !== ($breakpoint = strpos($texto, $car, $limite))) {
      $val = strlen($texto) - 1;
      if ($breakpoint < $val) {
        $texto = substr($texto, 0, $breakpoint) . $final;
      }
    }

    return $texto;
  }

  /**
   * Removes accents from a string.
   */
  public function eliminar_tildes($cadena) {
    $no_permitidas = ["á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "ñ", "À", "Ã", "Ì", "Ò", "Ù", "Ã™", "Ã ", "Ã¨", "Ã¬", "Ã²", "Ã¹", "ç", "Ç", "Ã¢", "ê", "Ã®", "Ã´", "Ã»", "Ã‚", "ÃŠ", "ÃŽ", "Ã”", "Ã›", "ü", "Ã¶", "Ã–", "Ã¯", "Ã¤", "«", "Ò", "Ã", "Ã„", "Ã‹"];
    $permitidas = ["a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "n", "N", "A", "E", "I", "O", "U", "a", "e", "i", "o", "u", "c", "C", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "u", "o", "O", "i", "a", "e", "U", "I", "A", "E"];
    return str_replace($no_permitidas, $permitidas, $cadena);
  }

  /**
   * Translates English month names to Spanish.
   */
  public function Mes($mes) {
    $map = [
      "January" => "Enero",
      "February" => "Febrero",
      "March" => "Marzo",
      "April" => "Abril",
      "May" => "Mayo",
      "June" => "Junio",
      "July" => "Julio",
      "August" => "Agosto",
      "September" => "Septiembre",
      "October" => "Octubre",
      "November" => "Noviembre",
      "December" => "Diciembre",
    ];
    return $map[$mes] ?? $mes;
  }

  /**
   * Counts floating cart nodes for a client type.
   */
  public function Cant_cartFlotantes($nid, $cliente) {
    $query = \Drupal::entityQuery('node')->accessCheck(FALSE);
    $query->condition('type', 'cart_flotante');
    $query->condition('field_tipo_de_clientes', $cliente);
    if ($nid) {
      $query->condition('nid', $nid, '<>');
    }
    return $query->count()->execute();
  }

}
